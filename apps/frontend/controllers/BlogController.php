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
	 * (首页模块)
	 * @see \Frontend\Controllers\BaseController::initialize()
	 */
	protected function initialize() {
		parent::initialize();
		\Phalcon\Tag::appendTitle('博客');
	}
	
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
		
		//如果文章不为空
		if($article) {
			$this->view->setVar('article',$article);
		}
		
		//否则显示404错误
		echo '404';exit;
		
	}
	
	/**
	 * 发表文章
	 */
	public function writeAction() {
		
	}
	
}