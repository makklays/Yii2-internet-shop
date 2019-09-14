<?php
namespace backend\controllers;

use common\models\Action;
use common\models\Label;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class ActionController extends Controller
{
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $query = Action::find();

        /*echo '<pre>';
        print_r($query->label);
        echo '</pre>';
        exit;*/

        /*$query = Action::find()
            ->select(['action.*', 'l.name as label_name'])
            ->join('JOIN', 'label l', 'l.id = action.label_id')
            ->all(); */

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Action();

        // array of labels
        $labels = Label::find()->all();
        $label_options = [];
        foreach($labels as $lb){
            $label_options[$lb->id] = $lb->name;
        }

        if ($model->load(Yii::$app->request->post())) {

            $b = Yii::$app->request->post('Action');
            $model->from_date = $b['from_date'];
            $model->to_date = $b['to_date']; // strtotime(

            if ($model->validate()) {
                //$file_name = $this->pic->baseName . '.' . $this->pic->extension;
                //$this->pic->saveAs('uploads/pics/'.$model->id .'/'.$file_name);

                //$model->from_date = strtotime($model->from_date);
                //$model->to_date = strtotime($model->to_date);

                /*echo '<pre>';
                print_r($model);
                echo '</pre>';
                exit; */

                $model->save();

                /*
                $file = UploadedFile::getInstance($model, 'pic');
                $filename = $file->baseName . '.' . $file->extension;
                $file->saveAs(Yii::$app->basePath . '/web/uploads/pics/' . $filename);
                $model->pic = $filename;
                $model->save(); */

                $model->uploadImage();

                return $this->redirect('/actions/1');
            }
        }
        return $this->render('create', [
            'model' => $model,
            'labels' => $label_options,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = Action::findOne(['id' => $id]);
        // previous pic
        $prev_pic = $model->pic;

        // array of labels
        $labels = Label::find()->all();
        $label_options = [];
        foreach($labels as $lb){
            $label_options[$lb->id] = $lb->name;
        }

        if ($model->load(Yii::$app->request->post())) {

            $b = Yii::$app->request->post('Action');
            $model->from_date = $b['from_date']; // strtotime(
            $model->to_date = $b['to_date']; // strtotime(

            if ($model->validate()) {
                // form inputs are valid, do something here
                //$request = Yii::$app->request->post('Action');
                /*echo '<pre>';
                print_r($request['from_date']);
                echo '</pre>';
                exit; */

                $model->uploadImage($prev_pic);

                //$model->from_date = strtotime($request['from_date']);
                //$model->to_date = strtotime($request['to_date']);
                $model->save();

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('update', [
            'model' => $model,
            'labels' => $label_options,
        ]);
    }

    public function actionView($id)
    {
        $model = Action::findOne(['id' => $id]);
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        Action::findOne($id)->delete();
        return $this->redirect(['index']);
    }

    /*public function uploadPicture(Action $model)
    {
        // add directory
        $path = Yii::$app->basePath . '/web/uploads/pics/' . $model->id;
        if (!file_exists($path)) {
            mkdir($path, 0700);
        }

        // upload file
        $file = UploadedFile::getInstance($model, 'pic');
        if (isset($file->baseName) && !empty($file->baseName)) {
            $filename = $file->baseName . '.' . $file->extension;
            $file->saveAs(Yii::$app->basePath . '/web/uploads/pics/' . $model->id . '/' . $filename);
            $model->pic = $filename;
            //$model->save();
        }

        return $model->save();
    }*/
}