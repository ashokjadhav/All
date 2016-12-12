<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');  
 
class Excel extends CI_Controller {

  /**
   * @desc : load list modal and helpers
   */
      function __Construct(){
        parent::__Construct();
        $this->load->model('excel_model'); 
        $this->load->helper(array('form', 'url'));
        $this->load->helper('download');
        }

  /**
   *  @desc : This function is used to get data from database 
   *  And export data into excel sheet
   *  @param : void
   *  @return : void
   */
    public function index(){
	    // get data from databse
      $data = $this->excel_model->getdata();
	    //load our new PHPExcel library
      $this->load->library('PHPExcel');
      
      //activate worksheet number 1
      $this->phpexcel->setActiveSheetIndex(0);

      //name the worksheet
      $this->phpexcel->getActiveSheet()->setTitle('Users list');
 
      // read data to active sheet
        $this->phpexcel->getActiveSheet()->fromArray($data);
 
        $filename='just_some_random_name.xls'; //save our workbook as this file name
 
        header('Content-Type: application/vnd.ms-excel'); //mime type
 
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
 
        header('Cache-Control: max-age=0'); //no cache
                    
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
 
        $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel5'); 
 
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
    }
}