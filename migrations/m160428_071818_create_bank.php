<?php

use yii\db\Migration;

/**
 * Migration for create bank table
 */
class m160428_071818_create_bank extends Migration
{

    public function up()
    {
        $this->createTable('bank', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'price' => $this->decimal(10, 0),
            'description' => $this->text(),
            'image' => $this->string()
        ]);
    }

    public function down()
    {
        $this->dropTable('bank');
    }

}
