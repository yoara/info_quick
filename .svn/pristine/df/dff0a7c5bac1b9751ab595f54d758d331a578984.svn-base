<?php require_once 'application/config/My_constants.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="<?php echo ROOT_IQ;?>/js/jquery.min.js"></script>
	
	<title>答案比对</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

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
		font-family:algerian,courier;
	}

	#body{
		margin: 100px 0px 20px 100px;
	}
	
	p.footer{
		text-align: left;
		font-size: 11px;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
		clear: both;
	}
	
	#container{
		margin: 20px 20px 0px 20px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
div.info {
	width: 80%;
	float: left;
	border: 1px solid #D0D0D0;
	margin-left: 10px;
	white-space:normal;
	word-break:break-all;
	margin-bottom: 10px;
	margin-top: 10px;
}

div.clear {
}
	</style>
</head>
<body>

<div id="container">
	<h1>答案对比</h1>
	<?php for ($i = 0; $i < sizeof($question); $i++){?>
	<div class="info">
		<p><span>
			<?php if($question[$i]['is_select']>=1){ ?>
				【选择题】
			<?php }else{?>
				【简答题】
			<?php }?>
			<?php echo $i+1; ?>.题目：</span><?php echo $question[$i]['question'];?></p>
		<p><span>标准答案：</span><?php echo $question[$i]['norma_answer'];?><br/>
			<?php echo $question[$i]['norma_answer_select'];?>
		</p>
		<p><span>您的回答：</span>
			<?php if($question[$i]['is_select']>=1){
					if($question[$i]['user_answer']!=$question[$i]['norma_answer']){?>
				<span style="color: red;"><?php echo $question[$i]['user_answer'];?></span>
			<?php }else{ 
				 echo $question[$i]['user_answer']; 
			 }}else{ 
				 echo $question[$i]['user_answer']; 
			 }?>
			<br/><?php echo $question[$i]['user_answer_select'];?>
		</p>
	</div>
	<?php }?>
	<p class="footer"><input type="button" onclick="window.history.go(-1)" value="返回"/></p>
</div>

</body>
</html>