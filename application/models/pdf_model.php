<?php
class pdf_model extends CI_Model
{
	
	public function __construct()
	{
		parent:: __construct();
	}

	function get_pdf($id)
	{
		$this->db->where('idval',$id);
		$this->db->select('*');
		$this->db>from('demandevalid');
		$data = $this->db->get();
		$output = '<table width= "100%" cellspacing="5" cellpadding = "5">';
		$umat = null;
		foreach ($data->result() as $row) {
			$umat = $row->uMatricule;
			$nb = 0;
			$this->db->where('uMatricule',$umat);
			$this->db->select('*');
			$this->db->from('statreliq');
			$query = $this->db->get();
			$datarel['statreliq'] = $query->result();
			foreach ($statreliq as $stat) {
				# code...
				$nb = $stat->nbreliq;
			}
			# code...
			$output .= '
			<tr>
				<td><b>Nom :  </b>'.$row->username.' </td>
				<td><b>Matricule</b>'.$row->uMatricule.'</td>
				<td><b>Nb jour restant :</b>'.$nb.'</td>
				<td><b>Nb jour :</b>'.$row->nb_jour_demande.'</td>
				<td><b>Date debut:</b>'.$row->date_debut_demande.'</td>
				<td><b>Date fin :</b>'.$row->date_fin_demande.'</td>
				<td><b>Motif :</b>'.$row->motif.'</td>
				
				
			</tr>
			';
			

		}
		$output .='</table>';
		return $output;
	}
}
?>