/**
 *
 */
$('#upload').change(function () {
    var select = $('#upload').val();
    switch (select) {
        case '1':
            $.ajax({
                url: "/control/articles/journals/ajaxcreate",
                type: "post",
                dataType: "html",
                success:function (response) {
                    $('#loaded').html(response);
                    $('#loaded').show("slow");
                }
            });
            break;
        case '2':
            $.ajax({
                url: "/control/articles/conferences/ajaxcreate",
                type: "post",
                dataType: "html",
                success:function (response) {
                    $('#loaded').html(response);
                    $('#loaded').show("slow");
                }
            });
            break;
        case '3':
            $.ajax({
                url: "/control/articles/collections/ajaxcreate",
                type: "post",
                dataType: "html",
                success:function (response) {
                    $('#loaded').html(response);
                    $('#loaded').show("slow");
                }
            });
            break;
        case '4':
            $('#loaded').html('Функция отключена в данной версии');
            break;
        case '5':
            $.ajax({
                url: "/control/dissertations/ajaxcreate",
                type: "post",
                dataType: "html",
                success:function (response) {
                    $('#loaded').html(response);
                    $('#loaded').show("slow");
                }
            });
            break;
    }
    //$('#loadedform').html(select);
    //alert(select);
});

/**
 *
 */

/**
 * requests organisation data form from OrgDataController
 */
$('#organisation').on('click', function () {
    $.ajax({
        url: "/control/admin/orgdata",
        type: "post",
        dataType: "html",
        success:function (response) {
            $('#holder').html(response);
            $('#holder').show("slow");
        }
    });
});

/**
 * requests saved languages list from admin/languages controller
 */
$('#languages').click(function () {
    $.ajax({
        url: "/control/admin/data/languages",
        type: "post",
        dataType: "html",
        success:function (response) {
            $('#holder').html(response);
            $('#holder').show(2000);
        }
    });
});

/**
 *
 */
$('#magazines').click(function () {
    $.ajax({
        url: "/control/admin/data/magazines",
        type: "post",
        dataType: "html",
        success:function (response) {
            $('#holder').html(response);
            $('#holder').show(2000);
        }
    });
});

/**
 * requests and renders users list in content-holder div
 */
$('#users').click(function () {
    $.ajax({
        url: "/control/admin/users",
        type: "post",
        dataType: "html",
        success:function (response) {
            $('#holder').html(response);
            $('#holder').show(2000);
        }
    });
});

/**
 * requests and renders users list in content-holder div
 */
$('#departments').click(function () {
    $.ajax({
        url: "/control/admin/orgdata/departments",
        type: "post",
        dataType: "html",
        success:function (response) {
            $('#holder').html(response);
            $('#holder').show(2000);
        }
    });
});

/**
 * requests and renders users list in content-holder div
 */
$('#positions').click(function () {
    $.ajax({
        url: "/control/admin/positions",
        type: "post",
        dataType: "html",
        success:function (response) {
            $('#holder').html(response);
            $('#holder').show(2000);
        }
    });
});
