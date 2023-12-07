function logout() {
    post(
        baseUrl + 'FrontOffice/CtrlBuyer/BuyerLogout.php',
        []
    );
}

function handleSearch(){
    // Convert the query to lowercase
    const query = $('#txt-search').val().toLowerCase();

    // Gather all product names from '.card-title' into an array
    const productNames = $('.card-title').map(function () {
        return $(this).text().toLowerCase();
    }).get();

    // Filter products based on the query
    const filteredProducts = productNames.filter(function (productName) {
        return productName.includes(query);
    });

    // Add 'd-none' class to '.card-product' except for the filtered products
    $('.card-product').each(function () {
        const productName = $(this).find('.card-title').text().toLowerCase();
        if (filteredProducts.includes(productName)) {
            $(this).removeClass('d-none');
        } else {
            $(this).addClass('d-none');
        }
    });
}


$('#txt-search').on('input', function () {
    if ($(this).val() === '') {
        // Remove 'd-none' class from all '.card-product' elements
        $('.card-product').removeClass('d-none');
        return;
    }
    // Check if '.card-product' elements exist
    if ($('.card-product').length === 0) {
        // Handle the case where no product elements are found        
        return;
    }
    handleSearch();
});

$('#btn-search').click(function () {
    // Check if '.card-product' elements exist
    if ($('.card-product').length === 0) {
        // Handle the case where no product elements are found
        console.log('No product elements found.');
        return;
    }
    handleSearch();
});