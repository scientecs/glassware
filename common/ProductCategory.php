<?php

/**
 * Product catefory model
 *
 * PHP version 5.5
 *
 * @package    app\common
 * @author     Yevhen Hryshatkin <scientecs.dev@gmail.com>
 * @copyright  2015-2016 scientecs. All rights reserved.
 */

namespace app\common;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use app\modules\admin\models\ProductProductCategory;

/**
 * This is the model class for table "product_category".
 *
 * @property integer $id
 * @property string $name
 *
 * @property ProductProductCategory[] $productProductCategories
 * @property Product[] $products
 */
class ProductCategory extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getProductProductCategories()
    {
        return $this->hasMany(ProductProductCategory::className(), ['product_category_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id' => 'product_id'])->viaTable('product_product_category', ['product_category_id' => 'id']);
    }

}
