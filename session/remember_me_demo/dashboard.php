<?php
$username = "Guest";

if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Social Hub</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            color: #333;
        }

        /* Header/Navbar */
        .navbar-custom {
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-custom .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: white !important;
        }

        .navbar-custom .nav-link {
            color: rgba(255, 255, 255, 0.85) !important;
            margin: 0 0.5rem;
            transition: all 0.3s ease;
        }

        .navbar-custom .nav-link:hover {
            color: white !important;
            transform: translateY(-2px);
        }

        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.3) !important;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 0.85)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* Main Container */
        .main-container {
            display: grid;
            grid-template-columns: 280px 1fr 300px;
            gap: 2rem;
            padding: 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Sidebar */
        .sidebar {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            height: fit-content;
            position: sticky;
            top: 80px;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 0.5rem;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            color: #555;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .sidebar-menu a:hover {
            background: #f0f2f5;
            color: #667eea;
            padding-left: 1.25rem;
        }

        .sidebar-menu a i {
            margin-right: 0.75rem;
            width: 20px;
            text-align: center;
        }

        /* Feed Area */
        .feed-container {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        /* Cards */
        .card-custom {
            background: white;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .card-custom:hover {
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            transform: translateY(-4px);
        }

        .card-header-custom {
            display: flex;
            align-items: center;
            padding: 1.5rem;
            border-bottom: 1px solid #f0f2f5;
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.5rem;
            margin-right: 1rem;
            box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
        }

        .user-info {
            flex: 1;
        }

        .user-name {
            font-weight: 600;
            color: #333;
            margin-bottom: 0.25rem;
        }

        .user-time {
            color: #9a9a9a;
            font-size: 0.85rem;
        }

        .card-body-custom {
            padding: 1.5rem;
        }

        .card-body-custom p {
            color: #555;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .card-footer-custom {
            display: flex;
            justify-content: space-around;
            padding: 1rem;
            border-top: 1px solid #f0f2f5;
            background: #f8f9fa;
        }

        .action-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #555;
            text-decoration: none;
            font-weight: 500;
            flex: 1;
            justify-content: center;
            padding: 0.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .action-btn:hover {
            background: #e4e6eb;
            color: #667eea;
        }

        /* Right Sidebar */
        .right-sidebar {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            height: fit-content;
            position: sticky;
            top: 80px;
        }

        .widget-title {
            font-weight: 700;
            font-size: 1rem;
            margin-bottom: 1rem;
            color: #333;
        }

        .profile-widget {
            text-align: center;
            padding-bottom: 1rem;
            border-bottom: 1px solid #f0f2f5;
        }

        .profile-avatar {
            width: 80px;
            height: 80px;
            margin: 0 auto 1rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        .profile-name {
            font-weight: 700;
            font-size: 1.1rem;
            color: #333;
            margin-bottom: 0.25rem;
        }

        .profile-status {
            color: #9a9a9a;
            font-size: 0.85rem;
        }

        .stats {
            display: flex;
            justify-content: space-around;
            margin-top: 1rem;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-weight: 700;
            color: #667eea;
            font-size: 1.3rem;
        }

        .stat-label {
            color: #9a9a9a;
            font-size: 0.75rem;
            margin-top: 0.25rem;
        }

        .btn-logout {
            width: 100%;
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 0.75rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .btn-logout:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .main-container {
                grid-template-columns: 1fr;
            }

            .sidebar, .right-sidebar {
                position: relative;
                top: auto;
            }
        }

        @media (max-width: 768px) {
            .main-container {
                padding: 1rem;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">
                <i class="fas fa-globe"></i> Social Hub
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-bell"></i> Notifications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-envelope"></i> Messages</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="main-container">
        <!-- Left Sidebar -->
        <aside class="sidebar">
            <ul class="sidebar-menu">
                <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="#"><i class="fas fa-users"></i> Friends</a></li>
                <li><a href="#"><i class="fas fa-images"></i> Photos</a></li>
                <li><a href="#"><i class="fas fa-video"></i> Videos</a></li>
                <li><a href="#"><i class="fas fa-bookmark"></i> Saved</a></li>
                <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
            </ul>
        </aside>

        <!-- Feed Area -->
        <div class="feed-container">
            <!-- Welcome Card -->
            <div class="card-custom">
                <div class="card-header-custom">
                    <div class="user-avatar"><?php echo strtoupper(substr($username, 0, 1)); ?></div>
                    <div class="user-info">
                        <div class="user-name">Welcome back, <?php echo htmlspecialchars($username); ?>!</div>
                        <div class="user-time">Ready to share something?</div>
                    </div>
                </div>
                <div class="card-body-custom">
                    <p>This is your personal dashboard. You've been remembered on this device through our secure cookie system. Create posts, connect with friends, and share your thoughts with the community!</p>
                </div>
            </div>

            <!-- Sample Post 1 -->
            <div class="card-custom">
                <div class="card-header-custom">
                    <div class="user-avatar">JD</div>
                    <div class="user-info">
                        <div class="user-name">John Developer</div>
                        <div class="user-time">2 hours ago</div>
                    </div>
                </div>
                <div class="card-body-custom">
                    <p>🚀 Just deployed a new feature to production! The authentication system is now working seamlessly with cookies and sessions. #WebDevelopment #PHP</p>
                </div>
                <div class="card-footer-custom">
                    <a href="#" class="action-btn"><i class="far fa-thumbs-up"></i> Like</a>
                    <a href="#" class="action-btn"><i class="far fa-comment"></i> Comment</a>
                    <a href="#" class="action-btn"><i class="fas fa-share"></i> Share</a>
                </div>
            </div>

            <!-- Sample Post 2 -->
            <div class="card-custom">
                <div class="card-header-custom">
                    <div class="user-avatar">SD</div>
                    <div class="user-info">
                        <div class="user-name">Sarah Designer</div>
                        <div class="user-time">5 hours ago</div>
                    </div>
                </div>
                <div class="card-body-custom">
                    <p>✨ New dashboard design is live! Check out the beautiful gradient colors and smooth animations. Thanks to everyone who provided feedback! #UXDesign #WebDesign</p>
                </div>
                <div class="card-footer-custom">
                    <a href="#" class="action-btn"><i class="far fa-thumbs-up"></i> Like</a>
                    <a href="#" class="action-btn"><i class="far fa-comment"></i> Comment</a>
                    <a href="#" class="action-btn"><i class="fas fa-share"></i> Share</a>
                </div>
            </div>

            <!-- Sample Post 3 -->
            <div class="card-custom">
                <div class="card-header-custom">
                    <div class="user-avatar">MC</div>
                    <div class="user-info">
                        <div class="user-name">Mike Code</div>
                        <div class="user-time">1 day ago</div>
                    </div>
                </div>
                <div class="card-body-custom">
                    <p>💡 Pro tip: Always validate your cookies and sanitize user input! Security is everyone's responsibility. Let me know if you have any questions about secure authentication. #Security #CodeTips</p>
                </div>
                <div class="card-footer-custom">
                    <a href="#" class="action-btn"><i class="far fa-thumbs-up"></i> Like</a>
                    <a href="#" class="action-btn"><i class="far fa-comment"></i> Comment</a>
                    <a href="#" class="action-btn"><i class="fas fa-share"></i> Share</a>
                </div>
            </div>
        </div>

        <!-- Right Sidebar -->
        <aside class="right-sidebar">
            <!-- Profile Widget -->
            <div class="profile-widget">
                <div class="profile-avatar"><?php echo strtoupper(substr($username, 0, 1)); ?></div>
                <div class="profile-name"><?php echo htmlspecialchars($username); ?></div>
                <div class="profile-status">Online • Active now</div>
                
                <div class="stats">
                    <div class="stat-item">
                        <div class="stat-number">247</div>
                        <div class="stat-label">Friends</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">1.2K</div>
                        <div class="stat-label">Followers</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">89</div>
                        <div class="stat-label">Posts</div>
                    </div>
                </div>

                <a href="logout.php" class="btn-logout">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>

            <!-- Trending Widget -->
            <div style="margin-top: 2rem;">
                <div class="widget-title"><i class="fas fa-fire"></i> Trending Now</div>
                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    <div style="padding: 0.75rem; background: #f8f9fa; border-radius: 8px; cursor: pointer; transition: all 0.3s ease;" onmouseover="this.style.background='#e4e6eb'" onmouseout="this.style.background='#f8f9fa'">
                        <div style="font-weight: 600; color: #333; font-size: 0.9rem;">#WebDevelopment</div>
                        <div style="color: #9a9a9a; font-size: 0.8rem;">45.2K posts</div>
                    </div>
                    <div style="padding: 0.75rem; background: #f8f9fa; border-radius: 8px; cursor: pointer; transition: all 0.3s ease;" onmouseover="this.style.background='#e4e6eb'" onmouseout="this.style.background='#f8f9fa'">
                        <div style="font-weight: 600; color: #333; font-size: 0.9rem;">#PHP</div>
                        <div style="color: #9a9a9a; font-size: 0.8rem;">32.1K posts</div>
                    </div>
                    <div style="padding: 0.75rem; background: #f8f9fa; border-radius: 8px; cursor: pointer; transition: all 0.3s ease;" onmouseover="this.style.background='#e4e6eb'" onmouseout="this.style.background='#f8f9fa'">
                        <div style="font-weight: 600; color: #333; font-size: 0.9rem;">#Security</div>
                        <div style="color: #9a9a9a; font-size: 0.8rem;">28.7K posts</div>
                    </div>
                </div>
            </div>
        </aside>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
