<?php
/**
 * Book_summary Class
 *
 * @author Ketan Sangani
 * @package CI_Book_summary
 * @subpackage Controller
 *
 */
class Book_summary extends CI_Controller {

 /**
     * construct
     *
     * constructor method (checks login status)
     * @author Ketan Sangani
	 * @access public
     * @param none
     * @return void
     *
     */
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in') == FALSE) {
            $this->session->set_flashdata('error', 'Please Login First!!');
            redirect('admin');
            break;
        }
        $this->load->model('admin/book_summary_model');
        $this->load->model('admin/elearning_category_model');
	}

    /**
     * index
     *
     * This help to display Book Summaries Details
     *
     * @author  Ketan Sangani
     * @access  public
     * @return  void
     */
    public function index(){
        if(!check_priviledges()){
            $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
            redirect('admin/dashboard');}
	    $arrData['tab']=$this->uri->segment(2);
		if ($this->input->post('delete')) {
	        $multiDelete =$this->book_summary_model->multi_delete_summaries($this->input->post('delete'));
            if ($multiDelete)
                $this->session->set_flashdata('success', 'Book Summaries Deleted Successfully !!');
    		else
    			$this->session->set_flashdata('error', 'Failed to Delete Book Summaries !!');
        redirect('admin/book_summary');
        }
        $arrData['boooksDetails'] = $this->book_summary_model->get_summaries_details();
        $arrData['middle'] = 'admin/elearning/book_summary/list';
        $this->load->view('admin/template', $arrData);
    }

  /**
     * add
     *
     * This help to add Book Summaries Details
     *
     * @author  Ketan Sangani
     * @access  public
     * @return  void
     */
    public function add() {
        if(!check_priviledges()){
            $this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
        redirect('admin/dashboard');}
        if ($_POST) {
            if ($this->input->post('submit')) {
            $this->form_validation->set_rules('title', 'Title', 'required|trim|max_length[450]|is_unique[elearning_summaries.title]');
            $this->form_validation->set_rules('desc', 'Description', 'required');
            if ($this->form_validation->run() == True) // passed validation proceed to post success logic
    		{
                $date = date("Y-m-d H:i:s");
                $inserted_rightsFlag = true;
                $arrData["title"] = $this->input->post('title');
    			$arrData["categoryid"] = $this->input->post('category');
                $arrData["sub_category"] = $this->input->post('sub_category');
    			$arrData["description"] = $this->input->post('desc');
    	        $arrData["created_date"] = $date;
                $arrData["modified_date"] = $date;
                $insertedFlag = $this->book_summary_model->save_summariesdetails($arrData);
                if ($insertedFlag) {
                    $this->session->set_flashdata('success', 'Book summary Details Added Successfully !!');
                    redirect('admin/book_summary');
                }
                else{
                    $this->session->set_flashdata('error', 'Failed to Add Book summary Details!!');
                    redirect('admin/book_summary/add');
                }
    		}
        }
        }
        else{
            $arrData['error']='';
        }
    	$arrData['categorydetails'] = $this->elearning_category_model->get_category_details();
        $arrData['tab']=$this->uri->segment(2);
        $arrData['middle'] = 'admin/elearning/book_summary/add';
        $this->load->view('admin/template', $arrData);
    }

/**
   * edit
   *
   * This help to edit Book Summaries Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $iuserId
   * @return  void
   */

  public function edit($iuserId) {
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}

    $arrData['booksDetailsArr'] = "";
    if ($_POST) {

      $policies_details = $this->book_summary_model->get_summaries_details($iuserId);
 if ($this->input->post('submit')) {
	 $this->form_validation->set_rules('title', 'Title', 'required|trim|max_length[450]');
		$this->form_validation->set_rules('desc', 'Description', 'required');

		//$this->form_validation->set_error_delimiters('<label class="errors">', '</label>');
		$this->form_validation->set_error_delimiters('', '');

		if ($this->form_validation->run() == TRUE) // passed validation proceed to post success logic
		{

          $date = date("Y-m-d H:i:s");
		   $UpdateData["title"] = $this->input->post('title');
		   $UpdateData["categoryid"] = $this->input->post('category');
           $UpdateData["sub_category"] = $this->input->post('sub_category');

		  $UpdateData["description"] = $this->input->post('desc');

          $UpdateData["modified_date"] = $date;

           $updateFlag = $this->book_summary_model->update_summaries($iuserId, $UpdateData);

            if ($updateFlag) {
              $this->session->set_flashdata('success', 'Book summary Details Updated Successfully !!');
              redirect('admin/book_summary');
            }
            else{
              $this->session->set_flashdata('error', 'Failed to Update Book summary Details!!');
              redirect('admin/book_summary/edit/' . $iuserId);
            }
		}

        }

    }
    else {
      $policies_details = $this->book_summary_model->get_summaries_details($iuserId);
      $arrData['booksDetailsArr'] = $policies_details;

    }
	$arrData['categorydetails'] = $this->elearning_category_model->get_category_details();
   $arrData['tab']=$this->uri->segment(2);
    $arrData['middle'] = 'admin/elearning/book_summary/edit';
    $this->load->view('admin/template', $arrData);
  }
  /**
   * delete
   *
   * This help to delete Book Summaries Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @param   $iuserId
   * @return  void
   */
  public function delete($iuserId){
	  if(!check_priviledges()){
		$this->session->set_flashdata('error', 'You  are not authorize to access this resource!!');
       redirect('admin/dashboard');}
    $delete = $this->book_summary_model->delete_summaries($iuserId);
    if ($delete)
      $this->session->set_flashdata('success', 'Book Summary Details Deleted Successfully !!');
    else
      $this->session->set_flashdata('error', 'Failed to Delete Book Summary Details!!');
      redirect('admin/book_summary');
  }

 /**
   * set status
   *
   * This help to publish Book Summaries Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */

  public function set_status($icategoryId) {
    $delete = $this->book_summary_model->set_summary($icategoryId);

  }

   /**
   * unset status
   *
   * This help to unpublish Book Summaries Details
   *
   * @author  Ketan Sangani
   * @access  public
   * @return  void
   */
  public function unset_status($icategoryId) {
    $delete = $this->book_summary_model->unset_summary($icategoryId);

  }

}