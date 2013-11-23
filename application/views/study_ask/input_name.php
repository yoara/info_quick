<?php require_once 'application/config/My_constants.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="<?php echo ROOT_IQ;?>/js/jquery.min.js"></script>
	
	<title>Input Your Name</title>

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
		margin: 100px 0px 20px 50px;
	}
	
	#container{
		margin: 200px 20% 0px 20%;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	img.searchImg{
		height:30px;
		width: 30px;
		margin-bottom: -10px;
		margin-left:10px;
		cursor: pointer;
	}
	</style>
	<script type="text/javascript">
		function go_ask(){
			$("#searchForm").submit();
		}
		function go_see(){
			$("#searchForm").attr("action","<?php echo GO_SEE_ANSWER;?>");
			$("#searchForm").submit();
		}
	</script>
</head>
<body>

<div id="container">
	<h1><a href="<?php echo ROOT_IQ;?>"><img class="searchImg" src="<?php echo ROOT_IQ;?>/images/home.png" title="返回主页" alt="返回主页"/></a>Welcome IQ!</h1>
	<form action="<?php echo GO_ASK;?>" id="searchForm" method="post">
	<div id="body">
		<p><?php echo ANSWER_WORD;?></p>
		<label for="nameBox"><?php echo ANSWER_USER;?></label>
		<input class="nameBox" name="nameBox"/>
		<input type="button" value="开始<?php echo ANSWER_BUTTON;?>" onclick="go_ask()"/>&nbsp;&nbsp;&nbsp;
		<input type="button" value="<?php echo ANSWER_BUTTON;?>情况" onclick="go_see()"/>
	</div>
	</form>
</div>

</body>
</html>