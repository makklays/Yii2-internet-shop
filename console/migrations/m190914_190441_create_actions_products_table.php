<?php

use common\models\Action;
use common\models\ActionProduct;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%action_product}}`.
 */
class m190914_190441_create_actions_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%action_product}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(11)->notNull(),
            'action_id' => $this->integer(11)->notNull(),
            'is_active' => $this->integer(2)->defaultValue(1),
            'created_at' => $this->dateTime(),
            'modified_at' => $this->dateTime(),
        ]);

        $item = new ActionProduct();
        $item->action_id = 1;
        $item->product_id = 1;
        $item->is_active = 1;
        $item->created_at = '2019-09-14 08:01:00';
        $item->modified_at = '2019-09-14 08:02:00';
        $item->save();

        $item = new ActionProduct();
        $item->action_id = 2;
        $item->product_id = 1;
        $item->is_active = 0;
        $item->created_at = '2019-09-14 08:20:00';
        $item->modified_at = '2019-09-14 08:22:00';
        $item->save();

        $item = new ActionProduct();
        $item->action_id = 2;
        $item->product_id = 2;
        $item->is_active = 1;
        $item->created_at = '2019-09-20 14:30:00';
        $item->modified_at = '2019-09-20 14:32:00';
        $item->save();

        $item = new ActionProduct();
        $item->action_id = 1;
        $item->product_id = 4;
        $item->is_active = 1;
        $item->created_at = '2019-09-05 17:00:00';
        $item->modified_at = '2019-09-05 17:02:00';
        $item->save();

        $item = new ActionProduct();
        $item->action_id = 2;
        $item->product_id = 4;
        $item->is_active = 0;
        $item->created_at = '2019-09-04 08:00:00';
        $item->modified_at = '2019-09-04 08:02:00';
        $item->save();

        $item = new ActionProduct();
        $item->action_id = 2;
        $item->product_id = 6;
        $item->is_active = 0;
        $item->created_at = '2019-09-11 16:00:00';
        $item->modified_at = '2019-09-11 16:02:00';
        $item->save();

        $item = new ActionProduct();
        $item->action_id = 1;
        $item->product_id = 7;
        $item->is_active = 1;
        $item->created_at = '2019-09-11 15:00:00';
        $item->modified_at = '2019-09-11 15:02:00';
        $item->save();

        $item = new ActionProduct();
        $item->action_id = 1;
        $item->product_id = 8;
        $item->is_active = 0;
        $item->created_at = '2019-09-11 10:00:00';
        $item->modified_at = '2019-09-11 10:02:00';
        $item->save();

        $item = new ActionProduct();
        $item->action_id = 2;
        $item->product_id = 8;
        $item->is_active = 0;
        $item->created_at = '2019-09-11 11:00:00';
        $item->modified_at = '2019-09-11 11:01:00';
        $item->save();

        $item = new ActionProduct();
        $item->action_id = 1;
        $item->product_id = 10;
        $item->is_active = 0;
        $item->created_at = '2019-09-13 13:00:00';
        $item->modified_at = '2019-09-13 13:01:00';
        $item->save();

        $item = new ActionProduct();
        $item->action_id = 1;
        $item->product_id = 12;
        $item->is_active = 1;
        $item->created_at = '2019-09-08 08:00:00';
        $item->modified_at = '2019-09-08 08:01:00';
        $item->save();

        $item = new ActionProduct();
        $item->action_id = 2;
        $item->product_id = 12;
        $item->is_active = 0;
        $item->created_at = '2019-09-08 09:00:00';
        $item->modified_at = '2019-09-08 09:01:00';
        $item->save();

        $item = new ActionProduct();
        $item->action_id = 1;
        $item->product_id = 11;
        $item->is_active = 0;
        $item->created_at = '2019-09-07 09:00:00';
        $item->modified_at = '2019-09-07 09:01:00';
        $item->save();

        $item = new ActionProduct();
        $item->action_id = 1;
        $item->product_id = 6;
        $item->is_active = 1;
        $item->created_at = '2019-09-08 10:11:00';
        $item->modified_at = '2019-09-08 10:11:00';
        $item->save();

        $item = new ActionProduct();
        $item->action_id = 2;
        $item->product_id = 5;
        $item->is_active = 1;
        $item->created_at = '2019-09-08 16:00:00';
        $item->modified_at = '2019-09-08 16:01:00';
        $item->save();

        $item = new ActionProduct();
        $item->action_id = 1;
        $item->product_id = 2;
        $item->is_active = 1;
        $item->created_at = '2019-09-11 12:00:00';
        $item->modified_at = '2019-09-11 12:01:00';
        $item->save();

        $item = new ActionProduct();
        $item->action_id = 1;
        $item->product_id = 3;
        $item->is_active = 0;
        $item->created_at = '2019-09-12 12:00:00';
        $item->modified_at = '2019-09-12 12:01:00';
        $item->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%action_product}}');
    }
}
