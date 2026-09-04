<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal - Home</title>

    <style>
        /* Base / Layout */
        body {
            margin: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: #f3f4f6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: #1f2937;
        }

        /* Navigation Bar */
        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        .nav-container {
            max-width: 72rem;
            margin: 0 auto;
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand-wrapper {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .brand-logo {
            height: 2.25rem;
            width: 2.25rem;
            border-radius: 0.5rem;
            background-color: #4f46e5;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.125rem;
        }

        .brand-title {
            font-weight: 700;
            font-size: 1.125rem;
            color: #1f2937;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .nav-link {
            text-decoration: none;
            font-weight: 500;
            color: #4b5563;
            transition: color 0.2s ease;
        }

        .nav-link:hover {
            color: #4f46e5;
        }

        .nav-link.active {
            color: #4f46e5;
            font-weight: 600;
        }

        /* Main Layout */
        .main-content {
            flex-grow: 1;
            max-width: 72rem;
            width: 100%;
            margin: 0 auto;
            padding: 2rem 1.5rem;
            box-sizing: border-box;
        }

        /* Hero Banner */
        .hero-card {
            background-color: #4f46e5;
            border-radius: 1rem;
            padding: 2rem;
            color: #ffffff;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .hero-title {
            margin: 0;
            font-size: 1.875rem;
            font-weight: 800;
        }

        .hero-description {
            margin-top: 0.5rem;
            color: #e0e7ff;
            font-size: 1rem;
            max-width: 36rem;
            line-height: 1.5;
        }

        .hero-actions {
            margin-top: 1.5rem;
        }

        .btn-primary {
            display: inline-block;
            padding: 0.625rem 1.25rem;
            background-color: #ffffff;
            color: #4f46e5;
            font-weight: 600;
            font-size: 0.875rem;
            border-radius: 0.5rem;
            text-decoration: none;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            transition: background-color 0.2s ease;
        }

        .btn-primary:hover {
            background-color: #eeef2;
        }

        /* Dashboard Grid */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(1, minmax(0, 1fr));
            gap: 1.5rem;
        }

        @media (min-width: 768px) {
            .dashboard-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        .card {
            background-color: #ffffff;
            padding: 1.5rem;
            border-radius: 0.75rem;
            border: 1px solid #e5e7eb;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            transition: box-shadow 0.2s ease;
        }

        .card:hover {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .card-icon-wrapper {
            height: 3rem;
            width: 3rem;
            border-radius: 0.5rem;
            background-color: #e0e7ff;
            color: #4f46e5;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .card-icon {
            width: 1.5rem;
            height: 1.5rem;
        }

        .card-title {
            margin: 0;
            font-size: 1.125rem;
            font-weight: 700;
            color: #1f2937;
        }

        .card-text {
            margin-top: 0.25rem;
            font-size: 0.875rem;
            color: #6b7280;
        }

        .badge-success {
            display: inline-block;
            margin-top: 1rem;
            padding: 0.25rem 0.625rem;
            background-color: #d1fae5;
            color: #065f46;
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 9999px;
        }

        /* Footer */
        .footer {
            background-color: #ffffff;
            border-top: 1px solid #e5e7eb;
            padding: 1rem 0;
            text-align: center;
            font-size: 0.875rem;
            color: #6b7280;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="nav-container">
            <div class="brand-wrapper">
                <div class="brand-logo">SP</div>
                <span class="brand-title">Cessy Student Portal</span>
            </div>
            
            <div class="nav-links">
                <a href="<?= site_url('student'); ?>" class="nav-link active">Home</a>
                <a href="<?= site_url('student/profile'); ?>" class="nav-link">Student Profile</a>
            </div>
        </div>
    </nav>

    <main class="main-content">
        
  
        <div class="hero-card">
            <h1 class="hero-title">Welcome to Student Portal!</h1>
            <p class="hero-description">
                Access your profile details, check academic updates, and manage your student information directly from your home dashboard.
            </p>
            <div class="hero-actions">
                <a href="<?= site_url('student/profile'); ?>" class="btn-primary">
                    View My Profile
                </a>
            </div>
        </div>

        <div class="dashboard-grid">
            <div class="card">
                <div class="card-icon-wrapper">
                    <svg class="card-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h2 class="card-title">Account Status</h2>
                <p class="card-text">Your student account session is active and verified.</p>
                <span class="badge-success">Active Session</span>
            </div>
        </div>

    </main>

   
    <footer class="footer">
        &copy; <?= date('Y'); ?> LavaLust Student System. All rights reserved.
    </footer>

</body>
</html>