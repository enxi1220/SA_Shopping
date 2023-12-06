<div class="tab-pane fade bg-light p-3 mt-3 " id="buyer-delete" role="tabpanel" aria-labelledby="buyer-delete-nav-tab">
    <h3 class="lead">Delete Account</h3>
    <hr class="mt-0" />
    <div class="alert alert-info">
        <b>Attention:</b> Deleting your account is irreversible. Once done, you can't log in using this email again. Proceed with caution
    </div>
    <form id="form-buyer-delete" class="needs-validation" novalidate>
        <div class="form-outline my-3">
        <i class="fas fa-eye-slash text-secondary toggle-visibility trailing" data-target></i>    
            <input type="password" id="txt-password-delete" class="form-control " maxlength="20" required data-mdb-showcounter="true" maxlength="20" />
            <label class="form-label" for="txt-password-delete" required>Password</label>
            <div class="form-helper"></div>
            <div class="invalid-feedback">Required</div>
        </div>
        <div class="d-flex justify-content-center mt-5">
            <button type="submit" class="btn btn-danger btn-block">Delete account</button>
        </div>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-buyer-delete" tabindex="-1" aria-labelledby="txt-modal-buyer-delete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Are you sure to delete your account?</div>
            <div class="modal-body fw-bold"><i class="fas fa-exclamation-triangle"></i> Note: This action can't be undone.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-buyer-delete">Confirm</button>
            </div>
        </div>
    </div>
</div>