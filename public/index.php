<?php
use \Phalcon\Mvc\Router, Phalcon\Mvc\Application, Phalcon\DI\FactoryDefault;
/**
 * 读取配置文件
 */
$config = new \Phalcon\Config\Adapter\Ini ( "../apps/configs/config.ini" );
$di = new FactoryDefault ();
// Specify routes for modules
$di->set ( 'router', function () {
	$router = new Router ();
	$router->setDefaultModule ( "frontend" );
	$router->add ( "/admin", array (
			'module' => 'backend',
			'controller' => 'index',
			'action' => 'index' 
	) );
	$router->add ( "/admin/:controller", array (
			'module' => 'backend',
			'controller' => 1,
			'action' => 'index' 
	) );
	$router->add ( "/admin/:controller/:action", array (
			'module' => 'backend',
			'controller' => 1,
			'action' => 2 
	) );
	return $router;
} );
// 设置数据库连接
$di->set ( 'db', function () use($config) {
	$conn = new \Phalcon\Db\Adapter\Pdo\Mysql ( array (
			"host" => $config->database->host,
			"username" => $config->database->username,
			"password" => $config->database->password,
			"dbname" => $config->database->dbname,
			'charset' => $config->database->charset 
	) );
	$conn->query ( "set names utf8" ); // 变通解决办法
	return $conn;
} );
// 开启session
$di->setShared ( 'session', function () {
	$session = new \Phalcon\Session\Adapter\Files ();
	$session->start ();
	return $session;
} );
$di->set ( 'crypt', function () use($config) {
	$crypt = new \Phalcon\Crypt ();
	// 设置全局加密密钥
	$crypt->setKey ( $config->secuity->key );
	return $crypt;
}, true );
$di->set ( 'dispatcher', function () {
	// Create an EventsManager
	$eventsManager = new \Phalcon\Events\Manager ();
	// Attach a listener
	$eventsManager->attach ( "dispatch:beforeDispatchLoop", function ($event, $dispatcher) {
		$keyParams = array ();
		$params = $dispatcher->getParams ();
		// Use odd parameters as keys and even as values
		foreach ( $params as $number => $value ) {
			if ($number & 1) {
				$keyParams [$params [$number - 1]] = $value;
			}
		}
		// Override parameters
		$dispatcher->setParams ( $keyParams );
	} );
	$dispatcher = new \Phalcon\Mvc\Dispatcher ();
	$dispatcher->setEventsManager ( $eventsManager );
	return $dispatcher;
} );
/**
 * 设置cookie
 */
$di->set ( 'cookies', function () {
	$cookies = new \Phalcon\Http\Response\Cookies ();
	$cookies->useEncryption ( false );
	return $cookies;
} );
try {
	// Create an application
	$application = new Application ( $di );
	// Register the installed modules
	$application->registerModules ( array (
			'frontend' => array (
					'className' => 'Frontend\Module',
					'path' => '../apps/frontend/Module.php' 
			),
			'backend' => array (
					'className' => 'Backend\Module',
					'path' => '../apps/backend/Module.php' 
			),
			'service' => array (
					'className' => 'Service\Module',
					'path' => '../apps/service/Module.php' 
			) 
	) );
	// Handle the request
	echo $application->handle ()->getContent ();
} catch ( \Exception $e ) {
	echo $e->getMessage ();
}