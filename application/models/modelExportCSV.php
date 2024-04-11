<?php
class ModelExportCSV extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->db_ttc = $this->load->database('db_ttc', TRUE);
    }

    function model_tr_register_data($year, $month)
    {
        $this->db_ttc->select("tr_no, requestor_name, year");
        $this->db_ttc->from('tb_training_request_form');
        $this->db_ttc->where('year', $year);
        $this->db_ttc->where('MONTH(submit_date)', $month);
        $this->db_ttc->where('trainining_request_status', '!= Draft');
        return $this->db_ttc->get();
    }
}
