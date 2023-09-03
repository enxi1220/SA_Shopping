<?php
require '../Layout.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

</head>

<body>
    <section class="mt-5">
        <div class="container py-5 mt-5">
            <div class="row d-flex justify-content-center">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0 d-flex justify-content-center align-items-center">
                            <div class="col-7 col-lg-5 d-md-block">
                                <img src="https://www.tampabaytamilacademy.org/assets/login.c6b269bc.png" alt="login form" class="img-fluid mt-5" loading="lazy"/>
                            </div>
                            <div class="col-5 col-md-6 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form id="sign-in-form" method="POST" class="needs-validation" novalidate>
                                        <h1 class="mb-3 pb-3">Login</h1>
                                        <div class="row">
                                            <div class="col-md-12 mb-4">
                                                <div class="form-outline">
                                                    <input type="email" id="txt-email" class="form-control form-control-lg" required tabindex="1" />
                                                    <label class="form-label" for="txt-email" required>Email address</label>
                                                    <div class="invalid-feedback">Required</div>
                                                </div>
                                            </div>
                                            <div class="col-md-12  mb-4">
                                                <div class="form-outline">
                                                    <input type="password" id="txt-password" class="form-control form-control-lg" required tabindex="2" />
                                                    <label class="form-label" for="txt-password" required>Password</label>
                                                    <div class="invalid-feedback">Required</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                                        </div>

                                        <div class="mb-4 d-flex justify-content-between">
                                            <div class="">
                                                <p>Not a member? <a href="SellerCreate.php">Register</a></p>
                                            </div>

                                            <div class="">
                                                <a href="SellerForgetPassword.php">Forgot password?</a>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <p>or sign up with</p>
                                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                                <i class="fab fa-google"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php
    require '../Footer.php';
    ?>
    <!-- <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/TARUMT_Event_Ticketing/Web/Script/FrontOffice/User/UserRead.js" type="text/javascript"></script> -->

</body>

</html>