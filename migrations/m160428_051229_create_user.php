<?php

use yii\db\Migration;

/**
 * Handles the creation for table `user`.
 */
class m160428_051229_create_user extends Migration
{
    
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
            'birth_day' => $this->date()->notNull(),
            'group' => $this->string()->notNull(),
            'last_login' => $this->dateTime()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }

}
