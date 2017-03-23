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
<script type="text/javascript">
  var on=false;

<?php if(isset($_SESSION["uid"]) && isset($_SESSION["username"])): ?>on = true;<?php endif; ?>

  $(function (){
    $('.reply').click(
           function (){
            $(this).next().show();
           }
      );
      $('#rp').click(
         function (){
          if(!on){
            alert("未登录！");
            return false;
          }

         } 
      );
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
<div class="row-fluid">
    <div class="span9">
      <!--Sidebar content-->
        <div class="answer-info">
          <blockquote>
          <?php if(!$ask['solve']): ?><p class="text-error">未解决<p>
          <?php else: ?>
             <p class="text-success">已解决<p><?php endif; ?>
            </blockquote>
          <h6><pre><?php echo ($ask["ask_content"]); ?></pre></h6><br>
           <div style="font-size:14px;">
          <span><a href="<?php echo U('Member/index',array('id'=>$ask['uid']));?>"><?php echo ($ask["username"]); ?></a></span> <span style="margin-left:20px;">悬赏:<?php echo ($ask["money_reward"]); ?>金币</span> <span style="margin-left:20px;"><?php echo (time_format($ask["ask_time"])); ?></span>
          </div>
        </div>
        <?php if(isset($_SESSION['username']) && !$ask["solve"] && $_SESSION['uid'] != $ask["uid"] ): ?><div class="my-answer" style="margin-top:40px;">
          <blockquote>
            <p>我来回答</p>
          </blockquote>
          <form action="<?php echo U('answer');?>" method="post">
            <textarea name="answer_content" style="width:600px;height:150px;"></textarea><br>
            
           <div style="padding-left:520px; padding-top:5px;">
           <input type="hidden" name="aid" value="<?php echo ($ask["id"]); ?>">
            <input type="submit" class="btn btn-success" value="提交回答">
      
          </div> 
          </form>
        </div><?php endif; ?>
      <?php if($bingo): ?><div class="true-answer" style="margin-top:40px;">
          <blockquote><p class="text-success">满意回答</p></blockquote>
          <div style="font-size:14px;">
          

     
           <h5><a href="<?php echo U('Member/index',array('id'=>$bingo['uid']));?>"><?php echo ($bingo["username"]); ?></a></h5>

    
           <span style="margin-left:18px;color:green;font-size:14px;"><pre><?php echo ($bingo["answer_content"]); ?></pre></span>
           <span style="margin-left:18px;font-size:14px;">(<?php echo (time_format($bingo["answer_time"])); ?>)</span>
           </div>
           <?php if(is_array($reply)): foreach($reply as $key=>$value): if($value['aid'] == $bingo['id']): ?><br>
          <a href="<?php echo U('Member/index',array('id'=>$value['uid']));?>"><?php echo ($value["username"]); ?></a><span style="margin-left:5px;">回复:</span> <span style="margin-left:10px;color:green;"><?php echo ($value["reply_msg"]); ?> </span>(<?php echo (time_format($value["reply_time"])); ?>)<?php endif; endforeach; endif; ?>
      </div><?php endif; ?>
        <div class="all-answer" style="margin-top:40px;">
          <blockquote><p>全部回答</p></blockquote>
          <ul>
            <li>
          <div >
            <?php if(is_array($answer)): foreach($answer as $key=>$v): ?><pre><h5><a href="<?php echo U('Member/index',array('id'=>$v['uid']));?>"><?php echo ($v["username"]); ?></a></h5><span style="margin-left:10px;"><?php echo ($v["answer_content"]); ?></span><span  style="color:blue;">(<?php echo (time_format($v["answer_time"])); ?>)</span></pre>
          <button class="reply btn">回复</button> <form action="<?php echo U('Show/reply',array('aid'=>$v['id']));?>" method="post" style="display:none;">
             <textarea name="replymsg"></textarea><br>
             <input type="submit" value="提交" id="rp" class="btn">
           </form></span>
           <?php if(is_array($reply)): foreach($reply as $key=>$vv): if($vv['aid'] == $v['id']): ?><br>
          <a href="<?php echo U('Member/index',array('id'=>$vv['uid']));?>"><?php echo ($vv["username"]); ?></a><span style="margin-left:5px;">回复:</span> <span style="margin-left:10px;color:green;"><?php echo ($vv["reply_msg"]); ?> </span>(<?php echo (time_format($vv["reply_time"])); ?>)<?php endif; endforeach; endif; ?>
         
           
           <br/>
           <?php if(isset($_SESSION['username']) && $_SESSION['uid'] == $ask["uid"] && !$ask["solve"] ): ?><a href="<?php echo U('adopt', array('id' => $v['id'], 'qid' => $ask['id'], 'uid' => $v['uid']));?>" class="btn">采纳</a><?php endif; endforeach; endif; ?>
        
          </div>
          
        </li>
      </ul>
        </div>
         
        


    </div>

    <div class="span3" >
      <!--Body content-->


      <div>



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