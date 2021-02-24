<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%additional_info}}`.
 */
class m210224_184650_create_additional_info_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%additional_info}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'description' => $this->text(),
            'category_id' => $this->integer(),
            'created_at' => $this->timestamp()->defaultExpression('NOW()')
        ]);

        $this->addForeignKey('additional_info-to-categories', 'additional_info', 'category_id', 'categories', 'id', 'CASCADE', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('additional_info-to-categories', 'additional_info');
        $this->dropTable('{{%additional_info}}');
    }
}
