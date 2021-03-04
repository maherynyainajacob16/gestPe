<?php
if (!defined('BASEPATH')) exit('No direct script access allowed'); 
require_once 'dompdf/autoload.inc.pdf';
/**
* 
*/
use Dompdf\Dompdf;
class Pdf extends Dompdf
{
	
	public function __construct()
	{
		# code...
		parent::__construct();
	}
}
?> 