<?php
class AskAction extends CommonAction{
	Public function index (){
		import('ORG.Util.Page');
		$db = M('question');
		$count = $db->count();
		$page = new Page($count, 10);
		$limit = $page->firstRow . ',' . $page->listRows;
		$this->ask = $db->limit($limit)->order('ask_time DESC')->select();
		$this->page = $page->show();
		$this->display();
	}
	

	//删除问题
	Public function delAsk () {
		$id = $this->_get('id', 'intval');
		$askinfo = M('question')->field(array('uid', 'solve'))->find($id);

		if (D('AskRelation')->relation(true)->delete($id)) {
			$db = M('Index_user');
			$db->where(array('id' => $askinfo['uid']))->setDec('money', C('DEL_ASK'));

			if ($askinfo['solve']) {
				$where = array('qid' => $id, 'adopt' => 1);
				$answerUid = M('answer')->where($where)->getField('uid');
				$db->where(array('id' => $answerUid))->setDec('money', C('DEL_ADOPT_ANSWER'));
				$db->where(array('id' => $askinfo['uid']))->setDec('money', C('DEL_ADOPT_ASK'));
			}

			$this->success('删除成功', U('index'));
		} else {
			$this->error('删除失败，请重试...');
		}

		
	}
}