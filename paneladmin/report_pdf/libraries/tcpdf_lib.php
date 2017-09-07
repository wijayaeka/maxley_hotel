<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class tcpdf_lib
{
   function tcpdf_lib()
   {
		require_once('tcpdf/config/lang/eng.php');
		require_once('tcpdf/tcpdf.php');
   }
}
?>