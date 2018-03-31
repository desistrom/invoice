<?php

class Invoice_model extends CI_model {

	public function generateInvoice(){
		$sqlSequence = "SELECT max(sequence) as sequence FROM tb_inv_generate WHERE dateGenerate = CURDATE()";
		if($this->db->query($sqlSequence)->num_rows() == 0){
			$sql = "INSERT INTO tb_inv_generate (dateGenerate,sequence) VALUES(CURDATE(),1)";
			$this->db->query($sql);
			$sql = "SELECT LPAD(sequence,6,'0') as sequence FROM tb_inv_generate WHERE dateGenerate = CURDATE()";
			$sequence = $this->db->query($sql)->row()->sequence;
			$invoice = "INV".date('dmy').$sequence;
		}else{
			$sequenceOld = (int) ($this->db->query($sqlSequence)->row()->sequence + 1);
			$sql = "INSERT INTO tb_inv_generate (dateGenerate,sequence) VALUES(CURDATE(),$sequenceOld)";
			$this->db->query($sql);
			$sql = "SELECT max(LPAD(sequence,6,'0')) as sequence FROM tb_inv_generate WHERE dateGenerate = CURDATE()";
			$sequence = $this->db->query($sql)->row()->sequence;
			$invoice = "INV".date('dmy').$sequence;
		}

		return $invoice;
	} 
}