<?php

use yii\db\Migration;

class m171004_001644_cria_tabela_atividades extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('atividades', [
            'id' => $this->primaryKey(),
            'id_tipo_projeto' => $this->integer()->defaultValue(1),
            'nome_titulo' => $this->string()->notNull(),
            'informacoes_atividade' => $this->text()->notNull(),
            'materiais_atividade' => $this->text()->notNull(),
            'extensoes_permitidas' => $this->string()->notNull(),
        ], $tableOptions);

        $this->addForeignKey(
            'fk_atividades_tipo_projeto',
            'atividades',
            'id_tipo_projeto',
            'tipo_projeto',
            'id'
        );
    }

    public function down()
    {
        $this->dropTable('atividades');
    }
}
