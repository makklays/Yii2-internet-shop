<?php

use common\models\Label;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%label}}`.
 */
class m190912_215842_create_label_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%label}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'color_bg' => $this->string(10)->defaultValue(NULL),
            'color_text' => $this->string(10)->defaultValue(NULL),
            'code' => $this->string(32)->defaultValue(NULL),
            'is_active' => $this->integer(2)->defaultValue(1),
            'is_delete' => $this->integer(2)->defaultValue(0),
            'created_at' => $this->dateTime(),
            'modified_at' => $this->dateTime(),
        ]);

        $label = new Label();
        $label->name = 'Label 1';
        $label->color_bg = '#DDD';
        $label->color_text = '#245';
        //$label->created_at = '2019-09-10 10:10:10';
        //$label->modified_at = '2019-09-10 10:10:10';
        $label->save();

        $label = new Label();
        $label->name = 'Label 2';
        $label->color_bg = '#fedede';
        $label->color_text = '#975';
        //$label->created_at = '2019-09-10 10:10:10';
        //$label->modified_at = '2019-09-10 10:10:10';
        $label->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%label}}');
    }
}
