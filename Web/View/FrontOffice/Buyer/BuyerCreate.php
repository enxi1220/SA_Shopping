<?php
require '../Layout.php';
?>

<section class="mt-3">
    <div class="container py-5">
        <div class="row d-flex justify-content-center">
            <div class="col col-xl-11">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0 d-flex justify-content-center align-items-center">
                        <div class="col-xs-12 col-md-6 col-lg-5 d-none d-md-block p-5 border-end">
                            <h1 class="my-5 display-3 fw-bold ls-tight">
                                Shopping<br />
                                <span class="text-primary">with us</span>
                            </h1>
                            <h2 class="my-5">Register a <b>buyer</b> account</h2>
                            <p class="small text-muted">
                                We offer review sentiment analysis that allows you grasp sentiment from reviews
                            </p>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                                <div class="text-center m-2">
                                    <img src="/SA_Shopping/name.png" alt="Logo" class="img-fluid w-50 h-50" loading="lazy" />
                                </div>
                                <form id="form-buyer-create" class="needs-validation" novalidate>
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
                                                <textarea id="txt-delivery-address" class="form-control" rows="4" tabindex="4"></textarea>
                                                <label class="form-label" for="txt-delivery-address">Delivery Address (Optional)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <i class="fas fa-eye-slash text-secondary toggle-visibility trailing" data-target></i>
                                                <input type="password" id="txt-password" class="form-control" required tabindex="5" data-mdb-showcounter="true" maxlength="20" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%?&])[A-Za-z\d@$!%?&]{8,20}$" />
                                                <label class="form-label" for="txt-password" required>Password</label>
                                                <div class="form-helper"></div>
                                                <div class="invalid-feedback">Required with requirements</div>
                                            </div>
                                            <div class="alert-info mt-4 d-none ps-3 pt-1" id="password-hint">
                                                <small>
                                                    <div id="length">
                                                        <i class="far fa-circle-check"></i>
                                                        8-20 characters
                                                    </div>
                                                    <div id="lowercase">
                                                        <i class="far fa-circle-check"></i>
                                                        one lowercase letter
                                                    </div>
                                                    <div id="uppercase">
                                                        <i class="far fa-circle-check"></i>
                                                        one uppercase letter
                                                    </div>
                                                    <div id="digit">
                                                        <i class="far fa-circle-check"></i>
                                                        one digit
                                                    </div>
                                                    <div id="special-char">
                                                        <i class="far fa-circle-check"></i>
                                                        one special character
                                                    </div>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <i class="fas fa-eye-slash text-secondary toggle-visibility trailing" data-target></i>
                                                <input type="password" id="txt-confirm-password" class="form-control" required tabindex="6" data-mdb-showcounter="true" maxlength="20" />
                                                <label class="form-label" for="txt-confirm-password" required>Confirm Password</label>
                                                <div class="form-helper"></div>
                                                <div class="invalid-feedback">Required</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-dark btn-lg btn-block" type="submit">Register</button>
                                    </div>

                                    <p class="pb-lg-2 text-muted">Already have an account? <a href="BuyerLogin.php" class="ms-1">Login here</a></p>
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

<script src="/SA_Shopping/FrontOffice/Buyer/BuyerCreate.js"></script>

</body>

</html>