<?php require_once 'application/config/My_constants.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="<?php echo ROOT_IQ;?>/js/jquery.min.js"></script>
	
	<title>Welcome to IQ</title>

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
	
	p.footer{
		text-align: right;
		font-size: 11px;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 200px 20% 0px 20%;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	input.searchBox{
		border: 1px solid #D0D0D0;
		height: 30px;
		width: 80%;
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
		function go_search(){
			$("#searchForm").submit();
		}
		function go_Add(){
			$("#searchForm").attr("action","<?php echo GO_INFO_ADD;?>");
			$("#searchForm").submit();
		}
	</script>
</head>
<body>

<div id="container">
	<h1><a href="<?php echo ROOT_IQ_HOME;?>"><img class="searchImg" src="<?php echo ROOT_IQ;?>/images/home.png" title="返回主页" alt="返回主页"/></a>Welcome IQ!</h1>
	<form action="<?php echo GO_SEARCH;?>" id="searchForm" method="post">
	<div id="body">
		<input class="searchBox" name="searchInput"/>
		<img alt="查询" src="<?php echo ROOT_IQ;?>/images/search.png" class="searchImg" onclick="go_search()" title="查询"/>
		<img alt="添砖加瓦" src="<?php echo ROOT_IQ;?>/images/addA.png" class="searchImg" onclick="go_Add()" title="添砖加瓦"/>
	</div>
	</form>
	<p class="footer">
	<a href="<?php echo GO_NO_INFO;?>" ><img alt="待回答的问题" title="待回答的问题" src="<?php echo ROOT_IQ;?>/images/no_infos.jpg" class="searchImg"/></a>
	Page rendered in <strong>{elapsed_time}</strong> seconds</p>
	
	<p><a href="<?php echo GO_STUDY_ASK;?>" ><?php echo ANSWER_BUTTON;?>入口</a></p>
</div>

</body>
</html>