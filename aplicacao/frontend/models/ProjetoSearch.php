<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Projeto;

/**
 * ProjetoSearch represents the model behind the search form about `app\models\Projeto`.
 */
class ProjetoSearch extends Projeto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_projeto', 'id_usuario', 'created_at', 'updated_at'], 'integer'],
            [['nome_projeto', 'descricao_projeto', 'palavras_chave', 'categoria'], 'safe'],
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
        $query = Projeto::find();

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
            'id_projeto' => $this->id_projeto,
            'id_usuario' => $this->id_usuario,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'nome_projeto', $this->nome_projeto])
            ->andFilterWhere(['like', 'descricao_projeto', $this->descricao_projeto])
            ->andFilterWhere(['like', 'palavras_chave', $this->palavras_chave])
            ->andFilterWhere(['like', 'categoria', $this->categoria]);

        return $dataProvider;
    }
}
