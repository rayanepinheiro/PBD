<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Praticas;

/**
 * PraticasSearch represents the model behind the search form about `app\models\Praticas`.
 */
class PraticasSearch extends Praticas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_atividade'], 'integer'],
            [['descricao_pratica'], 'safe'],
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
        $query = Praticas::find();

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
            'id_atividade' => $this->id_atividade,
        ]);

        $query->andFilterWhere(['like', 'descricao_pratica', $this->descricao_pratica]);

        return $dataProvider;
    }
}
