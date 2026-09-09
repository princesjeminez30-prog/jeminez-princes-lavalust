<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-lg bg-white rounded-xl shadow-lg border border-slate-100 p-8">

        <!-- Header -->
        <div class="flex items-center justify-between border-b border-slate-100 pb-5 mb-6">
            <div>
                <h2 class="text-xl font-bold text-slate-800">Edit Product</h2>
                <p class="text-sm text-slate-500">Update product details and save inventory changes</p>
            </div>
            <a href="/products" class="text-slate-400 hover:text-slate-600 transition">
                <i data-lucide="x" class="w-6 h-6"></i>
            </a>
        </div>

        <form action="/products/update/<?= htmlspecialchars($product['id']); ?>" method="POST" class="space-y-4">

            <div>
                <label for="product_name" class="block text-sm font-medium text-slate-700 mb-1">Product Name</label>
                <input type="text" id="product_name" name="product_name"
                    value="<?= htmlspecialchars($product['product_name']); ?>" required
                    class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white text-sm text-slate-800">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-slate-700 mb-1">Description</label>
                <textarea id="description" name="description" rows="3"
                    class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white text-sm text-slate-800"><?= htmlspecialchars($product['description']); ?></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="price" class="block text-sm font-medium text-slate-700 mb-1">Price ($)</label>
                    <input type="number" id="price" step="0.01" name="price"
                        value="<?= htmlspecialchars($product['price']); ?>" required
                        class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white text-sm text-slate-800">
                </div>

                <div>
                    <label for="quantity" class="block text-sm font-medium text-slate-700 mb-1">Quantity</label>
                    <input type="number" id="quantity" name="quantity"
                        value="<?= htmlspecialchars($product['quantity']); ?>" required
                        class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white text-sm text-slate-800">
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100 mt-6">
                <a href="/products"
                    class="px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-100 rounded-lg transition">Cancel</a>
                <button type="submit"
                    class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm rounded-lg shadow-sm transition flex items-center gap-2">
                    <i data-lucide="check" class="w-4 h-4"></i>
                    <span>Update Product</span>
                </button>
            </div>

        </form>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>

</html>