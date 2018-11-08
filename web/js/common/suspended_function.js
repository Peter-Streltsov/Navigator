/**
 * provides alerts for suspended functions
 * (common for all layouts and views)
 */

/**
 * notifications button in workspace layout
 */
$('#suspended').on('click', function () {
    alert('Функция отключена в данной версии');
});

/**
 * statistics button in workspace layout side menu
 */
$('#statistics').click(function () {
    alert('Функция отключена в данной версии')
});

/**
 * synthesis button in workspace layout side menu
 */
$('#synthesis').click(function () {
    alert('Функция отключена в данной версии')
});

/**
 * filemanager button in admin module
 */
$('#filemanager').click(function () {
    alert('Функция отключена в данной версии')
});

/**
 * upload data button in personal page
 */
$('#uploadbutton').on('click', function () {
    alert('Функция отключена в текущей версии');
});

/**
 * image load button in personal page
 */
$('#imageload').on('click', function () {
    alert('Функция отключена в текущей версии');
});
