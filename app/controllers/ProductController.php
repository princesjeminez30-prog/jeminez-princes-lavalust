<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit;
        }

        $this->call->database();
    }

    /*
    |--------------------------------------------------------------
    | AUTHENTICATION
    |--------------------------------------------------------------
    */

    private function authenticate()
    {
        $headers = function_exists('getallheaders') ? getallheaders() : [];

        $authorization = '';

        foreach ($headers as $key => $value) {
            if (strtolower($key) === 'authorization') {
                $authorization = trim($value);
                break;
            }
        }

        if (empty($authorization)) {
            http_response_code(401);
            echo json_encode([
                'status' => 'error',
                'message' => 'Authentication required.'
            ]);
            exit;
        }

        if (stripos($authorization, 'Bearer ') !== 0) {
            http_response_code(401);
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid authentication token.'
            ]);
            exit;
        }

        $token = trim(substr($authorization, 7));

        $decoded = base64_decode($token, true);

        if ($decoded === false) {
            http_response_code(401);
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid authentication token.'
            ]);
            exit;
        }

        $tokenData = json_decode($decoded, true);

        if (
            !is_array($tokenData) ||
            !isset($tokenData['id']) ||
            !isset($tokenData['username'])
        ) {
            http_response_code(401);
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid authentication token.'
            ]);
            exit;
        }

        return $tokenData;
    }

    /*
    |--------------------------------------------------------------
    | GET PRODUCTS
    |--------------------------------------------------------------
    */

    public function index()
    {
        $this->authenticate();

        try {
            $products = $this->db
                ->table('products')
                ->get_all();

            http_response_code(200);

            echo json_encode([
                'status' => 'success',
                'data' => $products ?: []
            ]);
        } catch (\Throwable $e) {
            http_response_code(500);

            echo json_encode([
                'status' => 'error',
                'message' => 'Database error.'
            ]);
        }
    }

    /*
    |--------------------------------------------------------------
    | CREATE PRODUCT
    |--------------------------------------------------------------
    */

    public function create()
    {
        $this->authenticate();

        $data = json_decode(file_get_contents('php://input'), true);

        if (!is_array($data)) {
            http_response_code(400);

            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid JSON data.'
            ]);

            return;
        }

        $productName = isset($data['product_name'])
            ? trim($data['product_name'])
            : '';

        $description = isset($data['description'])
            ? trim($data['description'])
            : '';

        $price = isset($data['price'])
            ? $data['price']
            : null;

        $quantity = isset($data['quantity'])
            ? $data['quantity']
            : null;

        if ($productName === '') {
            http_response_code(400);

            echo json_encode([
                'status' => 'error',
                'message' => 'Product name is required.'
            ]);

            return;
        }

        if (!is_numeric($price) || $price < 0) {
            http_response_code(400);

            echo json_encode([
                'status' => 'error',
                'message' => 'Valid price is required.'
            ]);

            return;
        }

        if (!is_numeric($quantity) || $quantity < 0) {
            http_response_code(400);

            echo json_encode([
                'status' => 'error',
                'message' => 'Valid quantity is required.'
            ]);

            return;
        }

        $insertData = [
            'product_name' => $productName,
            'description' => $description,
            'price' => number_format((float) $price, 2, '.', ''),
            'quantity' => (int) $quantity
        ];

        try {
            $inserted = $this->db
                ->table('products')
                ->insert($insertData);

            if ($inserted) {
                http_response_code(201);

                echo json_encode([
                    'status' => 'success',
                    'message' => 'Product created successfully.'
                ]);
            } else {
                http_response_code(500);

                echo json_encode([
                    'status' => 'error',
                    'message' => 'Failed to create product.'
                ]);
            }
        } catch (\Throwable $e) {
            http_response_code(500);

            echo json_encode([
                'status' => 'error',
                'message' => 'Database error.'
            ]);
        }
    }

    /*
    |--------------------------------------------------------------
    | UPDATE PRODUCT
    |--------------------------------------------------------------
    */

    public function update($id = null)
    {
        $this->authenticate();

        if (!$id || !is_numeric($id)) {
            http_response_code(400);

            echo json_encode([
                'status' => 'error',
                'message' => 'Valid product ID is required.'
            ]);

            return;
        }

        $data = json_decode(file_get_contents('php://input'), true);

        if (!is_array($data)) {
            http_response_code(400);

            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid JSON data.'
            ]);

            return;
        }

        $productName = isset($data['product_name'])
            ? trim($data['product_name'])
            : '';

        $description = isset($data['description'])
            ? trim($data['description'])
            : '';

        $price = isset($data['price'])
            ? $data['price']
            : null;

        $quantity = isset($data['quantity'])
            ? $data['quantity']
            : null;

        if ($productName === '') {
            http_response_code(400);

            echo json_encode([
                'status' => 'error',
                'message' => 'Product name is required.'
            ]);

            return;
        }

        if (!is_numeric($price) || $price < 0) {
            http_response_code(400);

            echo json_encode([
                'status' => 'error',
                'message' => 'Valid price is required.'
            ]);

            return;
        }

        if (!is_numeric($quantity) || $quantity < 0) {
            http_response_code(400);

            echo json_encode([
                'status' => 'error',
                'message' => 'Valid quantity is required.'
            ]);

            return;
        }

        $updateData = [
            'product_name' => $productName,
            'description' => $description,
            'price' => number_format((float) $price, 2, '.', ''),
            'quantity' => (int) $quantity
        ];

        try {
            $product = $this->db
                ->table('products')
                ->where('id', $id)
                ->get();

            if (!$product) {
                http_response_code(404);

                echo json_encode([
                    'status' => 'error',
                    'message' => 'Product not found.'
                ]);

                return;
            }

            $updated = $this->db
                ->table('products')
                ->where('id', $id)
                ->update($updateData);

            if ($updated) {
                http_response_code(200);

                echo json_encode([
                    'status' => 'success',
                    'message' => 'Product updated successfully.'
                ]);
            } else {
                http_response_code(500);

                echo json_encode([
                    'status' => 'error',
                    'message' => 'Failed to update product.'
                ]);
            }
        } catch (\Throwable $e) {
            http_response_code(500);

            echo json_encode([
                'status' => 'error',
                'message' => 'Database error.'
            ]);
        }
    }

    /*
    |--------------------------------------------------------------
    | DELETE PRODUCT
    |--------------------------------------------------------------
    */

    public function delete($id = null)
    {
        $this->authenticate();

        if (!$id || !is_numeric($id)) {
            http_response_code(400);

            echo json_encode([
                'status' => 'error',
                'message' => 'Valid product ID is required.'
            ]);

            return;
        }

        try {
            $product = $this->db
                ->table('products')
                ->where('id', $id)
                ->get();

            if (!$product) {
                http_response_code(404);

                echo json_encode([
                    'status' => 'error',
                    'message' => 'Product not found.'
                ]);

                return;
            }

            $deleted = $this->db
                ->table('products')
                ->where('id', $id)
                ->delete();

            if ($deleted) {
                http_response_code(200);

                echo json_encode([
                    'status' => 'success',
                    'message' => 'Product deleted successfully.'
                ]);
            } else {
                http_response_code(500);

                echo json_encode([
                    'status' => 'error',
                    'message' => 'Failed to delete product.'
                ]);
            }
        } catch (\Throwable $e) {
            http_response_code(500);

            echo json_encode([
                'status' => 'error',
                'message' => 'Database error.'
            ]);
        }
    }
}