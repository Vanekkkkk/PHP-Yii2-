<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property integer $comment_id
 * @property integer $product_id
 * @property integer $user_id
 * @property string $comment_text
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'user_id', 'comment_text'], 'required'],
            [['product_id', 'user_id'], 'integer'],
            [['comment_text'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'comment_id' => 'Comment ID',
            'product_id' => 'Product ID',
            'user_id' => 'User ID',
            'comment_text' => 'Comment Text',
        ];
    }
}
