<?php

use yii\db\Migration;

/**
 * Migration for create user table
 */
class m160428_062710_create_news_table extends Migration
{

    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
            'birth_day' => $this->date()->notNull(),
            'last_login' => $this->dateTime(),
            'role' => $this->text()->notNull()
        ]);
    }

    public function down()
    {
        $this->dropTable('user');
    }

}
