<?php
class ModelLogin extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->db_user = $this->load->database('db_user', TRUE);
        $this->db_macs = $this->load->database('db_macs', TRUE);
        $this->db_ttc = $this->load->database('db_ttc', TRUE);
    }

    public function get_data_user($username)
    {
        $sql = "SELECT employee. *,SUBSTR(section.section_name, 5) AS section_name,position.position_name,division.division_name,company.company_name
                FROM employee
                LEFT  JOIN position ON position.position_id = employee.position_id
                LEFT  JOIN section ON section.section_id = employee.section_id
                LEFT  JOIN division ON division.division_id = employee.division_id
                LEFT JOIN company ON company.company_id = employee.company_id
                WHERE employee.user_name ='" . $username . "'";
        $rs = $this->db_user
            ->query($sql)
            ->result();
            // print_r($sql);
        return $rs;
    }

    function get_data_user_group($user_id)
    {
        $sql = "SELECT * FROM tb_admin";
        $sql .= " LEFT JOIN tb_group ON (tb_admin.group_code = tb_group.group_code)";
        $sql .= " WHERE tb_admin.status = 1";
        $sql .= " AND tb_admin.emp_id = '" . $user_id . "'";
        $rs = $this->db_ttc
            ->query($sql)
            ->result();
        return $rs;
    }
}
