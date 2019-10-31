<?php

use yii\db\Migration;

/**
 * Class m191031_132211_alter_language_column_in_meta_tag_content_table
 */
class m191031_132211_alter_language_column_in_meta_tag_content_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('meta_tag_content', 'language', $this->integer());
        $this->renameColumn('meta_tag_content', 'language', 'language_id');
        $this->addForeignKey(
            '{{%fk-meta_tag_content_language_id-language_id}}',
            '{{%meta_tag_content}}',
            'language_id',
            '{{%language}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            '{{%fk-meta_tag_content_language_id-language_id}}',
            '{{%meta_tag_content}}'
        );
    }

}
