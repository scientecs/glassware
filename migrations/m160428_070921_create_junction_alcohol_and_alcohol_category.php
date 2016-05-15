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
 * Migration for add relation manyToMany alcohol and alcohol_category
 */
class m160428_070921_create_junction_alcohol_and_alcohol_category extends Migration
{

    public function up()
    {
        $this->createTable('alcohol_to_alcohol_category', [
            'alcohol_id' => $this->integer(),
            'alcohol_category_id' => $this->integer(),
            'PRIMARY KEY(alcohol_id, alcohol_category_id)'
        ]);

        $this->createIndex('idx-alcohol_to_alcohol_category-alcohol_id', 'alcohol_to_alcohol_category', 'alcohol_id');
        $this->createIndex('idx-alcohol_to_alcohol_category-alcohol_category_id', 'alcohol_to_alcohol_category', 'alcohol_category_id');

        $this->addForeignKey('fk-alcohol_to_alcohol_category-alcohol_id', 'alcohol_to_alcohol_category', 'alcohol_id', 'alcohol', 'id', 'CASCADE');
        $this->addForeignKey('fk-alcohol_to_alcohol_category-alcohol_category_id', 'alcohol_to_alcohol_category', 'alcohol_category_id', 'alcohol_category', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('alcohol_to_alcohol_category');
    }

}
