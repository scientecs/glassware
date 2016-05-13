<?php

use yii\db\Migration;

/**
 * Migration for create broken glass table
 */
class m160428_072051_create_broken_glass extends Migration
{

    public function up()
    {
        $this->createTable('broken_glass', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'price' => $this->decimal(10, 0)->notNull(),
            'description' => $this->text()->notNull(),
            'image' => $this->string()
        ]);
    }

    public function down()
    {
        $this->dropTable('broken_glass');
    }

}
