<?php
namespace Frontend\Controllers;

use Models\Articles;
/**
 * 简述：关于我们。
 * 
 * <code>AboutController<code/> 继承自 <code>BaseController</code> 类
 * 
 * @author hongker
 * @version 1.0
 * @copyright Powerd by hongker
 * @package Frontend\Controllers
 *
 */
class AboutController extends BaseController {
	/**
	 * (首页模块)
	 * @see \Frontend\Controllers\BaseController::initialize()
	 */
	protected function initialize() {
		parent::initialize();
		\Phalcon\Tag::appendTitle('关于我们');
	}
	/**
	 * 首页
	 */
	public function indexAction() {
		
	}
	
	
	
}