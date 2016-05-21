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
use yii\db\Migration;

/**
 * Migration for create product table
 */
class m160428_064329_create_product extends Migration
{
    public function up()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'price' => $this->decimal(10, 0)->notNull(),
            'description' => $this->text()->notNull(),
            'image' => $this->string()
        ]);
    }

    public function down()
    {
        $this->dropTable('product');
    }

}
