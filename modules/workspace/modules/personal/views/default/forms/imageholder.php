<?php

use yii\imagine\Image;

?>

<?php

//Image::getImagine()->open('files/userimages/' . $user->image)->draw();

?>
<div class="row">
    <div class="col-lg-5">
        <img style="border-radius: 2pc; max-width: 10pc;" src="<?= '/files/userimages/' . $user->image ?>">
    </div>
</div>

