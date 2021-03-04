<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pdf extends CI_Controller
{

	public function __construct()
	{

		parent:: __construct();		

	}
	public function detailspdf($id)
	{
		$this->db->select('*');

		$this->db->where('idval',$id);
		$this->db->from('demandevalid');
		$query = $this->db->get();
		$dataa['demande']= $query->result();
		$umat = null;
		$usnam = null;
		$dated = null;
		$datef = null;
		$nbj = 0;
		$nb = 0;
		$motif = null;

		foreach ($query->result() as $dem ) {
			# code...
			$umat = $dem->uMatricule;
			$usnam = $dem->username;
			$dated = $dem->date_debut_demande;
			$datef = $dem->date_fin_demande;
			$nbj = $dem->nb_jour_demande;
			$motif = $dem->motif;
		}
		$this->db->select('*');

		$this->db->where('uMatricule',$umat);
		$this->db->from('statreliq');
		$queryR = $this->db->get();
		$dataR['statreliq'] = $queryR->result();
		/*foreach ($queryR->result() as $stat ) {
			# code...
			$nb = $stat->nbreliq;
		}*/
		var_dump($dataa);
		var_dump($nb);
		$mpdf = new \Mpdf\Mpdf();
		//$mpdf->DefHTMLFooterByName
		//$mpdf->WriteHTML('<h1>hello bryan & jacks</h1>');
		$html = $this->load->view('demande/pdfview',$dataa + $dataR,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output();

		
	}
	public function pdf_list_decision()
	{
		$this->db->select('*');
		$this->db->from('statvalid');
		$queryR = $this->db->get();
		$dataR['statvalid'] = $queryR->result();
		
		$listuser = new \Mpdf\Mpdf();
		
		$html = $this->load->view('pdf/pdf_list_decision', $dataR,true);
		$listuser->WriteHTML($html);
		$listuser->Output();
		//$this->load->view('pdf/pdf_list_decision');
	}
	public function pdf_list_recupOff()
	{
		$this->db->select('*');
		$this->db->from('recupoffval');
		$queryR = $this->db->get();
		$dataR['recupoffval'] = $queryR->result();
		
		$listuser = new \Mpdf\Mpdf();
		
		$html = $this->load->view('pdf/pdf_list_recupOff', $dataR,true);
		$listuser->WriteHTML($html);
		$listuser->Output();
		//$this->load->view('pdf/pdf_list_recupOff');

	}
	public function pdf_list_user()
	{
		$this->db->select('*');
		$this->db->from('user');
		$queryR = $this->db->get();
		$dataR['user'] = $queryR->result();
		
		$listuser = new \Mpdf\Mpdf();
		
		$html = $this->load->view('pdf/pdf_list_user', $dataR,true);
		$listuser->WriteHTML($html);
		$listuser->Output();
		//$this->load->view('pdf/pdf_list_user');
	}
}
?>