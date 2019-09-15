<?php

use common\models\Product;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m190912_215859_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'code' => $this->string(32)->defaultValue(NULL),
            'weight' => $this->integer(11)->defaultValue(NULL),
            'is_active' => $this->integer(2)->defaultValue(1),
            'is_delete' => $this->integer(2)->defaultValue(0),
            'created_at' => $this->dateTime(),
            'modified_at' => $this->dateTime(),
        ]);

        $item = new Product();
        $item->name = 'Мыло хозяйственное 78%';
        $item->code = 'ART-0001';
        $item->weight = 100;
        $item->is_active = 1;
        $item->created_at = '2019-09-14 16:00:00';
        $item->modified_at = '2019-09-14 16:00:00';
        $item->save();

        $item = new Product();
        $item->name = 'Волшебная палочка';
        $item->code = '453-60-01';
        $item->weight = 100;
        $item->created_at = '2019-09-14 16:00:00';
        $item->modified_at = '2019-09-14 16:00:00';
        $item->save();

        $item = new Product();
        $item->name = 'Шапка невидимка';
        $item->code = 'code-01';
        $item->weight = 200;
        $item->is_active = 1;
        $item->created_at = '2019-09-14 16:00:00';
        $item->modified_at = '2019-09-14 16:00:00';
        $item->save();

        $item = new Product();
        $item->name = 'Манка';
        $item->code = 'code-011';
        $item->weight = 200;
        $item->created_at = '2019-09-14 16:00:00';
        $item->modified_at = '2019-09-14 16:00:00';
        $item->save();

        $item = new Product();
        $item->name = 'Продукт 4';
        $item->code = 'art-code-0004';
        $item->weight = 300;
        $item->created_at = '2019-09-14 16:00:00';
        $item->modified_at = '2019-09-14 16:00:00';
        $item->save();

        $item = new Product();
        $item->name = 'Продукт 5';
        $item->code = 'art-code-0005';
        $item->weight = 8;
        $item->created_at = '2019-09-14 16:00:00';
        $item->modified_at = '2019-09-14 16:00:00';
        $item->save();

        $item = new Product();
        $item->name = 'Продукт 6';
        $item->code = 'art-code-0006';
        $item->weight = 8;
        $item->created_at = '2019-09-14 16:00:00';
        $item->modified_at = '2019-09-14 16:00:00';
        $item->save();

        $item = new Product();
        $item->name = 'Продукт 8';
        $item->code = 'art-code-0008';
        $item->weight = 8;
        $item->created_at = '2019-09-14 16:00:00';
        $item->modified_at = '2019-09-14 16:00:00';
        $item->save();

        $item = new Product();
        $item->name = 'Продукт 7';
        $item->code = 'art-code-0007';
        $item->weight = 8;
        $item->created_at = '2019-09-14 16:00:00';
        $item->modified_at = '2019-09-14 16:00:00';
        $item->save();

        $item = new Product();
        $item->name = 'Продукт 10';
        $item->code = 'art-code-0010';
        $item->weight = 8;
        $item->created_at = '2019-09-14 16:00:00';
        $item->modified_at = '2019-09-14 16:00:00';
        $item->save();

        $item = new Product();
        $item->name = 'Продукт 9';
        $item->code = 'art-code-0009';
        $item->weight = 8;
        $item->is_active = 0;
        $item->created_at = '2019-09-14 16:00:00';
        $item->modified_at = '2019-09-14 16:00:00';
        $item->save();

        $item = new Product();
        $item->name = 'Продукт 11';
        $item->code = 'art-code-0011';
        $item->weight = 8;
        $item->is_active = 0;
        $item->created_at = '2019-09-14 16:00:00';
        $item->modified_at = '2019-09-14 16:00:00';
        $item->save();

        $item = new Product();
        $item->name = 'Продукт 12';
        $item->code = 'art-code-0012';
        $item->weight = 8;
        $item->is_active = 1;
        $item->created_at = '2019-09-14 16:00:00';
        $item->modified_at = '2019-09-14 16:00:00';
        $item->save();

        $item = new Product();
        $item->name = 'Продукт 13';
        $item->code = 'art-code-0013';
        $item->weight = 8;
        $item->is_active = 1;
        $item->created_at = '2019-09-14 16:00:00';
        $item->modified_at = '2019-09-14 16:00:00';
        $item->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
