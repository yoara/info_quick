<?php require_once 'application/config/My_constants.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="<?php echo ROOT_IQ;?>/js/jquery.min.js"></script>
	<title>Questions</title>
	<style type="text/css">
::selection {
	background-color: #E13300;
	color: white;
}

::moz-selection {
	background-color: #E13300;
	color: white;
}

::webkit-selection {
	background-color: #E13300;
	color: white;
}

body {
	background-color: #fff;
	margin: 40px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
}

a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h1 {
	color: #444;
	background-color: transparent;
	font-size: 19px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}

#body {
	margin: 100px 0px 20px 30px;
}

p.footer {
	text-align: right;
	font-size: 11px;
	line-height: 32px;
	padding: 0 10px 0 10px;
	margin: 20px 0 0 0;
}

#container {
	margin: 0px 20% 0px 0px;
	border: 1px solid #D0D0D0;
	-webkit-box-shadow: 0 0 8px #D0D0D0;
}

input.searchBox {
	border: 1px solid #D0D0D0;
	height: 30px;
	width: 80%;
	font-style: italic;
	padding-left: 10px;
}

img.searchImg {
	height: 30px;
	width: 30px;
	margin-bottom: -10px;
	margin-right: 100px;
	margin-left: 10px;
	cursor: pointer;
}

#result_i {
	margin: 50px 0px 20px 0px;
}

p.noResult {
	margin-left: 20px;
	font-family: sans-serif;
	font-size: 30px;
}

a.addHighLight {
	cursor: pointer;
	color: #FF8C00;
}

a.addHighLight:HOVER {
	font-size: 50px;
	color: #FF7F50;
}

span.needEdit {
	margin-left: 20px;
	cursor: pointer;
	color: #FF8C00;
}

span.needEdit:HOVER {
	font-size: 15px;
	color: #FF7F50;
}

a.compare {
 	text-decoration:none;
	cursor: pointer;
	color: #FF8C00;
}

a.compare:HOVER {
	font-size: 10px;
	color: #FF7F50;
}

div.infos {
	width: 95%; border : solid 1px #C0C0C0;
	-webkit-box-shadow: 0 0 8px #C0C0C0;
	border: solid 1px #C0C0C0;
}

div.info {
	width: 70%;
	float: left;
	margin-left: 10px;
}

div.history {
	float: right;
	margin-right: 10px;
}

div.clear {
	clear: both;
}

ul {
	list-style-type: none;
	margin-left: -30px;
}

ul li {
	margin-top: 15px;
	margin-bottom: 15px;
}

p.li_title {
	border-bottom: solid 1px #C0C0C0;
	cursor: pointer;
}

p.li_label {
	border-top: solid 1px #C0C0C0;
}

p.history {
	margin-top: 1px;
	margin-bottom: 1px;
}
span.theKey {
	color: red;
	font-weight: bold;
}
</style>
	<script type="text/javascript">
		function go_answer(){
			var answer = "";
			<?php	
			for ($i = 0; $i < sizeof($question); $i++) { ?>
				var indexAnswer = "";
				<?php if($question[$i]['is_select']==1){ ?>
				var radio_<?php echo $question[$i]['id'];?> = $('input[name=radio' + <?php echo $question[$i]['id']; ?> + ']:checked');
				indexAnswer = radio_<?php echo $question[$i]['id'];?>.val();
				<?php }else if($question[$i]['is_select']==2) {?>
				var radio_<?php echo $question[$i]['id'];?> = $('input[name=checkbox' + <?php echo $question[$i]['id']; ?> + ']:checked');
				radio_<?php echo $question[$i]['id'];?>.each(function(){
					indexAnswer = indexAnswer + $(this).val();
				});
				<?php }else{?>
				var radio_<?php echo $question[$i]['id'];?> = $('#text' + <?php echo $question[$i]['id']; ?>);
				indexAnswer = radio_<?php echo $question[$i]['id'];?>.val();
				<?php }?>
				if(indexAnswer==""){
					indexAnswer = "没有答题";
				}
				if(answer != "")	answer = answer + "^";
				answer = answer + "<?php echo $question[$i]['id'];?>" + "~" +indexAnswer;
			<?php }?>
			if(confirm("确认提交么？")){
				$("#valueBox").val(answer);
				$("#answerForm").submit();
			}
		}
	</script>
</head>
<body>

<div id="container">
	<h1><a href="<?php echo ROOT_IQ;?>"><img class="searchImg" style="margin-right: 0px;" src="<?php echo ROOT_IQ;?>/images/home.png" title="返回主页" alt="返回主页"/></a>IQ For U</h1>
	<form action="<?php echo GO_ANSWER;?>" id="answerForm" method="post">
	<input type="hidden" name="nameBox" value="<?php echo $input;?>"/>
	<input type="hidden" id="valueBox" name="valueBox"/>
	<div id="result_i">
	<ul>
	<?php	for ($i = 0; $i < sizeof($question); $i++) {?>
		<li>
		<div class="infos">
			<p class="li_title"><?php echo $i+1; ?>.<?php echo $question[$i]['question'];?></p>
			<?php	if($question[$i]['is_select']==1){
				for ($m = 0; $m < sizeof($question[$i]['select']); $m++) {?>
				<p class="history">
					<input type="radio" name="radio<?php echo $question[$i]['id'];?>"
						<?php if($m == 0)	echo " checked ";?>
						value="<?php echo $question[$i]['select'][$m]['select_value'];?>"
					/><?php echo $question[$i]['select'][$m]['select_answer'];?>
				</p>
			<?php }
			}else if($question[$i]['is_select']==2){
				for ($m = 0; $m < sizeof($question[$i]['select']); $m++) {?>
				<p class="history">
					<input type="checkbox" name="checkbox<?php echo $question[$i]['id'];?>"
						<?php if($m == 0)	echo " checked ";?>
						value="<?php echo $question[$i]['select'][$m]['select_value'];?>"
					/><?php echo $question[$i]['select'][$m]['select_answer'];?>
				</p>
			<?php }}else{?>
				<p class="history"><textarea rows="5" cols="80" id="text<?php echo $question[$i]['id'];?>"></textarea></p>
			<?php }?>
		</div>
		</li>
	<?php }?>
	</ul>
	</div>
	</form>
	<p class="footer"><input type="button" onclick="go_answer()" value="回答完毕"/></p>
</div>

</body>
</html>