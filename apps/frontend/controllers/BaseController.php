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
	 * 使用模板
	 */
	public function initialize()
	{
		$this->view->setTemplateAfter('common');
	}
}