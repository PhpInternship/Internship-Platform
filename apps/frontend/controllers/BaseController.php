<?php
namespace Frontend\Controllers;

/**
 * 简述： 基本类。
 * 
 * <code>BaseController<code/> 继承自 <code>Phalcon\Mvc\Controller</code> 类
 * 
 * @author hongker
 * @version 1.0
 * @copyright Powerd by hongker
 * @package Frontend\Controllers
 *
 */
class BaseController extends \Phalcon\Mvc\Controller {
	
	/**
	 * 模块名称
	 * @var String
	 */
	protected $controller;
	
	/**
	 * 初始化处理
	 */
	protected function initialize() {
		//给页面的标题添加前缀
	
		$this->view->setVar("controller",$this->controller);
		//设置模板
		$this->view->setTemplateAfter('common');
	
	
	
	}
	
	/**
	 * 获取模块名称
	 * @param unknown $dispatcher
	 */
	public function beforeExecuteRoute($dispatcher) {
		$this->controller = $dispatcher->getControllerName();
	}
}