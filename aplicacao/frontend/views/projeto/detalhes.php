<?php
use yii\helpers\Html;																														


/* @var $this yii\web\View */ 

$this->title = 'Detalhes';

?>


    <div class="jumbotron">

        <h4>Esta é a descrição, ou seja, a ação que deve ser realizada por você na produção da aplicação móvel.</h4>
        <h4>Esta é a recomendação que serve como base para a execução da atividade que ela está associada. 
		Ao realizar a ativide é importante utilizar esta recomendação.</h4>
    </div> 

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h5>Conjunto de práticas que você deve realizar para a execução desta atividade.</h5>
                <hr>
                <ul>
                <?php foreach():?>
                    <li></li>
                <?php endforeach ?>
            </div>
            <div class="col-lg-4">
                <h5>Materiais necessários para esta atividade:</h5>
                <hr>

                
            </div>
            <div class="col-lg-4">
                <h5>Materiais produzidos após esta atividade:</h5>
                <hr>
                
            </div>
        </div>

    </div>

