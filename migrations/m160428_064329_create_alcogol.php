<?php

use yii\db\Migration;

/**
 * Migration for create alcogol table
 */
class m160428_064329_create_alcogol extends Migration
{

    public function up()
    {
        $this->createTable('alcohol', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'price' => $this->decimal(10, 0)->notNull(),
            'description' => $this->text()->notNull(),
            'image' => $this->string()
        ]);
    }

    public function down()
    {
        $this->dropTable('alcohol');
    }

}
