
<?php defined('BASEPATH') OR exit('No direct script access allowed.');
 
class Pdf extends  \Mpdf\Mpdf{
	protected $params = array();
 
    public function __construct() {
    $this->params['params']='"en-GB-x","A4","","",10,10,10,10,6,3';	
    parent::__construct($this->params);
        
    }
}  
