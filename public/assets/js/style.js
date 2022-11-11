function getData(page) {
    $.ajax({
        url: '?page=' + page,
        type: 'GET',
        dataType: 'json',
    }).done(function (data) {
        $('#pagination_data').empty().html(data);
        location.hash = page;
    }).fail(function () {
        console.log('Users could not be loaded.');
    });
}

// dashboard donut chart
function transactionDonutChart(sumOfAmount) {
    new Chart('transaction_chart', {
        type: 'doughnut',
        data: {
            labels: ['Income', 'Expense'],
            datasets: [{
                backgroundColor: ['#50cd89', '#f1416c'],
                borderColor: ['rgba(255, 255, 255, 1)', 'rgba(255, 255, 255, 1)'],
                data: sumOfAmount,
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                display: false
            },
            maintainAspectRatio: true,
            responsive: true,
            cutoutPercentage: 60,
            tooltips: {
                callbacks: {
                    label: (tooltipItem, data) => {
                        var value = data.datasets[0].data[tooltipItem.index];
                        var total = data.datasets[0].data.reduce((a, b) => Number(a) + Number(b), 0);
                        var pct = 100 / total * value;
                        var pctRounded = Math.round(pct * 10) / 10;
                        return value + ' (' + pctRounded + '%)';
                    }
                }
            }
            // tooltips: {
            //     callbacks: {
            //       label: function(tooltipItem, data) {
            //         //get the concerned dataset
            //         var dataset = data.datasets[tooltipItem.datasetIndex];
            //         //calculate the total of this data set
            //         var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
            //           return previousValue + currentValue;
            //         });
            //         //get the current items value
            //         var currentValue = dataset.data[tooltipItem.index];
            //         //calculate the precentage based on the total and current item, also this does a rough rounding to give a whole number
            //         var percentage = Math.floor(((currentValue/total) * 100)+0.5);

            //         return percentage + "%";
            //       }
            //     }
            //   }
        }
    });
}

function showLoading() {
    document.querySelector('#loading').classList.add('loading');
    document.querySelector('#loading-content').classList.add('loading-content');
}

function hideLoading() {
    document.querySelector('#loading').classList.remove('loading');
    document.querySelector('#loading-content').classList.remove('loading-content');
}

function incomeExpenseBarchart(months, incomes, expenses) {

    var ctx = document.getElementById('incomeExpenseChart');

    // Define colors
    var primaryColor = KTUtil.getCssVariableValue('--kt-primary');
    var dangerColor = KTUtil.getCssVariableValue('--kt-danger');
    var successColor = KTUtil.getCssVariableValue('--kt-success');

    // Define fonts
    var fontFamily = KTUtil.getCssVariableValue('--bs-font-sans-serif');

    // Chart labels
    const labels = months;

    // Chart data
    const data = {
        labels: labels,
        datasets: [
            {
                label: 'Income',
                data: incomes,
                borderColor: '#50cd89',
                backgroundColor: '#50cd89',
            },
            {
                label: 'Expense',
                data: expenses,
                borderColor: '#f1416c',
                backgroundColor: '#f1416c',
            }
        ]
    };

    // Chart config
    const config = {
        type: 'bar',
        data: data,
        options: {
            plugins: {
                scaleBeginAtZero: true,
                scaleStartValue: 0,
                title: {
                    display: false,
                }
            },
            responsive: true,
            interaction: {
                intersect: false,
            },
            scales: {
                x: {
                    stacked: true,
                },
                y: {
                    stacked: true,
                    beginAtZero: true,
                },
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        },
        defaults: {
            global: {
                defaultFont: fontFamily
            }
        }
    };

    // Init ChartJS -- for more info, please visit: https://www.chartjs.org/docs/latest/
    var myChart = new Chart(ctx, config);


}

function validateSpace(input){
    if(/^\s/.test(input.value))
      input.value = '';
  }

$(document).ready(function () {

    $(window).on('hashchange', function () {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page === Number.NaN || page <= 0) {
                return false;
            } else {
                getData(page);
            }
        }
    });

    // dashboard transaction report
    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        getData(page);
    });

    // registration
    $(document).on('click', "input[name='rent_own']", function (event) {
        // event.preventDefault();
        $('#details-next').click();
    });

    //successMessage or errorMessage hide after 5 sec
    setTimeout(function () {
        $('#successMessage').fadeOut('fast');
        $('#errorMessage').fadeOut('fast');
    }, 5000);

    $("#expense_a").on("click", function () {
        $("#expense_me").val('');

        if ($("#expense_mee li").length > 0) {
            if (document.querySelector('#expense_me').classList.contains('d-none')) {
                $("#expense_me").removeClass('d-none');
                $("#expense_mee").removeClass('d-none');
                $("#expense_me").addClass('d-block');
                $("#expense_mee").addClass('d-block');
                $("#expense_me").focus();
            } else {
                $("#expense_me").removeClass('d-block');
                $("#expense_mee").removeClass('d-block');
                $("#expense_me").addClass('d-none');
                $("#expense_mee").addClass('d-none');
            }
        }
    });

    $("#income_a").on("click", function () {
        $("#income_me").val('');

        if ($("#income_mee li").length > 0) {
            if (document.querySelector('#income_me').classList.contains('d-none')) {
                $("#income_me").removeClass('d-none');
                $("#income_mee").removeClass('d-none');
                $("#income_me").addClass('d-block');
                $("#income_mee").addClass('d-block');
                $("#income_me").focus();
            } else {
                $("#income_me").removeClass('d-block');
                $("#income_mee").removeClass('d-block');
                $("#income_me").addClass('d-none');
                $("#income_mee").addClass('d-none');
            }
        }
    });
    $("#income_me").on("keyup", function () {
        if($(this).val()){
            $("#income_a").html($(this).val());
            $("#income_a").val($(this).val());
            $("#income_category").val($(this).val());
            $("#income_is_custom").val('1');
        }
        else {
            $("#income_a").html('Select category');
            $("#income_category").val('');
            $("#income_is_custom").val('');
        }


        // var kwiri = $(this).val().toLowerCase();
        // var kwiLen = kwiri.length;
        // $("li").each(function () {
        //     var liHtml = $(this).html().toLowerCase();
        //     var kwiPos = liHtml.search(kwiri);
        //     if (kwiPos == "-1") {
        //         $(this).removeClass('d-block');
        //         $(this).addClass('d-none');
        //     } else {
        //         $(this).removeClass('d-none');
        //         $(this).addClass('d-block');
        //     }
        // });
    });

    $("#expense_me").on("keyup", function () {
        if($(this).val()){
            $("#expense_a").html($(this).val());
            $("#expense_a").val($(this).val());
            $("#expense_category").val($(this).val());
            $("#expense_is_custom").val('1');
        }
        else {
            $("#expense_a").html('Select category');
            $("#expense_category").val('');
            $("#expense_is_custom").val('');
        }
    });

    $("#income_mee li").each(function () {
        $(this).on("click", function () {
            $("#income_a").html($(this).html());
            $("#income_a").val($(this).attr('name'));
            $("#income_me").removeClass('d-block');
            $("#income_mee").removeClass('d-block');
            $("#income_me").addClass('d-none');
            $("#income_mee").addClass('d-none');
            $("#income_category").val($(this).attr('name'));
            $("#income_is_custom").val('0');
        });
    });

    $("#expense_mee li").each(function () {
        $(this).on("click", function () {
            $("#expense_a").html($(this).html());
            $("#expense_a").val($(this).attr('name'));
            $("#expense_me").removeClass('d-block');
            $("#expense_mee").removeClass('d-block');
            $("#expense_me").addClass('d-none');
            $("#expense_mee").addClass('d-none');
            $("#expense_category").val($(this).attr('name'));
            $("#expense_is_custom").val('0');
        });
    });

    $(document).on('click', function (event) {
        if (!$(event.target).closest('#income_selector').length) {
            $("#income_me").removeClass('d-block');
            $("#income_mee").removeClass('d-block');
            $("#income_me").addClass('d-none');
            $("#income_mee").addClass('d-none');
        }
        if (!$(event.target).closest('#expense_selector').length) {
            $("#expense_me").removeClass('d-block');
            $("#expense_mee").removeClass('d-block');
            $("#expense_me").addClass('d-none');
            $("#expense_mee").addClass('d-none');
        }
      });
});
