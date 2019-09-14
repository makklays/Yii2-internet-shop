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

        // по части в названии и описании
        $search = Yii::$app->request->get('search');
        if (isset($search) && !empty($search)) {
            $query = Action::find();
            $query->where(['like', 'name', $search]);
            $query->orWhere(['like', 'description', $search]);
        } else {
            $query = Action::find();
        }

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
                $model->save();

                // upload image
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
                // upload image
                $model->uploadImage($prev_pic);

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
}