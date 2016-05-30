<?php

use yii\db\Migration;

/**
 * Handles the creation for table `order_glass`.
 */
class m160519_171617_create_order_glass extends Migration
{

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('order_glass', [
            'id' => $this->primaryKey(),
            'order_glass_status_id' => $this->integer()->notNull(),
            'department_id' => $this->integer()->notNull(),
            'date' => $this->date()->notNull(),
            'time' => $this->string()->notNull(),
            'is_notyfication' => $this->smallInteger()->defaultValue(0),
            'profit_alcogol' => $this->decimal(10, 4),
            'profit_bank' => $this->decimal(10, 4),
            'profit_broken_glass' => $this->decimal(10, 4),
            'total_profit' => $this->decimal(10, 4)->notNull(),
            'count_alcogol' => $this->integer(),
            'count_bank' => $this->integer(),
            'weight_broken_glass' => $this->decimal(10, 4),
            'user_id' => $this->integer()->notNull()
        ]);

        $this->createIndex(
                'idx-order_glass-department_id', 'order_glass', 'department_id'
        );

        $this->addForeignKey(
                'fk-order_glass-department_id', 'order_glass', 'department_id', 'department', 'id', 'CASCADE'
        );

        $this->createIndex(
                'idx-order_glass-user_id', 'order_glass', 'user_id'
        );

        $this->addForeignKey(
                'fk-order_glass-user_id', 'order_glass', 'user_id', 'user', 'id', 'CASCADE'
        );

        $this->createIndex(
                'idx-order_glass-order_glass_status_id', 'order_glass', 'order_glass_status_id'
        );

        $this->addForeignKey(
                'fk-order_glass-order_glass_status_id', 'order_glass', 'order_glass_status_id', 'order_glass_status', 'id', 'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('order_glass');
    }

}
