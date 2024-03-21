<?php
class ModelEmail extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->db_user = $this->load->database('db_user', TRUE);
        $this->db_macs = $this->load->database('db_macs', TRUE);
        $this->db_ttc = $this->load->database('db_ttc', TRUE);
    }

    function getEmailTo($group_cat_admin)
    {
        $sql = "SELECT * FROM tns_dbtraining.tb_admin admin
        LEFT JOIN data_employee_training.employee emp ON (admin.emp_id = emp.employee_id)
        WHERE admin.status = 1
        AND admin.group_code LIKE '%" . $group_cat_admin . "%'";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function getUserRequestEmailTo()
    {
        $sql = "SELECT DISTINCT emp.email FROM tns_dbtraining.tb_admin admin
        LEFT JOIN data_employee_training.employee emp
        ON (admin.emp_id = emp.employee_id)
        WHERE admin.status = 1";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function get_mail_VerifyTo($up_id)
    {
        $sql = "SELECT * FROM tb_training_request_form WHERE id = $up_id";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function getEmailTo_request_Course_Title_for_user($re_up_id)
    {
        $sql = "SELECT * FROM tb_request_course_title WHERE id = $re_up_id";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function getEmailTo_request_Training_Provider_for_user($re_up_id)
    {
        $sql = "SELECT * FROM tb_request_training_provider WHERE id = $re_up_id";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function getEmailTo_request_Trainer_for_user($re_up_id)
    {
        $sql = "SELECT * FROM tb_request_trainer WHERE id = $re_up_id";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_email_cancel_Admin($del)
    {
        $sql = "SELECT reviewer_email COLLATE utf8_general_ci AS email_to FROM `tb_training_request_form` WHERE id = $del
        UNION
        SELECT submit_email COLLATE utf8_general_ci AS email_to FROM `tb_training_request_form` WHERE id = $del
        UNION
        SELECT approve_email COLLATE utf8_general_ci FROM `tb_training_request_form` WHERE id = $del
        UNION
        SELECT email COLLATE utf8_general_ci FROM tns_dbtraining.tb_admin admin
                LEFT JOIN data_employee_training.employee emp
                ON (admin.emp_id = emp.employee_id)
                WHERE admin.status = 1
                AND admin.group_code IN (SELECT group_cat_admin FROM `tb_training_request_form` WHERE id = $del)";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_training_request_form($del)
    {
        $sql = "SELECT * FROM tb_training_request_form WHERE id = $del";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_email_cancel_User($del)
    {
        $sql = "SELECT reviewer_email COLLATE utf8_general_ci AS email_to FROM `tb_training_request_form` WHERE id = $del
        UNION
        SELECT submit_email COLLATE utf8_general_ci AS email_to FROM `tb_training_request_form` WHERE id = $del
        UNION
        SELECT approve_email COLLATE utf8_general_ci FROM `tb_training_request_form` WHERE id = $del
        UNION
        SELECT email COLLATE utf8_general_ci FROM tns_dbtraining.tb_admin admin
                LEFT JOIN data_employee_training.employee emp
                ON (admin.emp_id = emp.employee_id)
                WHERE admin.status = 1
                AND admin.group_code IN (SELECT group_cat_admin FROM `tb_training_request_form` WHERE id = $del)";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_email_MoreInformationfor_Pending($up_id)
    {
        $sql = "SELECT 
        requestor_name,tr_no,admin_email,reviewer_email,approve_email,
        CASE 
          WHEN admin_status = 'Pending' AND reviewer_status = 'Pending' AND approve_status = 'Pending' THEN 'Resubmit for Admin'
          WHEN admin_status = 'Approved' AND reviewer_status = 'Pending' AND approve_status = 'Pending' THEN 'Resubmit for Reviewer'
          WHEN admin_status = 'Approved' AND reviewer_status = 'Approved' AND approve_status = 'Pending' THEN 'Resubmit for Approver'
          ELSE NULL
        END AS value_case
      FROM 
        tb_training_request_form
      WHERE 
        id = '" . $up_id . "'";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }
}
