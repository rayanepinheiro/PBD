<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Atividades;

/**
 * AtividadesSearch represents the model behind the search form about `app\models\Atividades`.
 */
class AtividadesSearch extends Atividades
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_tipo_projeto'], 'integer'],
            [['nome_titulo', 'informacoes_atividade', 'materiais_atividade', 'extensoes_permitidas'], 'safe'],
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
        $query = Atividades::find();

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
            'id_tipo_projeto' => $this->id_tipo_projeto,
        ]);

        $query->andFilterWhere(['like', 'nome_titulo', $this->nome_titulo])
            ->andFilterWhere(['like', 'informacoes_atividade', $this->informacoes_atividade])
            ->andFilterWhere(['like', 'materiais_atividade', $this->materiais_atividade])
            ->andFilterWhere(['like', 'extensoes_permitidas', $this->extensoes_permitidas]);

        return $dataProvider;
    }
}
