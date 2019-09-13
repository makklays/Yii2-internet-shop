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
        $item->weight = 100;
        $item->is_active = 0;
        //$item->created_at = date('Y-m-d H:i:s', time());
        //$item->modified_at = date('Y-m-d H:i:s', time());
        $item->save();

        $item = new Product();
        $item->name = 'Продукт 2';
        $item->weight = 100;
        //$item->created_at = date('Y-m-d H:i:s');
        //$item->modified_at = date('Y-m-d H:i:s');
        $item->save();

        $item = new Product();
        $item->name = 'Продукт 1';
        $item->weight = 200;
        $item->is_active = 0;
        //$item->created_at = date('Y-m-d H:i:s', time());
        //$item->modified_at = date('Y-m-d H:i:s', time());
        $item->save();

        $item = new Product();
        $item->name = 'Продукт 3';
        $item->weight = 200;
        //$item->created_at = date('Y-m-d H:i:s', time());
        //$item->modified_at = date('Y-m-d H:i:s', time());
        $item->save();

        $item = new Product();
        $item->name = 'Продукт 4';
        $item->weight = 300;
        //$item->created_at = date('Y-m-d H:i:s', time());
        //$item->modified_at = date('Y-m-d H:i:s', time());
        $item->save();

        $item = new Product();
        $item->name = 'Продукт 5';
        $item->weight = 8;
        //$item->created_at = date('Y-m-d H:i:s', time());
        //$item->modified_at = date('Y-m-d H:i:s', time());
        $item->save();

        $item = new Product();
        $item->name = 'Продукт 6';
        $item->weight = 8;
        //$item->created_at = date('Y-m-d H:i:s', time());
        //$item->modified_at = date('Y-m-d H:i:s', time());
        $item->save();

        $item = new Product();
        $item->name = 'Продукт 8';
        $item->weight = 8;
        //$item->created_at = date('Y-m-d H:i:s', time());
        //$item->modified_at = date('Y-m-d H:i:s', time());
        $item->save();

        $item = new Product();
        $item->name = 'Продукт 7';
        $item->weight = 8;
        //$item->created_at = date('Y-m-d H:i:s', time());
        //$item->modified_at = date('Y-m-d H:i:s', time());
        $item->save();

        $item = new Product();
        $item->name = 'Продукт 10';
        $item->weight = 8;
        //$item->created_at = date('Y-m-d H:i:s', time());
        //$item->modified_at = date('Y-m-d H:i:s', time());
        $item->save();

        $item = new Product();
        $item->name = 'Продукт 9';
        $item->weight = 8;
        //$item->created_at = date('Y-m-d H:i:s', time());
        //$item->modified_at = date('Y-m-d H:i:s', time());
        $item->save();

        $item = new Product();
        $item->name = 'Продукт 11';
        $item->weight = 8;
        $item->is_active = 0;
        //$item->created_at = date('Y-m-d H:i:s', time());
        //$item->modified_at = date('Y-m-d H:i:s', time());
        $item->save();

        $item = new Product();
        $item->name = 'Продукт 12';
        $item->weight = 8;
        $item->is_active = 1;
        //$item->created_at = date('Y-m-d H:i:s', time());
        //$item->modified_at = date('Y-m-d H:i:s', time());
        $item->save();

        $item = new Product();
        $item->name = 'Продукт 13';
        $item->weight = 8;
        $item->is_active = 1;
        //$item->created_at = date('Y-m-d H:i:s', time());
        //$item->modified_at = date('Y-m-d H:i:s', time());
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
