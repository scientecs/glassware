<?php

use yii\db\Migration;

/**
 * Handles the creation for table `setting`.
 */
class m160519_171310_create_setting extends Migration
{

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('setting', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'key' => $this->string()->notNull(),
            'value' => $this->string()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('setting');
    }

}
