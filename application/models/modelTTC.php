<?php
class ModelTTC extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->db_user = $this->load->database('db_user', TRUE);
        $this->db_macs = $this->load->database('db_macs', TRUE);
        $this->db_ttc = $this->load->database('db_ttc', TRUE);
    }

    function model_form_division()
    {
        $sql = "SELECT DISTINCT([DIV_CODE]) AS division_id,[DIV_NAME] AS division_name FROM [TNS-MACS].[dbo].[VW_EDMS_DIVISION_DISCIPLINES]
        WHERE DIV_CODE not in ('MYMA','NSE')
        ORDER BY DIV_NAME";
        $rs = $this->db_macs
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_category()
    {
        $sql = "SELECT * FROM tb_category WHERE status = 1
        ORDER BY cat_code";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_course_title()
    {
        $sql = "SELECT * FROM tb_course_title WHERE status = 1
        ORDER BY course_title";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_course_title_by_cat($course_cat)
    {
        // $sql = "SELECT * FROM tb_course_title WHERE status = 1 AND Course_CAT LIKE '%" . $course_cat . "%'";
        $sql = "SELECT category.*, titel.*
        FROM tb_course_title titel
        LEFT JOIN tb_category category ON category.cat_code = titel.Course_CAT
        WHERE titel.status = 1 AND titel.Course_CAT LIKE '%" . $course_cat . "%'";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function model_project_code_by_section($section_code)
    {
        $sql = "SELECT DISTINCT(project_code) FROM tb_approval_matrix WHERE status = 1 
        AND REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(section_code, ' ', ''), '(', ''),')',''),'-',''),'&',''),'/','') = '" . $section_code . "'
        ORDER BY project_code";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
        // print_r($sql);
    }

    function model_cost_code_by_section($section_code)
    {
        $sql = "SELECT DISTINCT(cost_code) FROM tb_approval_matrix WHERE status = 1 
        AND REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(section_code, ' ', ''), '(', ''),')',''),'-',''),'&',''),'/','') = '" . $section_code . "'
        ORDER BY cost_code";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
        // print_r($sql);
    }

    function model_project_code_cost_code($project_code, $section_code)
    {
        $sql = "SELECT DISTINCT(cost_code) FROM tb_approval_matrix WHERE status = 1
        AND REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(section_code, ' ', ''), '(', ''),')',''),'-',''),'&',''),'/','') = '" . $section_code . "'
        AND project_code = '" . $project_code . "'
        ORDER BY cost_code";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function model_course_duration_by_title($course_title)
    {
        $sql = "SELECT * FROM tb_course_title WHERE status = 1 AND id = '" . $course_title . "%'";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_data_training_provider($training_provider)
    {
        $sql = "SELECT * FROM tb_training_provider WHERE status = 1
        AND `id` = '" . $training_provider . "'";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_data_trainer($training_provider)
    {
        $sql = "SELECT * FROM tb_trainer WHERE status = 1
        AND training_provider_group = '" . $training_provider . "'";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_training_provider()
    {
        $sql = "SELECT * FROM tb_training_provider WHERE status = 1";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_reason_training()
    {
        $sql = "SELECT * FROM tb_reason_training WHERE status = 1";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_category_for_manage($s_category_code, $s_category_name, $s_scope_of_use, $s_group, $s_status)
    {
        $sql = "SELECT * FROM tb_category WHERE cat_code LIKE '%" . $s_category_code . "%'
        AND category_name LIKE '%" . $s_category_name . "%'
        AND scope_of_use LIKE '%" . $s_scope_of_use . "%'
        AND cat_group LIKE '%" . $s_group . "%'
        AND status LIKE '%" . $s_status . "%'";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_group_for_manage()
    {
        $sql = "SELECT * FROM tb_group WHERE status = 1";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_group($s_group_code, $s_group_name, $s_status)
    {
        $sql = "SELECT * FROM tb_group WHERE group_code LIKE '%" . $s_group_code . "%'
        AND group_name LIKE '%" . $s_group_name . "%'
        AND status LIKE '%" . $s_status . "%'";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function model_group_for_manageCourseCategory()
    {
        $sql = "SELECT * FROM tb_group";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function model_course_title_for_manage_intable($s_course_title, $s_category_code, $s_category_name, $s_training_hr, $s_status, $s_trainer)
    {
        $sql = "SELECT tb_category.category_name AS category_names,tb_course_title.* FROM `tb_course_title`
        LEFT JOIN tb_category ON tb_category.cat_code = tb_course_title.Course_CAT
        WHERE course_title LIKE '%" . $s_course_title . "%'
        AND Course_CAT LIKE '%" . $s_category_code . "%'
        AND tb_category.cat_code LIKE '%" . $s_category_name . "%'
        AND Training_Hr_Course LIKE '%" . $s_training_hr . "%'
        AND tb_course_title.status LIKE '%" . $s_status . "%'
        AND Trainer LIKE '%" . $s_trainer . "%'
        ORDER BY tb_course_title.Course_CAT";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_category_code_manage($category_code)
    {
        $sql = "SELECT * FROM `tb_category` WHERE `cat_code` = '" . $category_code . "'";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_submit_manageCourseCategory($category_code, $category_name, $scope_of_use, $cat_group, $status)
    {
        $this->db_ttc->where('cat_code', $category_code);
        $check_dup = $this->db_ttc->get('tb_category');
        if ($check_dup->num_rows() == 0) {
            $rs = $this->db_ttc
                ->set('cat_code', $category_code)
                ->set('category_name', $category_name)
                ->set('scope_of_use', $scope_of_use)
                ->set('cat_group', $cat_group)
                ->set('status', $status)
                ->insert('tb_category');
        }
        return $rs;
    }

    function model_manageCourseCategory_id($id)
    {
        $sql = "SELECT * FROM tb_category WHERE id = '" . $id . "'";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_update_manageCourseCategory($up_id, $up_category_code, $up_category_name, $up_scope_of_use, $up_cat_group, $up_status)
    {
        $this->db_ttc->where('cat_code', $up_category_code)->where('id !=', $up_id);
        $check_dup = $this->db_ttc->get('tb_category');
        if ($check_dup->num_rows() == 0) {
            $rs = $this->db_ttc
                ->set('cat_code', $up_category_code)
                ->set('category_name', $up_category_name)
                ->set('scope_of_use', $up_scope_of_use)
                ->set('cat_group', $up_cat_group)
                ->set('status', $up_status)
                ->where('id', $up_id)
                ->update('tb_category');
        }
        return $rs;
    }

    function model_submit_manageCourseTitle($category_code, $course_title, $training_hr, $trainer, $status)
    {
        $rs = $this->db_ttc
            ->set('Course_CAT', $category_code)
            ->set('course_title', $course_title)
            ->set('Training_Hr_Course', $training_hr)
            ->set('Trainer', $trainer)
            ->set('status', $status)
            ->insert('tb_course_title');
        return $rs;
    }

    function model_manageCourseTitle_id($id)
    {
        $sql = "SELECT tb_category.category_name AS category_names,tb_course_title.* FROM `tb_course_title`
        LEFT JOIN tb_category ON tb_category.cat_code = tb_course_title.Course_CAT
        WHERE tb_course_title.id = '" . $id . "'";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_update_manageCourseTitle($up_id, $up_category_code, $up_course_title, $up_training_hr, $up_trainer, $up_status)
    {
        $rs = $this->db_ttc
            ->set('Course_CAT', $up_category_code)
            ->set('course_title', $up_course_title)
            ->set('Training_Hr_Course', $up_training_hr)
            ->set('Trainer', $up_trainer)
            ->set('status', $up_status)
            ->where('id', $up_id)
            ->update('tb_course_title');
        return $rs;
    }

    function model_submit_ManageGroup($group_code, $group_name, $status)
    {
        $group_code = strtoupper($group_code);
        $rs = $this->db_ttc
            ->set('group_code', $group_code)
            ->set('group_name', $group_name)
            ->set('status', $status)
            ->insert('tb_group');
        return $rs;
    }

    function model_update_ManageGroup($up_id, $up_group_code, $up_group_name, $up_status)
    {
        $up_group_code = strtoupper($up_group_code);
        $rs = $this->db_ttc
            ->set('group_code', $up_group_code)
            ->set('group_name', $up_group_name)
            ->set('status', $up_status)
            ->where('id', $up_id)
            ->update('tb_group');
        return $rs;
    }

    function model_group_id($id)
    {
        $sql = "SELECT * FROM tb_group WHERE id = '" . $id . "'";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_manage_TrainingProvider($s_training_provider, $s_contact, $s_training_venue, $s_trainer_name, $s_status)
    {
        $sql = "SELECT * FROM tb_training_provider WHERE training_provider LIKE '%" . $s_training_provider . "%'";
        if ($s_contact != "") {
            $sql .= " AND contact LIKE '%" . $s_contact . "%'";
        }
        if ($s_training_venue != "") {
            $sql .= " AND training_venue LIKE '%" . $s_training_venue . "%'";
        }
        if ($s_trainer_name != "") {
            $sql .= " AND trainer_name LIKE '%" . $s_trainer_name . "%'";
        }
        $sql .= " AND status LIKE '%" . $s_status . "%'";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function model_manage_TrainingProvider_id($id)
    {
        $sql = "SELECT * FROM tb_training_provider WHERE id = '" . $id . "'";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_request_TrainingProvider_id($id_re)
    {
        $sql = "SELECT * FROM tb_request_training_provider WHERE id = '" . $id_re . "'";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_request_course_title_id_re($id_re)
    {
        $sql = "SELECT * FROM tb_request_course_title WHERE id = '" . $id_re . "'";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_submit_training_provider($training_provider, $contact, $training_venue, $status)
    {
        $this->db_ttc->where('training_provider', $training_provider)->where('status != 0');
        $check_dup = $this->db_ttc->get('tb_training_provider');
        if ($check_dup->num_rows() == 0) {
            $rs = $this->db_ttc
                ->set('training_provider', $training_provider)
                ->set('contact', $contact)
                ->set('training_venue', $training_venue)
                // ->set('trainer_name', $trainer_name)
                ->set('status', $status)
                ->insert('tb_training_provider');
        }
        return $rs;
    }

    function model_update_training_provider($up_id, $up_training_provider, $up_contact, $up_training_venue, $up_status)
    {
        $rs = $this->db_ttc
            ->set('training_provider', $up_training_provider)
            ->set('contact', $up_contact)
            ->set('training_venue', $up_training_venue)
            // ->set('trainer_name', $up_trainer_name)
            ->set('status', $up_status)
            ->where('id', $up_id)
            ->update('tb_training_provider');
        return $rs;
    }

    function model_manage_admin_for_table($s_emp_id, $s_name, $s_email, $s_group, $s_status)
    {
        $sql = "SELECT admin.*,emp.*,gp.group_name FROM tns_dbtraining.tb_admin admin
        LEFT JOIN data_employee_training.employee emp ON (admin.emp_id = emp.employee_id)
        LEFT JOIN tns_dbtraining.tb_group gp ON (admin.group_code = gp.group_code)
        WHERE admin.emp_id LIKE '%" . $s_emp_id . "%'
        AND emp.name_lastname LIKE '%" . $s_name . "%'
        AND emp.email LIKE '%" . $s_email . "%'
        AND admin.group_code LIKE '%" . $s_group . "%'
        AND admin.status LIKE '%" . $s_status . "%'
        ORDER BY emp.name_lastname ASC";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_submit_admin($employee_id, $group_code, $status)
    {
        $employee_id = strtoupper($employee_id);
        $this->db_ttc->where('emp_id', $employee_id);
        $check_dup = $this->db_ttc->get('tb_admin');
        $this->db_user->where('employee_id', $employee_id);
        $check_correct = $this->db_user->get('employee');
        if ($check_dup->num_rows() == 0 &&  $check_correct->num_rows() != 0) {
            $rs = $this->db_ttc
                ->set('emp_id', $employee_id)
                ->set('group_code', $group_code)
                ->set('status', $status)
                ->insert('tb_admin');
        }
        return $rs;
    }

    function model_manage_admin_id($id)
    {
        $sql = "SELECT * FROM tb_admin WHERE id = '" . $id . "'";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_update_admin($up_id, $up_employee_id, $up_group_code, $up_status)
    {
        $up_employee_id = strtoupper($up_employee_id);
        $this->db_ttc->where('emp_id', $up_employee_id)->where('id !=', $up_id)->where('status != 0');
        $check_dup = $this->db_ttc->get('tb_admin');
        $this->db_user->where('employee_id', $up_employee_id);
        $check_correct = $this->db_user->get('employee');
        if ($check_dup->num_rows() == 0 &&  $check_correct->num_rows() != 0) {
            $rs = $this->db_ttc
                ->set('emp_id', $up_employee_id)
                ->set('group_code', $up_group_code)
                ->set('status', $up_status)
                ->where('id', $up_id)
                ->update('tb_admin');
        }
        return $rs;
    }

    function model_send_request_training_provider($re_name, $re_training_provider, $re_email, $re_contact, $re_training_venue)
    {
        $this->db_ttc->where('training_provider', $re_training_provider)->where('status != 0');
        $check_dup = $this->db_ttc->get('tb_training_provider');
        if ($check_dup->num_rows() == 0) {
            $rs = $this->db_ttc
                ->set('re_name', $re_name)
                ->set('re_training_provider', $re_training_provider)
                ->set('re_contact', $re_contact)
                ->set('re_training_venue', $re_training_venue)
                // ->set('re_trainer_name', $re_trainer_name)
                ->set('email', $re_email)
                ->set('re_status', 'Pending')
                ->set('status', 1)
                ->insert('tb_request_training_provider');
        }
        return $rs;
    }

    function model_user_request_training_provider()
    {
        $sql = "SELECT * FROM tb_request_training_provider WHERE re_status = 'Pending'
        AND status = 1
        ORDER BY re_date";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_submit_Training_Request($email_submit, $submit_name, $year_submit, $section_code, $project_code, $cost_code, $date_request, $requestor_name, $requestor_position, $requestor_section, $requestor_division, $requestor_email, $learning_model, $training_type, $course_cat_text, $course_title_text, $platform, $duration, $planned, $course_fee, $attendee, $from_preferred_date, $to_preferred_date, $training_provider, $contact, $training_venue, $trainer_name, $required_course, $license_name, $additional, $attendee_information, $reason_training_02, $supervisor_expectation, $others_please_specify, $file_attachment, $attendee_name, $emp_id, $position, $section, $division, $company, $progress_status, $reviewer, $reviewer_email, $approver, $approver_email, $group_cat_admin, $see_attachment2, $file_see_attachment2, $currency, $exchange_rate, $exchange_date)
    {
        $emp_id_upper = strtoupper($emp_id);
        $sql = "SELECT count(id) as count FROM tb_training_request_form WHERE year = '" . $year_submit . "'";
        $query = $this->db_ttc->query($sql);
        $row = $query->row();
        $count = $row->count;
        $tr_no = "TR-" . substr($year_submit, 2, 4) . str_pad(($count + 1), 4, '0', STR_PAD_LEFT);
        // $sql = "SELECT * FROM tb_approval_matrix WHERE section_code = '" . $section_code . "' AND project_code = '" . $project_code . "' AND cost_code = '" . $cost_code . "' AND status = 1";
        // $query = $this->db_ttc->query($sql);
        // $row = $query->row();
        // $reviewer_name = $row->reviewer;
        // $reviewer_email = $row->reviewer_email;
        // $approver_name = $row->approver;
        // $approver_email = $row->approver_email;
        $rs = $this->db_ttc
            ->set('submit_name', $submit_name)
            ->set('year', $year_submit)
            ->set('section_code', $section_code)
            ->set('project_code', $project_code)
            ->set('cost_code', $cost_code)
            ->set('date_request', $date_request)
            ->set('submit_email', $email_submit)
            ->set('requestor_name', $requestor_name)
            ->set('requestor_position', $requestor_position)
            ->set('requestor_section', $requestor_section)
            ->set('requestor_division', $requestor_division)
            ->set('requestor_email', $requestor_email)
            ->set('learning_model', $learning_model)
            ->set('training_type', $training_type)
            ->set('category_name', $course_cat_text)
            ->set('course_title', $course_title_text)
            ->set('platform', $platform)
            ->set('duration', $duration)
            ->set('planned', $planned)
            ->set('currency', $currency)
            ->set('course_fee', $course_fee);
        if ($currency != "THB") {
            $this->db_ttc->set('exchange_rate', $exchange_rate);
            $this->db_ttc->set('exchange_date', $exchange_date);
        }
        if ($currency == "THB") {
            $this->db_ttc->set('exchange_rate', 1);
        }
        $this->db_ttc->set('attendee_no', $attendee)
            ->set('from_preferred_date', $from_preferred_date)
            ->set('to_preferred_date', $to_preferred_date)
            ->set('training_provider', $training_provider)
            ->set('contact', $contact)
            ->set('training_venue', $training_venue)
            ->set('trainer_name', $trainer_name)
            ->set('required_course', $required_course)
            ->set('license_name', $license_name)
            ->set('additional', $additional)
            ->set('attendee_information', $attendee_information)
            ->set('reason_training', $reason_training_02)
            ->set('supervisor_expectation', $supervisor_expectation)
            ->set('others_please_specify', $others_please_specify)
            ->set('attachment', $file_attachment)
            ->set('trainining_request_status', $progress_status)
            ->set('status', 1)
            ->set('tr_no', $tr_no)
            ->set('attendee_list_name', $attendee_name)
            ->set('attendee_list_id', $emp_id_upper)
            ->set('attendee_list_positon', $position)
            ->set('attendee_list_section', $section)
            ->set('attendee_list_division', $division)
            ->set('attendee_list_company', $company)
            ->set('admin_status', 'Pending')
            ->set('reviewer_status', 'Pending')
            ->set('reviewer_name', $reviewer)
            ->set('reviewer_email', $reviewer_email)
            ->set('approve_status', 'Pending')
            ->set('approve_name', $approver)
            ->set('approve_email', $approver_email)
            ->set('group_cat_admin', $group_cat_admin)
            ->set('see_attachment', $see_attachment2)
            ->set('file_see_attachment', $file_see_attachment2)
            ->insert('tb_training_request_form');
        return $rs;
    }

    function model_show_HistoryForUser($username, $s_tr_no, $s_date_request, $s_requestor_name, $s_course_category, $s_course_title, $s_approval_status, $s_status)
    {
        $sql = "SELECT * FROM tb_training_request_form WHERE submit_name = '" . $username . "'
        AND tr_no LIKE '%" . $s_tr_no . "%'
        AND date_request LIKE '%" . $s_date_request . "%'
        AND requestor_name LIKE '%" . $s_requestor_name . "%'
        AND category_name LIKE '%" . $s_course_category . "%'
        AND course_title LIKE '%" . $s_course_title . "%'
        AND trainining_request_status LIKE '%" . $s_approval_status . "%'
        AND status LIKE '%" . $s_status . "%'
        ORDER BY id DESC";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_show_HistoryForAdmin($s_tr_no, $s_date_request, $s_requestor_name, $s_course_category, $s_course_title, $s_approval_status, $s_status, $username_fullname)
    {
        $sql = "SELECT * FROM tb_training_request_form WHERE tr_no LIKE '%" . $s_tr_no . "%'
        AND date_request LIKE '%" . $s_date_request . "%'
        AND requestor_name LIKE '%" . $s_requestor_name . "%'
        AND category_name LIKE '%" . $s_course_category . "%'
        AND course_title LIKE '%" . $s_course_title . "%'
        AND trainining_request_status LIKE '%" . $s_approval_status . "%'
        AND status LIKE '%" . $s_status . "%'
        AND trainining_request_status NOT IN ('Draft')
        AND submit_name != '" . $username_fullname . "
        ORDER BY id DESC'
        UNION
        SELECT * FROM tb_training_request_form 
        WHERE submit_name = '" . $username_fullname . "'
        AND tr_no LIKE '%" . $s_tr_no . "%'
        AND date_request LIKE '%" . $s_date_request . "%'
        AND requestor_name LIKE '%" . $s_requestor_name . "%'
        AND category_name LIKE '%" . $s_course_category . "%'
        AND course_title LIKE '%" . $s_course_title . "%'
        AND trainining_request_status LIKE '%" . $s_approval_status . "%'
        AND status LIKE '%" . $s_status . "%'
        ORDER BY id DESC";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function model_cancel_Training_Request($del)
    {
        $this->db_ttc->set("status", 0);
        $this->db_ttc->where("id", $del);
        $this->db_ttc->update("tb_training_request_form");
    }

    function model_training_request_data_static($id)
    {
        $sql = "SELECT * FROM tb_training_request_form WHERE id = '" . $id . "'";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_approval_matrix_data($s_division, $s_section_code, $s_project_code, $s_cost_code, $s_reviewer, $s_approver, $s_status)
    {
        $sql = "SELECT * FROM tb_approval_matrix
        WHERE division LIKE '%" . $s_division . "%'
        AND section_code LIKE '%" . $s_section_code . "%'
        AND project_code LIKE '%" . $s_project_code . "%'
        AND cost_code LIKE '%" . $s_cost_code . "%'
        AND reviewer LIKE '%" . $s_reviewer . "%'
        AND approver LIKE '%" . $s_approver . "%'
        AND status LIKE '%" . $s_status . "%'
        ORDER BY section_code";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function model_approval_matrix_data_for_section($id)
    {
        $sql = "SELECT * FROM tb_approval_matrix WHERE id = '" . $id . "'";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function model_approval_matrix()
    {
        $sql = "SELECT DISTINCT(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(section_code, ' ', ''), '(', ''),')',''),'-',''),'&',''),'/','')) AS modified_section_code, section_code
        FROM tb_approval_matrix WHERE tb_approval_matrix.status = 1
        ORDER BY tb_approval_matrix.section_code";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function model_section_code()
    {
        $sql = "SELECT * FROM tb_section WHERE tb_section.status = 1";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_get_workflow_matrix($section_code_flow, $project_code_flow, $cost_code_flow)
    {
        $sql = "SELECT * FROM tb_approval_matrix WHERE REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(section_code, ' ', ''), '(', ''),')',''),'-',''),'&',''),'/','') = '" . $section_code_flow . "'
        AND project_code = '" . $project_code_flow . "'
        AND cost_code = '" . $cost_code_flow . "'";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function model_get_current_workflow($up_id)
    {
        $sql = "SELECT * FROM tb_training_request_form WHERE id = '" . $up_id . "'";
        // $sql = "SELECT * FROM tb_training_request_form WHERE id = 15";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function model_approval_matrix_project_code()
    {
        $sql = "SELECT DISTINCT project_code FROM tb_approval_matrix WHERE status = 1
        ORDER BY project_code";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_approval_matrix_cost_code()
    {
        $sql = "SELECT DISTINCT cost_code FROM tb_approval_matrix WHERE status = 1
        ORDER BY cost_code";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_send_submit_Approver_Matrix($division, $section_code, $project_code, $cost_code, $reviewer, $reviewer_email, $approver, $approver_email, $status, $reviewer_alter, $reviewer_email_alter, $approver_alter, $approver_email_alter)
    {
        $rs = $this->db_ttc
            ->set('division', $division)
            ->set('section_code', $section_code)
            ->set('project_code', $project_code)
            ->set('cost_code', $cost_code)
            ->set('reviewer', strtoupper($reviewer))
            ->set('reviewer_email', $reviewer_email)
            ->set('approver', strtoupper($approver))
            ->set('approver_email', $approver_email)
            ->set('status', $status)
            ->set('reviewer_alter', strtoupper($reviewer_alter))
            ->set('reviewer_email_alter', $reviewer_email_alter)
            ->set('approver_alter', strtoupper($approver_alter))
            ->set('approver_email_alter', $approver_email_alter)
            ->insert('tb_approval_matrix');
        return $rs;
    }

    function model_approval_matrix_id($id)
    {
        $sql = "SELECT * FROM tb_approval_matrix WHERE id = '" . $id . "'";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_send_update_Approver_Matrix($up_id, $up_division, $up_section_code, $up_project_code, $up_cost_code, $up_reviewer, $up_reviewer_email, $up_approver, $up_approver_email, $up_status, $up_reviewer_alter, $up_reviewer_email_alter, $up_approver_alter, $up_approver_email_alter)
    {
        $rs = $this->db_ttc
            ->set('division', $up_division)
            ->set('section_code', $up_section_code)
            ->set('project_code', $up_project_code)
            ->set('cost_code', $up_cost_code)
            ->set('reviewer', strtoupper($up_reviewer))
            ->set('reviewer_email', $up_reviewer_email)
            ->set('approver', strtoupper($up_approver))
            ->set('approver_email', $up_approver_email)
            ->set('status', $up_status)
            ->set('reviewer_alter', strtoupper($up_reviewer_alter))
            ->set('reviewer_email_alter', $up_reviewer_email_alter)
            ->set('approver_alter', strtoupper($up_approver_alter))
            ->set('	approver_email_alter', $up_approver_email_alter)
            ->where('id', $up_id)
            ->update('tb_approval_matrix');
        return $rs;
    }

    function model_training_request_form_id($id)
    {
        $sql = "SELECT * FROM tb_training_request_form WHERE id = '" . $id . "'";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function model_delete_attachment_formRequest($id, $column)
    {
        $rs = $this->db_ttc;
        if ($column == "more_attachment") {
            $this->db_ttc->set($column, NULL);
        } else if ($column == "file_see_attachment") {
            $this->db_ttc->set($column, NULL);
        } else {
            $this->db_ttc->set($column, "N/A");
        }
        $this->db_ttc->where("id", $id)
            ->update("tb_training_request_form");
        return $rs;
    }

    function model_up_submit_Training_Request($up_id, $email_submit, $submit_name, $year_submit, $section_code, $project_code, $cost_code, $date_request, $requestor_name, $requestor_position, $requestor_section, $requestor_division, $requestor_email, $learning_model, $training_type, $course_cat_text, $course_title_text, $platform, $duration, $planned, $course_fee, $attendee, $from_preferred_date, $to_preferred_date, $training_provider, $contact, $training_venue, $trainer_name, $required_course, $license_name, $additional, $attendee_information, $reason_training_02, $supervisor_expectation, $others_please_specify, $file_attachment, $attendee_name, $emp_id, $position, $section, $division, $company, $progress_status, $reviewer, $reviewer_email, $approver, $approver_email, $up_group_cat_admin, $up_see_attachment, $up_file_see_attachment, $currency, $exchange_rate, $exchange_date)
    {
        $currentDateTime = date('Y-m-d H:i:s');
        $emp_id_upper = strtoupper($emp_id);
        // $sql = "SELECT * FROM tb_approval_matrix WHERE section_code = '" . $section_code . "' AND project_code = '" . $project_code . "' AND cost_code = '" . $cost_code . "' AND status = 1";
        // $query = $this->db_ttc->query($sql);
        // $row = $query->row();
        // $reviewer_name = $row->reviewer;
        // $reviewer_email = $row->reviewer_email;
        // $approver_name = $row->approver;
        // $approver_email = $row->approver_email;
        $rs = $this->db_ttc
            ->set('submit_date', $currentDateTime)
            ->set('submit_name', $submit_name)
            ->set('year', $year_submit)
            ->set('section_code', $section_code)
            ->set('project_code', $project_code)
            ->set('cost_code', $cost_code)
            ->set('date_request', $date_request)
            ->set('submit_email', $email_submit)
            ->set('requestor_name', $requestor_name)
            ->set('requestor_position', $requestor_position)
            ->set('requestor_section', $requestor_section)
            ->set('requestor_division', $requestor_division)
            ->set('requestor_email', $requestor_email)
            ->set('learning_model', $learning_model)
            ->set('training_type', $training_type)
            ->set('category_name', $course_cat_text)
            ->set('course_title', $course_title_text)
            ->set('platform', $platform)
            ->set('duration', $duration)
            ->set('planned', $planned)
            ->set('currency', $currency)
            ->set('course_fee', $course_fee);
        if ($currency != "THB") {
            $this->db_ttc->set('exchange_rate', $exchange_rate);
            $this->db_ttc->set('exchange_date', $exchange_date);
        }
        if ($currency == "THB") {
            $this->db_ttc->set('exchange_rate', 1);
            $this->db_ttc->set('exchange_date', null);
        }
        $this->db_ttc->set('attendee_no', $attendee)
            ->set('from_preferred_date', $from_preferred_date)
            ->set('to_preferred_date', $to_preferred_date)
            ->set('training_provider', $training_provider)
            ->set('contact', $contact)
            ->set('training_venue', $training_venue)
            ->set('trainer_name', $trainer_name)
            ->set('required_course', $required_course)
            ->set('license_name', $license_name)
            ->set('additional', $additional)
            ->set('attendee_information', $attendee_information)
            ->set('reason_training', $reason_training_02)
            ->set('supervisor_expectation', $supervisor_expectation)
            ->set('others_please_specify', $others_please_specify);
        if ($file_attachment != "N/A") {
            $this->db_ttc->set('attachment', $file_attachment);
        }
        $this->db_ttc->set('trainining_request_status', $progress_status)
            ->set('status', 1)
            ->set('attendee_list_name', $attendee_name)
            ->set('attendee_list_id', $emp_id_upper)
            ->set('attendee_list_positon', $position)
            ->set('attendee_list_section', $section)
            ->set('attendee_list_division', $division)
            ->set('attendee_list_company', $company)
            ->set('admin_status', 'Pending')
            ->set('reviewer_status', 'Pending')
            ->set('reviewer_name', $reviewer)
            ->set('reviewer_email', $reviewer_email)
            ->set('approve_status', 'Pending')
            ->set('approve_name', $approver)
            ->set('approve_email', $approver_email)
            ->set('group_cat_admin', $up_group_cat_admin)
            ->set('see_attachment', $up_see_attachment);
        if ($up_file_see_attachment != '') {
            $this->db_ttc->set('file_see_attachment', $up_file_see_attachment);
        } else if ($up_see_attachment == '') {
            $this->db_ttc->set('file_see_attachment', null);
        }
        $this->db_ttc->where('id', $up_id)
            ->update('tb_training_request_form');
        return $rs;
    }

    function model_up_submit_ForReject_Training_Request($up_id, $email_submit, $submit_name, $year_submit, $section_code, $project_code, $cost_code, $date_request, $requestor_name, $requestor_position, $requestor_section, $requestor_division, $requestor_email, $learning_model, $training_type, $course_cat_text, $course_title_text, $platform, $duration, $planned, $course_fee, $attendee, $from_preferred_date, $to_preferred_date, $training_provider, $contact, $training_venue, $trainer_name, $required_course, $license_name, $additional, $attendee_information, $reason_training_02, $supervisor_expectation, $others_please_specify, $file_attachment, $attendee_name, $emp_id, $position, $section, $division, $company, $progress_status, $up_workflow_remark, $up_more_information, $file_attachment_more, $reviewer, $reviewer_email, $approver, $approver_email, $up_group_cat_admin, $up_see_attachment, $up_file_see_attachment, $currency, $exchange_rate, $exchange_date)
    {
        $currentDateTime = date('Y-m-d H:i:s');
        $emp_id_upper = strtoupper($emp_id);
        // $sql = "SELECT * FROM tb_approval_matrix WHERE section_code = '" . $section_code . "' AND project_code = '" . $project_code . "' AND cost_code = '" . $cost_code . "' AND status = 1";
        // $query = $this->db_ttc->query($sql);
        // $row = $query->row();
        // $reviewer_name = $row->reviewer;
        // $reviewer_email = $row->reviewer_email;
        // $approver_name = $row->approver;
        // $approver_email = $row->approver_email;
        $rs = $this->db_ttc
            ->set('submit_date', $currentDateTime)
            ->set('submit_name', $submit_name)
            ->set('year', $year_submit)
            ->set('section_code', $section_code)
            ->set('project_code', $project_code)
            ->set('cost_code', $cost_code)
            ->set('date_request', $date_request)
            ->set('submit_email', $email_submit)
            ->set('requestor_name', $requestor_name)
            ->set('requestor_position', $requestor_position)
            ->set('requestor_section', $requestor_section)
            ->set('requestor_division', $requestor_division)
            ->set('requestor_email', $requestor_email)
            ->set('learning_model', $learning_model)
            ->set('training_type', $training_type)
            ->set('category_name', $course_cat_text)
            ->set('course_title', $course_title_text)
            ->set('platform', $platform)
            ->set('duration', $duration)
            ->set('planned', $planned)
            ->set('currency', $currency)
            ->set('course_fee', $course_fee);
        if ($currency != "THB") {
            $this->db_ttc->set('exchange_rate', $exchange_rate);
            $this->db_ttc->set('exchange_date', $exchange_date);
        }
        if ($currency == "THB") {
            $this->db_ttc->set('exchange_rate', 1);
            $this->db_ttc->set('exchange_date', null);
        }
        $this->db_ttc->set('attendee_no', $attendee)
            ->set('from_preferred_date', $from_preferred_date)
            ->set('to_preferred_date', $to_preferred_date)
            ->set('training_provider', $training_provider)
            ->set('contact', $contact)
            ->set('training_venue', $training_venue)
            ->set('trainer_name', $trainer_name)
            ->set('required_course', $required_course)
            ->set('license_name', $license_name)
            ->set('additional', $additional)
            ->set('attendee_information', $attendee_information)
            ->set('reason_training', $reason_training_02)
            ->set('supervisor_expectation', $supervisor_expectation)
            ->set('others_please_specify', $others_please_specify);
        if ($file_attachment != "N/A") {
            $this->db_ttc->set('attachment', $file_attachment);
        }
        $this->db_ttc->set('trainining_request_status', $progress_status)
            ->set('status', 1)
            ->set('attendee_list_name', $attendee_name)
            ->set('attendee_list_id', $emp_id_upper)
            ->set('attendee_list_positon', $position)
            ->set('attendee_list_section', $section)
            ->set('attendee_list_division', $division)
            ->set('group_cat_admin', $up_group_cat_admin)
            ->set('attendee_list_company', $company);
        if ($up_workflow_remark == "Rejected by Admin") {
            $this->db_ttc->set('admin_status', 'Pending');
        } else if ($up_workflow_remark == "Rejected by Reviewer") {
            $this->db_ttc->set('reviewer_status', 'Pending');
        } else {
            $this->db_ttc->set('approve_status', 'Pending');
        }
        if ($up_workflow_remark == "Rejected by Admin") {
            $this->db_ttc->set('reviewer_name', $reviewer)
                ->set('reviewer_email', $reviewer_email)
                ->set('approve_name', $approver)
                ->set('approve_email', $approver_email);
        }
        $this->db_ttc->set('workflow_remark', "")
            ->set('more_comment', $up_more_information);
        if ($file_attachment_more != "") {
            $this->db_ttc->set('more_attachment', $file_attachment_more);
        }
        $this->db_ttc->set('see_attachment', $up_see_attachment);
        if ($up_file_see_attachment != '') {
            $this->db_ttc->set('file_see_attachment', $up_file_see_attachment);
        } else if ($up_see_attachment == '') {
            $this->db_ttc->set('file_see_attachment', null);
        }
        $this->db_ttc->where('id', $up_id)
            ->update('tb_training_request_form');
        return $rs;
    }

    function model_up_submit_For_static_admin_Training_Request($up_id, $section_code, $project_code, $cost_code, $date_request, $requestor_name, $requestor_position, $requestor_section, $requestor_division, $requestor_email, $learning_model, $training_type, $course_cat_text, $course_title_text, $platform, $duration, $planned, $course_fee, $attendee, $from_preferred_date, $to_preferred_date, $training_provider, $contact, $training_venue, $trainer_name, $required_course, $license_name, $additional, $attendee_information, $reason_training_02, $supervisor_expectation, $others_please_specify, $file_attachment, $attendee_name, $emp_id, $position, $section, $division, $company, $progress_status, $up_workflow_remark, $up_more_information, $file_attachment_more, $reviewer, $reviewer_email, $approver, $approver_email, $up_group_cat_admin, $up_see_attachment, $up_file_see_attachment, $currency, $exchange_rate, $exchange_date)
    {
        // $currentDateTime = date('Y-m-d H:i:s');
        $emp_id_upper = strtoupper($emp_id);
        // $sql = "SELECT * FROM tb_approval_matrix WHERE section_code = '" . $section_code . "' AND project_code = '" . $project_code . "' AND cost_code = '" . $cost_code . "' AND status = 1";
        // $query = $this->db_ttc->query($sql);
        // $row = $query->row();
        // $reviewer_name = $row->reviewer;
        // $reviewer_email = $row->reviewer_email;
        // $approver_name = $row->approver;
        // $approver_email = $row->approver_email;
        $rs = $this->db_ttc
            // ->set('submit_date', $currentDateTime)
            // ->set('submit_name', $submit_name)
            // ->set('year', $year_submit)
            ->set('section_code', $section_code)
            ->set('project_code', $project_code)
            ->set('cost_code', $cost_code)
            ->set('date_request', $date_request)
            // ->set('submit_email', $email_submit)
            ->set('requestor_name', $requestor_name)
            ->set('requestor_position', $requestor_position)
            ->set('requestor_section', $requestor_section)
            ->set('requestor_division', $requestor_division)
            ->set('requestor_email', $requestor_email)
            ->set('learning_model', $learning_model)
            ->set('training_type', $training_type)
            ->set('category_name', $course_cat_text)
            ->set('course_title', $course_title_text)
            ->set('platform', $platform)
            ->set('duration', $duration)
            ->set('planned', $planned)
            ->set('currency', $currency)
            ->set('course_fee', $course_fee);
        if ($currency != "THB") {
            $this->db_ttc->set('exchange_rate', $exchange_rate);
            $this->db_ttc->set('exchange_date', $exchange_date);
        }
        if ($currency == "THB") {
            $this->db_ttc->set('exchange_rate', 1);
            $this->db_ttc->set('exchange_date', null);
        }
        $this->db_ttc->set('attendee_no', $attendee)
            ->set('from_preferred_date', $from_preferred_date)
            ->set('to_preferred_date', $to_preferred_date)
            ->set('training_provider', $training_provider)
            ->set('contact', $contact)
            ->set('training_venue', $training_venue)
            ->set('trainer_name', $trainer_name)
            ->set('required_course', $required_course)
            ->set('license_name', $license_name)
            ->set('additional', $additional)
            ->set('attendee_information', $attendee_information)
            ->set('reason_training', $reason_training_02)
            ->set('supervisor_expectation', $supervisor_expectation)
            ->set('others_please_specify', $others_please_specify);
        if ($file_attachment != "N/A") {
            $this->db_ttc->set('attachment', $file_attachment);
        }
        $this->db_ttc->set('trainining_request_status', $progress_status)
            ->set('status', 1)
            ->set('attendee_list_name', $attendee_name)
            ->set('attendee_list_id', $emp_id_upper)
            ->set('attendee_list_positon', $position)
            ->set('attendee_list_section', $section)
            ->set('attendee_list_division', $division)
            ->set('attendee_list_company', $company);
        // if ($up_workflow_remark == "Rejected by Admin") {
        //     $this->db_ttc->set('admin_status', 'Pending');
        // } else if ($up_workflow_remark == "Rejected by Reviewer") {
        //     $this->db_ttc->set('reviewer_status', 'Pending');
        // } else {
        //     $this->db_ttc->set('approve_status', 'Pending');
        // }
        $this->db_ttc->set('reviewer_name', $reviewer)
            ->set('reviewer_email', $reviewer_email)
            ->set('approve_name', $approver)
            ->set('approve_email', $approver_email)
            ->set('workflow_remark', "")
            ->set('group_cat_admin', $up_group_cat_admin)
            ->set('more_comment', $up_more_information);
        if ($file_attachment_more != "") {
            $this->db_ttc->set('more_attachment', $file_attachment_more);
        }
        $this->db_ttc->set('see_attachment', $up_see_attachment);
        if ($up_file_see_attachment != '') {
            $this->db_ttc->set('file_see_attachment', $up_file_see_attachment);
        } else if ($up_see_attachment == '') {
            $this->db_ttc->set('file_see_attachment', null);
        }
        $this->db_ttc->where('id', $up_id)
            ->update('tb_training_request_form');
        return $rs;
    }

    function model_up_submit_Formore_infor_Training_Request($up_id, $email_submit, $submit_name, $year_submit, $section_code, $project_code, $cost_code, $date_request, $requestor_name, $requestor_position, $requestor_section, $requestor_division, $requestor_email, $learning_model, $training_type, $course_cat_text, $course_title_text, $platform, $duration, $planned, $course_fee, $attendee, $from_preferred_date, $to_preferred_date, $training_provider, $contact, $training_venue, $trainer_name, $required_course, $license_name, $additional, $attendee_information, $reason_training_02, $supervisor_expectation, $others_please_specify, $file_attachment, $attendee_name, $emp_id, $position, $section, $division, $company, $progress_status, $up_workflow_remark, $up_more_information, $file_attachment_more, $reviewer, $reviewer_email, $approver, $approver_email, $up_group_cat_admin, $up_see_attachment, $up_file_see_attachment, $currency, $exchange_rate, $exchange_date)
    {
        $currentDateTime = date('Y-m-d H:i:s');
        $emp_id_upper = strtoupper($emp_id);
        // $sql = "SELECT * FROM tb_approval_matrix WHERE section_code = '" . $section_code . "' AND project_code = '" . $project_code . "' AND cost_code = '" . $cost_code . "' AND status = 1";
        // $query = $this->db_ttc->query($sql);
        // $row = $query->row();
        // $reviewer_name = $row->reviewer;
        // $reviewer_email = $row->reviewer_email;
        // $approver_name = $row->approver;
        // $approver_email = $row->approver_email;
        $rs = $this->db_ttc
            ->set('submit_date', $currentDateTime)
            ->set('submit_name', $submit_name)
            ->set('year', $year_submit)
            ->set('section_code', $section_code)
            ->set('project_code', $project_code)
            ->set('cost_code', $cost_code)
            ->set('date_request', $date_request)
            ->set('submit_email', $email_submit)
            ->set('requestor_name', $requestor_name)
            ->set('requestor_position', $requestor_position)
            ->set('requestor_section', $requestor_section)
            ->set('requestor_division', $requestor_division)
            ->set('requestor_email', $requestor_email)
            ->set('learning_model', $learning_model)
            ->set('training_type', $training_type)
            ->set('category_name', $course_cat_text)
            ->set('course_title', $course_title_text)
            ->set('platform', $platform)
            ->set('duration', $duration)
            ->set('planned', $planned)
            ->set('currency', $currency)
            ->set('course_fee', $course_fee);
        if ($currency != "THB") {
            $this->db_ttc->set('exchange_rate', $exchange_rate);
            $this->db_ttc->set('exchange_date', $exchange_date);
        }
        if ($currency == "THB") {
            $this->db_ttc->set('exchange_rate', 1);
            $this->db_ttc->set('exchange_date', null);
        }
        $this->db_ttc->set('attendee_no', $attendee)
            ->set('from_preferred_date', $from_preferred_date)
            ->set('to_preferred_date', $to_preferred_date)
            ->set('training_provider', $training_provider)
            ->set('contact', $contact)
            ->set('training_venue', $training_venue)
            ->set('trainer_name', $trainer_name)
            ->set('required_course', $required_course)
            ->set('license_name', $license_name)
            ->set('additional', $additional)
            ->set('attendee_information', $attendee_information)
            ->set('reason_training', $reason_training_02)
            ->set('supervisor_expectation', $supervisor_expectation)
            ->set('group_cat_admin', $up_group_cat_admin)
            ->set('others_please_specify', $others_please_specify)
            ->set('see_attachment', $up_see_attachment);
        if ($up_file_see_attachment != "") {
            $this->db_ttc->set('file_see_attachment', $up_file_see_attachment);
        } else if ($up_see_attachment == "") {
            $this->db_ttc->set('file_see_attachment', "");
        }
        if ($file_attachment != "N/A") {
            $this->db_ttc->set('attachment', $file_attachment);
        }
        $this->db_ttc->set('trainining_request_status', $progress_status)
            ->set('status', 1)
            ->set('attendee_list_name', $attendee_name)
            ->set('attendee_list_id', $emp_id_upper)
            ->set('attendee_list_positon', $position)
            ->set('attendee_list_section', $section)
            ->set('attendee_list_division', $division)
            ->set('attendee_list_company', $company);
        if ($up_workflow_remark == "Requested More Information by Admin") {
            $this->db_ttc->set('admin_status', 'Pending');
        } else if ($up_workflow_remark == "Requested More Information by Reviewer") {
            $this->db_ttc->set('reviewer_status', 'Pending');
        } else {
            $this->db_ttc->set('approve_status', 'Pending');
        }
        if ($up_workflow_remark == "Requested More Information by Admin") {
            $this->db_ttc->set('reviewer_name', $reviewer)
                ->set('reviewer_email', $reviewer_email)
                ->set('approve_name', $approver)
                ->set('approve_email', $approver_email);
        }
        $this->db_ttc->set('workflow_remark', "")
            ->set('more_comment', $up_more_information);
        if ($file_attachment_more != "") {
            $this->db_ttc->set('more_attachment', $file_attachment_more);
        }
        $this->db_ttc->where('id', $up_id)
            ->update('tb_training_request_form');
        return $rs;
    }

    function model_approve_data($username, $group)
    {
        if ($group !=  "") {
            $sql = "(SELECT tr.*, cat.category_name AS cat_category_name,gp.group_name FROM tb_training_request_form tr
        LEFT JOIN tb_category cat ON (tr.category_name = cat.category_name)
        LEFT JOIN tb_group gp ON (cat.cat_group = gp.group_code)";
            $sql .= " WHERE tr.trainining_request_status != 'Draft'
        AND tr.admin_status = 'Approved'
        AND tr.status = 1
        AND (REPLACE(REPLACE(tr.reviewer_name, '  ', ' '), '   ', ' ') = '" . $username . "'AND tr.reviewer_status = 'Pending')
        OR (REPLACE(REPLACE(tr.approve_name, '  ', ' '), '   ', ' ') = '" . $username . "' AND tr.approve_status = 'Pending' AND tr.reviewer_status = 'Approved' AND tr.status = 1)
        ORDER BY tr.submit_date)
        UNION
        (SELECT tr.*, cat.category_name AS cat_category_name, gp.group_name FROM tb_training_request_form tr 
        LEFT JOIN tb_category cat ON (tr.category_name = cat.category_name) ";
            if ($group != "Corporate and HSE") {
                $sql .= " LEFT JOIN tb_admin ad ON (cat.cat_group = ad.group_code)";
            } else {
                $sql .= " LEFT JOIN tb_admin ad ON (cat.cat_group = 'HSE' OR cat_group = 'COR')";
            }
            $sql .=  " LEFT JOIN tb_group gp ON (cat.cat_group = gp.group_code)
        LEFT JOIN data_employee_training.employee emp ON (ad.emp_id = emp.employee_id) 
        WHERE tr.trainining_request_status != 'Draft' 
        AND tr.admin_status = 'Pending' 
        AND ad.status = 1 
        AND tr.status = 1 ";
            if ($group != "Corporate and HSE") {
                $sql .= " AND gp.group_name LIKE '%" . $group . "%'";
            }
            $sql .= " AND REPLACE(REPLACE(emp.name_lastname, '  ', ' '), '   ', ' ') = '" . $username . "'
         ORDER BY tr.submit_date)";
        } else {
            $sql = "SELECT tr.*, cat.category_name AS cat_category_name,gp.group_name FROM tb_training_request_form tr
        LEFT JOIN tb_category cat ON (tr.category_name = cat.category_name)
        LEFT JOIN tb_group gp ON (cat.cat_group = gp.group_code)
        WHERE tr.trainining_request_status != 'Draft'
        AND tr.admin_status = 'Approved'
        AND tr.status = 1
        AND (REPLACE(REPLACE(tr.reviewer_name, '  ', ' '), '   ', ' ') = '" . $username . "' AND tr.reviewer_status = 'Pending')
        OR (REPLACE(REPLACE(tr.approve_name, '  ', ' '), '   ', ' ') = '" . $username . "' AND tr.approve_status = 'Pending' AND tr.reviewer_status = 'Approved' AND tr.status = 1)
        ORDER BY tr.submit_date";
        }
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function model_send_up_Admin_Verify($up_id, $up_username, $up_email, $up_status, $up_comment, $up_position)
    {
        $currentDateTime = date('Y-m-d H:i:s');
        $rs = $this->db_ttc
            ->set('admin_name', $up_username)
            ->set('admin_email', $up_email)
            ->set('admin_position', $up_position)
            ->set('admin_status', $up_status)
            ->set('admin_comment', $up_comment)
            ->set('admin_date', $currentDateTime);
        if ($up_status == 'Approved') {
            $this->db_ttc->set('trainining_request_status', 'Review');
        } else if ($up_status == 'Rejected') {
            $this->db_ttc->set('workflow_remark', 'Rejected by Admin');
        } else {
            $this->db_ttc->set('workflow_remark', 'Requested More Information by Admin');
        }
        $this->db_ttc->where('id', $up_id)
            ->update('tb_training_request_form');
        return $rs;
    }

    function model_send_up_Reviewer_Review($up_id, $up_username, $up_email, $up_status, $up_comment, $up_position)
    {
        $currentDateTime = date('Y-m-d H:i:s');
        $rs = $this->db_ttc
            ->set('reviewer_name', $up_username)
            ->set('reviewer_email', $up_email)
            ->set('reviewer_position', $up_position)
            ->set('reviewer_status', $up_status)
            ->set('reviewer_comment', $up_comment)
            ->set('reviewer_date', $currentDateTime);
        if ($up_status == 'Approved') {
            $this->db_ttc->set('trainining_request_status', 'Review');
        } else if ($up_status == 'Rejected') {
            $this->db_ttc->set('workflow_remark', 'Rejected by Reviewer');
        } else {
            $this->db_ttc->set('workflow_remark', 'Requested More Information by Reviewer');
        }
        $this->db_ttc->where('id', $up_id)
            ->update('tb_training_request_form');
        return $rs;
    }

    function model_send_up_Approver($up_id, $up_username, $up_email, $up_status, $up_comment, $up_position)
    {
        $currentDateTime = date('Y-m-d H:i:s');
        $rs = $this->db_ttc
            ->set('approve_name', $up_username)
            ->set('approve_email', $up_email)
            ->set('approver_position', $up_position)
            ->set('approve_status', $up_status)
            ->set('approve_comment', $up_comment)
            ->set('approver_date', $currentDateTime);
        if ($up_status == 'Approved') {
            $this->db_ttc->set('trainining_request_status', 'Approved');
            $this->db_ttc->set('approve_date', $currentDateTime);
        } else if ($up_status == 'Rejected') {
            $this->db_ttc->set('trainining_request_status', 'Rejected');
            $this->db_ttc->set('workflow_remark', 'Rejected by Approver');
        } else {
            $this->db_ttc->set('workflow_remark', 'Requested More Information by Approver');
        }
        $this->db_ttc->where('id', $up_id)
            ->update('tb_training_request_form');
        return $rs;
    }

    function model_send_re_submit_training_provider($ad_name, $re_up_id, $training_provider, $contact, $training_venue, $re_status, $ad_comment)
    {
        $currentDateTime = date('Y-m-d H:i:s');
        $this->db_ttc->where('training_provider', $training_provider)->where('status != 0');
        $check_dup = $this->db_ttc->get('tb_training_provider');
        if ($check_dup->num_rows() == 0) {
            if ($re_status == "Approved") {
                $rs = $this->db_ttc
                    ->set('training_provider', $training_provider)
                    ->set('contact', $contact)
                    ->set('training_venue', $training_venue)
                    // ->set('trainer_name', $trainer_name)
                    ->set('status', 1)
                    ->insert('tb_training_provider');
            }
            $rs = $this->db_ttc
                ->set('re_status', $re_status)
                ->set('ad_name', $ad_name)
                ->set('ad_comment', $ad_comment)
                ->set('ad_date', $currentDateTime);
            $this->db_ttc->where('id', $re_up_id)
                ->update('tb_request_training_provider');
        } else if ($re_status == "Rejected") {
            $rs = $this->db_ttc
                ->set('re_status', $re_status)
                ->set('ad_name', $ad_name)
                ->set('ad_comment', $ad_comment)
                ->set('ad_date', $currentDateTime);
            $this->db_ttc->where('id', $re_up_id)
                ->update('tb_request_training_provider');
        }
        return $rs;
    }

    function model_send_re_submit_Manage_Trainer($ad_name, $re_up_id, $training_provider_group, $trainer_name, $re_status, $ad_comment, $training_provider)
    {
        $currentDateTime = date('Y-m-d H:i:s');
        $this->db_ttc->where('training_provider_group', $training_provider_group)->where('trainer_name', $trainer_name);
        $check_dup = $this->db_ttc->get('tb_trainer');
        if ($check_dup->num_rows() == 0) {
            if ($re_status == "Approved") {
                $rs = $this->db_ttc
                    ->set('training_provider_group', $training_provider_group)
                    ->set('trainer_name', $trainer_name)
                    ->set('status', 1)
                    ->insert('tb_trainer');
            }
            $rs = $this->db_ttc
                ->set('ad_name', $ad_name)
                ->set('ad_date', $currentDateTime)
                ->set('ad_comment', $ad_comment)
                ->set('re_status', $re_status)
                ->where('id', $re_up_id)
                ->update('tb_request_trainer');
        } else if ($re_status == "Rejected") {
            $rs = $this->db_ttc
                ->set('ad_name', $ad_name)
                ->set('ad_date', $currentDateTime)
                ->set('ad_comment', $ad_comment)
                ->set('re_status', $re_status)
                ->where('id', $re_up_id)
                ->update('tb_request_trainer');
        }
        return $rs;
    }

    function model_send_re_submit_Course_Title($re_up_id, $category_code, $category_code_name, $course_title, $training_hr, $trainer, $re_status, $ad_comment)
    {
        $currentDateTime = date('Y-m-d H:i:s');
        if ($re_status == "Approved") {
            $rs = $this->db_ttc
                ->set('course_title', $course_title)
                ->set('Course_CAT', $category_code)
                ->set('Training_Hr_Course', $training_hr)
                ->set('Trainer', $trainer)
                ->set('status', 1)
                ->insert('tb_course_title');
        }
        $rs = $this->db_ttc
            ->set('re_status', $re_status)
            ->set('ad_name', $_SESSION['username'])
            ->set('ad_date', $currentDateTime)
            ->set('ad_comment', $ad_comment)
            ->where('id', $re_up_id)
            ->update('tb_request_course_title');
        return $rs;
    }

    function model_send_request_course_title($re_name, $re_cat_code, $re_course_title, $re_duration, $re_trainer)
    {
        $rs = $this->db_ttc
            ->set('re_name', $re_name)
            ->set('re_email', $_SESSION['email'])
            ->set('re_course_title', $re_course_title)
            ->set('re_Course_CAT', $re_cat_code)
            ->set('re_Training_Hr_Course', $re_duration)
            ->set('re_Trainer', $re_trainer)
            ->set('status', 1)
            ->set('re_status', 'Pending')
            ->insert('tb_request_course_title');
        return $rs;
    }

    function model_user_request_course_title()
    {
        $sql = "SELECT * FROM tb_request_course_title WHERE re_status = 'Pending'
        AND status = 1
        ORDER BY re_date";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function model_user_request_trainer()
    {
        $sql = "SELECT * FROM tb_request_trainer WHERE re_status = 'Pending'
        AND status = 1
        ORDER BY re_date";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function model_section_code_data($s_section_code, $s_status)
    {
        $sql = "SELECT * FROM tb_section WHERE section_code LIKE '%" . $s_section_code . "%'
        AND status LIKE '%" . $s_status . "%'";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function model_section_code_id($id)
    {
        $sql = "SELECT * FROM tb_section WHERE id = '" . $id . "'";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function model_send_submit_section_code($section_code, $status)
    {
        $this->db_ttc->where('section_code', $section_code)->where('status', 1);
        $check_dup = $this->db_ttc->get('tb_section');
        if ($check_dup->num_rows() == 0) {
            $rs = $this->db_ttc
                ->set('section_code', $section_code)
                ->set('status', $status)
                ->insert('tb_section');
        }
        return $rs;
    }

    function model_send_update_section_code($up_section_code, $up_status, $up_id)
    {
        $this->db_ttc->where('section_code', $up_section_code)->where('status', 1)->where('id !=', $up_id);
        $check_dup = $this->db_ttc->get('tb_section');
        if ($check_dup->num_rows() == 0) {
            $rs = $this->db_ttc
                ->set('section_code', $up_section_code)
                ->set('status', $up_status)
                ->where('id', $up_id)
                ->update('tb_section');
        }
        return $rs;
    }

    function model_currency()
    {
        $sql = "SELECT * FROM tb_currency WHERE status = 1";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function model_send_submit_Manage_Trainer($training_provider_group, $trainer_name, $status)
    {
        $rs = $this->db_ttc
            // ->set('training_provider', $training_provider)
            ->set('training_provider_group', $training_provider_group)
            ->set('trainer_name', $trainer_name)
            ->set('status', $status)
            ->insert('tb_trainer');
        return $rs;
    }

    function model_list_of_trainer($s_training_provider, $s_trainer_name, $s_status)
    {
        $sql = "SELECT tb_trainer.*, tb_training_provider.training_provider AS training_provider_rename FROM `tb_trainer`
        LEFT JOIN tb_training_provider ON (tb_training_provider.id = tb_trainer.training_provider_group)
        WHERE tb_training_provider.status = 1";
        if ($s_training_provider != "") {
            $sql .= " AND tb_training_provider.id = '" . $s_training_provider . "'";
        }
        $sql .= " AND tb_trainer.trainer_name LIKE '%" . $s_trainer_name . "%'
        AND tb_trainer.status LIKE '%" . $s_status . "%'
        ORDER BY training_provider_rename";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function model_Trainer_id($id)
    {
        $sql = "SELECT * FROM tb_trainer WHERE id = '" . $id . "'";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function model_send_update_Manage_Trainer($up_id, $up_training_provider, $up_trainer_name, $up_status)
    {
        $rs = $this->db_ttc
            ->set('training_provider_group', $up_training_provider)
            ->set('trainer_name', $up_trainer_name)
            ->set('status', $up_status)
            ->where('id', $up_id)
            ->update('tb_trainer');
        return $rs;
    }

    function model_trainer()
    {
        $sql = "SELECT * FROM tb_trainer WHERE status = 1";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function model_send_re_trainer_name($re_name, $re_email, $re_training_provider_group, $re_trainer_name, $re_training_provider)
    {
        $rs = $this->db_ttc
            ->set('re_training_provider_group', $re_training_provider_group)
            ->set('re_training_provider', $re_training_provider)
            ->set('re_trainer_name', $re_trainer_name)
            ->set('re_status', 'Pending')
            ->set('re_name', $re_name)
            ->set('email', $re_email)
            ->set('status', 1)
            ->insert('tb_request_trainer');
        return $rs;
    }

    function model_request_Trainer_id_re($id_re)
    {
        $sql = "SELECT *  FROM tb_request_trainer WHERE id = '" . $id_re . "'";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }
}
