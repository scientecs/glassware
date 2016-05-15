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
 * Migration for create company table
 */
class m160428_074739_create_company extends Migration
{

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

    public function down()
    {
        $this->dropTable('company');
    }

}
