$(document).ready(function () {
    // Enhance UI
    $('#carousel-charts').on('slid.bs.carousel', function () {
        // Get the active item's ID
        var activeItemId = $('.carousel-item.active').attr('id');
        // Update the h2 text based on the active item
        if (activeItemId === 'review') {
            $('h2').text('Product Review Sentiment');
        } else if (activeItemId === 'stock') {
            $('h2').text('Inventory Low Stock');
        } else if (activeItemId === 'sales') {
            $('h2').text('Monthly Sales');
        }
    });

    get(
        '/SA_Shopping/Controller/BackOffice/CtrlReport/Dashboard.php',
        {},
        function (success) {
            console.log(success);
            data = JSON.parse(success);
            drawSentiment(data.reviews);
            drawStock(data.stocks);
            drawSales(data.sales);
        }
    );
});

function drawSales(sales) {

    const totalPrices = sales.map(sale => sale.total_price);
    const maxTotalPrice = Math.max(...totalPrices);
    const minTotalPrice = Math.min(...totalPrices);
    // Data for Line Chart
    var lineData = {
        labels: sales.map(sale => sale.orderMonth),
        datasets: [{
            label: 'Sales',
            data: sales.map(sale => sale.totalPrice),
            borderColor: 'green',
            borderWidth: 2,
            fill: true,
        }]
    };

    // Options for Line Chart
    var lineOptions = {
        title: {
            display: true,
            text: 'Monthly Sales',
        },
        scales: {
            y: {
                max: maxTotalPrice + 20,
                min: minTotalPrice
            }
        }
    };

    // Create Line Chart
    var lineChart = new Chart(document.getElementById('chart-sales'), {
        type: 'line',
        data: lineData,
        options: lineOptions,
    });
}

function drawSentiment(reviews) {
    var stackedBarData = {
        labels: reviews.map(review => review.productName),
        datasets: [
            {
                label: 'Positive sentiment',
                data: reviews.map(review => review.positiveReview),
                backgroundColor: 'green',
            },
            {
                label: 'Negative sentiment',
                data: reviews.map(review => review.negativeReview),
                backgroundColor: 'red',
            }
        ]
    };

    var stackedBarOptions = {
        title: {
            display: true,
            text: 'Stock Status (Stacked Bar Chart)',
        },
        scales: {
            x: {
                stacked: true,
            },
            y: {
                stacked: true,
                beginAtZero: true,
            }
        }
    };

    new Chart(document.getElementById('chart-review'), {
        type: 'bar',
        data: stackedBarData,
        options: stackedBarOptions,
    });
}

function drawStock(stocks) {
    var columnData = {
        labels: stocks.map(stock => stock.productDetailNo),
        datasets: [{
            label: 'Stock lower than threshold',
            data: stocks.map(stock => stock.availableQty),
            backgroundColor: 'red',
        }, {
            type: 'scatter', // Use 'scatter' type for points
            label: 'Threshold Points',
            data: stocks.map(stock => stock.minStockQty),
            pointBackgroundColor: 'blue',
            pointRadius: 5,
        }]
    };

    var columnOptions = {
        title: {
            display: true,
            text: 'Current Stock Levels (Column Chart)',
        },
        scales: {
            y: {
                beginAtZero: true,
            }
        }
    };

    new Chart($('#chart-stock'), {
        type: 'bar',
        data: columnData,
        options: columnOptions,
    });
}


// Data for Pie Chart
var pieData = {
    labels: ['Work', 'Eat', 'Sleep'],
    datasets: [{
        data: [8, 2, 8],
        backgroundColor: ['red', 'green', 'blue'],
    }]
};

// Options for Pie Chart
var pieOptions = {
    title: {
        display: true,
        text: 'My Daily Activities (Pie Chart)',
    },
};

// Create Pie Chart
var pieChart = new Chart(document.getElementById('myPieChart'), {
    type: 'pie',
    data: pieData,
    options: pieOptions,
});
