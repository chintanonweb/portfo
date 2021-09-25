<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faqs extends CI_Controller {

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
	public function index()
	{
		$this->pmodel->isloggedin();
		$this->load->view('/panel/adminpanel/front_manage/faqs');
	}
	public function faqadd()
	{
		$fa = array('pf_srno'=>$this->input->post('snumber'),
					'pf_question'=>$this->input->post('queston'),
					'pf_answer'=>$this->input->post('answer'),
					'pf_flag'=>$this->input->post('flag'));
		$f = $this->db->insert('p_faqs',$fa);

		if($f)
		{
			$this->pmodel->noerror_message('FAQs Added Successfully');
			redirect('/admin/front_manage/faqs','refresh');
		}
		else{
			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/admin/front_manage/faqs','refresh');
		}
	}
	public function faqupdate()
	{
		$fupdate = array(
		'pf_question'=>$this->input->post('queston'),
		'pf_answer'=>$this->input->post('answer'));
		
		$this->db->where('pf_id',$this->input->post('id'));
		$fu = $this->db->update('p_faqs',$fupdate);

		if($fu){
			$this->pmodel->noerror_message('FAQs Updated Successfully');
			redirect('/admin/front_manage/faqs','refresh');
		}
		
		else{
			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/admin/front_manage/faqs','refresh');
		}
	}
	
}