<?php

spl_autoload_register(function($className)
{
	$namespace = str_replace("\\","/",__NAMESPACE__);
	$className = str_replace("\\","/",$className);
	$class = _RACINE . (empty($namespace) ? "" : $namespace) . "/" . "{$className}.php";
	if (file_exists($class) && !class_exists($className, false)) {
		require_once($class);
	}
});