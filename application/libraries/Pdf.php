<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * CodeIgniter PDF Library
 *
 * Generate PDF's in your CodeIgniter applications.
 *
 * @package			CodeIgniter
 * @subpackage		Libraries
 * @category		Libraries
 * @author			Chris Harvey
 * @license			MIT License
 * @link			https://github.com/chrisnharvey/CodeIgniter-PDF-Generator-Library
 */

require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');
use Dompdf\Dompdf;
class Pdf {
	public function generate($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = "portrait")
	{
	  $dompdf = new DOMPDF();
	  $dompdf->loadHtml($html);
	  $dompdf->setPaper($paper, $orientation);
	  $dompdf->render();
	  if ($stream) {
		  $dompdf->stream($filename.".pdf", array("Attachment" => 0));
	  } else {
		  return $dompdf->output();
	  }
	}
  }