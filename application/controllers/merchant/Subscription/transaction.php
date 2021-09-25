<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		$this->pmodel->isloggedin();
	}
	public function confirm($id)
	{
		$accno = $this->session->userdata('pu_accno'); //Retriving session Data
		//To generate the reference id
		$ref = $this->db->select_max('pt_refid');
		$ref = $this->db->get('p_transaction');
		$row = $ref->row();
		if ($ref->num_rows() > 0) {
			$a = $row->pt_refid;
			$a++;
		} else {
			$a = '11101';
		}

		//get the table: p_package
		$query = $this->db->get_where('p_package', array('pp_id' => $id))->row();
		$amount = $query->pp_price;
		//create an array containd id, accno, refid, amount
		$data = array(
			'pu_accno' => $accno,
			'pt_refid' => $a,
			'pt_amount' => $amount
		);

		//Insert the data of an array into transaction Table
		$query1 = $this->db->insert('p_transaction', $data);
		if ($query1) {
			$ref = $this->db->get_where('p_transaction', array('pu_accno' => $accno,'pt_amount'=>$amount))->row();
			$ref1 = $ref->pt_refid;
			$p1= $ref->pt_id;
			
			$this->load->helper('date');
			$date = strtotime("+7 day",time());
			
			$data1 = array(
				'pp_id' => $id,
				'pu_accno' => $accno,
				'pt_refid' => $ref1,
				'pt_id'=> $p1,
				'ps_package_startdate'=> date('Y-m-d H:i:s'),
				'ps_package_enddate'=> date('Y-m-d H:i:s',$date)
			);

		}
		
		//Insert the data of an array into subscription Table
		$sub = $this->db->insert('p_subscription', $data1);
		if ($sub) {

			$this->session->set_flashdata("text", "Subscribed Successfully");
			$this->session->set_flashdata('alert', "Success");
		} else {
			$this->session->set_flashdata("text", "Subscribed Unsuccessful");
			$this->session->set_flashdata('alert', "danger");
			redirect('merchant/subscription/purchase', 'refresh');
		}
		redirect('/merchant/subscription/transaction/history');
	}
	public function history(){
		$this->load->view('/panel/merchantpanel/subscription/history');
	}
}
