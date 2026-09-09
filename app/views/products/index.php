<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50 min-h-screen">

    <!-- Top Navigation -->
    <nav class="bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-blue-600 rounded-lg text-white">
                        <i data-lucide="package-search" class="w-6 h-6"></i>
                    </div>
                    <h1 class="text-xl font-bold text-slate-800">Inventory Dashboard</h1>
                </div>
                <a href="/logout"
                    class="inline-flex items-center gap-2 px-3.5 py-2 rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 hover:text-red-600 transition text-sm font-medium">
                    <i data-lucide="log-out" class="w-4 h-4"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <!-- Top Action Bar -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <div class="relative flex-1 max-w-md">
                <i data-lucide="search" class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                <input type="text" id="searchInput" placeholder="Search products..."
                    class="w-full pl-10 pr-4 py-2 bg-white border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
            </div>

            <a href="/products/create"
                class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-lg shadow-sm transition text-sm">
                <i data-lucide="plus" class="w-4 h-4"></i>
                <span>Add Product</span>
            </a>
        </div>

        <!-- Products Table Card -->
        <div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse" id="productsTable">
                    <thead>
                        <tr
                            class="bg-slate-50 border-b border-slate-200 text-xs font-semibold uppercase text-slate-500 tracking-wider">
                            <th class="px-6 py-4">ID</th>
                            <th class="px-6 py-4">Product</th>
                            <th class="px-6 py-4">Description</th>
                            <th class="px-6 py-4">Price</th>
                            <th class="px-6 py-4">Quantity</th>
                            <th class="px-6 py-4">Created At</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 text-sm text-slate-700">
                        <?php if (!empty($products)): ?>
                            <?php foreach ($products as $p): ?>
                                <tr class="hover:bg-slate-50/50 transition">
                                    <td class="px-6 py-4 font-mono text-slate-500">#<?= htmlspecialchars($p['id']); ?></td>
                                    <td class="px-6 py-4 font-semibold text-slate-900">
                                        <?= htmlspecialchars($p['product_name']); ?></td>
                                    <td class="px-6 py-4 text-slate-500 max-w-xs truncate">
                                        <?= htmlspecialchars($p['description']); ?></td>
                                    <td class="px-6 py-4 font-medium text-slate-900">$<?= number_format($p['price'], 2); ?></td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-800">
                                            <?= htmlspecialchars($p['quantity']); ?> in stock
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-slate-500"><?= htmlspecialchars($p['created_at']); ?></td>
                                    <td class="px-6 py-4 text-right space-x-2">
                                        <a href="/products/edit/<?= $p['id']; ?>"
                                            class="inline-flex items-center p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition"
                                            title="Edit">
                                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                                        </a>
                                        <a href="/products/delete/<?= $p['id']; ?>"
                                            onclick="return confirm('Are you sure you want to delete this product?');"
                                            class="inline-flex items-center p-1.5 text-red-600 hover:bg-red-50 rounded-lg transition"
                                            title="Delete">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center text-slate-400">
                                    <i data-lucide="box" class="w-8 h-8 mx-auto mb-2 stroke-1"></i>
                                    No products found.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
        lucide.createIcons();

        // Optional Live Filter/Search functionality
        document.getElementById('searchInput').addEventListener('keyup', function () {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll('#productsTable tbody tr');
            rows.forEach(row => {
                let text = row.innerText.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    </script>
</body>

</html>