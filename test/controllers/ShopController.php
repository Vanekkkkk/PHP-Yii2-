<?php
/**
 * Created by PhpStorm.
 * User: ДОМ
 * Date: 30.10.14
 * Time: 16:16
 */

namespace app\controllers;

use app\models\Categories;
use app\models\Comments;
use app\models\Products;
use app\models\Images;
use app\models\Brands;
use app\models\CategoryProducts;
use Yii;
use yii\web\Controller;

class ShopController extends  Controller{
    public function actionIndex()//categories, most commented product, brands
    {

        $data['categories'] = Categories::findBySql("SELECT * FROM categories as c
                                                     LEFT JOIN (
                                                     SELECT category_id, COUNT(*) as prc
                                                     FROM category_products
                                                     GROUP BY category_id) as cp
                                                     ON cp.category_id=c.category_id")
            ->asArray()
            ->all();
        $data['comments_count'] = Comments::findBySql("SELECT count(com.comment_id) AS countCom, p.product_id FROM comments AS com
                                                       INNER JOIN products AS p
                                                       ON com.product_id = p.product_id
                                                       GROUP BY com.product_id
                                                       ORDER BY countCom
                                                       DESC
                                                       LIMIT 1")
            ->asArray()
            ->one();


        $data['most_commented'] = Products::find()->where(array('product_id'=>$data['comments_count']['product_id']))->asArray()->one();
        return $this->render('index',$data);

    }



    public function actionCategory($id)//products
    {

        $data['products'] = CategoryProducts::findBySql("SELECT c.category_name, cp.category_id, p. * , i. *
                                                         FROM products AS p
                                                         LEFT JOIN (
                                                          SELECT images . *
                                                          FROM images
                                                          GROUP BY product_id
                                                         ) AS i ON i.product_id = p.product_id
                                                         LEFT JOIN category_products AS cp ON p.product_id = cp.product_id
                                                         LEFT JOIN categories AS c ON c.category_id = cp.category_id
                                                         WHERE c.category_id =$id")
            ->asArray()
            ->all();
        return $this->render('category',$data);

    }



    public function actionProduct($id)//product
    {
        $data['product'] = Products::find()
            ->where(array('product_id'=>$id))
            ->asArray()
            ->one();
        $data['comments'] = Comments::findBySql("SELECT * from comments, users
                                                 WHERE comments.user_id=users.user_id AND comments.product_id=$id")
            ->asArray()
            ->all();
        $data['images'] = Images::find()
            ->where(array('product_id'=>$id))
            ->asArray()
            ->all();
        $cat_id = CategoryProducts::find()
            ->where(array('product_id'=>$id))
            ->asArray()
            ->one();
        $cat_id = $cat_id['category_id'];

        $data['products'] = CategoryProducts::findBySql("SELECT c.category_name, cp.category_id, p. * , i. *
                                                         FROM products AS p
                                                         LEFT JOIN (
                                                          SELECT images . *
                                                          FROM images
                                                          GROUP BY product_id
                                                         ) AS i ON i.product_id = p.product_id
                                                         LEFT JOIN category_products AS cp ON p.product_id = cp.product_id
                                                         LEFT JOIN categories AS c ON c.category_id = cp.category_id
                                                         WHERE cp.category_id=$cat_id AND p.product_id <> $id
                                                         ORDER BY RAND()
                                                         LIMIT 2")
            ->asArray()
            ->all();

        return $this->render('product',$data);

    }

    public function actionCommented($id){
        $data['product'] = Products::find()
            ->where(array('product_id'=>$id))
            ->asArray()
            ->one();
        $data['comments'] = Comments::findBySql("SELECT * from comments, users
                                                 WHERE comments.user_id=users.user_id AND comments.product_id=$id")
            ->asArray()
            ->all();
        $data['images'] = Images::find()
            ->where(array('product_id'=>$id))
            ->asArray()
            ->all();
        return $this->render('commented',$data);
    }

    public function actionBrands(){
        $data['brands'] = Brands::findBySql("SELECT b.*,count.c as comments_count
                                             FROM brands as b
                                             LEFT JOIN(
                                                SELECT p.*, COUNT(*) as c
                                                FROM  products as p, comments as com
                                                WHERE com.product_id = p.product_id
                                                GROUP BY p.brand_id) AS count
                                                ON b.brand_id=count.brand_id")
            ->asArray()
            ->all();
        return $this->render('brands',$data);
    }
} 