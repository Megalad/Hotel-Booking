<?php
    include "header.php";
    include "connect.php";
    include "DBHandler.php";
?>
<div class="registration-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="form-container">
                    <h2 class="form-heading">Create Account</h2>
                    <p class="text-center text-light mb-4" style="font-size: 0.9rem; opacity: 0.8;">Join us for exclusive offers.</p>
                    <?php
                    
                        if(isset($_POST['btnRegister']))
                        {
                           

                            $name=$_POST['name'];
                            $email=$_POST['email'];
                            $phone=$_POST['phone'];
                            $password=$_POST['password'];
                            $repassword=$_POST['repassword'];
                            registerUser($con,$name,$email,$phone,$password,$repassword);
                        }
                    ?>
                    <form action="register.php" method="POST">
                        <div class="mb-4">
                            <label class="luxury-label">Full Name</label>
                            <input type="text" name="name" class="form-control luxury-input" required>
                        </div>
                        <div class="mb-4">
                            <label class="luxury-label">Email Address</label>
                            <input type="email" name="email" class="form-control luxury-input" required>
                        </div>
                        <div class="mb-4">
                            <label class="luxury-label">Phone Number</label>
                            <input type="tel" name="phone" class="form-control luxury-input" required>
                        </div>
                        <div class="mb-5">
                            <label class="luxury-label">Password</label>
                            <input type="password" name="password" class="form-control luxury-input" required>
                        </div>
                        <div class="mb-5">
                            <label class="luxury-label">Re-Password</label>
                            <input type="password" name="repassword" class="form-control luxury-input" required>
                        </div>
                        <button type="submit" class="btn btn-submit-luxury w-100" name="btnRegister">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>