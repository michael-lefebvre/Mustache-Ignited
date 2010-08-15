<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');


require 'mustache/Mustache.php';

class ci_mustache 
{
	private function get_include_contents($filename)
	{
		if (is_file($filename))
		{
			ob_start();
			include $filename;
			$contents = ob_get_contents();
			ob_end_clean();
			return $contents;
		}
		
		return false;
	}
	
	public function render($template = null, $view = null, $partials = null)
	{
		/*
		if ($template !== null) $this->_template = $template;
		if ($partials !== null) $this->_partials = $partials;
		if ($view !== null)     $this->_context = array($view);
		*/
		$m = new Mustache;
		
		return $m->render($template, $view, $partials);
	}
}