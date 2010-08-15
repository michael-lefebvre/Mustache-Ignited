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
		
		return false;
	}
	
	private function is_template_file($template)
	{	
		$template_str = $this->get_include_contents($template);
		
		if($template_str)
		{
			return $template_str;
		}
		
		return $template;
	}
	
	public function render($template = null, $view = null, $partials = null)
	{
		// inlude template file as var
		//$template = $this->get_include_contents($template);
		
		// check if template is an available file
		$template = $this->is_template_file($template);
		
		$m = new Mustache;
		
		return $m->render($template, $view, $partials);
	}
}