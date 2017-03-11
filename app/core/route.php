<?php
class Route extends Page404
{

    static public function CutGetRequest($uri)
    {
        if(stripos($uri, '?')){
            $route = strstr($uri, '?', true);
        }else{
            $route = $uri;
        }

        return $route;
    }

	static function start()
	{
		$page404 = new Page404();
		$controller_name = 'Main';
        $action = 'action_index';
        $id = '';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        //Redirects
        switch ($_SERVER['REQUEST_URI']){
            case '/dancers/man/':
                header('Location: /dancers/man/1');
                break;
            case '/dancers/woman/':
                header('Location: /dancers/woman/1');
                break;
            case '/dancers/page/':
                header('Location: /dancers/page/1');
                break;
        }

		// controller
		if ( !empty($routes[1]) ){
			$controller_name = Route::CutGetRequest($routes[1]);
		}

		// controller->action
		if ( !empty($routes[2]) ){
            $action = 'action_'.Route::CutGetRequest($routes[2]);
		}

        // controller->action(data)
        if ( !empty($routes[3]) ){
            $id = Route::CutGetRequest($routes[3]);
        }

        // error 404
        if(count($routes) > 4){
            $page404->error404();
        }

		// Add prefix
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;

		// include model file
		$model_file = strtolower($model_name).'.php';
		$model_path = "app/models/".$model_file;
		if(file_exists($model_path)){
			include "app/models/".$model_file;
		}

		// include controller file
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "app/controllers/".$controller_file;
		if(file_exists($controller_path)){
			include "app/controllers/".$controller_file;

            // create controller
            $controller = new $controller_name;

            if(method_exists($controller, $action) && !empty($id)){
                $controller->$action($id);
            }elseif(method_exists($controller, $action)){
                $controller->$action($id);
            }else{
                $page404->error404();
            }
		}
		else{
            $page404->error404();
		}
		
	}
}
