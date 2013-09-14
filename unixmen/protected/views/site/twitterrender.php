<?php
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
				'count' => 12
		)
));
?>