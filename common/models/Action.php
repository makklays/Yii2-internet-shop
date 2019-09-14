<?php
namespace common\models;

use Yii;
use \common\models\Label;
use yii\web\UploadedFile;

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
            [['created_at', 'modified_at'], 'datetime', 'format' => 'php:Y-m-d H:i:s'],
            [['label_id', 'is_active', 'is_delete'], 'integer'],
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
            'is_active' => 'Активен',
            'is_delete' => 'Удален',
            'created_at' => 'Добавлен',
            'modified_at' => 'Модифицирован',
        ];
    }

    public function uploadImage($prev_pic = NULL)
    {
        // add directory
        $path = Yii::$app->basePath . '/web/uploads/pics/' . $this->id;
        if (!file_exists($path)) {
            mkdir($path, 0700);
        }

        // upload file
        $file = UploadedFile::getInstance($this, 'pic');
        if (isset($file->baseName) && !empty($file->baseName)) {
            //echo 'fdfgdgdg' . $file->baseName;
            //exit;
            $filename = $file->baseName . '.' . $file->extension;
            $file->saveAs(Yii::$app->basePath . '/web/uploads/pics/' . $this->id . '/' . $filename);
            $this->pic = $filename;
        } else {
            $this->pic = $prev_pic;
        }
        $this->save();
    }

    public function getLabel()
    {
        return $this->hasOne(Label::className(), ['id' => 'label_id']);
    }
}
