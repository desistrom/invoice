<?php

Class Menu extends CI_Controller  {
	var $data = array();
	public function __construct(){
		parent::__construct();
	}


	public function index(){

		############## BACA DISINI CARA LOAD VIEW ####################################
    	/*$this->ciparser->new_parse($a,$b,$c,$d);
    	$a = "template yang di load";
    	$b = "modules_namauser_namamodul";
    	$c = "halaman konten yang akan dimasukkan ke template";
    	$d = "data yang diparsing ke view";*/
        $this->ciparser->new_parse('template','modules_dika_menuresponsive', 'list_paket_layout',$this->data);
	}	
}