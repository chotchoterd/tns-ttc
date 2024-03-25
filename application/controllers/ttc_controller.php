<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ttc_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->model('modelTTC', 'ttc');
    }

    public function uploadAttachment()
    {
        // if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        //     echo json_encode(['error' => 'Invalid request method']);
        //     return;
        // }
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            $response = array('error' => 'Invalid request method');
            echo json_encode($response);
            return;
        }

        // $file_datetime = $_POST["current_date_time"] ?? date('YmdHis');
        $file_datetime = isset($_POST["current_date_time"]) ? $_POST["current_date_time"] : date('YmdHis');

        $config['upload_path'] = './attachment/';
        $config['allowed_types'] = 'jpg|png|pdf';
        $config['file_name'] = "att-" . $file_datetime;

        $config2['upload_path'] = './attachment/';
        $config2['allowed_types'] = 'jpg|png|pdf|xls|xlsx';
        $config2['file_name'] = "see-" . $file_datetime;

        $this->load->library('upload');

        $uploaded_files = array();

        if (isset($_FILES['attachment']['name']) && !empty($_FILES['attachment']['name'])) {
            $this->upload->initialize($config);
            if ($this->upload->do_upload('attachment')) {
                $uploaded_files['attachment'] = $this->upload->data();
            } else {
                $error = array('error' => $this->upload->display_errors());
                echo json_encode($error);
            }
        }

        if (isset($_FILES['file_see_attachment']['name']) && !empty($_FILES['file_see_attachment']['name'])) {
            $this->upload->initialize($config2);
            if ($this->upload->do_upload('file_see_attachment')) {
                $uploaded_files['file_see_attachment'] = $this->upload->data();
            } else {
                $error = array('error' => $this->upload->display_errors());
                echo json_encode($error);
            }
        }
        // Output uploaded files
        echo json_encode($uploaded_files);
    }

    // public function uploadAttachment()
    // {
    //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //         $file_datetime = $_POST["current_date_time"];
    //     }
    //     $config['upload_path'] = './attachment/';
    //     $config['allowed_types'] = 'jpg|png|pdf';
    //     $config['file_name'] = "att-" . $file_datetime;

    //     $config2['upload_path'] = './attachment/';
    //     $config2['allowed_types'] = 'jpg|png|pdf|xls|xlsx';
    //     $config2['file_name'] = "see-" . $file_datetime;

    //     $this->load->library('upload');

    //     $uploaded_files = array();

    //     $this->upload->initialize($config);
    //     if ($this->upload->do_upload('attachment')) {
    //         $uploaded_files['attachment'] = $this->upload->data();
    //     } else {
    //         $error = array('error' => $this->upload->display_errors());
    //         echo json_encode($error);
    //         return;
    //     }

    //     $this->upload->initialize($config2);
    //     if ($this->upload->do_upload('file_see_attachment')) {
    //         $uploaded_files['file_see_attachment'] = $this->upload->data();
    //     } else {
    //         $error = array('error' => $this->upload->display_errors());
    //         echo json_encode($error);
    //         return;
    //     }
    //     echo json_encode($uploaded_files);
    // }

    public function up_uploadAttachment()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $file_datetime = $_POST["up_current_date_time"];
        }
        $config['upload_path'] = './attachment/';
        $config['allowed_types'] = 'jpg|png|pdf';
        $config['file_name'] = "att-" . $file_datetime;
        $this->load->library('upload');
        $uploaded_files = array();
        $this->upload->initialize($config);

        if ($this->upload->do_upload('up_attachment')) {
            $uploaded_files['up_attachment'] = $this->upload->data();
        }
        echo json_encode($uploaded_files);

        $config['upload_path'] = './attachment/';
        $config['allowed_types'] = 'jpg|png|pdf|xls|xlsx';
        $config['file_name'] = "see-" . $file_datetime;
        $this->load->library('upload');
        $uploaded_files = array();
        $this->upload->initialize($config);

        if ($this->upload->do_upload('up_file_see_attachment')) {
            $uploaded_files['up_file_see_attachment'] = $this->upload->data();
        }
        echo json_encode($uploaded_files);

        $config['upload_path'] = './attachment/';
        $config['allowed_types'] = 'jpg|png|pdf';
        $config['file_name'] = "more-att-" . $file_datetime;
        $this->load->library('upload');
        $uploaded_files_more = array();
        $this->upload->initialize($config);

        if ($this->upload->do_upload('up_attachment_more_information')) {
            $uploaded_files_more['up_attachment_more_information'] = $this->upload->data();
        } else {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
            return;
        }
        echo json_encode($uploaded_files_more);
    }

    // public function up_uploadAttachment()
    // {
    //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //         $file_datetime = $_POST["up_current_date_time"];
    //     }
    //     $config['upload_path'] = './attachment/';
    //     $config['allowed_types'] = 'jpg|png|pdf';
    //     $config['file_name'] = "att-" . $file_datetime;
    //     $this->load->library('upload');

    //     $uploaded_files = array();

    //     $this->upload->initialize($config);

    //     if ($this->upload->do_upload('up_attachment')) {
    //         $uploaded_files['up_attachment'] = $this->upload->data();
    //     }
    //     echo json_encode($uploaded_files);

    //     $config['upload_path'] = './attachment/';
    //     $config['allowed_types'] = 'jpg|png|pdf';
    //     $config['file_name'] = "more-att-" . $file_datetime;
    //     $this->load->library('upload');
    //     $uploaded_files_more = array();
    //     $this->upload->initialize($config);

    //     if ($this->upload->do_upload('up_attachment_more_information')) {
    //         $uploaded_files_more['up_attachment_more_information'] = $this->upload->data();
    //     } else {
    //         $error = array('error' => $this->upload->display_errors());
    //         echo json_encode($error);
    //         return;
    //     }
    //     echo json_encode($uploaded_files_more);
    // }

    public function get_course_title($course_cat)
    {
        $course_title = $this->ttc->model_course_title_by_cat($course_cat);
        header('Content-Type: application/json');
        echo json_encode($course_title);
    }

    public function get_project_code($section_code)
    {
        $project_code = $this->ttc->model_project_code_by_section($section_code);
        header('Content-Type: application/json');
        echo json_encode($project_code);
    }

    public function get_cost_code($section_code)
    {
        $cost_code = $this->ttc->model_cost_code_by_section($section_code);
        header('Content-Type: application/json');
        echo json_encode($cost_code);
    }

    public function get_project_code_cost_code($project_code, $section_code)
    {
        $project_code_cost_code = $this->ttc->model_project_code_cost_code($project_code, $section_code);
        header('Content-Type: application/json');
        echo json_encode($project_code_cost_code);
    }

    public function get_duration($course_title)
    {
        $course_duration = $this->ttc->model_course_duration_by_title($course_title);
        header('Content-Type: application/json');
        echo json_encode($course_duration);
    }

    public function get_course_title_all()
    {
        $course_title = $this->ttc->model_course_title();
        header('Content-Type: application/json');
        echo json_encode($course_title);
    }

    public function get_project_code_all()
    {
        $course_title = $this->ttc->model_approval_matrix_project_code();
        header('Content-Type: application/json');
        echo json_encode($course_title);
    }

    public function get_cost_code_all()
    {
        $course_title = $this->ttc->model_approval_matrix_cost_code();
        header('Content-Type: application/json');
        echo json_encode($course_title);
    }

    public function get_training_provider($training_provider)
    {
        $data_training_provider = $this->ttc->model_data_training_provider(urldecode($training_provider));
        header('Content-Type: application/json');
        echo json_encode($data_training_provider);
    }

    public function get_trainer_name($training_provider)
    {
        $data_trainer = $this->ttc->model_data_trainer(urldecode($training_provider));
        header('Content-Type: application/json');
        echo json_encode($data_trainer);
    }

    function get_category_code_manage($category_code)
    {
        $category_code_manage = $this->ttc->model_category_code_manage($category_code);
        header('Content-Type: application/json');
        echo json_encode($category_code_manage);
    }

    function get_category_code_manage_re()
    {
        $category_code_manage = $this->ttc->model_category();
        header('Content-Type: application/json');
        echo json_encode($category_code_manage);
    }

    function get_workflow_matrix($section_code_flow, $project_code_flow, $cost_code_flow)
    {
        $workflow_matrix = $this->ttc->model_get_workflow_matrix($section_code_flow, $project_code_flow, $cost_code_flow);
        header('Content-Type: application/json');
        echo json_encode($workflow_matrix);
    }

    function get_current_workflow($up_id)
    {
        $current_workflow = $this->ttc->model_get_current_workflow($up_id);
        header('Content-Type: application/json');
        echo json_encode($current_workflow);
    }

    function get_division()
    {
        $rs = $this->ttc->model_form_division();
        if ($rs) {
            $rows = json_encode($rs);
            $json = '{"ok": true, "rows": ' . $rows . '}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    //####
    function get_position()
    {
        $rs = $this->ttc->model_position_request();
        if ($rs) {
            $rows = json_encode($rs);
            $json = '{"ok": true, "rows": ' . $rows . '}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function get_section()
    {
        $rs = $this->ttc->model_section_request();
        if ($rs) {
            $rows = json_encode($rs);
            $json = '{"ok": true, "rows": ' . $rows . '}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function get_company()
    {
        $rs = $this->ttc->model_company_request();
        if ($rs) {
            $rows = json_encode($rs);
            $json = '{"ok": true, "rows": ' . $rows . '}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }
    //####

    function read_json($json)
    {
        ini_set('display_errors', 0);
        header('Content-Type: application/json');
        echo $json;
    }

    function formRequest()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = "";
        }
        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
        } else {
            $username = "";
        }
        if (isset($_SESSION["group"])) {
            $group = $_SESSION["group"];
        } else {
            $group = "";
        }
        //####
        $position_request['position_request'] = $this->ttc->model_position_request();
        $section_request['section_request'] = $this->ttc->model_section_request();
        $company_request['company_request'] = $this->ttc->model_company_request();
        //####
        $trainer['trainer'] = $this->ttc->model_trainer();
        $currency['currency'] = $this->ttc->model_currency();
        $user_request_course_title['user_request_course_title'] = $this->ttc->model_user_request_course_title();
        $user_request_training_provider['user_request_training_provider'] = $this->ttc->model_user_request_training_provider();
        $user_request_trainer['user_request_trainer'] = $this->ttc->model_user_request_trainer();
        $formRequest_id['formRequest_id'] = $this->ttc->model_training_request_form_id($id);
        $approval_matrix['approval_matrix'] = $this->ttc->model_approval_matrix();
        $approval_matrix_project_code['approval_matrix_project_code'] = $this->ttc->model_approval_matrix_project_code();
        $approval_matrix_cost_code['approval_matrix_cost_code'] = $this->ttc->model_approval_matrix_cost_code();
        $division['division'] = $this->ttc->model_form_division();
        $category['category'] = $this->ttc->model_category();
        $course_title['course_title'] = $this->ttc->model_course_title();
        $training_provider['training_provider'] = $this->ttc->model_training_provider();
        $reason_training['reason_training'] = $this->ttc->model_reason_training();
        $approve_data['approve_data'] = $this->ttc->model_approve_data($username, $group);
        $title['title'] = 'Request Training !';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu', $approve_data + $user_request_course_title + $user_request_training_provider + $user_request_trainer);
        $this->load->view('formRequest', $company_request + $section_request + $position_request + $course_title + $category + $training_provider + $reason_training + $division + $approval_matrix + $approval_matrix_project_code + $approval_matrix_cost_code + $formRequest_id + $currency + $trainer);
        $this->load->view('include/footer');
    }

    function manageCourseCategory()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = "";
        }
        if (isset($_GET['s_category_code'])) {
            $s_category_code = $_GET['s_category_code'];
        } else {
            $s_category_code = "";
        }
        if (isset($_GET['s_category_name'])) {
            $s_category_name = $_GET['s_category_name'];
        } else {
            $s_category_name = "";
        }
        if (isset($_GET['s_scope_of_use'])) {
            $s_scope_of_use = $_GET['s_scope_of_use'];
        } else {
            $s_scope_of_use = "";
        }
        if (isset($_GET['s_group'])) {
            $s_group = $_GET['s_group'];
        } else {
            $s_group = "";
        }
        if (isset($_GET['s_status'])) {
            $s_status = $_GET['s_status'];
        } else {
            $s_status = "";
        }
        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
        } else {
            $username = "";
        }
        if (isset($_SESSION["group"])) {
            $group = $_SESSION["group"];
        } else {
            $group = "";
        }
        $user_request_course_title['user_request_course_title'] = $this->ttc->model_user_request_course_title();
        $user_request_training_provider['user_request_training_provider'] = $this->ttc->model_user_request_training_provider();
        $user_request_trainer['user_request_trainer'] = $this->ttc->model_user_request_trainer();
        $manageCourseCategory_id['manageCourseCategory_id'] = $this->ttc->model_manageCourseCategory_id($id);
        $course_category['course_category'] = $this->ttc->model_category_for_manage($s_category_code, $s_category_name, $s_scope_of_use, $s_group, $s_status);
        $group_for_manage['group_for_manage'] = $this->ttc->model_group_for_manage();
        $group_manage['group_manage'] = $this->ttc->model_group_for_manageCourseCategory();
        $approve_data['approve_data'] = $this->ttc->model_approve_data($username, $group);
        $title['title'] = 'Manage Course Category';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu', $approve_data + $user_request_course_title + $user_request_training_provider + $user_request_trainer);
        $this->load->view('manageCourseCategory', $course_category + $manageCourseCategory_id + $group_for_manage + $group_manage);
        $this->load->view('include/footer');
    }

    function manageCourseTitle()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = "";
        }
        if (isset($_GET['id_re'])) {
            $id_re = $_GET['id_re'];
        } else {
            $id_re = "";
        }
        if (isset($_GET['s_course_title'])) {
            $s_course_title = $_GET['s_course_title'];
        } else {
            $s_course_title = "";
        }
        if (isset($_GET['s_category_code'])) {
            $s_category_code = $_GET['s_category_code'];
        } else {
            $s_category_code = "";
        }
        if (isset($_GET['s_category_name'])) {
            $s_category_name = $_GET['s_category_name'];
        } else {
            $s_category_name = "";
        }
        if (isset($_GET['s_training_hr'])) {
            $s_training_hr = $_GET['s_training_hr'];
        } else {
            $s_training_hr = "";
        }
        if (isset($_GET['s_status'])) {
            $s_status = $_GET['s_status'];
        } else {
            $s_status = "";
        }
        if (isset($_GET['s_trainer'])) {
            $s_trainer = $_GET['s_trainer'];
        } else {
            $s_trainer = "";
        }
        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
        } else {
            $username = "";
        }
        if (isset($_SESSION["group"])) {
            $group = $_SESSION["group"];
        } else {
            $group = "";
        }
        $user_request_course_title['user_request_course_title'] = $this->ttc->model_user_request_course_title();
        $user_request_training_provider['user_request_training_provider'] = $this->ttc->model_user_request_training_provider();
        $user_request_trainer['user_request_trainer'] = $this->ttc->model_user_request_trainer();
        $category['category'] = $this->ttc->model_category();
        $course_title_tb['course_title_tb'] = $this->ttc->model_course_title_for_manage_intable($s_course_title, $s_category_code, $s_category_name, $s_training_hr, $s_status, $s_trainer);
        $course_category['course_category'] = $this->ttc->model_category();
        $manageCourseTitle_id['manageCourseTitle_id'] = $this->ttc->model_manageCourseTitle_id($id);
        $request_course_title_id_re['request_course_title_id_re'] = $this->ttc->model_request_course_title_id_re($id_re);
        $approve_data['approve_data'] = $this->ttc->model_approve_data($username, $group);
        $title['title'] = 'Manage Course Title';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu', $approve_data + $user_request_course_title + $user_request_training_provider + $user_request_trainer);
        $this->load->view('manageCourseTitle', $category + $course_title_tb + $course_category + $manageCourseTitle_id + $request_course_title_id_re);
        $this->load->view('include/footer');
    }

    function manageTrainingProvider()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = "";
        }
        if (isset($_GET['id_re'])) {
            $id_re = $_GET['id_re'];
        } else {
            $id_re = "";
        }
        if (isset($_GET['s_training_provider'])) {
            $s_training_provider = $_GET['s_training_provider'];
        } else {
            $s_training_provider = "";
        }
        if (isset($_GET['s_contact'])) {
            $s_contact = $_GET['s_contact'];
        } else {
            $s_contact = "";
        }
        if (isset($_GET['s_training_venue'])) {
            $s_training_venue = $_GET['s_training_venue'];
        } else {
            $s_training_venue = "";
        }
        if (isset($_GET['s_trainer_name'])) {
            $s_trainer_name = $_GET['s_trainer_name'];
        } else {
            $s_trainer_name = "";
        }
        if (isset($_GET['s_status'])) {
            $s_status = $_GET['s_status'];
        } else {
            $s_status = "";
        }
        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
        } else {
            $username = "";
        }
        if (isset($_SESSION["group"])) {
            $group = $_SESSION["group"];
        } else {
            $group = "";
        }
        $user_request_course_title['user_request_course_title'] = $this->ttc->model_user_request_course_title();
        $user_request_training_provider['user_request_training_provider'] = $this->ttc->model_user_request_training_provider();
        $user_request_trainer['user_request_trainer'] = $this->ttc->model_user_request_trainer();
        $manage_TrainingProvider['manage_TrainingProvider'] = $this->ttc->model_manage_TrainingProvider($s_training_provider, $s_contact, $s_training_venue, $s_trainer_name, $s_status);
        $manage_TrainingProvider_id['manage_TrainingProvider_id'] = $this->ttc->model_manage_TrainingProvider_id($id);
        $request_TrainingProvider_id['request_TrainingProvider_id'] = $this->ttc->model_request_TrainingProvider_id($id_re);
        $approve_data['approve_data'] = $this->ttc->model_approve_data($username, $group);
        $title['title'] = 'Manage Training Provider';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu', $approve_data + $user_request_course_title + $user_request_training_provider + $user_request_trainer);
        $this->load->view('manageTrainingProvider', $manage_TrainingProvider +  $manage_TrainingProvider_id + $request_TrainingProvider_id);
        $this->load->view('include/footer');
    }

    function submit_manageCourseCategory_ajax()
    {
        $category_code = $this->input->post('category_code');
        $category_name = $this->input->post('category_name');
        $scope_of_use = $this->input->post('scope_of_use');
        $cat_group = $this->input->post('cat_group');
        $status = $this->input->post('status');

        $rs = $this->ttc->model_submit_manageCourseCategory($category_code, $category_name, $scope_of_use, $cat_group, $status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function update_manageCourseCategory_ajax()
    {
        $up_id = $this->input->post('up_id');
        $up_category_code = $this->input->post('up_category_code');
        $up_category_name = $this->input->post('up_category_name');
        $up_scope_of_use = $this->input->post('up_scope_of_use');
        $up_cat_group = $this->input->post('up_cat_group');
        $up_status = $this->input->post('up_status');

        $rs = $this->ttc->model_update_manageCourseCategory($up_id, $up_category_code, $up_category_name, $up_scope_of_use, $up_cat_group, $up_status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function submit_manageCourseTitle_ajax()
    {
        $category_code = $this->input->post('category_code');
        $course_title = $this->input->post('course_title');
        $training_hr = $this->input->post('training_hr');
        $trainer = $this->input->post('trainer');
        $status = $this->input->post('status');

        $rs = $this->ttc->model_submit_manageCourseTitle($category_code, $course_title, $training_hr, $trainer, $status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function update_manageCourseTitle_ajax()
    {
        $up_id = $this->input->post('up_id');
        $up_category_code = $this->input->post('up_category_code');
        $up_course_title = $this->input->post('up_course_title');
        $up_training_hr = $this->input->post('up_training_hr');
        $up_trainer = $this->input->post('up_trainer');
        $up_status = $this->input->post('up_status');

        $rs = $this->ttc->model_update_manageCourseTitle($up_id, $up_category_code, $up_course_title, $up_training_hr, $up_trainer, $up_status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function manageGroup()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = "";
        }
        if (isset($_GET['s_group_code'])) {
            $s_group_code = $_GET['s_group_code'];
        } else {
            $s_group_code = "";
        }
        if (isset($_GET['s_group_name'])) {
            $s_group_name = $_GET['s_group_name'];
        } else {
            $s_group_name = "";
        }
        if (isset($_GET['s_status'])) {
            $s_status = $_GET['s_status'];
        } else {
            $s_status = "";
        }
        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
        } else {
            $username = "";
        }
        if (isset($_SESSION["group"])) {
            $group = $_SESSION["group"];
        } else {
            $group = "";
        }
        $user_request_course_title['user_request_course_title'] = $this->ttc->model_user_request_course_title();
        $user_request_training_provider['user_request_training_provider'] = $this->ttc->model_user_request_training_provider();
        $user_request_trainer['user_request_trainer'] = $this->ttc->model_user_request_trainer();
        $group['group'] = $this->ttc->model_group($s_group_code, $s_group_name, $s_status);
        $group_id['group_id'] = $this->ttc->model_group_id($id);
        $approve_data['approve_data'] = $this->ttc->model_approve_data($username, $group);
        $title['title'] = 'Manage Group';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu', $approve_data + $user_request_course_title + $user_request_training_provider + $user_request_trainer);
        $this->load->view('manageGroup', $group + $group_id);
        $this->load->view('include/footer');
    }

    function submit_ManageGroup_ajax()
    {
        $group_code = $this->input->post('group_code');
        $group_name = $this->input->post('group_name');
        $status = $this->input->post('status');

        $rs = $this->ttc->model_submit_ManageGroup($group_code, $group_name, $status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function update_ManageGroup_ajax()
    {
        $up_id = $this->input->post('up_id');
        $up_group_code = $this->input->post('up_group_code');
        $up_group_name = $this->input->post('up_group_name');
        $up_status = $this->input->post('up_status');

        $rs = $this->ttc->model_update_ManageGroup($up_id, $up_group_code, $up_group_name, $up_status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function submit_training_provider_ajax()
    {
        $training_provider = $this->input->post('training_provider');
        $contact = $this->input->post('contact');
        $training_venue = $this->input->post('training_venue');
        // $trainer_name = $this->input->post('trainer_name');
        $status = $this->input->post('status');

        $rs = $this->ttc->model_submit_training_provider($training_provider, $contact, $training_venue, $status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function update_training_provider_ajax()
    {
        $up_id = $this->input->post('up_id');
        $up_training_provider = $this->input->post('up_training_provider');
        $up_contact = $this->input->post('up_contact');
        $up_training_venue = $this->input->post('up_training_venue');
        // $up_trainer_name = $this->input->post('up_trainer_name');
        $up_status = $this->input->post('up_status');

        $rs = $this->ttc->model_update_training_provider($up_id, $up_training_provider, $up_contact, $up_training_venue, $up_status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function manageAdmin()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = "";
        }
        if (isset($_GET['s_emp_id'])) {
            $s_emp_id = $_GET['s_emp_id'];
        } else {
            $s_emp_id = "";
        }
        if (isset($_GET['s_name'])) {
            $s_name = $_GET['s_name'];
        } else {
            $s_name = "";
        }
        if (isset($_GET['s_email'])) {
            $s_email = $_GET['s_email'];
        } else {
            $s_email = "";
        }
        if (isset($_GET['s_group'])) {
            $s_group = $_GET['s_group'];
        } else {
            $s_group = "";
        }
        if (isset($_GET['s_status'])) {
            $s_status = $_GET['s_status'];
        } else {
            $s_status = "";
        }
        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
        } else {
            $username = "";
        }
        if (isset($_SESSION["group"])) {
            $group = $_SESSION["group"];
        } else {
            $group = "";
        }
        $user_request_course_title['user_request_course_title'] = $this->ttc->model_user_request_course_title();
        $user_request_training_provider['user_request_training_provider'] = $this->ttc->model_user_request_training_provider();
        $user_request_trainer['user_request_trainer'] = $this->ttc->model_user_request_trainer();
        $group_for_manage['group_for_manage'] = $this->ttc->model_group_for_manage();
        $manage_admin_for_table['manage_admin_for_table'] = $this->ttc->model_manage_admin_for_table($s_emp_id, $s_name, $s_email, $s_group, $s_status);
        $manage_admin_id['manage_admin_id'] = $this->ttc->model_manage_admin_id($id);
        $approve_data['approve_data'] = $this->ttc->model_approve_data($username, $group);
        $title['title'] = 'Manage Admin';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu', $approve_data + $user_request_course_title + $user_request_training_provider + $user_request_trainer);
        $this->load->view('manageAdmin', $group_for_manage + $manage_admin_for_table + $manage_admin_id);
        $this->load->view('include/footer');
    }

    function submit_admin_ajax()
    {
        $employee_id = $this->input->post('employee_id');
        $group_code = $this->input->post('group_code');
        $status = $this->input->post('status');

        $rs = $this->ttc->model_submit_admin($employee_id, $group_code, $status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function update_admin_ajax()
    {
        $up_id = $this->input->post('up_id');
        $up_employee_id = $this->input->post('up_employee_id');
        $up_group_code = $this->input->post('up_group_code');
        $up_status = $this->input->post('up_status');

        $rs = $this->ttc->model_update_admin($up_id, $up_employee_id, $up_group_code, $up_status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function UserRequestCourseTitle()
    {
        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
        } else {
            $username = "";
        }
        if (isset($_SESSION["group"])) {
            $group = $_SESSION["group"];
        } else {
            $group = "";
        }
        $user_request_course_title['user_request_course_title'] = $this->ttc->model_user_request_course_title();
        $user_request_training_provider['user_request_training_provider'] = $this->ttc->model_user_request_training_provider();
        $user_request_trainer['user_request_trainer'] = $this->ttc->model_user_request_trainer();
        $category['category'] = $this->ttc->model_category();
        $approve_data['approve_data'] = $this->ttc->model_approve_data($username, $group);
        $title['title'] = 'User Request Course Title Form';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu', $approve_data + $user_request_course_title + $user_request_training_provider + $user_request_trainer);
        $this->load->view('UserRequestCourseTitle', $category);
        $this->load->view('include/footer');
    }

    function UserRequestTrainingProvider()
    {
        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
        } else {
            $username = "";
        }
        if (isset($_SESSION["group"])) {
            $group = $_SESSION["group"];
        } else {
            $group = "";
        }
        $user_request_course_title['user_request_course_title'] = $this->ttc->model_user_request_course_title();
        $user_request_training_provider['user_request_training_provider'] = $this->ttc->model_user_request_training_provider();
        $user_request_trainer['user_request_trainer'] = $this->ttc->model_user_request_trainer();
        $approve_data['approve_data'] = $this->ttc->model_approve_data($username, $group);
        $title['title'] = 'User Request Training Provider Form';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu', $approve_data + $user_request_course_title + $user_request_training_provider + $user_request_trainer);
        $this->load->view('UserRequestTrainingProvider');
        $this->load->view('include/footer');
    }

    function send_request_training_provider_ajax()
    {
        $re_name = $this->input->post("re_name");
        $re_training_provider = $this->input->post('re_training_provider');
        $re_email = $this->input->post('re_email');
        $re_contact = $this->input->post('re_contact');
        $re_training_venue = $this->input->post('re_training_venue');
        // $re_trainer_name = $this->input->post('re_trainer_name');

        $rs = $this->ttc->model_send_request_training_provider($re_name, $re_training_provider, $re_email, $re_contact, $re_training_venue);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function RequestTrainingProvider()
    {
        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
        } else {
            $username = "";
        }
        if (isset($_SESSION["group"])) {
            $group = $_SESSION["group"];
        } else {
            $group = "";
        }
        $user_request_course_title['user_request_course_title'] = $this->ttc->model_user_request_course_title();
        $user_request_training_provider['user_request_training_provider'] = $this->ttc->model_user_request_training_provider();
        $user_request_trainer['user_request_trainer'] = $this->ttc->model_user_request_trainer();
        $approve_data['approve_data'] = $this->ttc->model_approve_data($username, $group);
        $title['title'] = 'Request Training Provider';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu', $approve_data + $user_request_training_provider + $user_request_course_title + $user_request_trainer);
        $this->load->view('RequestTrainingProvider', $user_request_training_provider);
        $this->load->view('include/footer');
    }

    function RequestCourseTitle()
    {
        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
        } else {
            $username = "";
        }
        if (isset($_SESSION["group"])) {
            $group = $_SESSION["group"];
        } else {
            $group = "";
        }
        $user_request_course_title['user_request_course_title'] = $this->ttc->model_user_request_course_title();
        $user_request_training_provider['user_request_training_provider'] = $this->ttc->model_user_request_training_provider();
        $user_request_trainer['user_request_trainer'] = $this->ttc->model_user_request_trainer();
        $approve_data['approve_data'] = $this->ttc->model_approve_data($username, $group);
        $title['title'] = 'Request Course Title';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu', $approve_data + $user_request_course_title + $user_request_training_provider + $user_request_trainer);
        $this->load->view('RequestCourseTitle', $user_request_course_title);
        $this->load->view('include/footer');
    }

    function send_request_course_title_ajax()
    {
        $re_name = $this->input->post('re_name');
        $re_cat_code = $this->input->post('re_cat_code');
        $re_course_title = $this->input->post('re_course_title');
        $re_duration = $this->input->post('re_duration');
        $re_trainer = $this->input->post('re_trainer');

        $rs = $this->ttc->model_send_request_course_title($re_name, $re_cat_code, $re_course_title, $re_duration, $re_trainer);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function submit_Training_Request_ajax()
    {
        $email_submit = $this->input->post('email_submit');
        $submit_name = $this->input->post('submit_name');
        $year_submit = $this->input->post('year_submit');
        $section_code = $this->input->post('section_code');
        $project_code = $this->input->post('project_code');
        $cost_code = $this->input->post('cost_code');
        $date_request = $this->input->post('date_request');
        $requestor_name = $this->input->post('requestor_name');
        $requestor_position = $this->input->post('requestor_position');
        $requestor_section = $this->input->post('requestor_section');
        $requestor_division = $this->input->post('requestor_division');
        $requestor_email = $this->input->post('requestor_email');
        $learning_model = $this->input->post('learning_model');
        $training_type = $this->input->post('training_type');
        $course_cat_text = $this->input->post('course_cat_text');
        $course_title_text = $this->input->post('course_title_text');
        $platform = $this->input->post('platform');
        $duration = $this->input->post('duration');
        $planned = $this->input->post('planned');
        $course_fee = $this->input->post('course_fee');
        $attendee = $this->input->post('attendee');
        $from_preferred_date = $this->input->post('from_preferred_date');
        $to_preferred_date = $this->input->post('to_preferred_date');
        $training_provider = $this->input->post('training_provider');
        $contact = $this->input->post('contact');
        $training_venue = $this->input->post('training_venue');
        $trainer_name = $this->input->post('trainer_name');
        $required_course = $this->input->post('required_course');
        $license_name = $this->input->post('license_name');
        $additional = $this->input->post('additional');
        $attendee_information = $this->input->post('attendee_information');
        $reason_training_02 = $this->input->post('reason_training_02');
        $supervisor_expectation = $this->input->post('supervisor_expectation');
        $others_please_specify = $this->input->post('others_please_specify');
        $file_attachment = $this->input->post('file_attachment');
        $attendee_name = $this->input->post('attendee_name');
        $emp_id = $this->input->post('emp_id');
        $position = $this->input->post('position');
        $section = $this->input->post('section');
        $division = $this->input->post('division');
        $company = $this->input->post('company');
        $progress_status = $this->input->post('progress_status');
        $reviewer = $this->input->post('reviewer');
        $reviewer_email = $this->input->post('reviewer_email');
        $approver = $this->input->post('approver');
        $approver_email = $this->input->post('approver_email');
        $group_cat_admin = $this->input->post('group_cat_admin');
        $see_attachment2 = $this->input->post('see_attachment2');
        $file_see_attachment2 = $this->input->post('file_see_attachment2');
        $currency = $this->input->post('currency');
        $exchange_rate = $this->input->post('exchange_rate');
        $exchange_date = $this->input->post('exchange_date');

        $rs = $this->ttc->model_submit_Training_Request($email_submit, $submit_name, $year_submit, $section_code, $project_code, $cost_code, $date_request, $requestor_name, $requestor_position, $requestor_section, $requestor_division, $requestor_email, $learning_model, $training_type, $course_cat_text, $course_title_text, $platform, $duration, $planned, $course_fee, $attendee, $from_preferred_date, $to_preferred_date, $training_provider, $contact, $training_venue, $trainer_name, $required_course, $license_name, $additional, $attendee_information, $reason_training_02, $supervisor_expectation, $others_please_specify, $file_attachment, $attendee_name, $emp_id, $position, $section, $division, $company, $progress_status, $reviewer, $reviewer_email, $approver, $approver_email, $group_cat_admin, $see_attachment2, $file_see_attachment2, $currency, $exchange_rate, $exchange_date);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function HistoryForUser()
    {
        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
        } else {
            $username = "";
        }
        if (isset($_SESSION["group"])) {
            $group = $_SESSION["group"];
        } else {
            $group = "";
        }
        if (isset($_GET['s_tr_no'])) {
            $s_tr_no = $_GET['s_tr_no'];
        } else {
            $s_tr_no = "";
        }
        if (isset($_GET['s_date_request'])) {
            $s_date_request = $_GET['s_date_request'];
        } else {
            $s_date_request = "";
        }
        if (isset($_GET['s_requestor_name'])) {
            $s_requestor_name = $_GET['s_requestor_name'];
        } else {
            $s_requestor_name = "";
        }
        if (isset($_GET['s_course_category'])) {
            $s_course_category = $_GET['s_course_category'];
        } else {
            $s_course_category = "";
        }
        if (isset($_GET['s_course_title'])) {
            $s_course_title = $_GET['s_course_title'];
        } else {
            $s_course_title = "";
        }
        if (isset($_GET['s_approval_status'])) {
            $s_approval_status = $_GET['s_approval_status'];
        } else {
            $s_approval_status = "";
        }
        if (isset($_GET['s_status'])) {
            $s_status = $_GET['s_status'];
        } else {
            $s_status = "";
        }
        $user_request_course_title['user_request_course_title'] = $this->ttc->model_user_request_course_title();
        $user_request_training_provider['user_request_training_provider'] = $this->ttc->model_user_request_training_provider();
        $user_request_trainer['user_request_trainer'] = $this->ttc->model_user_request_trainer();
        $show_HistoryForUser['show_HistoryForUser'] = $this->ttc->model_show_HistoryForUser($username, $s_tr_no, $s_date_request, $s_requestor_name, $s_course_category, $s_course_title, $s_approval_status, $s_status);
        $course_category['course_category'] = $this->ttc->model_category();
        $course_title['course_title'] = $this->ttc->model_course_title();
        $approve_data['approve_data'] = $this->ttc->model_approve_data($username, $group);
        $title['title'] = 'History For User';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu', $approve_data + $user_request_course_title + $user_request_training_provider + $user_request_trainer);
        $this->load->view('HistoryForUser', $show_HistoryForUser + $course_category + $course_title);
        $this->load->view('include/footer');
    }

    function HistoryForAdmin()
    {
        if (isset($_GET['s_tr_no'])) {
            $s_tr_no = $_GET['s_tr_no'];
        } else {
            $s_tr_no = "";
        }
        if (isset($_GET['s_date_request'])) {
            $s_date_request = $_GET['s_date_request'];
        } else {
            $s_date_request = "";
        }
        if (isset($_GET['s_requestor_name'])) {
            $s_requestor_name = $_GET['s_requestor_name'];
        } else {
            $s_requestor_name = "";
        }
        if (isset($_GET['s_course_category'])) {
            $s_course_category = $_GET['s_course_category'];
        } else {
            $s_course_category = "";
        }
        if (isset($_GET['s_course_title'])) {
            $s_course_title = $_GET['s_course_title'];
        } else {
            $s_course_title = "";
        }
        if (isset($_GET['s_approval_status'])) {
            $s_approval_status = $_GET['s_approval_status'];
        } else {
            $s_approval_status = "";
        }
        if (isset($_GET['s_status'])) {
            $s_status = $_GET['s_status'];
        } else {
            $s_status = "";
        }
        if (isset($_SESSION["username"])) {
            $username_fullname = $_SESSION["username"];
        } else {
            $username_fullname = "";
        }
        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
        } else {
            $username = "";
        }
        if (isset($_SESSION["group"])) {
            $group = $_SESSION["group"];
        } else {
            $group = "";
        }
        $user_request_course_title['user_request_course_title'] = $this->ttc->model_user_request_course_title();
        $user_request_training_provider['user_request_training_provider'] = $this->ttc->model_user_request_training_provider();
        $user_request_trainer['user_request_trainer'] = $this->ttc->model_user_request_trainer();
        $show_HistoryForAdmin['show_HistoryForAdmin'] = $this->ttc->model_show_HistoryForAdmin($s_tr_no, $s_date_request, $s_requestor_name, $s_course_category, $s_course_title, $s_approval_status, $s_status, $username_fullname);
        $course_category['course_category'] = $this->ttc->model_category();
        $course_title['course_title'] = $this->ttc->model_course_title();
        $approve_data['approve_data'] = $this->ttc->model_approve_data($username, $group);
        $title['title'] = 'History For Admin';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu', $approve_data + $user_request_course_title + $user_request_training_provider + $user_request_trainer);
        $this->load->view('HistoryForAdmin', $show_HistoryForAdmin + $course_category + $course_title);
        $this->load->view('include/footer');
    }

    function Cancel_Training_Request($del)
    {
        if (isset($_SESSION['group'])) {
            $user_group = $_SESSION['group'];
        } else {
            $user_group = "";
        }
        $title['title'] = 'Are you sure Delete Training Request?';
        $this->load->view('include/header', $title);
        if ($user_group != "") {
            echo "<script type='text/javascript'>
        document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
            title: 'Are you sure ?',
            html: 'Do you want to cancel this Training Request,<br> <b style=\"font-size: 18px;\">Yes or No ?</b>',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#203764',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            allowOutsideClick: false,
            allowEscapeKey: false,
            customClass: {
                title: 'custom-title-class'
            }
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = '" . base_url() . "index.php/ttc_controller/Cancel_Training_Request_confirm/$del';
            } else {
              window.location.href = '" . base_url() . "index.php/ttc_controller/HistoryForAdmin';
            }
          });
        });
        </script>";
        } else {
            echo "<script type='text/javascript'>
        document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
            title: 'Are you sure ?',
            html: 'Do you want to cancel this Training Request,<br> <b style=\"font-size: 18px;\">Yes or No ?</b>',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#203764',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            allowOutsideClick: false,
            allowEscapeKey: false,
            customClass: {
                title: 'custom-title-class'
            }
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = '" . base_url() . "index.php/ttc_controller/Cancel_Training_Request_confirm/$del';
            } else {
              window.location.href = '" . base_url() . "index.php/ttc_controller/HistoryForUser';
            }
          });
        });
        </script>";
        }
    }

    function Cancel_Training_Request_confirm($del)
    {
        if (isset($_SESSION['group'])) {
            $user_group = $_SESSION['group'];
        } else {
            $user_group = "";
        }
        $title['title'] = 'Cancel Successfully';
        $this->load->view('include/header', $title);
        $this->ttc->model_cancel_Training_Request($del);
        if ($user_group != "") {
            echo "<script type='text/javascript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Cancel Successfully',
                text: '',
                icon: 'success',
                allowOutsideClick: false,
                allowEscapeKey: false,
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location.href = '" . base_url() . "index.php/email_alert/email_cancel_Admin/$del';
            });
        });
    </script>";
            // window.location.href = '" . base_url() . "index.php/ttc_controller/HistoryForAdmin';
        } else {
            echo "<script type='text/javascript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Cancel Successfully',
                text: '',
                icon: 'success',
                allowOutsideClick: false,
                allowEscapeKey: false,
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location.href = '" . base_url() . "index.php/email_alert/email_cancel_User/$del';
            });
        });
    </script>";
            // window.location.href = '" . base_url() . "index.php/ttc_controller/HistoryForUser';
        }
    }

    function Cancel_Training_Request_approve($del)
    {
        if (isset($_SESSION['group'])) {
            $user_group = $_SESSION['group'];
        } else {
            $user_group = "";
        }
        $title['title'] = 'Are you sure Delete Training Request?';
        $this->load->view('include/header', $title);
        if ($user_group != "") {
            echo "<script type='text/javascript'>
        document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
            title: 'Are you sure ?',
            html: 'Do you want to cancel this Training Request,<br> <b style=\"font-size: 18px;\">Yes or No ?</b>',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#203764',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            allowOutsideClick: false,
            allowEscapeKey: false,
            customClass: {
                title: 'custom-title-class'
            }
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = '" . base_url() . "index.php/ttc_controller/Cancel_Training_Request_approve_confirm/$del';
            } else {
              window.location.href = '" . base_url() . "index.php/ttc_controller/ApproveTrainingRequest';
            }
          });
        });
        </script>";
        } else {
            echo "<script type='text/javascript'>
        document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
            title: 'Are you sure ?',
            html: 'Do you want to cancel this Training Request,<br> <b style=\"font-size: 18px;\">Yes or No ?</b>',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#203764',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            allowOutsideClick: false,
            allowEscapeKey: false,
            customClass: {
                title: 'custom-title-class'
            }
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = '" . base_url() . "index.php/ttc_controller/Cancel_Training_Request_approve_confirm/$del';
            } else {
              window.location.href = '" . base_url() . "index.php/ttc_controller/ApproveTrainingRequest';
            }
          });
        });
        </script>";
        }
    }

    function Cancel_Training_Request_approve_confirm($del)
    {
        if (isset($_SESSION['group'])) {
            $user_group = $_SESSION['group'];
        } else {
            $user_group = "";
        }
        $title['title'] = 'Cancel Successfully';
        $this->load->view('include/header', $title);
        $this->ttc->model_cancel_Training_Request($del);
        if ($user_group != "") {
            echo "<script type='text/javascript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Cancel Successfully',
                text: '',
                icon: 'success',
                allowOutsideClick: false,
                allowEscapeKey: false,
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location.href = '" . base_url() . "index.php/email_alert/email_cancel_Admin_ApproveTrainingRequest/$del';
            });
        });
    </script>";
        } else {
            echo "<script type='text/javascript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Cancel Successfully',
                text: '',
                icon: 'success',
                allowOutsideClick: false,
                allowEscapeKey: false,
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location.href = '" . base_url() . "index.php/ttc_controller/ApproveTrainingRequest';
            });
        });
    </script>";
        }
    }

    function formRequestStatic($id)
    {
        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
        } else {
            $username = "";
        }
        if (isset($_SESSION["group"])) {
            $group = $_SESSION["group"];
        } else {
            $group = "";
        }
        $currency['currency'] = $this->ttc->model_currency();
        $user_request_course_title['user_request_course_title'] = $this->ttc->model_user_request_course_title();
        $user_request_training_provider['user_request_training_provider'] = $this->ttc->model_user_request_training_provider();
        $user_request_trainer['user_request_trainer'] = $this->ttc->model_user_request_trainer();
        $training_request_data['training_request_data'] = $this->ttc->model_training_request_data_static($id);
        $reason_training['reason_training'] = $this->ttc->model_reason_training();
        $approve_data['approve_data'] = $this->ttc->model_approve_data($username, $group);
        $title['title'] = 'Form Training Request Static';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu', $approve_data + $user_request_course_title + $user_request_training_provider + $user_request_trainer);
        $this->load->view('formRequestStatic', $reason_training + $training_request_data + $currency);
        $this->load->view('include/footer');
    }

    function manageMatrix()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = "";
        }
        if (isset($_GET['s_division'])) {
            $s_division = $_GET['s_division'];
        } else {
            $s_division = "";
        }
        if (isset($_GET['s_section_code'])) {
            $s_section_code = $_GET['s_section_code'];
        } else {
            $s_section_code = "";
        }
        if (isset($_GET['s_project_code'])) {
            $s_project_code = $_GET['s_project_code'];
        } else {
            $s_project_code = "";
        }
        if (isset($_GET['s_cost_code'])) {
            $s_cost_code = $_GET['s_cost_code'];
        } else {
            $s_cost_code = "";
        }
        if (isset($_GET['s_reviewer'])) {
            $s_reviewer = $_GET['s_reviewer'];
        } else {
            $s_reviewer = "";
        }
        if (isset($_GET['s_approver'])) {
            $s_approver = $_GET['s_approver'];
        } else {
            $s_approver = "";
        }
        if (isset($_GET['s_status'])) {
            $s_status = $_GET['s_status'];
        } else {
            $s_status = "";
        }
        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
        } else {
            $username = "";
        }
        if (isset($_SESSION["group"])) {
            $group = $_SESSION["group"];
        } else {
            $group = "";
        }
        $user_request_course_title['user_request_course_title'] = $this->ttc->model_user_request_course_title();
        $user_request_training_provider['user_request_training_provider'] = $this->ttc->model_user_request_training_provider();
        $user_request_trainer['user_request_trainer'] = $this->ttc->model_user_request_trainer();
        $approval_matrix_id['approval_matrix_id'] = $this->ttc->model_approval_matrix_id($id);
        $approval_matrix_data['approval_matrix_data'] = $this->ttc->model_approval_matrix_data($s_division, $s_section_code, $s_project_code, $s_cost_code, $s_reviewer, $s_approver, $s_status);
        $division['division'] = $this->ttc->model_form_division();
        $approve_data['approve_data'] = $this->ttc->model_approve_data($username, $group);
        $matrix_data_for_section['matrix_data_for_section'] = $this->ttc->model_approval_matrix_data_for_section($id);
        $section_code['section_code'] = $this->ttc->model_section_code();
        $title['title'] = 'Manage Matrix';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu', $approve_data + $user_request_course_title + $user_request_training_provider + $user_request_trainer);
        $this->load->view('manageMatrix', $division + $approval_matrix_data + $approval_matrix_id + $section_code + $matrix_data_for_section);
        $this->load->view('include/footer');
    }

    function send_submit_Approver_Matrix_ajax()
    {
        $division = $this->input->post('division');
        $section_code = $this->input->post('section_code');
        $project_code = $this->input->post('project_code');
        $cost_code = $this->input->post('cost_code');
        $reviewer = $this->input->post('reviewer');
        $reviewer_email = $this->input->post('reviewer_email');
        $approver = $this->input->post('approver');
        $approver_email = $this->input->post('approver_email');
        $status = $this->input->post('status');
        $reviewer_alter = $this->input->post('reviewer_alter');
        $reviewer_email_alter = $this->input->post('reviewer_email_alter');
        $approver_alter = $this->input->post('approver_alter');
        $approver_email_alter = $this->input->post('approver_email_alter');

        $rs = $this->ttc->model_send_submit_Approver_Matrix($division, $section_code, $project_code, $cost_code, $reviewer, $reviewer_email, $approver, $approver_email, $status, $reviewer_alter, $reviewer_email_alter, $approver_alter, $approver_email_alter);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function send_update_Approver_Matrix_ajax()
    {
        $up_id = $this->input->post('up_id');
        $up_division = $this->input->post('up_division');
        $up_section_code = $this->input->post('up_section_code');
        $up_project_code = $this->input->post('up_project_code');
        $up_cost_code = $this->input->post('up_cost_code');
        $up_reviewer = $this->input->post('up_reviewer');
        $up_reviewer_email = $this->input->post('up_reviewer_email');
        $up_approver = $this->input->post('up_approver');
        $up_approver_email = $this->input->post('up_approver_email');
        $up_status = $this->input->post('up_status');
        $up_reviewer_alter = $this->input->post('up_reviewer_alter');
        $up_reviewer_email_alter = $this->input->post('up_reviewer_email_alter');
        $up_approver_alter = $this->input->post('up_approver_alter');
        $up_approver_email_alter = $this->input->post('up_approver_email_alter');

        $rs = $this->ttc->model_send_update_Approver_Matrix($up_id, $up_division, $up_section_code, $up_project_code, $up_cost_code, $up_reviewer, $up_reviewer_email, $up_approver, $up_approver_email, $up_status, $up_reviewer_alter, $up_reviewer_email_alter, $up_approver_alter, $up_approver_email_alter);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function delete_attachment_formRequest($id, $column)
    {
        $title['title'] = 'Success Delete';
        $this->load->view('include/header', $title);
        $this->ttc->model_delete_attachment_formRequest($id, $column);
        echo "<script type='text/javascript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Delete Successfully',
                text: '',
                icon: 'success',
                allowOutsideClick: false,
                allowEscapeKey: false,
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location.href = '" . base_url() . "index.php/ttc_controller/formRequest/?id=$id';
            });
        });
    </script>";
    }

    function delete_see_attachment($id, $column)
    {
        $title['title'] = 'Success Delete';
        $this->load->view('include/header', $title);
        $this->ttc->model_delete_see_attachment($id, $column);
        echo "<script type='text/javascript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Delete Successfully',
                text: '',
                icon: 'success',
                allowOutsideClick: false,
                allowEscapeKey: false,
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location.href = '" . base_url() . "index.php/ttc_controller/formRequest/?id=$id';
            });
        });
    </script>";
    }

    function delete_attachment_formRequest_forReject($id, $column)
    {
        $title['title'] = 'Success Delete';
        $this->load->view('include/header', $title);
        $this->ttc->model_delete_attachment_formRequest($id, $column);
        echo "<script type='text/javascript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Delete Successfully',
                text: '',
                icon: 'success',
                allowOutsideClick: false,
                allowEscapeKey: false,
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location.href = '" . base_url() . "index.php/ttc_controller/formRequestForReject/$id';
            });
        });
    </script>";
    }

    function delete_attachment_formRequest_for_static_admin($id, $column)
    {
        $title['title'] = 'Success Delete';
        $this->load->view('include/header', $title);
        $this->ttc->model_delete_attachment_formRequest($id, $column);
        echo "<script type='text/javascript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Delete Successfully',
                text: '',
                icon: 'success',
                allowOutsideClick: false,
                allowEscapeKey: false,
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location.href = '" . base_url() . "index.php/ttc_controller/formRequestStaticForAdmin/$id';
            });
        });
    </script>";
    }

    function delete_attachment_formRequest_forMoreinfo($id, $column)
    {
        $title['title'] = 'Success Delete';
        $this->load->view('include/header', $title);
        $this->ttc->model_delete_attachment_formRequest($id, $column);
        echo "<script type='text/javascript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Delete Successfully',
                text: '',
                icon: 'success',
                allowOutsideClick: false,
                allowEscapeKey: false,
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location.href = '" . base_url() . "index.php/ttc_controller/formRequestForMoreInformation/$id';
            });
        });
    </script>";
    }

    function up_submit_Training_Request_ajax()
    {
        $up_id = $this->input->post('up_id');
        $email_submit = $this->input->post('email_submit');
        $submit_name = $this->input->post('submit_name');
        $year_submit = $this->input->post('year_submit');
        $section_code = $this->input->post('section_code');
        $project_code = $this->input->post('project_code');
        $cost_code = $this->input->post('cost_code');
        $date_request = $this->input->post('date_request');
        $requestor_name = $this->input->post('requestor_name');
        $requestor_position = $this->input->post('requestor_position');
        $requestor_section = $this->input->post('requestor_section');
        $requestor_division = $this->input->post('requestor_division');
        $requestor_email = $this->input->post('requestor_email');
        $learning_model = $this->input->post('learning_model');
        $training_type = $this->input->post('training_type');
        $course_cat_text = $this->input->post('course_cat_text');
        $course_title_text = $this->input->post('course_title_text');
        $platform = $this->input->post('platform');
        $duration = $this->input->post('duration');
        $planned = $this->input->post('planned');
        $course_fee = $this->input->post('course_fee');
        $attendee = $this->input->post('attendee');
        $from_preferred_date = $this->input->post('from_preferred_date');
        $to_preferred_date = $this->input->post('to_preferred_date');
        $training_provider = $this->input->post('training_provider');
        $contact = $this->input->post('contact');
        $training_venue = $this->input->post('training_venue');
        $trainer_name = $this->input->post('trainer_name');
        $required_course = $this->input->post('required_course');
        $license_name = $this->input->post('license_name');
        $additional = $this->input->post('additional');
        $attendee_information = $this->input->post('attendee_information');
        $reason_training_02 = $this->input->post('reason_training_02');
        $supervisor_expectation = $this->input->post('supervisor_expectation');
        $others_please_specify = $this->input->post('others_please_specify');
        $file_attachment = $this->input->post('file_attachment');
        $attendee_name = $this->input->post('attendee_name');
        $emp_id = $this->input->post('emp_id');
        $position = $this->input->post('position');
        $section = $this->input->post('section');
        $division = $this->input->post('division');
        $company = $this->input->post('company');
        $progress_status = $this->input->post('progress_status');
        $reviewer = $this->input->post('reviewer');
        $reviewer_email = $this->input->post('reviewer_email');
        $approver = $this->input->post('approver');
        $approver_email = $this->input->post('approver_email');
        $up_group_cat_admin = $this->input->post('up_group_cat_admin');
        $up_see_attachment = $this->input->post('up_see_attachment');
        $up_file_see_attachment = $this->input->post('up_file_see_attachment');
        $currency = $this->input->post('currency');
        $exchange_rate = $this->input->post('exchange_rate');
        $exchange_date = $this->input->post('exchange_date');

        $rs = $this->ttc->model_up_submit_Training_Request($up_id, $email_submit, $submit_name, $year_submit, $section_code, $project_code, $cost_code, $date_request, $requestor_name, $requestor_position, $requestor_section, $requestor_division, $requestor_email, $learning_model, $training_type, $course_cat_text, $course_title_text, $platform, $duration, $planned, $course_fee, $attendee, $from_preferred_date, $to_preferred_date, $training_provider, $contact, $training_venue, $trainer_name, $required_course, $license_name, $additional, $attendee_information, $reason_training_02, $supervisor_expectation, $others_please_specify, $file_attachment, $attendee_name, $emp_id, $position, $section, $division, $company, $progress_status, $reviewer, $reviewer_email, $approver, $approver_email, $up_group_cat_admin, $up_see_attachment, $up_file_see_attachment, $currency, $exchange_rate, $exchange_date);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function up_submit_ForReject_Training_Request_ajax()
    {
        $up_id = $this->input->post('up_id');
        $email_submit = $this->input->post('email_submit');
        $submit_name = $this->input->post('submit_name');
        $year_submit = $this->input->post('year_submit');
        $section_code = $this->input->post('section_code');
        $project_code = $this->input->post('project_code');
        $cost_code = $this->input->post('cost_code');
        $date_request = $this->input->post('date_request');
        $requestor_name = $this->input->post('requestor_name');
        $requestor_position = $this->input->post('requestor_position');
        $requestor_section = $this->input->post('requestor_section');
        $requestor_division = $this->input->post('requestor_division');
        $requestor_email = $this->input->post('requestor_email');
        $learning_model = $this->input->post('learning_model');
        $training_type = $this->input->post('training_type');
        $course_cat_text = $this->input->post('course_cat_text');
        $course_title_text = $this->input->post('course_title_text');
        $platform = $this->input->post('platform');
        $duration = $this->input->post('duration');
        $planned = $this->input->post('planned');
        $course_fee = $this->input->post('course_fee');
        $attendee = $this->input->post('attendee');
        $from_preferred_date = $this->input->post('from_preferred_date');
        $to_preferred_date = $this->input->post('to_preferred_date');
        $training_provider = $this->input->post('training_provider');
        $contact = $this->input->post('contact');
        $training_venue = $this->input->post('training_venue');
        $trainer_name = $this->input->post('trainer_name');
        $required_course = $this->input->post('required_course');
        $license_name = $this->input->post('license_name');
        $additional = $this->input->post('additional');
        $attendee_information = $this->input->post('attendee_information');
        $reason_training_02 = $this->input->post('reason_training_02');
        $supervisor_expectation = $this->input->post('supervisor_expectation');
        $others_please_specify = $this->input->post('others_please_specify');
        $file_attachment = $this->input->post('file_attachment');
        $attendee_name = $this->input->post('attendee_name');
        $emp_id = $this->input->post('emp_id');
        $position = $this->input->post('position');
        $section = $this->input->post('section');
        $division = $this->input->post('division');
        $company = $this->input->post('company');
        $progress_status = $this->input->post('progress_status');
        $up_workflow_remark = $this->input->post('up_workflow_remark');
        $up_more_information = $this->input->post('up_more_information');
        $file_attachment_more = $this->input->post('file_attachment_more');
        $reviewer = $this->input->post('reviewer');
        $reviewer_email = $this->input->post('reviewer_email');
        $approver = $this->input->post('approver');
        $approver_email = $this->input->post('approver_email');
        $up_group_cat_admin = $this->input->post('up_group_cat_admin');
        $up_see_attachment = $this->input->post('up_see_attachment');
        $up_file_see_attachment = $this->input->post('up_file_see_attachment');
        $currency = $this->input->post('currency');
        $exchange_rate = $this->input->post('exchange_rate');
        $exchange_date = $this->input->post('exchange_date');

        $rs = $this->ttc->model_up_submit_ForReject_Training_Request($up_id, $email_submit, $submit_name, $year_submit, $section_code, $project_code, $cost_code, $date_request, $requestor_name, $requestor_position, $requestor_section, $requestor_division, $requestor_email, $learning_model, $training_type, $course_cat_text, $course_title_text, $platform, $duration, $planned, $course_fee, $attendee, $from_preferred_date, $to_preferred_date, $training_provider, $contact, $training_venue, $trainer_name, $required_course, $license_name, $additional, $attendee_information, $reason_training_02, $supervisor_expectation, $others_please_specify, $file_attachment, $attendee_name, $emp_id, $position, $section, $division, $company, $progress_status, $up_workflow_remark, $up_more_information, $file_attachment_more, $reviewer, $reviewer_email, $approver, $approver_email, $up_group_cat_admin, $up_see_attachment, $up_file_see_attachment, $currency, $exchange_rate, $exchange_date);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function up_submit_For_static_admin_Training_Request_ajax()
    {
        $up_id = $this->input->post('up_id');
        // $email_submit = $this->input->post('email_submit');
        // $submit_name = $this->input->post('submit_name');
        // $year_submit = $this->input->post('year_submit');
        $section_code = $this->input->post('section_code');
        $project_code = $this->input->post('project_code');
        $cost_code = $this->input->post('cost_code');
        $date_request = $this->input->post('date_request');
        $requestor_name = $this->input->post('requestor_name');
        $requestor_position = $this->input->post('requestor_position');
        $requestor_section = $this->input->post('requestor_section');
        $requestor_division = $this->input->post('requestor_division');
        $requestor_email = $this->input->post('requestor_email');
        $learning_model = $this->input->post('learning_model');
        $training_type = $this->input->post('training_type');
        $course_cat_text = $this->input->post('course_cat_text');
        $course_title_text = $this->input->post('course_title_text');
        $platform = $this->input->post('platform');
        $duration = $this->input->post('duration');
        $planned = $this->input->post('planned');
        $course_fee = $this->input->post('course_fee');
        $attendee = $this->input->post('attendee');
        $from_preferred_date = $this->input->post('from_preferred_date');
        $to_preferred_date = $this->input->post('to_preferred_date');
        $training_provider = $this->input->post('training_provider');
        $contact = $this->input->post('contact');
        $training_venue = $this->input->post('training_venue');
        $trainer_name = $this->input->post('trainer_name');
        $required_course = $this->input->post('required_course');
        $license_name = $this->input->post('license_name');
        $additional = $this->input->post('additional');
        $attendee_information = $this->input->post('attendee_information');
        $reason_training_02 = $this->input->post('reason_training_02');
        $supervisor_expectation = $this->input->post('supervisor_expectation');
        $others_please_specify = $this->input->post('others_please_specify');
        $file_attachment = $this->input->post('file_attachment');
        $attendee_name = $this->input->post('attendee_name');
        $emp_id = $this->input->post('emp_id');
        $position = $this->input->post('position');
        $section = $this->input->post('section');
        $division = $this->input->post('division');
        $company = $this->input->post('company');
        $progress_status = $this->input->post('progress_status');
        $up_workflow_remark = $this->input->post('up_workflow_remark');
        $up_more_information = $this->input->post('up_more_information');
        $file_attachment_more = $this->input->post('file_attachment_more');
        $reviewer = $this->input->post('reviewer');
        $reviewer_email = $this->input->post('reviewer_email');
        $approver = $this->input->post('approver');
        $approver_email = $this->input->post('approver_email');
        $up_group_cat_admin = $this->input->post('up_group_cat_admin');
        $up_see_attachment = $this->input->post('up_see_attachment');
        $up_file_see_attachment = $this->input->post('up_file_see_attachment');
        $currency = $this->input->post('currency');
        $exchange_rate = $this->input->post('exchange_rate');
        $exchange_date = $this->input->post('exchange_date');

        $rs = $this->ttc->model_up_submit_For_static_admin_Training_Request($up_id, $section_code, $project_code, $cost_code, $date_request, $requestor_name, $requestor_position, $requestor_section, $requestor_division, $requestor_email, $learning_model, $training_type, $course_cat_text, $course_title_text, $platform, $duration, $planned, $course_fee, $attendee, $from_preferred_date, $to_preferred_date, $training_provider, $contact, $training_venue, $trainer_name, $required_course, $license_name, $additional, $attendee_information, $reason_training_02, $supervisor_expectation, $others_please_specify, $file_attachment, $attendee_name, $emp_id, $position, $section, $division, $company, $progress_status, $up_workflow_remark, $up_more_information, $file_attachment_more, $reviewer, $reviewer_email, $approver, $approver_email, $up_group_cat_admin, $up_see_attachment, $up_file_see_attachment, $currency, $exchange_rate, $exchange_date);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function ApproveTrainingRequest()
    {
        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
        } else {
            $username = "";
        }
        if (isset($_SESSION["group"])) {
            $group = $_SESSION["group"];
        } else {
            $group = "";
        }
        $user_request_course_title['user_request_course_title'] = $this->ttc->model_user_request_course_title();
        $user_request_training_provider['user_request_training_provider'] = $this->ttc->model_user_request_training_provider();
        $user_request_trainer['user_request_trainer'] = $this->ttc->model_user_request_trainer();
        $group_for_manage['group_for_manage'] = $this->ttc->model_group_for_manage();
        $course_category['course_category'] = $this->ttc->model_category();
        $course_title['course_title'] = $this->ttc->model_course_title();
        $approve_data['approve_data'] = $this->ttc->model_approve_data($username, $group);
        $title['title'] = 'Approve Training Request';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu', $approve_data + $user_request_course_title + $user_request_training_provider + $user_request_trainer);
        $this->load->view('ApproveTrainingRequest', $course_category + $course_title + $approve_data + $group_for_manage);
        $this->load->view('include/footer');
    }

    function formRequestStaticForAdmin($id)
    {
        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
        } else {
            $username = "";
        }
        if (isset($_SESSION["group"])) {
            $group = $_SESSION["group"];
        } else {
            $group = "";
        }
        //####
        $position_request['position_request'] = $this->ttc->model_position_request();
        $section_request['section_request'] = $this->ttc->model_section_request();
        $company_request['company_request'] = $this->ttc->model_company_request();
        //####
        $trainer['trainer'] = $this->ttc->model_trainer();
        $currency['currency'] = $this->ttc->model_currency();
        $user_request_course_title['user_request_course_title'] = $this->ttc->model_user_request_course_title();
        $user_request_training_provider['user_request_training_provider'] = $this->ttc->model_user_request_training_provider();
        $user_request_trainer['user_request_trainer'] = $this->ttc->model_user_request_trainer();
        $training_request_data['training_request_data'] = $this->ttc->model_training_request_data_static($id);
        $reason_training['reason_training'] = $this->ttc->model_reason_training();
        //=
        $approval_matrix['approval_matrix'] = $this->ttc->model_approval_matrix();
        $approval_matrix_project_code['approval_matrix_project_code'] = $this->ttc->model_approval_matrix_project_code();
        $approval_matrix_cost_code['approval_matrix_cost_code'] = $this->ttc->model_approval_matrix_cost_code();
        $division['division'] = $this->ttc->model_form_division();
        $category['category'] = $this->ttc->model_category();
        $course_title['course_title'] = $this->ttc->model_course_title();
        $training_provider['training_provider'] = $this->ttc->model_training_provider();
        //=
        $approve_data['approve_data'] = $this->ttc->model_approve_data($username, $group);
        $title['title'] = 'Training Request For Admin';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu', $approve_data + $user_request_course_title + $user_request_training_provider + $user_request_trainer);
        $this->load->view('formRequestStaticForAdmin', $company_request + $section_request + $position_request + $reason_training + $training_request_data + $approval_matrix + $approval_matrix_project_code + $approval_matrix_cost_code + $division + $category + $course_title + $training_provider + $currency + $trainer);
        $this->load->view('include/footer');
    }

    function send_up_Admin_Verify_ajax()
    {
        $up_id = $this->input->post('up_id');
        $up_username = $this->input->post('up_username');
        $up_email = $this->input->post('up_email');
        $up_status = $this->input->post('up_status');
        $up_comment = $this->input->post('up_comment');
        $up_position = $this->input->post('up_position');

        $rs = $this->ttc->model_send_up_Admin_Verify($up_id, $up_username, $up_email, $up_status, $up_comment, $up_position);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function formRequestStaticForReviewer($id)
    {
        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
        } else {
            $username = "";
        }
        if (isset($_SESSION["group"])) {
            $group = $_SESSION["group"];
        } else {
            $group = "";
        }
        $currency['currency'] = $this->ttc->model_currency();
        $user_request_course_title['user_request_course_title'] = $this->ttc->model_user_request_course_title();
        $user_request_training_provider['user_request_training_provider'] = $this->ttc->model_user_request_training_provider();
        $user_request_trainer['user_request_trainer'] = $this->ttc->model_user_request_trainer();
        $training_request_data['training_request_data'] = $this->ttc->model_training_request_data_static($id);
        $reason_training['reason_training'] = $this->ttc->model_reason_training();
        $approve_data['approve_data'] = $this->ttc->model_approve_data($username, $group);
        $title['title'] = 'Training Request For Reviewer';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu', $approve_data + $user_request_course_title + $user_request_training_provider + $user_request_trainer);
        $this->load->view('formRequestStaticForReviewer', $reason_training + $training_request_data + $currency);
        $this->load->view('include/footer');
    }

    function send_up_Reviewer_Review_ajax()
    {
        $up_id = $this->input->post('up_id');
        $up_username = $this->input->post('up_username');
        $up_email = $this->input->post('up_email');
        $up_position = $this->input->post('up_position');
        $up_status = $this->input->post('up_status');
        $up_comment = $this->input->post('up_comment');

        $rs = $this->ttc->model_send_up_Reviewer_Review($up_id, $up_username, $up_email, $up_status, $up_comment, $up_position);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function formRequestStaticForApprover($id)
    {
        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
        } else {
            $username = "";
        }
        if (isset($_SESSION["group"])) {
            $group = $_SESSION["group"];
        } else {
            $group = "";
        }
        $currency['currency'] = $this->ttc->model_currency();
        $user_request_course_title['user_request_course_title'] = $this->ttc->model_user_request_course_title();
        $user_request_training_provider['user_request_training_provider'] = $this->ttc->model_user_request_training_provider();
        $user_request_trainer['user_request_trainer'] = $this->ttc->model_user_request_trainer();
        $training_request_data['training_request_data'] = $this->ttc->model_training_request_data_static($id);
        $reason_training['reason_training'] = $this->ttc->model_reason_training();
        $approve_data['approve_data'] = $this->ttc->model_approve_data($username, $group);
        $title['title'] = 'Training Request For Approver';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu', $approve_data + $user_request_course_title + $user_request_training_provider + $user_request_trainer);
        $this->load->view('formRequestStaticForApprover', $reason_training + $training_request_data + $currency);
        $this->load->view('include/footer');
    }

    function send_up_Approver_ajax()
    {
        $up_id = $this->input->post('up_id');
        $up_username = $this->input->post('up_username');
        $up_email = $this->input->post('up_email');
        $up_position = $this->input->post('up_position');
        $up_status = $this->input->post('up_status');
        $up_comment = $this->input->post('up_comment');

        $rs = $this->ttc->model_send_up_Approver($up_id, $up_username, $up_email, $up_status, $up_comment, $up_position);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function formRequestForReject($id)
    {
        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
        } else {
            $username = "";
        }
        if (isset($_SESSION["group"])) {
            $group = $_SESSION["group"];
        } else {
            $group = "";
        }
        //####
        $position_request['position_request'] = $this->ttc->model_position_request();
        $section_request['section_request'] = $this->ttc->model_section_request();
        $company_request['company_request'] = $this->ttc->model_company_request();
        //####
        $trainer['trainer'] = $this->ttc->model_trainer();
        $currency['currency'] = $this->ttc->model_currency();
        $user_request_course_title['user_request_course_title'] = $this->ttc->model_user_request_course_title();
        $user_request_training_provider['user_request_training_provider'] = $this->ttc->model_user_request_training_provider();
        $user_request_trainer['user_request_trainer'] = $this->ttc->model_user_request_trainer();
        $training_request_data['training_request_data'] = $this->ttc->model_training_request_data_static($id);
        $reason_training['reason_training'] = $this->ttc->model_reason_training();
        $approval_matrix['approval_matrix'] = $this->ttc->model_approval_matrix();
        $approval_matrix_project_code['approval_matrix_project_code'] = $this->ttc->model_approval_matrix_project_code();
        $approval_matrix_cost_code['approval_matrix_cost_code'] = $this->ttc->model_approval_matrix_cost_code();
        $division['division'] = $this->ttc->model_form_division();
        $category['category'] = $this->ttc->model_category();
        $course_title['course_title'] = $this->ttc->model_course_title();
        $training_provider['training_provider'] = $this->ttc->model_training_provider();
        $approve_data['approve_data'] = $this->ttc->model_approve_data($username, $group);
        $title['title'] = 'Form Training Request Reject';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu', $approve_data + $user_request_course_title + $user_request_training_provider + $user_request_trainer);
        $this->load->view('formRequestForReject', $company_request + $section_request + $position_request + $reason_training + $training_request_data + $approval_matrix + $approval_matrix_project_code + $approval_matrix_cost_code + $division + $category + $course_title + $training_provider + $currency + $trainer);
        $this->load->view('include/footer');
    }

    function formRequestForMoreInformation($id)
    {
        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
        } else {
            $username = "";
        }
        if (isset($_SESSION["group"])) {
            $group = $_SESSION["group"];
        } else {
            $group = "";
        }
        //####
        $position_request['position_request'] = $this->ttc->model_position_request();
        $section_request['section_request'] = $this->ttc->model_section_request();
        $company_request['company_request'] = $this->ttc->model_company_request();
        //####
        $trainer['trainer'] = $this->ttc->model_trainer();
        $currency['currency'] = $this->ttc->model_currency();
        $user_request_course_title['user_request_course_title'] = $this->ttc->model_user_request_course_title();
        $user_request_training_provider['user_request_training_provider'] = $this->ttc->model_user_request_training_provider();
        $user_request_trainer['user_request_trainer'] = $this->ttc->model_user_request_trainer();
        $training_request_data['training_request_data'] = $this->ttc->model_training_request_data_static($id);
        $reason_training['reason_training'] = $this->ttc->model_reason_training();
        $approval_matrix['approval_matrix'] = $this->ttc->model_approval_matrix();
        $approval_matrix_project_code['approval_matrix_project_code'] = $this->ttc->model_approval_matrix_project_code();
        $approval_matrix_cost_code['approval_matrix_cost_code'] = $this->ttc->model_approval_matrix_cost_code();
        $division['division'] = $this->ttc->model_form_division();
        $category['category'] = $this->ttc->model_category();
        $course_title['course_title'] = $this->ttc->model_course_title();
        $training_provider['training_provider'] = $this->ttc->model_training_provider();
        $approve_data['approve_data'] = $this->ttc->model_approve_data($username, $group);
        $title['title'] = 'Form Training Request More Information';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu', $approve_data + $user_request_course_title + $user_request_training_provider + $user_request_trainer);
        $this->load->view('formRequestForMoreInformation', $company_request + $section_request + $position_request + $reason_training + $training_request_data + $approval_matrix + $approval_matrix_project_code + $approval_matrix_cost_code + $division + $category + $course_title + $training_provider + $currency + $trainer);
        $this->load->view('include/footer');
    }

    function up_submit_ForMoreInfor_Training_Request_ajax()
    {
        $up_id = $this->input->post('up_id');
        $email_submit = $this->input->post('email_submit');
        $submit_name = $this->input->post('submit_name');
        $year_submit = $this->input->post('year_submit');
        $section_code = $this->input->post('section_code');
        $project_code = $this->input->post('project_code');
        $cost_code = $this->input->post('cost_code');
        $date_request = $this->input->post('date_request');
        $requestor_name = $this->input->post('requestor_name');
        $requestor_position = $this->input->post('requestor_position');
        $requestor_section = $this->input->post('requestor_section');
        $requestor_division = $this->input->post('requestor_division');
        $requestor_email = $this->input->post('requestor_email');
        $learning_model = $this->input->post('learning_model');
        $training_type = $this->input->post('training_type');
        $course_cat_text = $this->input->post('course_cat_text');
        $course_title_text = $this->input->post('course_title_text');
        $platform = $this->input->post('platform');
        $duration = $this->input->post('duration');
        $planned = $this->input->post('planned');
        $course_fee = $this->input->post('course_fee');
        $attendee = $this->input->post('attendee');
        $from_preferred_date = $this->input->post('from_preferred_date');
        $to_preferred_date = $this->input->post('to_preferred_date');
        $training_provider = $this->input->post('training_provider');
        $contact = $this->input->post('contact');
        $training_venue = $this->input->post('training_venue');
        $trainer_name = $this->input->post('trainer_name');
        $required_course = $this->input->post('required_course');
        $license_name = $this->input->post('license_name');
        $additional = $this->input->post('additional');
        $attendee_information = $this->input->post('attendee_information');
        $reason_training_02 = $this->input->post('reason_training_02');
        $supervisor_expectation = $this->input->post('supervisor_expectation');
        $others_please_specify = $this->input->post('others_please_specify');
        $file_attachment = $this->input->post('file_attachment');
        $attendee_name = $this->input->post('attendee_name');
        $emp_id = $this->input->post('emp_id');
        $position = $this->input->post('position');
        $section = $this->input->post('section');
        $division = $this->input->post('division');
        $company = $this->input->post('company');
        $progress_status = $this->input->post('progress_status');
        $up_workflow_remark = $this->input->post('up_workflow_remark');
        $up_more_information = $this->input->post('up_more_information');
        $file_attachment_more = $this->input->post('file_attachment_more');
        $reviewer = $this->input->post('reviewer');
        $reviewer_email = $this->input->post('reviewer_email');
        $approver = $this->input->post('approver');
        $approver_email = $this->input->post('approver_email');
        $up_group_cat_admin = $this->input->post('up_group_cat_admin');
        $up_see_attachment = $this->input->post('up_see_attachment');
        $up_file_see_attachment = $this->input->post('up_file_see_attachment');
        $currency = $this->input->post('currency');
        $exchange_rate = $this->input->post('exchange_rate');
        $exchange_date = $this->input->post('exchange_date');

        $rs = $this->ttc->model_up_submit_Formore_infor_Training_Request($up_id, $email_submit, $submit_name, $year_submit, $section_code, $project_code, $cost_code, $date_request, $requestor_name, $requestor_position, $requestor_section, $requestor_division, $requestor_email, $learning_model, $training_type, $course_cat_text, $course_title_text, $platform, $duration, $planned, $course_fee, $attendee, $from_preferred_date, $to_preferred_date, $training_provider, $contact, $training_venue, $trainer_name, $required_course, $license_name, $additional, $attendee_information, $reason_training_02, $supervisor_expectation, $others_please_specify, $file_attachment, $attendee_name, $emp_id, $position, $section, $division, $company, $progress_status, $up_workflow_remark, $up_more_information, $file_attachment_more, $reviewer, $reviewer_email, $approver, $approver_email, $up_group_cat_admin, $up_see_attachment, $up_file_see_attachment, $currency, $exchange_rate, $exchange_date);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function send_re_submit_training_provider_ajax()
    {
        $ad_name = $this->input->post('ad_name');
        $re_up_id = $this->input->post('re_up_id');
        $training_provider = $this->input->post('training_provider');
        $contact = $this->input->post('contact');
        $training_venue = $this->input->post('training_venue');
        // $trainer_name = $this->input->post('trainer_name');
        $re_status = $this->input->post('re_status');
        $ad_comment = $this->input->post('ad_comment');

        $rs = $this->ttc->model_send_re_submit_training_provider($ad_name, $re_up_id, $training_provider, $contact, $training_venue, $re_status, $ad_comment);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function send_re_submit_Manage_Trainer_ajax()
    {
        $ad_name = $this->input->post('ad_name');
        $re_up_id = $this->input->post('re_up_id');
        $training_provider_group = $this->input->post('training_provider_group');
        $trainer_name = $this->input->post('trainer_name');
        $re_status = $this->input->post('re_status');
        $ad_comment = $this->input->post('ad_comment');
        $training_provider = $this->input->post('training_provider');

        $rs = $this->ttc->model_send_re_submit_Manage_Trainer($ad_name, $re_up_id, $training_provider_group, $trainer_name, $re_status, $ad_comment, $training_provider);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function send_re_submit_Course_Title_ajax()
    {
        $re_up_id = $this->input->post('re_up_id');
        $category_code = $this->input->post('category_code');
        $category_code_name = $this->input->post('category_code_name:');
        $course_title = $this->input->post('course_title');
        $training_hr = $this->input->post('training_hr');
        $trainer = $this->input->post('trainer');
        $re_status = $this->input->post('re_status');
        $ad_comment = $this->input->post('ad_comment');

        $rs = $this->ttc->model_send_re_submit_Course_Title($re_up_id, $category_code, $category_code_name, $course_title, $training_hr, $trainer, $re_status, $ad_comment);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function manageSectionCode()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
        } else {
            $id = "";
        }
        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
        } else {
            $username = "";
        }
        if (isset($_SESSION["group"])) {
            $group = $_SESSION["group"];
        } else {
            $group = "";
        }
        if (isset($_GET['s_section_code'])) {
            $s_section_code = $_GET['s_section_code'];
        } else {
            $s_section_code = "";
        }
        if (isset($_GET['s_status'])) {
            $s_status = $_GET['s_status'];
        } else {
            $s_status = "";
        }
        $section_code_id['section_code_id'] = $this->ttc->model_section_code_id($id);
        $section_code_data['section_code_data'] = $this->ttc->model_section_code_data($s_section_code, $s_status);
        $user_request_course_title['user_request_course_title'] = $this->ttc->model_user_request_course_title();
        $user_request_training_provider['user_request_training_provider'] = $this->ttc->model_user_request_training_provider();
        $user_request_trainer['user_request_trainer'] = $this->ttc->model_user_request_trainer();
        $approve_data['approve_data'] = $this->ttc->model_approve_data($username, $group);
        $title['title'] = 'Manage Section Code';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu', $approve_data + $user_request_course_title + $user_request_training_provider + $user_request_trainer);
        $this->load->view('manageSectionCode', $section_code_data + $section_code_id);
        $this->load->view('include/footer');
    }

    function send_submit_section_code_ajax()
    {
        $section_code = $this->input->post('section_code');
        $status = $this->input->post('status');

        $rs = $this->ttc->model_send_submit_section_code($section_code, $status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function send_update_section_code_ajax()
    {
        $up_id = $this->input->post('up_id');
        $up_section_code = $this->input->post('up_section_code');
        $up_status = $this->input->post('up_status');

        $rs = $this->ttc->model_send_update_section_code($up_section_code, $up_status, $up_id);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function manageTrainer()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
        } else {
            $id = "";
        }
        if (isset($_GET['id_re'])) {
            $id_re = $_GET['id_re'];
        } else {
            $id_re = "";
        }
        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
        } else {
            $username = "";
        }
        if (isset($_SESSION["group"])) {
            $group = $_SESSION["group"];
        } else {
            $group = "";
        }
        if (isset($_GET['s_training_provider'])) {
            $s_training_provider = $_GET['s_training_provider'];
        } else {
            $s_training_provider = "";
        }
        if (isset($_GET['s_trainer_name'])) {
            $s_trainer_name = $_GET['s_trainer_name'];
        } else {
            $s_trainer_name = "";
        }
        if (isset($_GET['s_status'])) {
            $s_status = $_GET['s_status'];
        } else {
            $s_status = "";
        }
        $request_Trainer_id_re['request_Trainer_id_re'] = $this->ttc->model_request_Trainer_id_re($id_re);
        $user_request_course_title['user_request_course_title'] = $this->ttc->model_user_request_course_title();
        $user_request_training_provider['user_request_training_provider'] = $this->ttc->model_user_request_training_provider();
        $user_request_trainer['user_request_trainer'] = $this->ttc->model_user_request_trainer();
        $approve_data['approve_data'] = $this->ttc->model_approve_data($username, $group);
        $training_provider['training_provider'] = $this->ttc->model_training_provider();
        $list_of_trainer['list_of_trainer'] = $this->ttc->model_list_of_trainer($s_training_provider, $s_trainer_name, $s_status);
        $trainer_id['trainer_id'] = $this->ttc->model_Trainer_id($id);
        $title['title'] = 'Manage Trainer';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu', $approve_data + $user_request_course_title + $user_request_training_provider + $user_request_trainer);
        $this->load->view('manageTrainer', $training_provider + $list_of_trainer + $trainer_id + $request_Trainer_id_re);
        $this->load->view('include/footer');
    }

    function send_submit_Manage_Trainer_ajax()
    {
        // $training_provider = $this->input->post('training_provider');
        $training_provider_group = $this->input->post('training_provider_group');
        $trainer_name = $this->input->post('trainer_name');
        $status = $this->input->post('status');

        $rs =  $this->ttc->model_send_submit_Manage_Trainer($training_provider_group, $trainer_name, $status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function send_update_Manage_Trainer_ajax()
    {
        $up_id = $this->input->post('up_id');
        $up_training_provider = $this->input->post('up_training_provider');
        $up_trainer_name = $this->input->post('up_trainer_name');
        $up_status = $this->input->post('up_status');

        $rs = $this->ttc->model_send_update_Manage_Trainer($up_id, $up_training_provider, $up_trainer_name, $up_status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function UserRequestTrainer()
    {
        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
        } else {
            $username = "";
        }
        if (isset($_SESSION["group"])) {
            $group = $_SESSION["group"];
        } else {
            $group = "";
        }
        $training_provider['training_provider'] = $this->ttc->model_training_provider();
        $user_request_course_title['user_request_course_title'] = $this->ttc->model_user_request_course_title();
        $user_request_training_provider['user_request_training_provider'] = $this->ttc->model_user_request_training_provider();
        $user_request_trainer['user_request_trainer'] = $this->ttc->model_user_request_trainer();
        $approve_data['approve_data'] = $this->ttc->model_approve_data($username, $group);
        $title['title'] = 'Manage Trainer';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu', $approve_data + $user_request_course_title + $user_request_training_provider + $user_request_trainer);
        $this->load->view('UserRequestTrainer', $training_provider);
        $this->load->view('include/footer');
    }

    function send_re_trainer_name_ajax()
    {
        $re_name = $this->input->post('re_name');
        $re_email = $this->input->post('re_email');
        $re_training_provider_group = $this->input->post('re_training_provider_group');
        $re_trainer_name = $this->input->post('re_trainer_name');
        $re_training_provider = $this->input->post('re_training_provider');

        $rs = $this->ttc->model_send_re_trainer_name($re_name, $re_email, $re_training_provider_group, $re_trainer_name, $re_training_provider);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function RequestTrainer()
    {
        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
        } else {
            $username = "";
        }
        if (isset($_SESSION["group"])) {
            $group = $_SESSION["group"];
        } else {
            $group = "";
        }
        $user_request_course_title['user_request_course_title'] = $this->ttc->model_user_request_course_title();
        $user_request_training_provider['user_request_training_provider'] = $this->ttc->model_user_request_training_provider();
        $user_request_trainer['user_request_trainer'] = $this->ttc->model_user_request_trainer();
        $approve_data['approve_data'] = $this->ttc->model_approve_data($username, $group);
        $title['title'] = 'Manage Trainer';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu', $approve_data + $user_request_course_title + $user_request_training_provider + $user_request_trainer);
        $this->load->view('RequestTrainer', $user_request_trainer);
        $this->load->view('include/footer');
    }
}
