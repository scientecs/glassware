<?php

use yii\db\Migration;

/**
 * Handles the creation for table `order_glass_status`.
 */
class m160519_171449_create_order_glass_status extends Migration
{

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('order_glass_status', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('order_glass_status');
    }

}
