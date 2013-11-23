<?php require_once 'application/config/My_constants.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="<?php echo ROOT_IQ;?>/js/jquery.min.js"></script>
	
	<title>No Infos</title>

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
		text-align: right;
		font-size: 11px;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
		clear: both;
	}
	
	#container{
		margin: 200px 20px 0px 20px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	ul li {
		margin-top: 15px;
		margin-bottom: 15px;
	}
	a.add {
 	text-decoration:none;
	cursor: pointer;
	color: #FF8C00;
	}
	
	a.add:HOVER {
		font-size: 10px;
		color: #FF7F50;
	}
	p.li_title {
	border-bottom: solid 1px #C0C0C0;
}
img.searchImg{
		height:30px;
		width: 30px;
		margin-bottom: -10px;
		margin-left:10px;
		cursor: pointer;
	}
	</style>
</head>
<body>

<div id="container">
	<h1><a href="<?php echo ROOT_IQ;?>"><img class="searchImg" src="<?php echo ROOT_IQ;?>/images/home.png" title="返回主页" alt="返回主页"/></a>Welcome IQ!</h1>
		<ul>
		<?php	for ($i = 0; $i < sizeof($no_infos); $i++) {?>
			<li id="<?php echo $no_infos[$i]['no_id'];?>">
				<p class="li_title"><span>搜索字：</span><?php echo $no_infos[$i]['input'];?>
					<a class="add" href="<?php echo GO_INFO_ADD;?>" target="_blank">添砖加瓦?</a>
				</p>
			</li>
		<?php }?>
		</ul>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>