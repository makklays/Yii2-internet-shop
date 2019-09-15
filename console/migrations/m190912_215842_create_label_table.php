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
        $label->name = 'Бесплатная доставка';
        $label->color_bg = 'orange';
        $label->color_text = 'white';
        $label->created_at = '2019-09-14 16:00:00';
        $label->modified_at = '2019-09-14 16:00:00';
        $label->save();

        $label = new Label();
        $label->name = 'Скидка 5%';
        $label->color_bg = '#DDD';
        $label->color_text = '#245';
        $label->created_at = '2019-09-14 16:00:00';
        $label->modified_at = '2019-09-14 16:00:00';
        $label->save();

        $label = new Label();
        $label->name = 'Красный';
        $label->color_bg = 'red';
        $label->color_text = 'white';
        $label->is_active = 0;
        $label->created_at = '2019-09-14 16:00:00';
        $label->modified_at = '2019-09-14 16:00:00';
        $label->save();

        $label = new Label();
        $label->name = 'Зеленый';
        $label->color_bg = 'green';
        $label->color_text = 'red';
        $label->created_at = '2019-09-14 16:00:00';
        $label->modified_at = '2019-09-14 16:00:00';
        $label->save();

        $label = new Label();
        $label->name = 'Оранжевый';
        $label->color_bg = 'orange';
        $label->color_text = 'red';
        $label->is_active = 0;
        $label->created_at = '2019-09-14 16:00:00';
        $label->modified_at = '2019-09-14 16:00:00';
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
