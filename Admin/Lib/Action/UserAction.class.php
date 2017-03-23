<?php
class UserAction extends CommonAction{
     public function index () {
     	$db = M('IndexUser');
		import('ORG.Util.Page');
		$count = $db->count();
		$page = new Page($count, 20);
		$limit = $page->firstRow . ',' . $page->listRows;
		
		$this->user = $db->where($where)->limit($limit)->select();
		
		$this->page = $page->show();
		$this->display();
     }
     public function lockUser (){
        $data = array(
			'id' => $this->_get('id', 'intval'),
			'lock' => $this->_get('lock', 'intval')
			);
		$msg = $data['lock'] ? '锁定' : '解锁';
		if (M('IndexUser')->save($data)) {
			$this->success($msg . '成功', U('index'));
		} else {
			$this->error($msg . '失败');
		}
     }
}