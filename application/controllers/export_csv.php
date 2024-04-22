<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Export_csv extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->model('modelExportCSV', 'csv');
    }

    function export()
    {
        $year = $_POST['year'];
        $month = $_POST['month'];
        $file_name = 'tr_register_data_on' . date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$file_name");
        header("Content-Type: application/csv;");

        // get data 
        $tr_register_data = $this->csv->model_tr_register_data($year, $month);

        // file creation 
        $file = fopen('php://output', 'w');

        $header = array("TR.NO.", "Type", "Date Register (Received)", "TR/Training Status", "Learning Model", "Training Type", "Platform", "Section", "Division", "Course Title", "Training Provider", "Training Hr./Course", "Coures Fee Per Person", "No. of Attendee", "Start Date", "Finish Date", "Course CAT");
        fputcsv($file, $header);
        foreach ($tr_register_data->result_array() as $key => $value) {
            fputcsv($file, $value);
        }
        fclose($file);
        exit;
    }
}
