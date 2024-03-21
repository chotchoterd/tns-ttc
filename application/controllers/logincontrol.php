<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logincontrol extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->model('ModelLogin', 'login');
    }

    function loginTTC()
    {
        $title['title'] = 'Log in Training Program';
        $this->load->view('include/header', $title);
        $this->load->view('loginTTC');
        // $this->load->view('include/footer');
    }

    function login()
    {
        $title['title'] = 'Login';
        $this->load->view('include/header', $title);
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if ($username != '' && $password != '') {
            // using ldap bind
            $ldaprdn = $username; // ldap rdn or dn
            $ldappass = $password; // associated password
            $ldaprdn = $ldaprdn . "@thainippon.co.th";
            // connect to ldap server
            $ldapconn = ldap_connect("tns-ad.thainippon.co.th")
                or die("Could not connect to LDAP server.");
            if ($ldapconn) {
                // binding to ldap server
                $ldapbind = @ldap_bind($ldapconn, $ldaprdn, $ldappass);
                // verify binding
                if ($ldapbind) {
                    $get_emp_id = $this->login->get_data_user($username);
                    foreach ($get_emp_id as $r) {
                        $user_fullname = $r->name_lastname;
                        $user_section = $r->section_name;
                        $user_id = $r->employee_id;
                        $user_division = $r->division_name_tmp;
                        $user_position = $r->position_name_tmp;
                        $email = $r->email;
                        $company_name = $r->company_name;
                    }
                    if (session_id() == '') {
                        session_start();
                    }
                    $_SESSION["username"] =  str_replace("  ", " ", $user_fullname); //$username;
                    $_SESSION["section"] = $user_section;
                    $_SESSION["id"] = $user_id;
                    $_SESSION["division"] = $user_division;
                    $_SESSION["position"] = $user_position;
                    $_SESSION['last_activity'] = time();
                    $_SESSION["email"] = $email;
                    $_SESSION["company_name"] = $company_name;

                    $get_emp_group = $this->login->get_data_user_group($user_id);
                    foreach ($get_emp_group as $s) {
                        $user_group = $s->group_name;
                    }
                    if (isset($user_group)) {
                        $_SESSION["group"] = $user_group;
                    } else {
                        $_SESSION["group"] = "";
                    }
                    if ($_SESSION["group"] != "") {
                        echo "<script type=\"text/javascript\">
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                title: 'Login!',
                                text: 'Successfully',
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false,
                                allowOutsideClick: false
                            }).then(() => {
                                window.location.href = '" . base_url() . "index.php/ttc_controller/HistoryForAdmin';
                            });
                        });
                    </script>";
                    }
                    if ($_SESSION["group"] == "") {
                        echo "<script type=\"text/javascript\">
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                title: 'Login!',
                                text: 'Successfully',
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false,
                                allowOutsideClick: false
                            }).then(() => {
                                window.location.href = '" . base_url() . "index.php/ttc_controller/HistoryForUser';
                            });
                        });
                    </script>";
                    }
                } else {
                    echo "<script type=\"text/javascript\">
                        document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            title: 'Invalid!',
                            text: 'Username or Password.',
                            icon: 'error',
                            timer: 1500,
                            showConfirmButton: false,
                            allowOutsideClick: false
                        }).then(() => {
                            window.location.href = '" . base_url() . "index.php/logincontrol/loginTTC';
                        });
                    });
                    </script>";
                }
            } else {
                echo "<script type=\"text/javascript\">
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            title: 'Invalid!',
                            text: 'Username or Password.',
                            icon: 'error',
                            timer: 1500,
                            showConfirmButton: false,
                            allowOutsideClick: false
                        }).then(() => {
                            window.location.href = '" . base_url() . "index.php/logincontrol/loginTTC';
                        });
                    });
                    </script>";
            }
        } else {
            echo "<script type=\"text/javascript\">
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            title: 'Invalid!',
                            text: 'Username or Password.',
                            icon: 'error',
                            timer: 1500,
                            showConfirmButton: false,
                            allowOutsideClick: false
                        }).then(() => {
                            window.location.href = '" . base_url() . "index.php/logincontrol/loginTTC';
                        });
                    });
                    </script>";
        }
    }
}
