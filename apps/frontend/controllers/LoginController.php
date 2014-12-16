<?php
namespace Frontend\Controllers;

/**
 * 简述：登录模块。
 * 
 * <code>LoginController<code/> 继承自 <code>\Phalcon\Mvc\Controller</code> 类
 * 
 * @author hongker
 * @version 1.0
 * @copyright Powerd by hongker
 * @package Frontend\Controllers
 *
 */
class LoginController extends \Phalcon\Mvc\Controller {
	/**
	 * 显示登录页面
	 */
	public function indexAction() {
		
	}
	
	/**
	 * 验证用户
	 */
	public function authAction() {
		echo 'auth';
	}
}