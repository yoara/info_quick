<?php require_once "application/config/My_constants.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>IQ info</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="<?php echo ROOT_IQ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo ROOT_IQ?>/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea#p_content",
    height: 400,
    plugins: [
              "advlist autolink lists link image charmap print preview anchor",
              "searchreplace visualblocks code fullscreen",
              "insertdatetime media table contextmenu paste fullpage"
          ],
    fullpage_default_encoding: "UTF-8",
    toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image "
});
function addbox(){
	if($('#addInput').val()==''){
		alert('请输入标签名');
		$('#addInput').focus();
		return ;
	}
	$('#label_boxs').append('<input type="checkbox" checked value="'+$('#addInput').val()+'" name="labels[]"/><span onclick="deleteLabel(this)" style="cursor: pointer;color: red;">'+$('#addInput').val()+'</span>');
	$('#addInput').val('');
}
function doSubmit(){
	if($('#title').val()==''){
		alert('请输入标题');
		$('#title').focus();
		return ;
	}
	var labels = $('input[type=checkbox]:checked');
	if(labels.size()==0){
		alert('请至少勾选一项标签');
		return;
	}
	if($('#opter').val()==''){
		alert('请输入作者');
		$('#opter').focus();
		return ;
	}
	if('<?php echo $info_body['title'];?>'!=''){
		$('#info_form').attr('action','<?php echo INFO_EDIT;?>');
	}
	$('#info_form').submit();
}
function deleteLabel(obj){
	if(confirm('确定删除该标签么')){
		$('input[value='+$(obj).html()+']').remove();
		$(obj).remove();
	}
}
</script>
</head>
<body>
<div id="page_wrap" style="padding-top: 50px;">
<form method="post" action="<?php echo INFO_ADD;?>" id="info_form">
	<?php if($info_body['title']!==''){?>
		<input name="info_id" type="hidden" id="info_id" value="<?php echo $info_body['info_id'];?>"/>
	<?php }?>
	<div><label for="title" style="font-weight: bold;">标题</label>
	<input name="title" id="title" value="<?php echo $info_body['title'];?>"/></div>
	
    <textarea name="content" id="p_content"><?php echo $info_body['content'];?></textarea>
	<label style="font-weight: bold;">标签：</label><span id="label_boxs"></span>
	<input id="addInput" name="addInput" size="5"/><label for="" onclick="addbox()" style="cursor: pointer;color: blue;">增加标签</label><br/>
    
    <label for="title" style="font-weight: bold;margin-top: 20px;">作者</label>
    <input name="opter" id="opter" value="<?php echo $info_body['opter'];?>"/>
    
    <div style="margin-top: 20px;"><input type="button" value="提交" onclick="doSubmit()"/></div>
    <script type="text/javascript">
    <?php if($info_body['title']!==''){//修改
    		$labels = explode(";", $info_body['label']);
   			foreach ($labels as $value) {
				if($value!==''){
	?>
				$('#addInput').val('<?php echo $value;?>');
				addbox();
	<?php
				}
			}
    ?>
    <?php }else{//新增	?>	
    	
		$('#addInput').val('Java');
		addbox();
    	
    <?php }?>
    </script>
</form>
</div>
</body>
</html>