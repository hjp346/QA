<?php if (!defined('THINK_PATH')) exit();?>﻿
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

<script type="text/javascript">
    $(function (){

    });
var on=false;

<?php if(isset($_SESSION["uid"]) && isset($_SESSION["username"])): ?>on = true;
      var money=<?php echo ($money); endif; ?>

//选择分类

$(function (){

  var cateID = 0;
  $( 'select[name=cate-one]' ).change( function () {
    var obj = $( this );

      var pid = obj.val();
      $.getJSON("<?php echo U('getCate');?>", {pid : pid}, function (data) {
        if (data) {
          var option = '<option>-请选择-</option>';
          $.each(data, function (i, k) {
            option += '<option value="' + k.id + '">' + k.cate_name + '</option>';
          });
          obj.next().html(option).show();
        }
      }, 'json');

    cateID = obj.val();
  } );

  $( '#ok' ).click( function () {
    if (!cateID) {
      alert('请选择一个分类');
      return false;
      
    }
    $( 'input[name=cid]' ).val(cateID);

     if(!on){
    alert('未登录');
    return false;
  }
  var content=$('#ask_content').val();
  content = $.trim(content);
  if(content == ''){
    alert("提问内容不能为空");
    return false;
   
  }

  } );
//判断用户可选金币
  var opt = $( 'select[name=money_reward] option' );
  for (var i = 0; i < opt.length; i++) {
    if (opt.eq(i).val() > money) {
      opt.eq(i).attr('disabled', 'disabled');
    }
  }

});

</script>



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
<!--内容页-->
    
<div class="form-control">
  <blockquote>
      <p  class="text-success">向网友提问</p>
    </blockquote>
  <form action="<?php echo U('send');?>" method="post">
    <textarea name="ask_content" id="ask_content"></textarea></br>
     
     选择分类：<select name='cate-one'>
      <option>-请选择-</option>
      <?php if(is_array($cate)): foreach($cate as $key=>$v): ?><option value="<?php echo ($v['id']); ?>"><?php echo ($v['cate_name']); ?></option><?php endforeach; endif; ?>
    </select>
    <select name='cate-one' class='hidden'></select>
    <select name='cate-one' class='hidden'></select>
   <?php if(isset($_SESSION["uid"]) && isset($_SESSION["username"])): ?><span>我的金币：<?php echo ($money); ?></span><?php endif; ?>
    <span>悬赏</span>
    <select name="money_reward">
          <option value="0">0</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="50">50</option>
                <option value="80">80</option>
                <option value="100">100</option>
    </select>
    <input type="hidden" name="cid" value="0">
    <button type='submit' id="ok" class="btn">提交问题</button>


   </form>
</div>


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