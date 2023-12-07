<div class="tab-pane fade bg-light px-4 py-3 my-3" id="seller-edit" role="tabpanel" aria-labelledby="seller-edit-nav-tab">
    <h3 class="lead">Update Profile</h3>
    <hr class="mt-0 mb-3" />
    <form id="form-seller-edit" class="row g-3 needs-validation mt-3" novalidate>
        <div class="col-md-12">
            <div class="form-outline">
                <input type="text" class="form-control" id="txt-name-edit" required />
                <label for="txt-name-edit" class="form-label" required>Name</label>
                <div class="invalid-feedback">Required</div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-outline">
                <input type="tel" id="txt-phone-edit" class="form-control" required />
                <label class="form-label" for="txt-phone-edit" required>Phone</label>
                <div class="invalid-feedback">Required</div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-outline">
                <input type="text" id="txt-store-name-edit" class="form-control" required />
                <label class="form-label" for="txt-store-name-edit" required>Store Name</label>
                <div class="invalid-feedback">Required</div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-outline">
                <textarea id="txt-store-desc-edit" class="form-control" required rows="4"></textarea>
                <label class="form-label" for="txt-store-desc-edit" required>Store Description</label>
                <div class="invalid-feedback">Required</div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-outline">
                <textarea id="txt-business-address-edit" class="form-control" required rows="4"></textarea>
                <label class="form-label" for="txt-business-address-edit" required>Business Address</label>
                <div class="invalid-feedback">Required</div>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-5">
            <button type="submit" class="btn btn-dark btn-block">Save Changes</button>
        </div>
    </form>
</div>