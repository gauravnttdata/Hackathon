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

<?php 

$this->widget('bootstrap.widgets.TbTabs', array(
		'type'=>'pills',
		'stacked'=>true,
		'tabs'=>array(
				array('label'=>'Home', 'content'=>'Home Content', 'active'=>true),
				array('label'=>'Profile', 'content'=>'Profile Content'),
				array('label'=>'Messages', 'content'=>'Messages Content'),
		),
));


$this->widget('ext.yii-new-tweet-master.Tweets', array(
    'id' => 'twitter-feed',
    'csrfToken' => true, // set this to true if you enabled CSRF validation
    'proxyController' => $this->createUrl('site/get_tweets'), // You need to specify this!
    'username' => array('narendramodi'), // as you can see you can add an array of usernames
    'cssFile' => false, // if you don't want the default CSS file
    //'cssFile'=>Yii::app()->theme->baseUrl.'/css/tweet-master.css', // customize your twitter css file
    'options' => array(
        'avatar_size' => 32,
        'template' => '{user} {text} - {time} - {reply_action} - {retweet_action} - {favorite_action}',
        'count' => 6
    )
));?>

<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>
