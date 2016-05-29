<?php

/**
 * Product model
 *
 * PHP version 5.5
 *
 * @package    app\common
 * @author     Yevhen Hryshatkin <scientecs.dev@gmail.com>
 * @copyright  2015-2016 scientecs. All rights reserved.
 */

namespace app\common;

use Yii;
use yii\web\UploadedFile;
use yii\db\ActiveRecord;
use yii\db\ActiveQuery;
use app\models\LoadFile;
use app\modules\admin\models\ProductProductCategory;
use app\common\ProductCategory;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $name
 * @property string $price
 * @property string $description
 * @property string $image
 *
 * @property ProductProductCategory[] $productProductCategories
 * @property ProductCategory[] $productCategories
 */
class Product extends ActiveRecord
{

    /**
     * @var UploadedFile file attribute
     */
    public $file;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price', 'description'], 'required'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 1],
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
            'price' => 'Цена',
            'description' => 'Описание',
            'image' => 'Изображение',
            'product_categories_id' => 'adsa'
        ];
    }

    /**
     * @inheritdoc
     */
    public function save($runValidation = true, $attributeNames = null)
    {
        if (UploadedFile::getInstance($this, 'file')) {
            LoadFile::saveImage($this, UploadedFile::getInstance($this, 'file'));
        }

        return parent::save($runValidation, $attributeNames);
    }

    /**
     * @return ActiveQuery
     */
    public function getProductProductCategories()
    {
        return $this->hasMany(ProductProductCategory::className(), ['product_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getProductCategories()
    {
        return $this->hasMany(ProductCategory::className(), ['id' => 'product_category_id'])->viaTable('product_product_category', ['product_id' => 'id']);
    }

    /**
     * Method for get product categories
     *
     * @return string
     */
    public function getProductNameCategories()
    {
        $categories = [];
        foreach ($this->productCategories as $key => $value) {
            $categories[] = $value['name'];
        }

        return implode('', $categories);
    }

    /**
     * @inheritdoc
     */
    public function afterSave($insert, $changedAttributes)
    {
        ProductProductCategory::deleteAll(['product_id' => $this->id]);

        $newRelation = [];
        $productCategories = Yii::$app->request->post('Product')['productCategories'];
        if ($productCategories) {
            foreach ($productCategories as $id) {
                $newRelation[] = [$this->id, $id];
            }
            self::getDb()->createCommand()
                    ->batchInsert(ProductProductCategory::tableName(), ['product_id', 'product_category_id'], $newRelation)->execute();
        }

        parent::afterSave($insert, $changedAttributes);
    }

}
