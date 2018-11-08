<?php

use yii\widgets\DetailView;

?>

<?php

if ($personaldata->author != null) {
    echo DetailView::widget([
        'model' => $personaldata->author,
        'attributes' => [
            'name',
            'secondname',
            'lastname',
            'habilitation',
            'user_id'
        ]
    ]);
} else {
    echo "<br> Автор не сопоставлен";
}
?>