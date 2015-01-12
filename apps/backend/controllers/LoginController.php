<?php
namespace Backend\Controllers;

/**
 * 简述： 后台登录。
 * 
 * <code>LoginController<code/> 继承自 <code>Phalcon\Mvc\Controller</code> 类
 * 
 * @author hongker
 * @version 1.0
 * @copyright Powerd by hongker
 * @package Backend\Controllers
 *
 */
class LoginController extends \Phalcon\Mvc\Controller {
	
	protected function initialize() {
		//给页面的标题添加前缀
		\Phalcon\Tag::setTitle('Platform | 后台登录');
		$this->view->disableLevel(\Phalcon\Mvc\View::LEVEL_MAIN_LAYOUT);
	}
	
	public function indexAction() {
		
	}
}