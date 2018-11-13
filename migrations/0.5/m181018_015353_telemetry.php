<?php

use yii\db\Migration;

/**
 * Class m181018_015353_telemetry
 */
class m181018_015353_telemetry extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('telemetry', [
            'id' => $this->primaryKey(),
            'user' => $this->string(),
            'ip' => $this->string(),
            'browser' => $this->string(),
            'path' => $this->string(),
            'created_at' => $this->integer()
        ]);
    } // end function

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('telemetry');
        echo "'telemetry' table reverted" . PHP_EOL;
        return true;
    } // end function

}
