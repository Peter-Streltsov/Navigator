$('#notifications').click(function () {
    $('#holder').html('');
    $('#holder').show("blind");
});

/**
 * loading chart (highcharts pie) for distribution of user's publications;
 * receives data from InfoController from Personal module (/workspace/personal);
 */
$('#chart1').click(function () {
   $.ajax({
       url: '/workspace/personal/info/diagone',
       type: 'post',
       dataType: "html",
       success: function (response) {
           $('#diagrams').hide();
           $('#diagrams').html(response);
           $('#diagrams').show("blind");
       },
       error: function (jqxhr, status, errorMsg) {
           let message = '<br><br>' +
               '<div class="alert alert-danger" role="alert">' +
               '<h4 class="alert-heading">Загрузка не удалась</h4>' +
               '<p>' + status + '</p>' +
               '<hr>' +
               '<p class="mb-0">Ошибка</p>' + errorMsg +
               '</div>' +
               '<br>';
           $('#diagrams').hide();
           $('#diagrams').html(message);
           $('#diagrams').show("blind");
       }
   });
});

/**
 *
 */
$('#chart2').click(function () {
    $.ajax({
        url: '/workspace/personal/info/diagtwo',
        type: 'post',
        dataType: "html",
        success: function (response) {
            $('#diagrams').hide();
            $('#diagrams').html(response);
            $('#diagrams').show("blind");
        },
        error: function (jqxhr, status, errorMsg) {
            let message = '<br><br>' +
                '<div class="alert alert-danger" role="alert">' +
                '<h4 class="alert-heading">Загрузка не удалась</h4>' +
                '<p>' + status + '</p>' +
                '<hr>' +
                '<p class="mb-0">Ошибка</p>' + errorMsg +
                '</div>' +
                '<br>';
            $('#diagrams').hide();
            $('#diagrams').html(message);
            $('#diagrams').show("blind");
        }
    });
});
