<?php
require '../Layout.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Forget Password</title>
</head>

<body>
    <section class="mt-5">
        <div class="container py-5 mt-5">
            <div class="row d-flex justify-content-center">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0 d-flex justify-content-center align-items-center">
                            <div class="col-7 col-lg-5 d-md-block">
                            <img src="/SA_Shopping/name.png" alt="login form" class="img-fluid" loading="lazy" />
                            </div>
                            <div class="col-5 col-md-6 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form id="form-buyer-forget-password" class="needs-validation" novalidate>
                                        <h1 class="mb-3 pb-3">Forget Password</h1>
                                        <div class="row">
                                            <div class="col-md-12 mb-4">
                                                <div class="form-outline">
                                                    <input type="email" id="txt-email" class="form-control form-control-lg" required tabindex="1" />
                                                    <label class="form-label" for="txt-email" required>Email address</label>
                                                    <div class="invalid-feedback">Required</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit">Send Email</button>
                                        </div>

                                        <div class="mb-4 d-flex justify-content-between">
                                            <div class="">
                                                <a href="BuyerLogin.php">Back to login</a>
                                            </div>
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
    <script src="/SA_Shopping/FrontOffice/Buyer/BuyerForgetPassword.js"></script>

</body>

</html>