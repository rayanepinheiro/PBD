<?php

use yii\db\Migration;

class m171128_213837_cria_tabela_pergunta extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
		
		$tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('pergunta', [
            'id' => $this->primaryKey(),
            'pergunta' => $this->string()->notNull(),
            'id_atividade' => $this->integer()->notNull(),

        ], $tableOptions);
		
		$this->addForeignKey(
            'fk_pergunta_atividade',
            'pergunta',
            'id_atividade',
            'atividades',
            'id'
        );
		
        $this->dropForeignKey ('fk_user_arquivo', 'arquivos');

		$this->dropColumn ( 'arquivos', 'id_usuario');
		
		$this->renameColumn ( 'arquivos', 'nome_arquivo', 'arquivo');

    }

    public function down()
    {
        $this->dropTable('pergunta');
    }

}
