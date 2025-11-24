<?php
    include 'header.php';
    include 'connect.php';
    include 'DBHandler.php';

    $message = "";
?>
<div class="registration-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="form-container">
                    <h2 class="form-heading">Welcome Back</h2>
                    <p class="text-center text-light mb-4" style="font-size: 0.9rem; opacity: 0.8;">Please sign in to manage your reservation.</p>
                    <?php
                        session_start();
                        if(isset($_POST['btnLogin']))
                        {
                            $email=$_POST['email'];
                            $password=$_POST['password'];
                            $loginResult = loginUser($con, $email, $password);
                            if (is_array($loginResult)) 
                            {
                                $_SESSION['id'] = $loginResult['userID'];
                                $_SESSION['name'] = $loginResult['userName'];
                                
                                echo "<script>location.assign('index.php')</script>";
                                exit();
                            } 
                            elseif ($loginResult == "INVALID_PASS") {
                                $message = "<div class='alert alert-danger'>Invalid password.</div>";
                            } 
                            elseif ($loginResult == "USER_NOT_FOUND") {
                                $message = "<div class='alert alert-danger'>User not found.</div>";
                            }
                            else {
                                $message = "<div class='alert alert-danger'>Database connection error.</div>";
                            }
                        }
                    ?>
                    
                    <form action="login.php" method="POST">
                        
                        <div class="mb-4">
                            <label class="luxury-label">Email Address</label>
                            <input type="email" name="email" class="form-control luxury-input" required>
                        </div>

                        <div class="mb-5">
                            <label class="luxury-label">Password</label>
                            <input type="password" name="password" class="form-control luxury-input" required>
                        </div>

                        <button type="submit" class="btn btn-submit-luxury w-100" name="btnLogin">Sign In</button>

                        <div class="text-center mt-4">
                            <a href="register.php" class="text-light text-decoration-none small text-uppercase" style="letter-spacing: 1px;">
                                Don't have an account? Create one
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>