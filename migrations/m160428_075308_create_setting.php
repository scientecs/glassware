<?php

use yii\db\Migration;

/**
 * Migration for create setting table
 */
class m160428_075308_create_setting extends Migration
{

    public function up()
    {
        $this->createTable('setting', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'key' => $this->string()->notNull(),
            'value' => $this->string()->notNull()
        ]);
    }

    public function down()
    {
        $this->dropTable('setting');
    }

}
