<?php

use yii\db\Migration;

class m171130_063331_cria_tabela_resposta extends Migration
{
     // Use up()/down() to run migration code without a transaction.
    public function up()
    {
		
		$tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('resposta', [
            'id' => $this->primaryKey(),
            'resposta' => $this->integer()->notNull(),
            'id_pergunta' => $this->integer()->notNull(),

        ], $tableOptions);
		
		$this->addForeignKey(
            'fk_resposta_pergunta',
            'resposta',
            'id_pergunta',
            'pergunta',
            'id'
        );
		
		$this->dropColumn ( 'projetodetalhes', 'descricao_aprovacao');

    }

    public function down()
    {
        $this->dropTable('pergunta');
    }
}
