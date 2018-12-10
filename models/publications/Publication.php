<?php

namespace app\models\publications;

use app\interfaces\PublicationInterface;
use yii\db\ActiveRecord;

/**
 * Class Publication
 */
abstract class Publication extends ActiveRecord implements PublicationInterface
{

} // end class
