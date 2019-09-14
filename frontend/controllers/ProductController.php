<?php
namespace frontend\controllers;

use common\models\Product;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class ProductController extends Controller
{
    public function actionIndex()
    {
        $products = Product::find()->all();


        return $this->render('index', [
            'products' => $products,
        ]);
    }

    public function actionView($id)
    {
        $model = Product::findOne(['id' => $id]);
        return $this->render('view', [
            'model' => $model,
        ]);
    }
}

