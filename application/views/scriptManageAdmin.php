<script type="text/javascript">
    $(document).ready(function() {
        $('#submit').click(function() {
            let employee_id = document.getElementById("employee_id").value;
            let group_code = document.getElementById("group_code").value;
            let status = document.getElementById("status").value;
            if (employee_id.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Employee ID",
                    text: "Please fill in Employee ID",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("employee_id").focus();
            } else if (group_code.length <= 0) {
                Swal.fire({
                    title: "You did not select Group",
                    text: "Please select Group",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("group_code.").focus();
            } else if (status.length <= 0) {
                Swal.fire({
                    title: "You did not select Status",
                    text: "Please select Status",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("status").focus();
            } else {
                send_submit_admin();
            }
        });

        $('#update').click(function() {
            let up_employee_id = document.getElementById("up_employee_id").value;
            if (up_employee_id.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Employee ID",
                    text: "Please fill in Employee ID",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("up_employee_id").focus();
            } else {
                send_update_admin();
            }
        });
    });

    function send_submit_admin() {
        let employee_id = document.getElementById("employee_id").value;
        let group_code = document.getElementById("group_code").value;
        let status = document.getElementById("status").value;
        $.ajax({
            url: '<?php echo base_url() ?>index.php/ttc_controller/submit_admin_ajax',
            type: 'POST',
            dataType: 'json',
            data: {
                employee_id: employee_id,
                group_code: group_code,
                status: status
            },
            success: function(data) {
                Swal.fire({
                    title: "Save successfully",
                    text: "",
                    icon: "success",
                    timer: 1200,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    customClass: {
                        title: 'custom-title-class'
                    }
                }).then(function() {
                    window.location = '<?php echo base_url('index.php/ttc_controller/manageAdmin'); ?>';
                });
            },
            error: function(data) {
                Swal.fire({
                    icon: "error",
                    title: "Save unsuccessfully!",
                    text: "Due to Employee ID existing already or Employee ID doesn't in employee data",
                    confirmButtonColor: '#203764',
                    confirmButtonText: "OK",
                    allowOutsideClick: false,
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
            }
        });
    }

    function send_update_admin() {
        let up_id = document.getElementById("up_id").value;
        let up_employee_id = document.getElementById("up_employee_id").value;
        let up_group_code = document.getElementById("up_group_code").value;
        let up_status = document.getElementById("up_status").value;
        $.ajax({
            url: '<?php echo base_url() ?>index.php/ttc_controller/update_admin_ajax',
            type: 'POST',
            dataType: 'json',
            data: {
                up_id: up_id,
                up_employee_id: up_employee_id,
                up_group_code: up_group_code,
                up_status: up_status
            },
            success: function(data) {
                Swal.fire({
                    title: "Update Successfully",
                    text: "",
                    icon: "success",
                    timer: 1200,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    customClass: {
                        title: 'custom-title-class'
                    }
                }).then(function() {
                    window.location = '<?php echo base_url('index.php/ttc_controller/manageAdmin'); ?>';
                });
            },
            error: function(data) {
                Swal.fire({
                    icon: "error",
                    title: "Update Unsuccessfully !",
                    text: "Due to Employee ID existing already or Employee ID doesn't in employee data",
                    confirmButtonColor: '#203764',
                    confirmButtonText: "OK",
                    allowOutsideClick: false,
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
            }
        });
    }

    function search_admin() {
        let s_emp_id = document.getElementById("s_emp_id").value;
        let s_name = document.getElementById("s_name").value;
        let s_email = document.getElementById("s_email").value;
        let s_group = document.getElementById("s_group").value;
        let s_status = document.getElementById("s_status").value;

        window.location = '?s_emp_id=' + encodeURIComponent(s_emp_id) + '&s_name=' + encodeURIComponent(s_name) +
            '&s_email=' + encodeURIComponent(s_email) + '&s_group=' + encodeURIComponent(s_group) + '&s_status=' + encodeURIComponent(s_status)
    }

    function clear_search_admin() {
        window.location = "<?php echo base_url('index.php/ttc_controller/manageAdmin') ?>";
    }
</script>