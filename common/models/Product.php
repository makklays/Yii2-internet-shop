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
            [['weight', 'is_active', 'is_delete', 'created_at', 'modified_at'], 'integer'],
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
}
