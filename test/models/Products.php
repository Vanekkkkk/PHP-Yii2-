<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $product_id
 * @property integer $brand_id
 * @property string $name
 * @property string $description
 * @property integer $rate
 * @property double $price
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brand_id', 'name', 'description', 'price'], 'required'],
            [['brand_id', 'rate'], 'integer'],
            [['description'], 'string'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'brand_id' => 'Brand ID',
            'name' => 'Name',
            'description' => 'Description',
            'rate' => 'Rate',
            'price' => 'Price',
        ];
    }
}
