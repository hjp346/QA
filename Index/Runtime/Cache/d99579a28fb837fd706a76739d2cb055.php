<?php if (!defined('THINK_PATH')) exit();?>
<!--HTML head头部-->
<!DOCTYPE html>
<html>
  <head>
    <title>问答系统</title>
      <!-- Bootstrap -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/main.css">
    <script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
    <script>
    	var url = "<?php echo U('Index/checkUsername');?>";
    </script>
    <script type="text/javascript" src="__PUBLIC__/js/validate.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/zhezhao.js"></script>
</head>

  <body>
        <!--导航、搜索栏-->
 <!--导航栏-->

<ul class="nav nav-pills" style="background-color:#73C9E3;">
      <?php if(!isset($_SESSION["username"])): ?><li style="float:right">
    <a href="#" onclick="showBg2();">注册</a>
  </li>
  <li style="float:right" class="login"><a href="#" onclick="showBg1();">登录</a></li>
 <?php else: ?>
   <li style="float:right">
    <a href="<?php echo U('Index/logout');?>"><i class="icon-off"></i> 退出</a>
  </li>
  <li style="float:right" class="login"><a href="<?php echo U('Member/index',array('id'=>$_SESSION['uid']));?>"><i class="icon-user"></i> <?php echo ($_SESSION['username']); ?></a></li><?php endif; ?>
</ul>




<div class="container">





<!--搜索框-->
<div>
<span style="float:left;font-size:24px;color:black;margin-left:80px;">问答系统</span>
<form action="<?php echo U('Search/index');?>" method="post" class="form-search"  style="margin-left:350px">
  <input type="text" name="searchContent" class="input-medium search-query">
  <input type="submit" value="搜索" class="btn btn-info">
   <a  href="<?php echo U('Ask/index');?>" class="btn">提问</a>
</form>
</div>

<!--导航-->
<ul class="nav nav-pills" style="background-color:#73C9E3">
  <li>
    <a href="<?php echo U('Index/index');?>"><i class="icon-home"></i> <span>首页</span></a>

  </li>

 
</ul>
     <table class='table table-bordered'>
      <tr style="background-color:#DFF0DB">
        
          <td width="500">搜索到的问题</td>
         <td> 回答数</td>
         <td>时间</td>
        
        <?php if(is_array($ask)): foreach($ask as $key=>$v): ?><tr>
            <td width="500"><a href="<?php echo U('Show/index',array('id'=>$v['id']));?>"><?php echo ($v["ask_content"]); ?></a></td>
            <td><span><?php echo ($v["answer"]); ?></span></td>
            <td><?php echo (date("Y-m-d H:i",$v["ask_time"])); ?></td>
          </tr><?php endforeach; endif; ?>
        
      </dl>
    </table>
   <tr><td><?php echo ($page); ?></td></tr>
    <!--遮罩框（登录、注册）-->

<div id="main">
<div id="fullbg"></div>
<div id="dialog1">
<p class="close"><a href="#" onclick="closeBg1();">X</a></p>
<div style="padding:100px 100px">
    <form action="<?php echo U('Index/login');?>" method="post">
    <span>用户名</span><input type="text" name="username"><br/>
    密码<input type="password" name="pwd"><br/>
    <button class="btn btn-success">登录</button>
</form>

</div>
</div>


<div id="dialog2">
<p class="close"><a href="#" onclick="closeBg2();">X</a></p>
<div style="padding:100px 100px">
    <form action="<?php echo U('Index/register');?>" method="post" name="register">
    用户名<input type="text" name="username"><span></span><br/>
    密码<input type="password" name="pwd"><span></span><br/>
    确认密码<input type="password" name="pwded"><span></span><br/>

    <input type="hidden" value="50" name="money">
    <button class="btn btn-success">立即注册</button>
</form>

</div>
</div>




</div> 

  </body>
</html>