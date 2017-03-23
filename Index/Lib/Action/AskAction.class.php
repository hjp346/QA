<?php
class AskAction extends Action{
	public function index () {
		$db=M('category');
		$this->cate=$db->where(array('pid'=>0))->select();
		if (isset($_SESSION['uid']) && isset($_SESSION['username'])) {
			$this->money = M('Index_user')->where(array('id' => session('uid')))->getField('money');
		}
		$this->display();
	}
		//异步提取子分类
	Public function getCate () {
		if (!$this->isAjax()) halt('页面不存在');

		$pid = $this->_get('pid', 'intval');
		$where  =array('pid' => $pid);

		if ($cate = M('category')->where($where)->select()) {
			echo json_encode($cate);
		} else {
			echo 0;
		}
	}
		//发布表单处理
	Public function send () {
		if (!$this->isPost()) halt('页面不存在');

		$data = array(
			'ask_content' => $this->_post('ask_content'),
			'money_reward' => $this->_post('money_reward', 'intval'),
			'ask_time' => time(),
			'uid' => session('uid'),
			'cid' => $this->_post('cid', 'intval')
			);
		
		if (M('question')->data($data)->add()) {
			$where = array('id' => session('uid'));
			$db = M('IndexUser');
			$db->where($where)->setInc('ask');
			$db->where($where)->setInc('experience', C('LV_ASK'));
			$db->where($where)->setDec('money',$data['money_reward']);

			$this->success('提问成功!',U('Index/index'));
		} else {
			$this->error('提交失败，请重试...');
		}
	}

}