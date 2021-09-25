<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Give_review extends CI_Controller
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
	public function index()
	{
		$this->pmodel->isloggedin();
		$this->load->view('/panel/userpanel/reviews/give_review');
	}
	public function reviewadd()
	{
		$review = array(
			'pr_feedback' => $this->input->post('msg'),
			'pr_rating' => $this->input->post('rating'),
			'pr_status' => 1
		);
		$this->db->where('pr_id', $this->input->post('cid'));
		$rews = $this->db->update('p_review', $review);

		if ($rews) {
			$this->pmodel->noerror_message('Review Added Successful');
			redirect('/user/reviews/give_review','refresh');
		} else {
			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/user/reviews/give_review','refresh');
		}
	}
}
