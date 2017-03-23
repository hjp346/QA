<?php
class MemberAction extends Action{
	public function index () {
		$msg = M('IndexUser')->field(array('id','username','money', 'experience', 'adopt', 'answer', 'ask'))->find($this->_get('id', 'intval'));
		if (!$msg) {
			redirect(__APP__);
			die();
		}
		$this->msg = $msg;
		$this->display();
	}
	public function myask () {
		$id = $this->_get('id', 'intval');

		$this->user=M('IndexUser')->where(array('id'=>$id))->field('id,username')->find();

		//我的待解决提问
		$where = array('uid' =>$id, 'solve' => 0);
		$this->myAsk = M('question')->where($where)->order('ask_time DESC')->select();
		
		//我的已解决问题
		$where['solve'] = 1;
		$this->myAnswer = M('question')->where($where)->order('ask_time DESC')->select();
		$this->display();

	}

	public function myanswer() {
		$id = $this->_get('id', 'intval');
	    $this->user=M('IndexUser')->where(array('id'=>$id))->field('id,username')->find();
		//我的回答
		$where = array('wl_answer.uid' => $id);
		$this->myAnswer = D('question')->join('wl_answer on wl_question.id=wl_answer.qid')->distinct(true)->
		field('ask_content,ask_time,answer,wl_question.id')->where($where)->select();
       
		$this->count = D('AnswerView')->where($where)->count();
		$this->display();
	}
}