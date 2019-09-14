<?php

use common\models\Action;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%action}}`.
 */
class m190912_215910_create_action_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%action}}', [
            'id' => $this->primaryKey(),
            'label_id' => $this->integer(11)->notNull(),
            'name' => $this->string(255)->notNull(),
            'description' => $this->text(),
            'pic' => $this->string(255)->defaultValue(NULL),
            'code' => $this->string(32)->defaultValue(NULL),

            'from_date' => $this->date(), //->defaultValue(NULL),
            'to_date' => $this->date(), //->defaultValue(NULL),

            'is_active' => $this->integer(2)->defaultValue(1),
            'is_delete' => $this->integer(2)->defaultValue(0),
            'created_at' => $this->dateTime(),
            'modified_at' => $this->dateTime(),
        ]);

        $item = new Action();
        $item->label_id = 1;
        $item->name = 'Акция 5%';
        $item->description = 'Это акция в 5% поспешите!';
        $item->pic = 'pic1.png';
        $item->from_date = '2019-09-20'; //time();
        $item->to_date = '2019-09-30'; //( time() + ( 60 * 60 * 24 * 10 ) );
        //$item->created_at = date('Y-m-d H:i:s', time());
        //$item->modified_at = date('Y-m-d H:i:s', time());
        $item->save();

        $item = new Action();
        $item->label_id = 2;
        $item->name = 'Супер Акция!';
        $item->description = 'Это СУПЕР Акция - поспешите!';
        $item->pic = 'pic2.png';
        $item->from_date = '2019-09-10'; //time();
        $item->to_date = '2019-09-22'; //( time() + ( 60 * 60 * 24 * 10 ) );
        //$item->created_at = date('Y-m-d H:i:s', time());
        //$item->modified_at = date('Y-m-d H:i:s', time());
        $item->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%action}}');
    }
}
