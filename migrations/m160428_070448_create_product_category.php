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
 * Migration for create product_category table
 */
class m160428_070448_create_product_category extends Migration
{

    public function up()
    {
        $this->createTable('product_category', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique()
        ]);
    }

    public function down()
    {
        $this->dropTable('product_category');
    }

}
