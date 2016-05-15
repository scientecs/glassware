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
 * Migration for create relation ManyToMany order_glass and alcohol
 */
class m160428_091110_create_junction_order_glass_and_alcohol extends Migration
{

    public function up()
    {
        $this->createTable('order_glass_to_alcohol', [
            'order_glass_id' => $this->integer(),
            'alcohol_id' => $this->integer(),
            'PRIMARY KEY(order_glass_id, alcohol_id)'
        ]);

        $this->createIndex('idx-order_glass_to_alcohol-order_glass_id', 'order_glass_to_alcohol', 'order_glass_id');
        $this->createIndex('idx-order_glass_to_alcohol-alcohol_id', 'order_glass_to_alcohol', 'alcohol_id');

        $this->addForeignKey('fk-order_glass_to_alcohol-order_glass_id', 'order_glass_to_alcohol', 'order_glass_id', 'order_glass', 'id', 'CASCADE');
        $this->addForeignKey('fk-order_glass_to_alcohol-alcohol_id', 'order_glass_to_alcohol', 'alcohol_id', 'alcohol', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('order_glass_to_alcohol');
    }

}
