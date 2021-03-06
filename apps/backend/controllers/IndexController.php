<?php
namespace Backend\Controllers;

/**
 * 简述：首页模块。
 * 
 * <code>IndexController<code/> 继承自 <code>BaseController</code> 类
 * 
 * @author hongker
 * @version 1.0
 * @copyright Powerd by hongker
 * @package Backend\Controllers
 *
 */
class IndexController extends BaseController {
	
	/**
	 * (首页模块)
	 * @see \Backend\Controllers\BaseController::initialize()
	 */
	protected function initialize() {
		parent::initialize();
		\Phalcon\Tag::appendTitle('后台首页');
	}
	
	public function indexAction() {
		echo 'hello';
	}
	
}