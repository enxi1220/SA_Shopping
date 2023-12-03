<?php
require '../Layout.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
</head>

<body>
    <section class="mt-5">
        <div class="container py-5 mt-5">
            <div class="row d-flex justify-content-center">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0 d-flex justify-content-center align-items-center">
                            <div class="col-7 col-lg-5 d-md-block">
                                <img src="/SA_Shopping/logo.png" alt="login form" class="img-fluid" loading="lazy" />
                            </div>
                            <div class="col-5 col-md-6 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form id="form-seller-reset-password" class="needs-validation" novalidate>
                                        <h1 class="mb-3 pb-3">Reset Password</h1>
                                        <div class="col-md-12 mb-5">
                                            <div class="form-outline">
                                                <i class="fas fa-eye-slash text-secondary toggle-visibility trailing" data-target></i>
                                                <input type="password" id="txt-password" class="form-control" required data-mdb-showcounter="true" maxlength="20" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%?&])[A-Za-z\d@$!%?&]{8,20}$" />
                                                <label class="form-label" for="txt-password" required>Password</label>
                                                <div class="form-helper"></div>
                                                <div class="invalid-feedback">Required with requirements</div>
                                            </div>
                                            <div class="alert-info mt-4 d-none" id="password-hint">
                                                <small>
                                                    <ul>
                                                        <li>8-20 characters</li>
                                                        <li>one lowercase letter</li>
                                                        <li>one uppercase letter</li>
                                                        <li>one digit</li>
                                                        <li>one special character</li>
                                                    </ul>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-5">
                                            <div class="form-outline">
                                                <i class="fas fa-eye-slash text-secondary toggle-visibility trailing" data-target></i>
                                                <input type="password" id="txt-confirm-password" class="form-control" required data-mdb-showcounter="true" maxlength="20" />
                                                <label class="form-label" for="txt-confirm-password" required>Confirm Password</label>
                                                <div class="form-helper"></div>
                                                <div class="invalid-feedback">Required</div>
                                            </div>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit">Reset Password</button>
                                        </div>

                                        <div class="mb-4 d-flex justify-content-between">
                                            <div class="">
                                                <a href="SellerLogin.php">Back to login</a>
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
    <script src="/SA_Shopping/BackOffice/Seller/SellerResetPassword.js"></script>

</body>

</html>