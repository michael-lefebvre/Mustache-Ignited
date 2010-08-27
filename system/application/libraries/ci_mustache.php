<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require 'mustache/Mustache.php';

class ci_mustache 
{
	private function get_include_contents($template)
	{
		// Build file path based on CI's structure
		$file_path = APPPATH.'/views/'.$template.'.php';
		
		if(is_file($file_path))
		{
			ob_start();
			include($file_path);
			$contents = ob_get_contents();
			ob_end_clean();
			return $contents;
		}
		
		return $template;
	}
	
	public function render($template, $view, $partials = null)
	{		
		// check if template is a file
		$template = $this->get_include_contents($template);
		
		$m = new Mustache;
		
		return $m->render($template, $view, $partials);
	}
}