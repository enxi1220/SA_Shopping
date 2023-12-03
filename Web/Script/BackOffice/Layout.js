function logout() {
    post(
        baseUrl + 'BackOffice/CtrlSeller/SellerLogout.php',
        []
    );
}