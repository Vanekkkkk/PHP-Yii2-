<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category_products".
 *
 * @property integer $category_id
 * @property integer $product_id
 */
class CategoryProducts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'product_id'], 'required'],
            [['category_id', 'product_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'product_id' => 'Product ID',
        ];
    }
}
