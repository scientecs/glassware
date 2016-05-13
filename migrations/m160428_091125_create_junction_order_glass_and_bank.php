<?php

use yii\db\Migration;

/**
 * Migration for create relation ManyToMany order_glass and bank
 */
class m160428_091125_create_junction_order_glass_and_bank extends Migration
{

    public function up()
    {
        $this->createTable('order_glass_to_bank', [
            'order_glass_id' => $this->integer(),
            'bank_id' => $this->integer(),
            'PRIMARY KEY(order_glass_id, bank_id)'
        ]);

        $this->createIndex('idx-order_glass_to_bank-order_glass_id', 'order_glass_to_bank', 'order_glass_id');
        $this->createIndex('idx-order_glass_to_bank-bank_id', 'order_glass_to_bank', 'bank_id');

        $this->addForeignKey('fk-order_glass_to_bank-order_glass_id', 'order_glass_to_bank', 'order_glass_id', 'order_glass', 'id', 'CASCADE');
        $this->addForeignKey('fk-order_glass_to_bank-bank_id', 'order_glass_to_bank', 'bank_id', 'bank', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('order_glass_to_bank');
    }

}
