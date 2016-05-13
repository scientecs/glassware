<?php

use yii\db\Migration;

/**
 * Migration for create order glass status table
 */
class m160428_075912_create_order_glass_status extends Migration
{

    public function up()
    {
        $this->createTable('order_glass_status', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique()
        ]);
    }

    public function down()
    {
        $this->dropTable('order_glass_status');
    }

}
