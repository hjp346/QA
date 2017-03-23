<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
        
        //分类栏目
       $db = M('category');
       $cate = $db->where(array('pid' => 0))->select();
       foreach ($cate as $k => $v) {
                $cate[$k]['child'] = $db->where(array('pid' => $v['id']))->select();
            }
      $this->cate=$cate;
        //待解决问题
      $db=M('question');
        
      $this->wait=$db->where(array('solve'=>0))->limit(5)->order('ask_time DESC')->select();

        //已解决问题
          
      $this->solve=$db->where(array('solve'=>1))->limit(5)->select();
          //
      $db=M('IndexUser');
      $this->info=$db->where(array('id'=>$_SESSION['uid']))->field('experience,money')->find();
      $this->level=exp_to_level($this->info['experience']);
           //热门用户
      $this->user=M('IndexUser')->limit(10)->order('adopt DESC')->select();
      $this->display();

         


    }
    //注册表单
    public function register(){


        $db = D('IndexUser');
        $_POST['pwd']=$this->_post('pwd','md5');
        if (!$db->create()) {
            $this->error($db->getError());
        }
        
        if (!$uid = $db->add()) $this->error('注册失败，请重试...');
       
      	$this->success('注册成功！','index/index');
    }

    //异步验证用户名
    public function checkUsername(){
        
        
        $where = array('username' => $this->_post('username'));
        if (M('IndexUser')->where($where)->getField('id')) {
            echo 0;
        } else {
            echo 1;
        }
    }



    //登录表单
    public function login() {
        $db = M('IndexUser');
        $user = $db->where(array('username' => $this->_post('username')))->find();
       
        if ($user['pwd'] != $this->_post('pwd','md5')) {
            $this->error('帐号或密码错误');
        }
        if($user['lock']){
            $this->error('用户被锁定');
        }
        $_SESSION["username"]=$user['username'];
        $_SESSION['uid']=$user['id'];
        $this->success('登录成功！','index/index');
    }
    //退出登录
    Public function logout () {
        session_unset();
        session_destroy();
        redirect(__APP__);
    }
}