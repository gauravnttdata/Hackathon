
<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
		'title' => 'Technology used in this project is as below.',
		'headerIcon' => 'icon-th-list',
		// when displaying a table, if we include bootstra-widget-table class
// the table will be 0-padding to the box
		'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
<table class="table">
<thead>
<tr>
<th>#</th>
<th>Technology</th>
<th>Why used?</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td>1</td><td>Vagrant</td><td>To Setup virtual Ubuntu environment in windows machine.</td>
</tr>
<tr class="even">
<td>2</td><td>Virtualbox</td><td>To running Ubuntu Machine.</td>
</tr>
<tr class="odd">
<td>3</td><td>Ubuntu 12.04</td><td>To setup the project in production like environment.</td>
</tr>
<tr class="even">
<td>4</td><td>XAMPP</td><td>To Deploy a PHP project</td>
</tr>
<tr class="odd">
<td>5</td><td>Yii Framework</td><td>Easy to install, MVC architecture</td>
</tr>
<tr class="even">
<td>6</td><td>Yii Booster</td><td>To Boost UI of project.</td>
</tr>
<tr class="odd">
<td>7</td><td>yii-new-tweet-master</td><td>Its a extention to use Tweeter API.</td>
</tr>
<tr class="even">
<td>8</td><td>PHP</td><td>To Run Yii Framework.</td>
</tr>

<tr class="odd">
<td>9</td><td>JSON</td><td>To render twitter updates as JSON object.</td>
</tr>
	<tr class="even">
		<td>10</td><td>AJAX</td><td>To render update asynchoronuosly.</td>
	</tr>
	
<tr class="odd">
<td>11</td><td>JQuery</td><td>To enhance UI and use Ajax.</td>
</tr>
<tr class="even">
<td>12</td><td>Eclipse</td><td>Development IDE</td>
</tr>

</tbody>
</table>
<?php $this->endWidget();?>