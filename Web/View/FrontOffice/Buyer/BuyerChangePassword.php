<div class="tab-pane fade bg-light px-4 py-3 my-3" id="buyer-change-password" role="tabpanel" aria-labelledby="buyer-change-password-nav-tab">
    <h3 class="lead">Change Password</h3>
    <hr class="mt-0 mb-3" />
    <form id="form-buyer-change-password" class="row g-3 needs-validation mt-3" novalidate>
        <div class="col-md-12 mb-4">
            <div class="form-outline">
                <i class="fas fa-eye-slash text-secondary toggle-visibility trailing" data-target></i>
                <input type="password" class="form-control" id="txt-current-password" required data-mdb-showcounter="true" maxlength="20" />
                <label for="txt-current-password" class="form-label" required>Current Password</label>
                <div class="form-helper"></div>
                <div class="invalid-feedback">Required</div>
            </div>
        </div>
        <div class="col-md-12 mb-4">
            <div class="form-outline">
                <i class="fas fa-eye-slash text-secondary toggle-visibility trailing" data-target></i>
                <input type="password" id="txt-password" class="form-control" required data-mdb-showcounter="true" maxlength="20" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%?&])[A-Za-z\d@$!%?&]{8,20}$"/>
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
        <div class="col-md-12 mb-4">
            <div class="form-outline">
                <i class="fas fa-eye-slash text-secondary toggle-visibility trailing" data-target></i>
                <input type="password" id="txt-confirm-password" class="form-control" required data-mdb-showcounter="true" maxlength="20" />
                <label class="form-label" for="txt-confirm-password" required>Confirm Password</label>
                <div class="form-helper"></div>
                <div class="invalid-feedback">Required</div>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-5">
            <button type="submit" class="btn btn-dark btn-block">Save Changes</button>
        </div>
    </form>
</div>