<?= kato\DropZone::widget([
       'options' => [
       		'url' => Yii::$app->urlManager->createUrl('projeto/upload'),
           'maxFilesize' => '2',
       ],
       'clientEvents' => [
           'complete' => "function(file){console.log(file)}",
           'removedfile' => "function(file){alert(file.name + ' is removed')}"
       ],
   ]);
?>
