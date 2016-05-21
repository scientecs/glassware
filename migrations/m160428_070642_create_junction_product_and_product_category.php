<?php

use yii\db\Migration;

/**
 * Handles the creation for table `product_product_category`.
 * Has foreign keys to the tables:
 *
 * - `product`
 * - `product_category`
 */
class m160428_070642_create_junction_product_and_product_category extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product_product_category', [
            'product_id' => $this->integer(),
            'product_category_id' => $this->integer(),
            'PRIMARY KEY(product_id, product_category_id)',
        ]);

        // creates index for column `product_id`
        $this->createIndex(
            'idx-product_product_category-product_id',
            'product_product_category',
            'product_id'
        );

        // add foreign key for table `product`
        $this->addForeignKey(
            'fk-product_product_category-product_id',
            'product_product_category',
            'product_id',
            'product',
            'id',
            'CASCADE'
        );

        // creates index for column `product_category_id`
        $this->createIndex(
            'idx-product_product_category-product_category_id',
            'product_product_category',
            'product_category_id'
        );

        // add foreign key for table `product_category`
        $this->addForeignKey(
            'fk-product_product_category-product_category_id',
            'product_product_category',
            'product_category_id',
            'product_category',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `product`
        $this->dropForeignKey(
            'fk-product_product_category-product_id',
            'product_product_category'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            'idx-product_product_category-product_id',
            'product_product_category'
        );

        // drops foreign key for table `product_category`
        $this->dropForeignKey(
            'fk-product_product_category-product_category_id',
            'product_product_category'
        );

        // drops index for column `product_category_id`
        $this->dropIndex(
            'idx-product_product_category-product_category_id',
            'product_product_category'
        );

        $this->dropTable('product_product_category');
    }
}
