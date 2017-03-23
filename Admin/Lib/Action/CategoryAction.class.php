<?php
class CategoryAction extends CommonAction{
	Public function index (){
		$cate=M('category')->select();
		$this->cate=recursive($cate);
		$this->display();

	}
	Public function addTop(){
		$this->display();
	}
	Public function addCate() {
		if(M('category')->data($_POST)->add()){
			$this->success('添加成功','index');
		}else{
			$this->error('添加失败');
		}
	}

	Public function addChild () {
		$this->cate = M('category')->find($this->_get('pid', 'intval'));
		$this->display();
	}
		//修改分类视图
	Public function update () {
		$this->cate = M('category')->find($this->_get('id', 'intval'));
		$this->display();
	}

	//修改分类操作
	Public function updateCate () {
		if (M('category')->save($_POST)) {
			$this->success('修改成功', 'index');
		} else {
			$this->error('修改失败');
		}
	}

	//删除分类
	Public function del () {
		$id = $this->_get('id', 'intval');
		$db = M('category');
		$cateid = $db->field(array('id', 'pid'))->select();
		$delid = get_all_child($cateid, $id);
		$delid[] = $id;

		

		if (!$db->where(array('id' => array('IN', $delid)))->delete()) {
			$this->error('删除失败');
		}

		$this->success('删除成功', U('index'));
	}
}