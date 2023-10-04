<style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #343a40;
            padding: 1rem;
            justify-content: center;
            vertical-align: center;
        }
        .navbar-dark .navbar-brand {
            font-size: 24px;
        }
        .container {
            margin-top: 20px;
        }
        .post-box {
            background-color: #fff;
            border: 1px solid #dee2e6;
            padding: 15px;
            margin-bottom: 20px;
        }
        .timeline {
            background-color: #fff;
            border: 1px solid #dee2e6;
            padding: 15px;
        }
        .logout-btn, .logout-txt {
        color: white; 
        }
        .logout-btn:hover, .logout-txt:hover {
        color: red; 
        transition: color 0.3s ease; 
        }
        
    </style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="images/mamute-logo.png" width="100" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="logout.php" class="nav-link logout-btn" style="color: white;">
                        <i class="fa fa-sign-out-alt logout-txt"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
