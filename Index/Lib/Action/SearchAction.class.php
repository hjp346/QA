<?php
class SearchAction extends Action{
	public function index (){
		
			
			$searchContent=$this->_post('searchContent');
			import('ORG.Util.Page');
			$count=M('question')->where(array('ask_content'=>array('like',"%$searchContent%")))->count();
			$page = new Page($count,10);
		    $limit = $page->firstRow . ',' . $page->listRows;
		    $this->ask=M('question')->where(array('ask_content'=>array('like',"%$searchContent%")))->limit($limit)->select();
		    $this->page = $page->show();
			$this->display();

			
		}
}