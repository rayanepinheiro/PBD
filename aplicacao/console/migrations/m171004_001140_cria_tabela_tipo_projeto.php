<?php

use yii\db\Migration;

class m171004_001140_cria_tabela_tipo_projeto extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('tipo_projeto', [
            'id' => $this->primaryKey(),
            'descricao_projeto' => $this->string()->notNull(),
        ], $tableOptions);

        $this->addForeignKey(
            'fk_projetos_tipo_projeto',
            'projeto',
            'id_tipo_projeto',
            'tipo_projeto',
            'id'
        );
    }

    public function down()
    {
        $this->dropTable('tipo_projeto');
    }
}
