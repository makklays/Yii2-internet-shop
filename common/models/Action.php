<?php
namespace common\models;

use Yii;

/**
 * This is the model class for table "action".
 *
 * @property int $id
 * @property int $label_id
 * @property string $name
 * @property string $description
 * @property string $pic
 * @property string $code
 * @property int $from_date
 * @property int $to_date
 * @property int $is_active
 * @property int $is_delete
 * @property int $created_at
 * @property int $modified_at
 */
class Action extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'action';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['label_id', 'name', 'from_date', 'to_date'], 'required'],
            [['label_id', 'from_date', 'to_date', 'is_active', 'is_delete', 'created_at', 'modified_at'], 'integer'],
            [['description'], 'string'],
            [['name', 'pic'], 'string', 'max' => 255],
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
            'label_id' => 'Якорь',
            'name' => 'Название',
            'description' => 'Описание',
            'pic' => 'Изображение акции',
            'code' => 'Код',
            'from_date' => 'Дата начала',
            'to_date' => 'Дата окончания',
            'is_active' => 'Активность',
            'is_delete' => 'Удален',
            'created_at' => 'Добавлено',
            'modified_at' => 'Модифицировано',
        ];
    }
}
