<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require 'mustache/Mustache.php';

class ci_mustache 
{
	private function get_include_contents($filename)
	{
		if(is_file($filename))
		{
			ob_start();
			include($filename);
			$contents = ob_get_contents();
			ob_end_clean();
			return $contents;
		}
		
		return $filename;
	}
	
	public function render($template, $view, $partials = null)
	{		
		// check if template is a file
		$template = $this->get_include_contents($template);
		
		$m = new Mustache;
		
		return $m->render($template, $view, $partials);
	}
}