<?php

use yii\db\Migration;

class m171002_202922_cria_tabela_cursos extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('cursos', [
            'id' => $this->primaryKey(),
            'nome_curso' => $this->string()->notNull(),
            'sigla_curso' => $this->string(2)->notNull(),
        ], $tableOptions);

        $this->addForeignKey(
            'fk_user_cursos',
            'user',
            'id_curso',
            'cursos',
            'id'
        );
    }

    public function down()
    {
        $this->dropTable('cursos');
    }
}
