<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\common\OrderGlass;

/**
 * OrderGlassSearch represents the model behind the search form about `app\common\OrderGlass`.
 */
class OrderGlassSearch extends OrderGlass
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'order_glass_status_id', 'department_id', 'is_notyfication', 'count_alcogol', 'count_bank', 'user_id'], 'integer'],
            [['date', 'time'], 'safe'],
            [['profit_alcogol', 'profit_bank', 'profit_broken_glass', 'total_profit', 'weight_broken_glass'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = OrderGlass::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'order_glass_status_id' => $this->order_glass_status_id,
            'department_id' => $this->department_id,
            'date' => $this->date,
            'is_notyfication' => $this->is_notyfication,
            'profit_alcogol' => $this->profit_alcogol,
            'profit_bank' => $this->profit_bank,
            'profit_broken_glass' => $this->profit_broken_glass,
            'total_profit' => $this->total_profit,
            'count_alcogol' => $this->count_alcogol,
            'count_bank' => $this->count_bank,
            'weight_broken_glass' => $this->weight_broken_glass,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'time', $this->time]);

        return $dataProvider;
    }
}
