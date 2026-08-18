<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen py-10 flex items-center justify-center">

    <div class="max-w-2xl w-full bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden p-8">
        
        <!-- Header Section -->
        <div class="flex items-center space-x-6 border-b pb-6">
            <div class="h-20 w-20 rounded-full bg-indigo-600 flex items-center justify-center text-white text-3xl font-bold uppercase shadow-inner">
                <?= isset($student['name']) ? substr($student['name'], 0, 1) : 'S'; ?>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-800">
                    <?= htmlspecialchars($student['name'] ?? 'N/A'); ?>
                </h1>
                <p class="text-indigo-600 font-semibold text-sm mt-1">
                    Student ID: <?= htmlspecialchars($student['student_id'] ?? 'N/A'); ?>
                </p>
            </div>
        </div>

        <!-- Info Grid -->
        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                <label class="text-xs font-bold uppercase text-gray-400">Course</label>
                <p class="text-gray-800 font-medium text-base mt-1">
                    <?= htmlspecialchars($student['course'] ?? 'N/A'); ?>
                </p>
            </div>

            <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                <label class="text-xs font-bold uppercase text-gray-400">Year Level & Section</label>
                <p class="text-gray-800 font-medium text-base mt-1">
                    <?= htmlspecialchars($student['year'] ?? 'N/A'); ?> - <?= htmlspecialchars($student['section'] ?? 'N/A'); ?>
                </p>
            </div>

            <div class="bg-gray-50 p-4 rounded-lg border border-gray-100 md:col-span-2">
                <label class="text-xs font-bold uppercase text-gray-400">Email Address</label>
                <p class="text-gray-800 font-medium text-base mt-1">
                    <?= htmlspecialchars($student['email'] ?? 'N/A'); ?>
                </p>
            </div>
        </div>

        <!-- Navigation -->
        <div class="mt-8 border-t pt-6 flex justify-end">
            <a href="<?= site_url('student'); ?>" 
               class="px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg text-sm transition">
               Back to Home
            </a>
        </div>

    </div>

</body>
</html>