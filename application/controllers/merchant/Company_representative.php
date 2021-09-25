<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company_representative extends CI_Controller {

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
		$this->load->view('/panel/merchantpanel/company_representative');
	}
    public function companyrep()
    {
        
        $represent = array('pcr_name' => $this->input->post('rname'),
                            'pcr_email' => $this->input->post('email'),
                            'pcr_mobile_no' => $this->input->post('contact'),
                            'pcr_flag' => $this->input->post('flag'));

        
        if($_FILES['avtar']['tmp_name'] !== ''){
            $represent['pcr_image'] = file_get_contents($_FILES['avtar']['tmp_name']); 
        }
        
        $q = $this->db->get_where('p_company_detail',array('pu_accno'=>$this->session->userdata('pu_accno')))->row();
        $p = $q->pcd_accno;

        $this->db->where('pcd_accno', $p);
        $rep = $this->db->update('p_company_representative',$represent);

        if($rep)
        {
            $this->pmodel->noerror_message('Company Representative Detail Updated Successfully');
            redirect('/merchant/company_representative/', 'refresh');
        }
        else{
            $this->pmodel->error_message('Company Representative Detail is not updated');
            redirect('/merchant/company_representative/', 'refresh');

        }
    }
}