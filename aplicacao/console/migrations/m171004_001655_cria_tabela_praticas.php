<?php

use yii\db\Migration;

class m171004_001655_cria_tabela_praticas extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('praticas', [
            'id' => $this->primaryKey(),
            'id_atividade' => $this->integer()->notNull(),
            'descricao_pratica' => $this->string()->notNull(),
        ], $tableOptions);

        $this->addForeignKey(
            'fk_praticas_atividade',
            'praticas',
            'id_atividade',
            'atividades',
            'id'
        );
    }

    public function down()
    {
        $this->dropTable('praticas');
    }
}
