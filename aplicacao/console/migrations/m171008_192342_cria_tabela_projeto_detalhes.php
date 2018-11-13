<?php

use yii\db\Migration;

class m171008_192342_cria_tabela_projeto_detalhes extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('projetodetalhes', [
            'id' => $this->primaryKey(),
            'id_projeto' => $this->integer()->notNull(),
            'id_atividade' => $this->integer()->notNull(),
            'data_inicio_atividade' => $this->date(),
            'data_fim_atividade' => $this->date(),
            'aprovado' => $this->boolean()->notNull(),
            'descricao_aprovacao' => $this->text(),
            'id_arquivo_final' => $this->integer(),
        ], $tableOptions);

        $this->addForeignKey(
            'fk_detalhes_projeto_id',
            'projetodetalhes',
            'id_projeto',
            'projeto',
            'id_projeto'
        );

        $this->addForeignKey(
            'fk_detalhes_atividade_id',
            'projetodetalhes',
            'id_atividade',
            'atividades',
            'id'
        );
    }

    public function down()
    {
        $this->dropTable('projetodetalhes');
    }
}
