<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.min.css" />
</head>
<body>
	<form action="<?php echo U('edit',array('id'=>1));?>" method='post'>
		<table class="table ">
			<tr>
				<th colspan='2'>经验级别规则设置</th>
			</tr>
			<tr>
				<td align='right'>登录：</td>
				<td>
					+ <input type="text" name='lv_login' value='<?php echo (C("lv_login")); ?>' class='len100'/>
				</td>
			</tr>
			<tr>
				<td align='right'>提问：</td>
				<td>
					+ <input type="text" name='lv_ask' value='<?php echo (C("lv_ask")); ?>' class='len100'/>
				</td>
			</tr>
			<tr>
				<td align='right'>回答：</td>
				<td>
					+ <input type="text" name='lv_answer' value='<?php echo (C("lv_answer")); ?>' class='len100'/>
				</td>
			</tr>
			<tr>
				<td align='right'>采纳：</td>
				<td>
					+ <input type="text" name='lv_adopt' value='<?php echo (C("lv_adopt")); ?>' class='len100'/>
				</td>
			</tr>
			<tr>
				<td colspan='8' align='center' height='60'>
					<input type="submit" class='btn btn-inverse' value='保存修改' />
				</td>
			</tr>
		</table>
	</form>
</body>
</html>