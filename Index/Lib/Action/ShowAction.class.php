<?php
class ShowAction extends Action{
	public function index () {
		$id = $this->_get('id', 'intval');

		//问题详细
		$ask = D('AskInfoView')->find($id);
		if (!$ask) {
			redirect(U('List/index'));
		}
		$this->ask = $ask;
       //满意回答
		$db = D('AnswerInfoView');
		$where = array('qid' => $id, 'answer.adopt' => 1);
		$this->bingo = $db->where($where)->find();
        //全部回答
		import('ORG.Util.Page');
		$where = array('qid' => $id, 'answer.adopt' => 0);
		$count = M('answer')->where($where)->count();
		$page = new Page($count, 10);
		$limit = $page->firstRow . ',' . $page->listRows;
		$answer = $db->where($where)->select();
		$an = $db->where(array('qid' => $id))->select();
		$id=array();
		foreach ($an as $key => $value) {
			$id[]=$value['id'];
		}
		
		$this->answer = $answer;
		$this->page = $page->show();
		//全部回复
		$this->reply=D('ReplyInfoView')->where(array('aid' => array('in',$id)))->select();
        //var_dump($reply);exit;

		$this->display();
	}
	//回答问题表单处理
	Public function answer () {
		if (!$this->isPost()) halt('页面不存在');
		
		$data = array(
			'answer_content' => $this->_post('answer_content'),
			'answer_time' => time(),
			'qid' => $this->_post('aid', 'intval'),
			'uid' => session('uid')
			);

		if (M('answer')->data($data)->add()) {
			M('question')->where(array('id' => $data['qid']))->setInc('answer');

			$db = M('IndexUser');
			$where = array('id' => $data['uid']);
			$db->where($where)->setInc('answer');
			$db->where($where)->setInc('exp', C('LV_ANSWER'));
			$db->where($where)->setInc('point', C('ANSWER'));
            
			$this->success('回答成功', $_SERVER['HTTP_REFERER']);
		} else {
			$this->error('回答失败，请重试...');
		}
	}
	//回复表单处理
    Public function reply (){
    	$aid = $this->_get('aid',intval);
    	$replymsg = $this->_post('replymsg');
    
    	$arr = array(
    		'aid' => $aid,
    		'uid' => $_SESSION['uid'],
    		'reply_msg' => $replymsg,
    		'reply_time' => time()

    		);
    	if(M('reply')->data($arr)->add()){
    		$this->success("回复成功！");
    	}else{
    		$this->error("回复失败，请重试...");
    	}
    }

	//采纳答题
	Public function adopt () {
		$id = $this->_get('id', 'intval');
		$qid = $this->_get('qid', 'intval');
		$uid = $this->_get('uid', 'intval');
         
		$data = array(
			'id' => $id,
			'adopt' => 1
			);

		if (M('answer')->save($data)) {
			M('question')->save(array('id' => $qid, 'solve' => 1));

			$db = M('IndexUser');

			$db->where(array('id' => $uid))->setInc('adopt');

			$db->where(array('id' => $uid))->setInc('experience', C('LV_ADOPT'));
            
			$reward = M('question')->field(array('uid', 'money_reward'))->find($qid);
			if ($reward) {
				
				$db->where(array('id' => $uid))->setInc('money', $reward['money_reward']);
			}

			$this->success('已采纳', $_SERVER['HTTP_REFERER']);
		} else {
			$this->error('采纳失败，请重试...');
		}
	}

}