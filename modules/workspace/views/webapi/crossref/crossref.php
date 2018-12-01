<?php

use yii\helpers\Html;

$this->title = 'Проверка публикации по ЦИО (DOI)';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
?>

<br>

<div class="row">
    <div class="col-lg-10">
        <br>
        <?php
        echo Html::beginForm('/workspace/webapi/crossrefajax', 'post');
        echo Html::label('Введите идентификатор:  ');
        echo "<br>";
        echo Html::input('text', 'DOI', '', ['id' => 'inputdoi']);
        echo Html::submitButton('Поиск');
        echo Html::button('Search', ['id' => 'searchbutton']);
        echo Html::endForm();
        ?>
    </div>
</div>

<br>
<br>

<div id="article">

</div>

<?php

\yii\helpers\VarDumper::dump($article);

if ($article != null) {
    echo $article['status'];
}

?>

<?php
/**
 * ['status' => 'ok',
 * 'message-type' => 'work',
 * 'message-version' => '1.0.0',
 * 'message' => [
 *      'indexed' => [
 *          'date-parts' => [
 *              0 => [
 *                  0 => 2018,
 *                  1 => 7,
 *                  2 => 27
 *              ]
 *          ],
 *      'date-time' => '2018-07-27T05:02:33Z',
 *      'timestamp' => 1532667753156
 * ] 'reference-count' => 105 'publisher' => 'American Psychological Association (APA)' 'issue' => '1' 'content-domain' => [ 'domain' => [] 'crossmark-restriction' => false ] 'short-container-title' => [ 0 => 'American Psychologist' ] 'DOI' => '10.1037/0003-066x.59.1.29' 'type' => 'journal-article' 'created' => [ 'date-parts' => [ 0 => [ 0 => 2004 1 => 1 2 => 21 ] ] 'date-time' => '2004-01-21T14:31:19Z' 'timestamp' => 1074695479000 ] 'page' => '29-40' 'source' => 'Crossref' 'is-referenced-by-count' => 78 'title' => [ 0 => 'How the Mind Hurts and Heals the Body.' ] 'prefix' => '10.1037' 'volume' => '59' 'author' => [ 0 => [ 'given' => 'Oakley' 'family' => 'Ray' 'sequence' => 'first' 'affiliation' => [] ] ] 'member' => '15' 'published-online' => [ 'date-parts' => [ 0 => [ 0 => 2004 ] ] ] 'container-title' => [ 0 => 'American Psychologist' ] 'original-title' => [] 'language' => 'en' 'link' => [ 0 => [ 'URL' => 'http://psycnet.apa.org/journals/amp/59/1/29.pdf' 'content-type' => 'unspecified' 'content-version' => 'vor' 'intended-application' => 'similarity-checking' ] ] 'deposited' => [ 'date-parts' => [ 0 => [ 0 => 2018 1 => 4 2 => 8 ] ] 'date-time' => '2018-04-08T18:56:17Z' 'timestamp' => 1523213777000 ] 'score' => 1 'subtitle' => [] 'short-title' => [] 'issued' => [ 'date-parts' => [ 0 => [ 0 => 2004 ] ] ] 'references-count' => 105 'journal-issue' => [ 'published-online' => [ 'date-parts' => [ 0 => [ 0 => 2004 ] ] ] 'issue' => '1' ] 'alternative-id' => [ 0 => '2004-10043-004' 1 => '14736318' ] 'URL' => 'http://dx.doi.org/10.1037/0003-066x.59.1.29' 'relation' => [] 'ISSN' => [ 0 => '1935-990X' 1 => '0003-066X' ] 'issn-type' => [ 0 => [ 'value' => '0003-066X' 'type' => 'print' ] 1 => [ 'value' => '1935-990X' 'type' => 'electronic' ] ] ] ]
 */
?>

<script>

    $('#searchbutton').on('click', function() {
        $.ajax({
            url: "/workspace/webapi/crossrefajax",
            type: "post",
            dataType: "html",
            data: {DOI: $('#inputdoi').val()},
            success: function (response) {
                $('#article').html(response);
            },
            error: function (req, text, error) {
                $('#article').text(text + '; type - ' + error);
            }
        })
    })

</script>
