<?php
namespace common\models;

use Yii;
use common\models\Action;

/**
 * This is the model class for table "label".
 *
 * @property int $id
 * @property string $name
 * @property string $color_bg
 * @property string $color_text
 * @property string $code
 * @property int $is_active
 * @property int $is_delete
 * @property int $created_at
 * @property int $modified_at
 */
class Label extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'label';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['color_bg'], 'string'],
            [['created_at', 'modified_at'], 'datetime', 'format' => 'php:Y-m-d H:i:s'],
            [['is_active', 'is_delete'], 'integer'],
            [['name', 'color_text'], 'string', 'max' => 255],
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
            'color_bg' => 'Цвет фона',
            'color_text' => 'Цвет текста',
            'code' => 'Код',
            'is_active' => 'Активен',
            'is_delete' => 'Удален',
            'created_at' => 'Добавлен',
            'modified_at' => 'Модифицирован',
        ];
    }

    public function getAction()
    {
        return $this->hasMany(Action::className(), ['label_id' => 'id'] );
    }
}
