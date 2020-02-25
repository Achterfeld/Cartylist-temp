<?php

spl_autoload_register(function($className)
{
	$namespace = str_replace("\\","/",__NAMESPACE__);
	$arrayNamespace = explode("/", $namespace);
	foreach($arrayNamespace as $i => $name) {
		if ($name != end($arrayNamespace))
			$arrayNamespace[$i] = strtolower($name);
	}
	$namespace = join("/",$arrayNamespace);
	$className = str_replace("\\","/",$className);
	$arrayClassName = explode("/", $className);
	foreach($arrayClassName as $i => $name) {
		if ($name != end($arrayClassName))
			$arrayClassName[$i] = strtolower($name);
	}
	$className = join("/",$arrayClassName);
	$class = _RACINE . (empty($namespace) ? "" : $namespace) . "/" . "{$className}.php";
	if (file_exists($class) && !class_exists($className, false)) {
		require_once($class);
	}
});