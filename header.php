<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600&family=Lato:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="fs-header">
    <div class="container-fluid px-4">
        
        <div class="top-utility-bar d-none d-lg-flex justify-content-end align-items-center">
            <a href="login.php"><i class="fas fa-user me-1"></i> Sign In</a>
            <a href="register.php"><i class="fas fa-user me-1"></i> Register</a>
        </div>

        <nav class="navbar navbar-expand-lg navbar-dark">
            
            <div class="d-flex align-items-center w-100 d-lg-none justify-content-between">
                <a class="navbar-brand" href="index.php">
                    <img src="logo1.png" alt="Badda Station Logo" class="nav-logo-img">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="mainNav">
                
                <a class="navbar-brand d-none d-lg-block brand-logo-container" href="index.php">
                    <img src="logo1.png" alt="Badda Station Logo" class="nav-logo-img">
                </a>

                <div class="center-nav-block flex-grow-1">
                    <div class="hotel-title">
                        Badda Station Hotel
                    </div>
                    
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="index.php">Hotel Overview</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Rooms</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Dining</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                    </ul>
                </div>

                <div class="action-area mt-3 mt-lg-0">
                    <a href="#" class="cart-link">
                        <i class="fas fa-shopping-bag"></i>
                        <span>Cart</span>
                    </a>
                    <button class="btn btn-check-rates">Check Rates</button>
                </div>
            </div>

        </nav>
    </div>
</header>