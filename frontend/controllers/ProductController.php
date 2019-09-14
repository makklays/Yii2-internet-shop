<?php
namespace frontend\controllers;

use common\models\Product;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class ProductController extends Controller
{
    /**
     * @param int $page
     * @return string
     */
    public function actionIndex($page = 1)
    {
        $per_page = 8;

        // offset - position in sql
        $offset = 0;
        if ($page > 1) {
            $offset = (($page * $per_page ) - $per_page);
        }

        // all count products
        $all_products = Product::find()->all();
        $total = count($all_products);

        // all pages
        $all_pages = round($total / $per_page, 0);

        if ($page > $all_pages) return $this->redirect(['/product']);

        // products on page (with Limit and Offset)
        // TODO: Добавить привязку к продукту акции - в моделе
        // TODO: (action_id в таблице product или сделать отдельную таблицу, если у продукта может быть несколько акций)
        $products = Product::find()->limit($per_page)->offset($offset)->all();

        return $this->render('index', [
            'products' => $products,
            'total' => $total,
            'page' => $page,
            'all_pages' => $all_pages,
        ]);
    }

    /**
     * @param $id
     * @return string
     */
    public function actionView($id)
    {
        $model = Product::findOne(['id' => $id]);
        return $this->render('view', [
            'model' => $model,
        ]);
    }
}

