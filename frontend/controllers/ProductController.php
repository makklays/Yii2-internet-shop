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
     * @return string|\yii\web\Response
     * @throws \yii\db\Exception
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
        $all_products = Product::find()->where(['is_active' => 1])->all();
        $total = count($all_products);

        // all pages
        $all_pages = round($total / $per_page, 0);

        if ($page > $all_pages) return $this->redirect(['/product']);

        // products on page (with Limit and Offset)
        // Добавить привязку к продукту акции - в моделе
        // (action_id в таблице product или сделать отдельную таблицу, если у продукта может быть несколько акций)

        /*
        $sql = 'SELECT p.*, ap.is_active, a.name as action_name, l.name as label_name, l.is_active, l.color_bg, l.color_text
                FROM product as p
                     LEFT JOIN action_product ap ON (p.id = ap.product_id)
                     JOIN `action` a ON (ap.action_id = a.id)
                     JOIN label l ON (a.label_id = l.id)
                WHERE p.is_active = 1
                GROUP BY p.id
                ORDER BY p.name, ap.modified_at DESC
                LIMIT '.$offset.', '.$per_page.'   '; */

        $sql = 'SELECT * FROM product WHERE is_active = 1 ORDER BY name LIMIT '.$offset.', '.$per_page.' ';
        $products = Yii::$app->db->createCommand($sql)->queryAll();

        /* Перебираю привязанные акции к продукту выбираю активные акции с активными ярлыками
        и период действия которых приходится сегодняшнюю дату.
        Из полученного списка акций - беру одну, дата модификации назначения к товару, которой - самая новая */
        foreach($products as $k => $prod) {
            $sql = 'SELECT ap.id, a.*, l.color_text, l.color_bg, l.name as label_name FROM action_product ap 
                    JOIN `action` a ON (ap.action_id=a.id) 
                    JOIN label l ON (a.label_id=l.id) 
                    WHERE
                        ap.is_active = 1 AND a.is_active = 1
                        AND a.from_date <= CURRENT_DATE() AND CURRENT_DATE() <= a.to_date  
                        AND l.is_active = 1 
                        AND ap.product_id = :product_id
                    ORDER BY ap.modified_at DESC ';

            //echo $sql;
            $aps = Yii::$app->db->createCommand($sql, [':product_id' => $prod['id']])->queryOne();

            // добавляю ярлык
            if (isset($aps['label_name']) && !empty($aps['label_name'])) {
                $products[$k]['color_text'] = $aps['color_text'];
                $products[$k]['color_bg'] = $aps['color_bg'];
                $products[$k]['label_name'] = $aps['label_name'];
            }
        }

        /*
        $products = Product::find()->limit($per_page)->offset($offset)
            ->orderBy('product.name ASC')->all();
        */

        // этот бред не работает - пример, где много связей
        /*$products = Product::find()
            ->select(['product.*', 'label.name as label_name', 'label.color_bg as color_bg', 'label.color_text as color_text'])
            ->leftJoin('action_product', '`action_product`.`product_id` = `product`.`id`')
            ->where(['action_product.is_active' => 1])
            ->leftJoin('action', '`action_product`.`action_id` = `action`.`id`')
            ->where(['action.is_active' => 1])
            ->leftJoin('label', '`action`.`label_id` = `label`.`id`')
            ->where(['label.is_active' => 1])
            ->with('label')
            ->limit($per_page)->offset($offset)->all();*/

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

