<?php

namespace app\models\basis;

/**
 * This is the ActiveQuery class for [[Telemetry]].
 *
 * @see Telemetry
 */
class TelemetryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Telemetry[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Telemetry|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
