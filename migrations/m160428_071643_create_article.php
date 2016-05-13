<?php

use yii\db\Migration;

class m160428_071643_create_article extends Migration
{
    public function up()
    {
        $this->createTable('article', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'short_description' => $this->text()->notNull(),
            'description' => $this->text()->notNull(),
            'published_date' => $this->date()->notNull(),
            'slug' => $this->string()->notNull()->unique(),
            'image' => $this->string()
        ]);
    }

    public function down()
    {
        $this->dropTable('article');
    }
}
