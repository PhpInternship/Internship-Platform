<?php
namespace Frontend\Controllers;

use Models\Passwords;
use Models\Users;
use Models\Managers;
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
	protected function initialize() {
		//给页面的标题添加前缀
		\Phalcon\Tag::setTitle('Platform | 登录');
	}
	
	/**
	 * 显示登录页面
	 */
	public function indexAction() {
		
	}
	
	/**
	 * 验证用户
	 */
	public function authAction() {
		if ($this->request->isPost()) {
            if ($this->security->checkToken()) {
                //The token is ok
                $password = $this->request->getPost('pass','string');
                $username = $this->request->getPost('name','string');
                
                if($this->_checkUser($username,$password)) {
                	$type = $this->_getUserType($username);
                	
	                if($type==0) {
						//普通用户
	                	$user = Users::findFirst("username='$username'");
	                	$this->session->set('id',$user->id); //将用户id存入session
	                	$this->session->set('username',$user->username); //用户名
	                	$this->response->redirect('/index',true);
					}elseif($type==1) {
						//企业用户
						$manager = Managers::findFirst("username='$username'");
						$this->session->set('id',$manager->id); //将用户id存入session
						$this->session->set('username',$manager->username); //用户名
						$this->response->redirect('/index',true);		
					}elseif($type==2) {
						//管理员
						return '管理';
					}
                	
                	
                	//跳转
                }else {
                	 
                	$this->dispatcher->forward(array(
                			'action' => 'index',
                	));
                }
            }else {
            	$this->flashSession->error("请勿重复登录");
            	
            	$this->dispatcher->forward(array(
            			'action' => 'index',
            	));
            }
        }
	}
	
	
	
	/**
	 * 检测用户是否合法
	 * @param unknown $username 用户名
	 * @param unknown $password 密码
	 * @return boolean 合法返回true,失败返回false
	 */
	private function _checkUser($username,$password) {
		if($this->_checkUserExist($username)) {
			if($this->_checkPassword($username,$password)) {
				return true;
			}else {
				$this->flashSession->error("登录失败,密码错误");
			}
		}else {
			$this->flashSession->error("登录失败,该用户不存在。请先注册");
		}
		
		return false;
	}
	
	/**
	 * 检测用户是否存在
	 * @param unknown $username 用户名
	 * @return boolean 存在返回true,否则返回false
	 */
	private function _checkUserExist($username) {
		if(Passwords::findFirst("username='$username'")) {
			return true;
		}
		
		return false;
	}
	
	/**
	 * 检测密码是否正确
	 * @param unknown $username 用户名
	 * @param unknown $password 密码
	 * @return boolean 合法返回true,失败返回false
	 */
	private function _checkPassword($username,$password) {
		$true_password = Passwords::findFirst("username='$username'")->password;
		
		if($this->security->checkHash($password,$true_password)) {
			return true;
		}
		
		return false;
		
	}
	
	/**
	 * 查看用户类型
	 * @param unknown $username 用户名
	 * @return int 返回用户类型
	 */
	private function _getUserType($username) {
		return Passwords::findFirst("username='$username'")->type;
	}
	
	/**
	 * 退出登录
	 */
	public function logoutAction() {
		//删除session
		$this->session->destroy();
		$this->response->redirect('/index',true);
	}
}
