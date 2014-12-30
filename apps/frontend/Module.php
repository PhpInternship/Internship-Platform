<?php
namespace Frontend;
use Phalcon\Loader,
Phalcon\Mvc\Dispatcher,
Phalcon\Mvc\View,
Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{

    /**
     * Register a specific autoloader for the module
     */
    public function registerAutoloaders()
    {

        $loader = new Loader();

        $loader->registerNamespaces(
                array(
                        'Frontend\Controllers' => '../apps/frontend/controllers/',
                        'Models'      => '../apps/models/',
                )
        );

        $loader->register();
    }

    /**
     * Register specific services for the module
     */
    public function registerServices($di)
    {

        //Registering a dispatcher
        $di->set('dispatcher', function() {
            $dispatcher = new Dispatcher();
            $dispatcher->setDefaultNamespace("Frontend\Controllers");
            return $dispatcher;
        });

            //Registering the view component
            $di->set('view', function() {
                $view = new View();
                $view->setViewsDir('../apps/frontend/views/');
                return $view;
            });
    }
}