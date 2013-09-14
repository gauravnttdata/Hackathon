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
	$this->widget('ext.yii-new-tweet-master.Tweets', array(
	    'id' => 'twitter-feed',
	    'csrfToken' => true, // set this to true if you enabled CSRF validation
	    'proxyController' => $this->createUrl('site/get_tweets'), // You need to specify this!
	    'username' => array($_GET['celeb']), // as you can see you can add an array of usernames
	    'cssFile' => false, // if you don't want the default CSS file
	    //'cssFile'=>Yii::app()->theme->baseUrl.'/css/tweet-master.css', // customize your twitter css file
	    'options' => array(
	        'avatar_size' => 32,
	        'template' => '{user} {text} - {time} - {reply_action} - {retweet_action} - {favorite_action}',
	        'count' => 6
	    )
	));
}else{
	

?>
    <?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    	'heading'=>'Hello, world!',
    )); ?>
     
    <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
    <p>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
	    'type'=>'primary',
	    'size'=>'large',
	    'label'=>'Learn more',
    )); ?>
    </p>
     
    <?php $this->endWidget(); 
}   
?>
</div>


