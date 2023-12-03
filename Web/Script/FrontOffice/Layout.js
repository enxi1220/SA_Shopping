function logout() {
    post(
        baseUrl + 'FrontOffice/CtrlBuyer/BuyerLogout.php',
        []
    );
}