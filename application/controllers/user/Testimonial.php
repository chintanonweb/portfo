<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends CI_Controller {

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
		$this->load->view('/panel/userpanel/testimonial');
	}
	public function testimonialadd()
	{
		$testi = array('pu_accno'=>$this->session->userdata('pu_accno'),
						'put_desc'=>$this->input->post('desc'),
						'put_flag'=>$this->input->post('flag'));
		$add = $this->db->insert('pu_testimonial',$testi);

		if($add)
		{
			$this->pmodel->noerror_message('Testimonial Added Successfully');
			redirect('/user/testimonial/','refresh');
		}
		else
		{
			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/user/testimonial/','refresh');
		}
	}
	public function testimonialupdate()
	{
		$tupdate = array('put_desc'=>$this->input->post('desc'));
		$this->db->where('put_id',$this->input->post('id'));
		$ah = $this->db->update('pu_testimonial',$tupdate);
		if($ah)
		{
			$this->pmodel->noerror_message('Testimonial Updated Successfully');
			redirect('/user/testimonial/','refresh');
		}
		else
		{
			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/user/testimonial/','refresh');
		}
	}
}