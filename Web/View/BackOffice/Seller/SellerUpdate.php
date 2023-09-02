<div class="tab-pane fade bg-light px-4 py-3 my-3" id="seller-edit" role="tabpanel" aria-labelledby="seller-edit-nav-tab">
    <h3 class="lead">Edit Profile</h3>
    <hr class="mt-0 mb-3" />
    <form class="row g-3 needs-validation mt-3" id="form-seller-edit" novalidate>
        <div class="col-md-12">
            <div class="form-outline">
                <input type="text" class="form-control" id="txt-name-edit" required />
                <label for="txt-name-edit" class="form-label">Name <span class="text-danger">*</span></label>
                <div class="invalid-feedback">Required</div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-outline">
                <input type="tel" id="txt-phone-edit" class="form-control" required />
                <label class="form-label" for="txt-phone-edit">Phone <span class="text-danger">*</span></label>
                <div class="invalid-feedback">Required</div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-outline">
                <textarea id="txt-delivery-address-edit" class="form-control" required rows="4"></textarea>
                <label class="form-label" for="txt-delivery-address-edit">Delivery Address</label>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-5">
            <button type="submit" class="btn btn-secondary btn-block w-25">Save Changes</button>
        </div>
    </form>
</div>