<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

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
		$this->load->view('/contact');
	}
	public function contactinfo()
	{
		$inquiry = array('pi_name' => $this->input->post('name'),
        'pi_email' => $this->input->post('email'),
		'pi_subject' => $this->input->post('subject'),
		'pi_phone' => $this->input->post('phone'),
		'pi_message' => $this->input->post('message'));

		$value = $this->db->insert('p_inquiry',$inquiry);

		if($value)
		{
			$this->pmodel->noerror_message('Form Submitted Successfully');
			redirect('/contact','refresh');
		}
		else{
			$this->pmodel->noerror_message('Somthing Want to Wrong');
			redirect('/contact','refresh');
		}
	}
}
