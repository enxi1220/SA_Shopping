<?php
require '../Layout.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

</head>

<section class="mt-3">
    <div class="container py-5">
        <div class="row d-flex justify-content-center">
            <div class="col col-xl-11">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0 d-flex justify-content-center align-items-center">
                        <div class="col-md-6 col-lg-5 d-none d-md-block p-5 border-end">
                            <h1 class="my-5 display-3 fw-bold ls-tight">
                                Selling<br />
                                <span class="text-primary">with us</span>
                            </h1>
                            <h2 class="my-5">Register a <b>seller</b> account</h2>
                            <p class="small text-muted">
                                We offer review sentiment analysis that allows you grasp sentiment from reviews
                            </p>
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                                <div class="text-center">
                                    <img src="/SA_Shopping/name.png" alt="register form" class="img-fluid w-50 h-50" style="border-radius: 1rem 0 0 1rem;" loading="lazy" />
                                </div>
                                <form id="form-seller-create" novalidate class="needs-validation">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-outline">
                                                <input type="email" id="txt-email" class="form-control" required tabindex="1" />
                                                <label class="form-label" for="txt-email" required>Email</label>
                                                <div class="invalid-feedback">Required</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-outline">
                                                <input type="tel" id="txt-phone" class="form-control" required tabindex="2" />
                                                <label class="form-label" for="txt-phone" required>Phone</label>
                                                <div class="invalid-feedback">Required</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-outline">
                                                <input type="text" id="txt-name" class="form-control" required tabindex="3" />
                                                <label class="form-label" for="txt-name" required>Name</label>
                                                <div class="invalid-feedback">Required</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-outline">
                                                <input type="text" id="txt-store-name" class="form-control" required tabindex="4" />
                                                <label class="form-label" for="txt-store-name" required>Store Name</label>
                                                <div class="invalid-feedback">Required</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-outline">
                                                <i class="fas fa-eye-slash text-secondary toggle-visibility trailing" data-target></i>
                                                <input type="password" id="txt-password" class="form-control" required tabindex="5" data-mdb-showcounter="true" maxlength="20" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%?&])[A-Za-z\d@$!%?&]{8,20}$" />
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
                                        <div class="col-md-6 mb-3">
                                            <div class="form-outline">
                                                <i class="fas fa-eye-slash text-secondary toggle-visibility trailing" data-target></i>
                                                <input type="password" id="txt-confirm-password" class="form-control" required tabindex="6" data-mdb-showcounter="true" maxlength="20" />
                                                <label class="form-label" for="txt-confirm-password" required>Confirm Password</label>
                                                <div class="form-helper"></div>
                                                <div class="invalid-feedback">Required</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-outline">
                                                <textarea id="txt-business-address" class="form-control" rows="4" tabindex="7" required></textarea>
                                                <label class="form-label" for="txt-business-address" required>Business Address</label>
                                                <div class="invalid-feedback">Required</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-outline">
                                                <textarea id="txt-store-desc" class="form-control" rows="4" tabindex="8" required></textarea>
                                                <label class="form-label" for="txt-store-desc" required>Store Description</label>
                                                <div class="invalid-feedback">Required</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-dark btn-lg btn-block" type="submit">Register</button>
                                    </div>

                                    <p class="pb-lg-2 text-muted">Already have an account? <a href="SellerLogin.php" class="ms-1">Login here</a></p>

                                    <div class="text-center">
                                        <p>or sign up with</p>
                                        <button type="button" class="btn btn-secondary btn-floating mx-1">
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

<script src="/SA_Shopping/BackOffice/Seller/SellerCreate.js"></script>

</body>

</html>