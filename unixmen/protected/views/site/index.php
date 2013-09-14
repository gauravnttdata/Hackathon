<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<!-- <h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Congratulations! You have successfully created your Yii application.</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul> -->

<div style="width: 200px; float: left;">
<?php
function getSeleted($celebrity=''){
	if(isset($_GET['celeb'])){
		if($_GET['celeb'] === $celebrity){
			return array('class'=>'active');
		}
	}
}
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'list',
	'items' => array(
		array('label'=>'NTT', 'itemOptions'=>array('class'=>'nav-header')),
			array('label'=>'NTT DATA Americas', 'url'=>$this->createUrl('site/index',array('celeb'=>'NTTDATAAmericas')), 'itemOptions'=>getSeleted('NTTDATAAmericas')),
			array('label'=>'NTT DATA UK', 'url'=>$this->createUrl('site/index',array('celeb'=>'NTT_DATA_UK')), 'itemOptions'=>getSeleted('NTT_DATA_UK')),
			array('label'=>'NTT DATA Canada', 'url'=>$this->createUrl('site/index',array('celeb'=>'NTTDATACanada')), 'itemOptions'=>getSeleted('NTTDATACanada')),
		array('label'=>'Politician', 'itemOptions'=>array('class'=>'nav-header')),
			array('label'=>'Narendra Modi', 'url'=>$this->createUrl('site/index',array('celeb'=>'narendramodi')), 'itemOptions'=>getSeleted('narendramodi')),			
			array('label'=>'Dr Manmohan Singh', 'url'=>$this->createUrl('site/index',array('celeb'=>'PMOIndia')), 'itemOptions'=>getSeleted('PMOIndia')),
			array('label'=>'Nitish Kumar', 'url'=>$this->createUrl('site/index',array('celeb'=>'NitishKumarJDU')), 'itemOptions'=>getSeleted('NitishKumarJDU')),
			array('label'=>'Shashi Tharoor', 'url'=>$this->createUrl('site/index',array('celeb'=>'ShashiTharoor')), 'itemOptions'=>getSeleted('ShashiTharoor')),
			
		array('label'=>'Gernalist', 'itemOptions'=>array('class'=>'nav-header')),
			array('label'=>'Barkha Dutt', 'url'=>$this->createUrl('site/index',array('celeb'=>'BDUTT')), 'itemOptions'=>getSeleted('BDUTT')),
			array('label'=>'Rajdeep Sardesai', 'url'=>$this->createUrl('site/index',array('celeb'=>'sardesairajdeep')), 'itemOptions'=>getSeleted('sardesairajdeep')),
			array('label'=>'Prabhu Chawla', 'url'=>$this->createUrl('site/index',array('celeb'=>'PrabhuChawla')), 'itemOptions'=>getSeleted('PrabhuChawla')),
		array('label'=>'Hollywood', 'itemOptions'=>array('class'=>'nav-header')),
			array('label'=>'TomCruise', 'url'=>$this->createUrl('site/index',array('celeb'=>'TomCruise')), 'itemOptions'=>getSeleted('TomCruise')),
		array('label'=>'Cricket', 'itemOptions'=>array('class'=>'nav-header')),
			array('label'=>'Mahendra Singh Dhoni', 'url'=>$this->createUrl('site/index',array('celeb'=>'msdhoni')), 'itemOptions'=>getSeleted('msdhoni')),
		array('label'=>'Bollywood', 'itemOptions'=>array('class'=>'nav-header')),
			array('label'=>'Amitabh Bachchan', 'url'=>$this->createUrl('site/index',array('celeb'=>'SrBachchan')), 'itemOptions'=>getSeleted('SrBachchan')),
			array('label'=>'Salman Khan', 'url'=>$this->createUrl('site/index',array('celeb'=>'BeingSalmanKhan')), 'itemOptions'=>getSeleted('BeingSalmanKhan')),
			array('label'=>'Anupam Kher', 'url'=>$this->createUrl('site/index',array('celeb'=>'AnupamPkher')), 'itemOptions'=>getSeleted('AnupamPkher')),
		array('label'=>'Social Worker', 'itemOptions'=>array('class'=>'nav-header')),
			array('label'=>'Kiran Bedi', 'url'=>$this->createUrl('site/index',array('celeb'=>'thekiranbedi')), 'itemOptions'=>getSeleted('thekiranbedi')),
		'',
		array('label'=>'Help', 'url'=>'#'),
	)
));
?>
</div>

<div style="float: left; width: 930px;">
<?php
if(isset($_GET['celeb'])){
?>	
<div class="bootstrap-widget">
	<div class="bootstrap-widget-header">
		<i class="icon-home"></i><h3>@<?php echo $_GET['celeb'];?></h3>
	</div>
	<div id="yw1" class="bootstrap-widget-content"><?php echo $this->renderPartial('twitterrender');?></div>
</div>
<?php 
}else{
	

?>
    <?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    	'heading'=>'Hello, Welcome to Hackathon!',
    )); ?>
     
    <p>In this Application, you can check category wise Twitter updates for celebrities.</p>
    
    <?php echo $this->renderPartial('technology');?>
    <?php $this->endWidget(); 
}

?>

</div>

<!-- 
<?php     
$this->widget('bootstrap.widgets.TbBox', array(
    'title' => 'Basic Box',
    'headerIcon' => 'icon-home',
    'content' => 'My Basic Content (you can use renderPartial here too :))' // $this->renderPartial('_view')
    ));
?>

-->


