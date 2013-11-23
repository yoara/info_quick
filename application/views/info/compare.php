<?php require_once 'application/config/My_constants.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="<?php echo ROOT_IQ;?>/js/jquery.min.js"></script>
	
	<title>Compare</title>

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
div.info {
	width: 45%;
	float: left;
	border: 1px solid #D0D0D0;
	margin-left: 10px;
	white-space:normal;
	word-break:break-all;
}

div.history {
	float: left;
	margin-left: 10px;
	white-space:normal;
	word-break:break-all;
	width: 45%;
}

div.clear {
}
	</style>
</head>
<body>

<div id="container">
	<h1>Welcome IQ!</h1>
	<div class="info">
	<p><span>版本：</span><?php echo $info['version'];?>
		————<span>标签：</span><?php echo $info['label'];?>
	</p>
	<?php echo $info['content'];?>
	</div>
	<div class="history">
	<p><span>版本：</span><?php echo $info_history['old_version'];?>
		————<span>标签：</span><?php echo $info_history['old_label'];?>
	</p>
	<?php echo $info_history['old_content'];?>
	</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>