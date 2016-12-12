<?php 
/**
 * Settings Class 
 *
 * @author Ashok Jadhav
 * @package CI_Settings
 * @subpackage Controller
 *
 */
 

class Settings extends CI_Controller {

	/**
     * construct
     * 
     * constructor method (checks login status)
     * @author Ashok Jadhav
	 * @access public
     * @param none
     * @return void
     * 
     */
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('settings_model');
	}

	
  	/**
     * psw_change
     *
     * This help to change the admin password
     * 
     * @author  Ketan Sangani
     * @access  public
     * @return  void
     */
	
	function psw_change()
	{	
		if($_POST){
			$id=$this->input->post('id');
			$pwd=md5($this->input->post('psw'));
			$cn_psw=md5($this->input->post('cn_psw'));
			if($pwd!=$cn_psw){
				$this->session->set_flashdata('error','New password and Confirmed password does not match,Please try again !!!');
			//redirect('settings');
			}
			else{
				$cn_password=$cn_psw;
				$insertedflag=$this->settings_model->set_password($id,$cn_password);
				if($insertedflag){
					$this->session->set_flashdata('success','Password Updated Successfully || Please Login');
					redirect('site_login');
					//set success and redirect to login
				}
				else{
					$this->session->set_flashdata('error','You have entered wrong old password !!!');
					redirect('dashboard');
				}

			}
		}
	}

	function update_profile_photo()
	{
    	if ($this->input->post('upload')) {
    		$id=$this->input->post('id');
            $config=array();
            $config['upload_path'] = './files/';
            $config['max-size'] = 2000;
            $config['overwrite'] = TRUE;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $this->load->library('upload', $config);
			$inserted_rightsFlag = true;
			$this->upload->initialize($config);
            if ( ! $this->upload->do_upload('logo')){
                //$arrData['error'] = $this->upload->display_errors();
            }
            else{
                $data=$this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './files/'.$_FILES['logo']['name'];
                $config['new_image'] ='./Resize/';
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = FALSE;
                $config['width']  = 250;
                $config['height'] = 150;

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                if($data['file_name']!=''){

                    $arrData["img"] = $data['file_name'];
                    $arrData["resize"] = $data['raw_name'].'_thumb'.$data['file_ext'];
                }
            }
            if($this->settings_model->update_data($id,$arrData)){
            	$this->session->set_userdata(array("site_pic" => $arrData["img"]));
		        $this->session->set_flashdata('success', 'Record saved successfully');
		        redirect('dashboard');
            }
            else {
	            $this->session->set_flashdata('error', 'Sorry!!!Some error has occured while saving.');
	        }
                
        }
    }
}
/* End of file settings.php */
/* Location: ./application/controllers/settings.php */