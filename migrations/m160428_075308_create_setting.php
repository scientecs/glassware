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
 * Migration for create setting table
 */
class m160428_075308_create_setting extends Migration
{

    public function up()
    {
        $this->createTable('setting', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'key' => $this->string()->notNull(),
            'value' => $this->string()->notNull()
        ]);
    }

    public function down()
    {
        $this->dropTable('setting');
    }

}
