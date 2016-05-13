<?php

use yii\db\Migration;

/**
 * Migration for create alcgol_category table
 */
class m160428_070448_create_alcogol_category extends Migration
{

    public function up()
    {
        $this->createTable('alcohol_category', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique()
        ]);
    }

    public function down()
    {
        $this->dropTable('alcohol_category');
    }

}
