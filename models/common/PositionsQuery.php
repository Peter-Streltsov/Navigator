<?php

namespace app\models\common;

/**
 * ActiveQuery class for [[Positions]].
 *
 * @see Positions
 */
class PositionsQuery extends \yii\db\ActiveQuery
{

    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Positions[]|array
     */
    public function all($db = null)
    {

        return parent::all($db);

    } // end function



    /**
     * @inheritdoc
     * @return Positions|array|null
     */
    public function one($db = null)
    {

        return parent::one($db);

    } // end function

} // end class
