<?php
class ListAction extends Action{
	public function index () {
	  $id = $this->_get('id', 'intval');

		//分类列表
		$db = M('category');
		$cate = $db->where(array('pid' => $id))->select();
		$cid = only_array($cate, 'id');
		$cid[] = $id;
		if (!$cate) {
			$pid = $db->where(array('id' => $id))->getField('pid');
			$cate = $db->where(array('pid' => $pid))->select();

			if (!$cate) {
				$cate = $db->where(array('pid' => 0))->select();
				$cid = only_array($cate, 'id');
			}
		}
		$this->cate = $cate;

		
	    $db=M('question');
	    $this->wait=$db->where(array('cid'=>$this->_get('id','intval'),'solve'=>0))->limit(10)->select();

	    $this->solve=$db->where(array('cid'=>$this->_get('id','intval'),'solve'=>1))->limit(10)->select();
		$this->display();
	}
}