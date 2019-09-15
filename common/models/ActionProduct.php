<?php
namespace common\models;

use Yii;
use \common\models\Action;
use \common\models\Product;

/**
 * This is the model class for table "action_product".
 *
 * @property int $id
 * @property int $product_id
 * @property int $action_id
 * @property int $is_active
 * @property int $created_at
 * @property int $modified_at
 */
class ActionProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'action_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['action_id', 'product_id'], 'required'],
            [['created_at', 'modified_at'], 'datetime', 'format' => 'php:Y-m-d H:i:s'],
            [['action_id', 'product_id', 'is_active'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'action_id' => 'Акция ID',
            'product_id' => 'Продукт ID',
            'is_active' => 'Связь активна?',
            'created_at' => 'Добавлен',
            'modified_at' => 'Модифицирован',
        ];
    }

    public function getAction()
    {
        return $this->hasOne(Action::className(), ['id' => 'action_id']);
    }

    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
