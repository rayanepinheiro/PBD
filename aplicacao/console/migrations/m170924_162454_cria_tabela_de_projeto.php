<?php

use yii\db\Migration;

class m170924_162454_cria_tabela_de_projeto extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('projeto', [
            'id_projeto' => $this->primaryKey(),
            'id_tipo_projeto' => $this->integer()->defaultValue(1),
            'nome_projeto' => $this->string()->notNull(),
            'descricao_projeto' => $this->text()->notNull(),
            'palavras_chave' => $this->string()->notNull(),
            'categoria' => $this->string()->notNull(),
            'id_usuario' => $this->integer()->notNull(),
            'id_professor' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey(
            'fk_projeto_id_usuario',
            'projeto',
            'id_usuario',
            'user',
            'id'
        );

        $this->addForeignKey(
            'fk_projeto_id_professor',
            'projeto',
            'id_professor',
            'user',
            'id'
        );

    }

    public function down()
    {
        $this->dropTable('projeto');
    }
}
