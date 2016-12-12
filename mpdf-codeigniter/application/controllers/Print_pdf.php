<?php

/* @property mpdf_model $mpdf_model */
class Print_pdf extends Front_end
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mpdf_model');
    }


    function index()
    {
        ini_set('memory_limit', '256M');
        // load library
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        
        // retrieve data from model
        $data['news'] = $this->mpdf_model->get_news();
        $data['title'] = "items";

        // boost the memory limit if it's low ;)
        $html = $this->load->view('content/mpdf', $data, true);
        // render the view into HTML
        $pdf->WriteHTML($html);
        // write the HTML into the PDF
        $output = 'itemreport' . date('Y_m_d_H_i_s') . '_.pdf';
        $pdf->Output("$output", 'I');
        // save to file because we can exit();
        // - See more at: http://webeasystep.com/blog/view_article/codeigniter_tutorial_pdf_to_create_your_reports#sthash.QFCyVGLu.dpuf
    }
}
/* End of file dashboard.php */
/* Location: ./system/application/modules/matchbox/controllers/dashboard.php */