<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style type="text/tailwindcss">
        @layer components {
            .profile-body {
                @apply bg-gray-100 min-h-screen py-10 flex items-center justify-center;
            }
            .profile-card {
                @apply max-w-2xl w-full bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden p-8;
            }
            .profile-header {
                @apply flex items-center space-x-6 border-b pb-6;
            }
            .avatar {
                @apply h-20 w-20 rounded-full bg-indigo-600 flex items-center justify-center text-white text-3xl font-bold uppercase shadow-inner;
            }
            .student-name {
                @apply text-2xl font-bold text-gray-800;
            }
            .student-id {
                @apply text-indigo-600 font-semibold text-sm mt-1;
            }
            .info-grid {
                @apply mt-6 grid grid-cols-1 md:grid-cols-2 gap-6;
            }
            .info-box {
                @apply bg-gray-50 p-4 rounded-lg border border-gray-100;
            }
            .info-box-full {
                @apply bg-gray-50 p-4 rounded-lg border border-gray-100 md:col-span-2;
            }
            .info-label {
                @apply text-xs font-bold uppercase text-gray-400;
            }
            .info-value {
                @apply text-gray-800 font-medium text-base mt-1;
            }
            .action-wrapper {
                @apply mt-8 border-t pt-6 flex justify-end;
            }
            .btn-back {
                @apply px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg text-sm transition;
            }
        }
    </style>
</head>
<body class="profile-body">

    <div class="profile-card">
        
        <div class="profile-header">
            <div class="avatar">
                <?= isset($student['name']) ? substr($student['name'], 0, 1) : 'S'; ?>
            </div>
            <div>
                <h1 class="student-name">
                    <?= htmlspecialchars($student['name'] ?? 'N/A'); ?>
                </h1>
                <p class="student-id">
                    Student ID: <?= htmlspecialchars($student['student_id'] ?? 'N/A'); ?>
                </p>
            </div>
        </div>

        <div class="info-grid">
            <div class="info-box">
                <label class="info-label">Course</label>
                <p class="info-value">
                    <?= htmlspecialchars($student['course'] ?? 'N/A'); ?>
                </p>
            </div>

            <div class="info-box">
                <label class="info-label">Year Level & Section</label>
                <p class="info-value">
                    <?= htmlspecialchars($student['year'] ?? 'N/A'); ?> - <?= htmlspecialchars($student['section'] ?? 'N/A'); ?>
                </p>
            </div>

            <div class="info-box-full">
                <label class="info-label">Email Address</label>
                <p class="info-value">
                    <?= htmlspecialchars($student['email'] ?? 'N/A'); ?>
                </p>
            </div>
        </div>

        <div class="action-wrapper">
            <a href="<?= site_url('student'); ?>" class="btn-back">
               Back to Home
            </a>
        </div>

    </div>

</body>
</html>