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
        $this->db_ttc->select("tr_no, grp.group_name AS Type, date_request, trainining_request_status, learning_model, training_type, platform, section_code, requestor_division, course_title, training_provider, duration, course_fee, attendee_no, from_preferred_date, to_preferred_date, category_name");
        $this->db_ttc->from('tb_training_request_form AS request');
        $this->db_ttc->join('tb_group grp', 'grp.group_code = request.group_cat_admin', 'left');
        $this->db_ttc->where('YEAR(request.submit_date)', $year);
        $this->db_ttc->where('MONTH(request.submit_date)', $month);
        $this->db_ttc->where('request.trainining_request_status !=', 'Draft');
        return $this->db_ttc->get();
    }
}
