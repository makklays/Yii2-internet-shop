<?php
namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property int $weight
 * @property int $is_active
 * @property int $is_delete
 * @property int $created_at
 * @property int $modified_at
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'code'], 'required'],
            [['created_at', 'modified_at'], 'datetime', 'format' => 'php:Y-m-d H:i:s'],
            [['weight', 'is_active', 'is_delete'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'code' => 'Артикул',
            'weight' => 'Вес',
            'is_active' => 'Активен',
            'is_delete' => 'Удален',
            'created_at' => 'Добавлен',
            'modified_at' => 'Модифицирован',
        ];
    }

    /*public function getActionproducts()
    {
        return $this->hasMany(ActionProduct::className(), ['product_id' => 'id']);
    }

    /*
    public function getActionProduct()
    {
        return $this->hasOne(ActionProduct::className(), ['product_id' => 'id'])
            //->where(['action_product.is_active' => 1])
            ->orderBy('action_product.modified_at DESC')
            ;
    }

    public function getAction()
    {
        return $this->hasOne(Action::className(), ['id' => 'action_id'])
            ->via('actionProduct')
            //->where(['action.is_active' => 1])
            ;
    }

    public function getLabel()
    {
        return $this->hasOne(Label::className(), ['id' => 'label_id'])
            ->via('actionProduct')
            ->via('action')
            //->where(['label.is_active' => 1])
            ;
    }*/
}
