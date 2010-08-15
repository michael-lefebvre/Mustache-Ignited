<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include('Mustache.php');

class Chris {
    public $name = "Chris";
    public $value = 10000;

    public function taxed_value() {
        return $this->value - ($this->value * 0.4);
    }

    public $in_ca = true;
}

class Template extends Chris
{
	public function notEmpty()
	{
		return !($this->isEmpty());
	}

	public function isEmpty()
	{
		return count($this->item) === 0;
	}
}

class Complex extends Template {
	public $header = 'Colors';

	public $item = array(
		array('name' => 'red', 'current' => true, 'url' => '#Red'),
		array('name' => 'green', 'current' => false, 'url' => '#Green'),
		array('name' => 'blue', 'current' => false, 'url' => '#Blue'),
	);
}

//$string = get_include_contents('somefile.php');

function get_include_contents($filename) {
    if (is_file($filename)) {
        ob_start();
        include $filename;
        $contents = ob_get_contents();
        ob_end_clean();
        return $contents;
    }
    return false;
}




//$chris = new Chris;

$complex = new Complex;


//echo $m->render('Hello {{planet}}', array('planet' => 'World!'));



$obj = new stdClass;
$obj->name = "Chris";
$obj->value = 10000;
$obj->taxed_value = 10000 - (10000 * 0.4);
$obj->in_ca = true;
$obj->item = array(
		array('name' => 'red', 'current' => true, 'url' => '#Red'),
		array('name' => 'green', 'current' => false, 'url' => '#Green'),
		array('name' => 'blue', 'current' => false, 'url' => '#Blue'),
	);

$obj->notEmpty = true;
$obj->isEmpty = false;

//$complex->header = 'test';
$complex->item = array();

$template = get_include_contents('test-1.html'); //'examples\complex\complex.mustache');//

$m = new Mustache;
echo $m->render($template, $complex);

?>
</body>
</html>
