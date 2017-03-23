<?php
class AnswerAction extends CommonAction{
	Public function index (){
		import('ORG.Util.Page');
		$db = M('answer');
		$count = $db->count();
		$page = new Page($count,20);
		
		$this->answer = $db->limit($page->firstRow . ',' . $page->listRows)->order('answer_time DESC')->select();
		$this->page = $page->show();
		$this->display();
	}
	//删除回答
	Public function delAnswer () {
		$id = $this->_get('id', 'intval');
		$uid = $this->_get('uid', 'intval');

		if (M('answer')->delete($id)) {

			$this->success('删除成功', U('index'));
		} else {
			$this->error('删除失败');
		}
	}

}