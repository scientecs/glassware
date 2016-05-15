<?php

/**
 * Migration
 *
 * PHP version 5.5
 *
 * @package    app\migrations
 * @author     Yevhen Hryshatkin <scientecs.dev@gmail.com>
 * @copyright  2015-2016 scientecs. All rights reserved.
 */

namespace app\migrations;

use yii\db\Migration;

/**
 * Migration for create user table
 */
class m160428_062710_create_user extends Migration
{

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

    public function down()
    {
        $this->dropTable('user');
    }

}
