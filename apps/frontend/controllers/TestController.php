<?php
namespace Frontend\Controllers;

use Models\User;
/**
 * 简述： 测试类。
 * 
 * <code>BaseController<code/> 继承自 <code>Phalcon\Mvc\Controller</code> 类
 * 
 * @author hongker
 * @version 1.0
 * @copyright Powerd by hongker
 * @package Frontend\Controllers
 *
 */
class TestController extends \Phalcon\Mvc\Controller {
	public function indexAction() {
		var_dump(User::findFirst());
		
		//echo $this->security->getTokenKey();
		
	}
}