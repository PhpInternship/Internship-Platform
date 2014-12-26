<?php
namespace Frontend\Controllers;

use Models\Articles;
/**
 * 简述：博客模块。
 * 
 * <code>BlogController<code/> 继承自 <code>BaseController</code> 类
 * 
 * @author hongker
 * @version 1.0
 * @copyright Powerd by hongker
 * @package Frontend\Controllers
 *
 */
class BlogController extends BaseController {
	/**
	 * 首页
	 */
	public function indexAction() {
		$articles = Articles::find(array(
			'conditions'=>"state=1",
			'order'=>'created_at desc',
		));
		
		$this->view->setVar('articles',$articles);
	}
	
	/**
	 * 查看文章
	 */
	public function articleAction() {
		$id = $this->dispatcher->getParam(0,'int');
		
		$article = Articles::findFirst($id);
		
		$this->view->setVar('article',$article);
	}
	
}