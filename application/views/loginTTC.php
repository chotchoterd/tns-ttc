<?php
// Clear session variables
// phpinfo();
$_SESSION = array();
// Destroy the session
session_destroy();
?>
<div class="container mt-5">
    <div class="container rounded-3" style="border: 1.5px solid #000000;">
        <center>
            <form action="<?php echo base_url('index.php/logincontrol/login') ?>" method="post">
                <img src="<?php echo base_url(); ?>img/images.png" alt="" style="width: 10%" class="mb-3 mt-3">
                <div class="h2 fw-bold">Welcome to Training System</div>
                <div class="form-outline mb-4">
                    <input type="text" id="username" name="username" class="form-control" style="width: 40%;" placeholder="Username" />
                    <label class="form-label mt-2" for="form2Example1">Username</label>
                </div>
                <div class="form-outline mb-4">
                    <input type="password" id="password" name="password" class="form-control" style="width: 40%;" placeholder="Password" />
                    <label class="form-label mt-2" for="form2Example2">Password</label>
                </div>
                <button type="submit" id="btn_login" name="btn_login" class="btn btn-primary btn_color_df mb-3">Sign in</button>
            </form>
        </center>
    </div>
</div>
<section class="">
    <footer class="text-center text-white fixed-bottom" style="background-color: #203764;">
        <div class="container p-2 pb-0">
            <section class="">
                <p class="d-flex justify-content-center align-items-center">
                    <span class="me-3">Training Program Developed by PMIS & ERP Programmer Team.</span>
                </p>
            </section>
        </div>
        <div class="text-center p-3 bg-nav-background">
            Copyright © 2023 THAI NIPPON STEEL ENGINEERING & CONSTRUCTION CORPORATION LTD.
        </div>
    </footer>
</section>