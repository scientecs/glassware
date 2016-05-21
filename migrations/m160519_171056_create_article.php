<?php

use yii\db\Migration;

/**
 * Handles the creation for table `article`.
 */
class m160519_171056_create_article extends Migration
{

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('article', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'short_description' => $this->text()->notNull(),
            'description' => $this->text()->notNull(),
            'published_date' => $this->date()->notNull(),
            'slug' => $this->string()->notNull()->unique(),
            'image' => $this->string(225),
            'is_published' => $this->boolean(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('article');
    }

}
