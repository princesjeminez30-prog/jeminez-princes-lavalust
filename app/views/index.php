<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal - Home</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Navigation Bar -->
    <nav class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="h-9 w-9 rounded-lg bg-indigo-600 flex items-center justify-center text-white font-bold text-lg">
                    SP
                </div>
                <span class="font-bold text-gray-800 text-lg">Student Portal</span>
            </div>
            
            <div class="flex items-center space-x-6">
                <a href="<?= site_url('student'); ?>" class="text-indigo-600 font-semibold hover:text-indigo-800 transition">
                    Home
                </a>
                <a href="<?= site_url('student/profile'); ?>" class="text-gray-600 hover:text-indigo-600 font-medium transition">
                    Student Profile
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <main class="flex-grow max-w-6xl w-full mx-auto px-6 py-8">
        
        <!-- Welcome Hero Section -->
        <div class="bg-indigo-600 rounded-2xl p-8 text-white shadow-md mb-8">
            <h1 class="text-3xl font-extrabold">Welcome to Student Portal!</h1>
            <p class="mt-2 text-indigo-100 text-base max-w-xl">
                Access your profile details, check academic updates, and manage your student information directly from your home dashboard.
            </p>
            <div class="mt-6">
                <a href="<?= site_url('student/profile'); ?>" class="px-5 py-2.5 bg-white text-indigo-600 hover:bg-indigo-50 font-semibold rounded-lg text-sm shadow transition inline-block">
                    View My Profile
                </a>
            </div>
        </div>

        <!-- Dashboard Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            


            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition">
                <div class="h-12 w-12 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h2 class="text-lg font-bold text-gray-800">Account Status</h2>
                <p class="text-sm text-gray-500 mt-1">Your student account session is active and verified.</p>
                <span class="mt-4 inline-block text-xs font-semibold px-2.5 py-1 bg-green-100 text-green-800 rounded-full">
                    Active Session
                </span>
            </div>

        </div>
    </main>

    <!-- Simple Footer -->
    <footer class="bg-white border-t border-gray-200 py-4 text-center text-sm text-gray-500">
        &copy; <?= date('Y'); ?> LavaLust Student System. All rights reserved.
    </footer>

</body>
</html>