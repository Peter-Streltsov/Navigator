/**
 *
 */
$('#upload').change(function () {
    var select = $('#upload').val();
    switch (select) {
        case '1':
            $.ajax({
                url: "/workspace/articles/journals/ajaxcreate",
                type: "post",
                dataType: "html",
                success:function (response) {
                    $('#loaded').html(response);
                    $('#loaded').show("slow");
                },
                error: function(jqxhr, status, errorMsg) {
                    $('#loaded').html('' +
                        '<br>' +
                        '<br>' +
                        '<br>' +
                        '<b style="color: red;">Загрузка формы не удалась</b>' +
                        '<br>' +
                        '<br>' +
                        '<b>Ошибка - </b>' + errorMsg
                    );
                }
            });
            break;
        case '2':
            $.ajax({
                url: "/workspace/articles/conferences/ajaxcreate",
                type: "post",
                dataType: "html",
                success:function (response) {
                    $('#loaded').html(response);
                    $('#loaded').show("slow");
                },
                error: function(jqxhr, status, errorMsg) {
                    $('#loaded').html('' +
                        '<br>' +
                        '<br>' +
                        '<br>' +
                        '<b style="color: red;">Загрузка формы не удалась</b>' +
                        '<br>' +
                        '<br>' +
                        '<b>Ошибка - </b>' + errorMsg
                    );
                }
            });
            break;
        case '3':
            $.ajax({
                url: "/workspace/articles/collections/ajaxcreate",
                type: "post",
                dataType: "html",
                success:function (response) {
                    $('#loaded').html(response);
                    $('#loaded').show("slow");
                },
                error: function(jqxhr, status, errorMsg) {
                    $('#loaded').html('' +
                        '<br>' +
                        '<br>' +
                        '<br>' +
                        '<b style="color: red;">Загрузка формы не удалась</b>' +
                        '<br>' +
                        '<br>' +
                        '<b>Ошибка - </b>' + errorMsg
                    );
                }
            });
            break;
        case '4':
            $('#loaded').html('Функция отключена в данной версии');
            break;
        case '5':
            $.ajax({
                url: "/workspace/dissertations/ajaxcreate",
                type: "post",
                dataType: "html",
                success:function (response) {
                    $('#loaded').html(response);
                    $('#loaded').show("slow");
                },
                error: function(jqxhr, status, errorMsg) {
                    $('#loaded').html('' +
                        '<br>' +
                        '<br>' +
                        '<br>' +
                        '<b style="color: red;">Загрузка формы не удалась</b>' +
                        '<br>' +
                        '<br>' +
                        '<b>Ошибка - </b>' + errorMsg
                    );
                }
            });
            break;
    }
});

/**
 *
 */

/**
 * requests organisation data form from OrgDataController
 */
$('#organisation').on('click', function () {
    $.ajax({
        url: "/workspace/admin/orgdata",
        type: "post",
        dataType: "html",
        success:function (response) {
            $('#holder').hide();
            $('#holder').html(response);
            $('#holder').show("blind");
                //.show("blind");
        }
    });
});

/**
 * requests saved languages list from admin/languages controller
 */
$('#languages').click(function () {
    $.ajax({
        url: "/workspace/admin/data/languages",
        type: "post",
        dataType: "html",
        success:function (response) {
            $('#holder').hide();
            $('#holder').html(response);
            $('#holder').show("blind");
        }
    });
});

/**
 *
 */
$('#magazines').click(function () {
    $.ajax({
        url: "/workspace/admin/data/magazines",
        type: "post",
        dataType: "html",
        success:function (response) {
            $('#holder').hide();
            $('#holder').html(response);
            $('#holder').show("blind");
        }
    });
});

/**
 * requests and renders users list in content-holder div
 */
$('#users').click(function () {
    $.ajax({
        url: "/workspace/admin/users",
        type: "post",
        dataType: "html",
        success:function (response) {
            $('#holder').hide();
            $('#holder').html(response);
            $('#holder').show("blind");
        }
    });
});

/**
 * requests and renders users list in content-holder div
 */
$('#departments').click(function () {
    $.ajax({
        url: "/workspace/admin/orgdata/departments",
        type: "post",
        dataType: "html",
        success:function (response) {
            $('#holder').hide();
            $('#holder').html(response);
            $('#holder').show("blind");
        }
    });
});

/**
 * requests and renders users list in content-holder div
 */
$('#positions').click(function () {
    $.ajax({
        url: "/workspace/admin/positions",
        type: "post",
        dataType: "html",
        success:function (response) {
            $('#holder').hide();
            $('#holder').html(response);
            $('#holder').show("blind");
        }
    });
});
