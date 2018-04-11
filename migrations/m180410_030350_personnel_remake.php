<?php

use yii\db\Migration;

/**
 * Class m180410_030350_personnel_update_4
 */
class m180410_030350_personnel_remake extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $currentstaff = \app\modules\Control\models\Personnel::find()->asArray()->all();

        $this->dropTable('personnel');

        $this->createTable('personnel', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'secondname' => $this->string(255),
            'lastname' => $this->string(255)->notNull(),
            'position' => $this->integer()->null(),
            'employment' => $this->integer()->null(),
            'expirience' => $this->string(),
            'age' => $this->integer()->null()

        ]);

        $this->alterColumn('personnel', 'position', 'string');

        $this->addColumn('personnel', 'year_graduated', 'string');

        $this->addColumn('personnel', 'user_id', 'integer');

        $this->addForeignKey('fk_staff_users', 'personnel', 'user_id', 'users', 'id');

        foreach($currentstaff as $member) {
            $newstaff = new \app\modules\Control\models\Personnel();
            $newstaff->name = $member['name'];
            $newstaff->lastname = $member['lastname'];
            $newstaff->position = $member['position'];
            $newstaff->employment = $member['employment'];
            $newstaff->expirience = $member['expirience'];
            $newstaff->age = $member['age'];
            $newstaff->year_graduated = $member['year_graduated'];
            $newstaff->user_id = $member['userid'];
            $newstaff->save();
            unset($newstaff);
        }

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey('fk_staff_users', 'personnel');

        $this->dropTable('personnel');

        return true;

    } // end function

} // end class
