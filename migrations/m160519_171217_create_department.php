<?php

use yii\db\Migration;

/**
 * Handles the creation for table `company`.
 */
class m160519_171217_create_department extends Migration
{

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('department', [
            'id' => $this->primaryKey(),
            'phone' => $this->string()->notNull(),
            'adress' => $this->string()->notNull(),
            'latitude' => $this->string()->notNull(),
            'longitude' => $this->string()->notNull(),
            'schedule' => $this->string()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('department');
    }

}
