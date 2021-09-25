<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Check_model extends CI_Model
{
    public function isloggedin()
    {
        if(!$this->session->userdata('pu_accno'))
        {
            $this->pmodel->error_message('you have to login first');
        	redirect('/auth/login','refresh');
        }
    } 
    public function noerror_message($text)
    {
        $this->session->set_flashdata('text',$text);
		$this->session->set_flashdata('alert','success');
    }
    public function error_message($text)
    {
       
        $this->session->set_flashdata('text',$text);
        $this->session->set_flashdata('alert','danger'); 
    }
}
?>