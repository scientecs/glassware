<?php

use yii\db\Migration;

/**
 * Handles the creation for table `company`.
 */
class m160519_171217_create_company extends Migration
{

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('company', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'skype' => $this->string(),
            'email' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'latitude' => $this->string()->notNull(),
            'longtitude' => $this->string()->notNull(),
            'address' => $this->string()->notNull(),
            'schedule' => $this->string()->notNull(),
            'icon' => $this->string()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('company');
    }

}
