<?php

use yii\db\Migration;

class m171008_193001_cria_tabela_arquivos extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('arquivos', [
            'id' => $this->primaryKey(),
            'nome_arquivo' => $this->string()->notNull(),
            'id_usuario' => $this->integer()->notNull(),

        ], $tableOptions);

        $this->addForeignKey(
            'fk_detalhes_arquivo',
            'projetodetalhes',
            'id_arquivo_final',
            'arquivos',
            'id'
        );

        $this->addForeignKey(
            'fk_user_arquivo',
            'arquivos',
            'id_usuario',
            'user',
            'id'
        );
    }

    public function down()
    {
        $this->dropTable('arquivos');
    }
}
