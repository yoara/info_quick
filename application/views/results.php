<?php require_once 'application/config/My_constants.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="<?php echo ROOT_IQ;?>/js/jquery.min.js"></script>
	
	<title>IQ results</title>

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
		function go_search(){
			$("#searchForm").submit();
		}
		function go_edit(id){
			$("#info_id").val(id);
			$("#edit_form").submit();
		}
		function showDiv(id){
			var divI = $("#"+id);
			if(divI.css("display")=="none"){
				divI.show();
			}else{
				divI.hide();
			}
		}
	</script>
</head>
<body>

<div id="container">
	<h1><a href="<?php echo ROOT_IQ_HOME;?>"><img class="searchImg" style="margin-right: 0px;" src="<?php echo ROOT_IQ;?>/images/home.png" title="返回主页" alt="返回主页"/></a>IQ For U</h1>
	<form action="<?php echo GO_SEARCH;?>" id="searchForm" method="post">
	<div id="body">
		<input class="searchBox" name="searchInput" value="<?php echo $input;?>"/><img alt="" src="<?php echo ROOT_IQ;?>/images/search.png" class="searchImg" onclick="go_search()" />
	</div>
	</form>
	
	<div id="result_i">
	<?php if($result!=GO_SEARCH_RESULT_OK){?>
		<p class="noResult">木有结果哟，来<a class="addHighLight" href="<?php echo GO_INFO_ADD;?>">添砖加瓦</a>吧:)</p>
	<?php }else{?>
		<ul>
	<?php	for ($i = 0; $i < sizeof($result_infos); $i++) {?>
		<li id="<?php echo $result_infos[$i]['info_id'];?>">
		<div class="infos">
			<div class="info">
				<p class="li_title" onclick="showDiv('<?php echo $result_infos[$i]['info_id']."div";?>')"><span>名称：</span><?php echo $result_infos[$i]['title'];?></p>
				<div style="display: none" id="<?php echo $result_infos[$i]['info_id']."div";?>"><?php 
				$__result = str_replace($input, '<span class=theKey >'.$input.'</span>', $result_infos[$i]['content']);
				echo $__result;?></div>
	    		<p class="li_label"><span>标签：</span><?php echo $result_infos[$i]['label'];?></p>
	    		<span>其他信息：</span><?php echo $result_infos[$i]['opter'];?>修改于<?php echo $result_infos[$i]['opt_time'];?>
				<span class="needEdit" onclick="go_edit('<?php echo $result_infos[$i]['info_id'];?>')">需要修改?</span>
			</div>
			<div class="history">
				<?php	for ($m = 0; $m < sizeof($result_infos[$i]['history']); $m++) {?>
					<p class="history"><?php echo $result_infos[$i]['history'][$m]['old_opter'];?>——
						<?php echo $result_infos[$i]['history'][$m]['old_opt_time'];?>
						<a class="compare" href="<?php echo INFO_COMPARE_HISTORY."/".
							$result_infos[$i]['history'][$m]['old_id']."/".
							$result_infos[$i]['history'][$m]['old_version'];?>" target="_blank">对比?</a>
					</p>
				<?php }?>
			</div>
			<div class="clear"></div>
		</div>
		</li>
	<?php }?>
		</ul>
	<?php }?>
	</div>
	<form action="<?php echo GO_INFO_ADD;?>" method="post" id="edit_form">
		<input type="hidden" name="info_id" id="info_id"/>
	</form>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>