<?php
namespace backend\controllers;

use common\models\ActionProduct;
use common\models\Product;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class ProductController extends Controller
{
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $query = Product::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'name' => SORT_ASC,
                ]
            ],
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Product();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                $model->save();
                return $this->redirect(['index']);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = Product::findOne(['id' => $id]);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionView($id)
    {
        $model = Product::findOne(['id' => $id]);

        $query2 = ActionProduct::find()->where(['product_id' => $id])->orderBy('modified_at DESC');
        $dataProvider = new ActiveDataProvider([
            'query' => $query2,
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);

        return $this->render('view', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDelete($id)
    {
        Product::findOne($id)->delete();
        return $this->redirect(['index']);
    }
}

