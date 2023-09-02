<div class="tab-pane fade bg-light px-4 py-3 my-3" id="seller-change-password" role="tabpanel" aria-labelledby="seller-change-password-nav-tab">
    <h3 class="lead">Change Password</h3>
    <hr class="mt-0 mb-3" />
    <form class="row g-3 needs-validation mt-3" id="form-change-password" novalidate>
        <div class="col-md-12">
            <div class="form-outline">
                <input type="password" class="form-control" id="txt-current-password" required />
                <label for="txt-current-password" class="form-label">Current Password <span class="text-danger">*</span></label>
                <div class="invalid-feedback">Required</div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-outline">
                <input type="password" id="txt-password" class="form-control" required />
                <label class="form-label" for="txt-password">Password <span class="text-danger">*</span></label>
                <div class="invalid-feedback">Required</div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-outline">
                <input type="password" id="txt-confirm-password" class="form-control" required />
                <label class="form-label" for="txt-confirm-password">Confirm Password <span class="text-danger">*</span></label>
                <div class="invalid-feedback">Required</div>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-5">
            <button type="submit" class="btn btn-secondary btn-block w-25">Save Changes</button>
        </div>
    </form>
</div>