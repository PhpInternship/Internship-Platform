<?php
namespace Frontend\Controllers;

/**
 * 简述：首页模块。
 * 
 * <code>IndexController<code/> 继承自 <code>BaseController</code> 类
 * 
 * @author hongker
 * @version 1.0
 * @copyright Powerd by hongker
 * @package Frontend\Controllers
 *
 */
class IndexController extends BaseController {
	
	/**
	 * (首页模块) 
	 * @see \Frontend\Controllers\BaseController::initialize()
	 */
	protected function initialize() {
		parent::initialize();
		\Phalcon\Tag::appendTitle('首页');
	}
	
	public function indexAction() {
		
	}
	
	/**
	 * 播放视频
	 */
	public function playAction() {
		
	}
}