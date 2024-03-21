<script type="text/javascript">
    $(document).ready(function() {
        $('#submit').click(function() {
            let division = document.getElementById("division").value;
            let section_code = document.getElementById("section_code").value;
            let project_code = document.getElementById("project_code").value;
            let cost_code = document.getElementById("cost_code").value;
            let reviewer = document.getElementById("reviewer").value;
            let reviewer_email = document.getElementById("reviewer_email").value;
            let approver = document.getElementById("approver").value;
            let approver_email = document.getElementById("approver_email").value;
            let status = document.getElementById("status").value;
            if (division.length <= 0) {
                Swal.fire({
                    title: "You did not select Division",
                    text: "Please select Division",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
            } else if (section_code.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Section Code",
                    text: "Please fill in Section Code",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
            } else if (project_code.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Project Code",
                    text: "Please fill in Project Code",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
            } else if (cost_code.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Cost Code",
                    text: "Please fill in Cost Code",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
            } else if (reviewer.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Reviewer",
                    text: "Please fill in Reviewer",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
            } else if (reviewer_email.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Reviewer Email",
                    text: "Please fill in Reviewer Email",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
            } else if (approver.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Approver",
                    text: "Please fill in Approver",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
            } else if (approver_email.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Approver Email",
                    text: "Please fill in Approver Email",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
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
            } else {
                send_submit_Approver_Matrix();
            }
        });

        $('#update').click(function() {
            let up_section_code = document.getElementById("up_section_code").value;
            let up_project_code = document.getElementById("up_project_code").value;
            let up_cost_code = document.getElementById("up_cost_code").value;
            let up_reviewer = document.getElementById("up_reviewer").value;
            let up_reviewer_email = document.getElementById("up_reviewer_email").value;
            let up_approver = document.getElementById("up_approver").value;
            let up_approver_email = document.getElementById("up_approver_email").value;
            if (up_section_code.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Section Code",
                    text: "Please fill in Section Code",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
            } else if (up_project_code.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Project Code",
                    text: "Please fill in Project Code",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
            } else if (up_cost_code.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Cost Code",
                    text: "Please fill in Cost Code",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
            } else if (up_reviewer.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Reviewer",
                    text: "Please fill in Reviewer",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
            } else if (up_reviewer_email.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Reviewer Email",
                    text: "Please fill in Reviewer Email",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
            } else if (up_approver.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Approver",
                    text: "Please fill in Approver",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
            } else if (up_approver_email.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Approver Email",
                    text: "Please fill in Approver Email",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
            } else {
                send_update_Approver_Matrix();
            }
        });
    });

    function send_submit_Approver_Matrix() {
        let division = document.getElementById("division").value;
        let section_code = document.getElementById("section_code").value;
        let project_code = document.getElementById("project_code").value;
        let cost_code = document.getElementById("cost_code").value;
        let reviewer = document.getElementById("reviewer").value;
        let reviewer_email = document.getElementById("reviewer_email").value;
        let approver = document.getElementById("approver").value;
        let approver_email = document.getElementById("approver_email").value;
        let status = document.getElementById("status").value;
        let reviewer_alter = document.getElementById("reviewer_alter").value;
        let reviewer_email_alter = document.getElementById("reviewer_email_alter").value;
        let approver_alter = document.getElementById("approver_alter").value;
        let approver_email_alter = document.getElementById("approver_email_alter").value;

        $.ajax({
            url: "<?php echo base_url() ?>index.php/ttc_controller/send_submit_Approver_Matrix_ajax",
            type: "POST",
            dataType: "json",
            data: {
                division: division,
                section_code: section_code,
                project_code: project_code,
                cost_code: cost_code,
                reviewer: reviewer,
                reviewer_email: reviewer_email,
                approver: approver,
                approver_email: approver_email,
                status: status,
                reviewer_alter: reviewer_alter,
                reviewer_email_alter: reviewer_email_alter,
                approver_alter: approver_alter,
                approver_email_alter: approver_email_alter
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
                    window.location = '<?php echo base_url('index.php/ttc_controller/manageMatrix'); ?>';
                });
            }
        });
    }

    function send_update_Approver_Matrix() {
        let up_id = document.getElementById("up_id").value;
        let up_division = document.getElementById("up_division").value;
        let up_section_code = document.getElementById("up_section_code").value;
        let up_project_code = document.getElementById("up_project_code").value;
        let up_cost_code = document.getElementById("up_cost_code").value;
        let up_reviewer = document.getElementById("up_reviewer").value;
        let up_reviewer_email = document.getElementById("up_reviewer_email").value;
        let up_approver = document.getElementById("up_approver").value;
        let up_approver_email = document.getElementById("up_approver_email").value;
        let up_status = document.getElementById("up_status").value;
        let up_reviewer_alter = document.getElementById("up_reviewer_alter").value;
        let up_reviewer_email_alter = document.getElementById("up_reviewer_email_alter").value;
        let up_approver_alter = document.getElementById("up_approver_alter").value;
        let up_approver_email_alter = document.getElementById("up_approver_email_alter").value;

        $.ajax({
            url: "<?php echo base_url() ?>index.php/ttc_controller/send_update_Approver_Matrix_ajax",
            type: "POST",
            dataType: "json",
            data: {
                up_id: up_id,
                up_division: up_division,
                up_section_code: up_section_code,
                up_project_code: up_project_code,
                up_cost_code: up_cost_code,
                up_reviewer: up_reviewer,
                up_reviewer_email: up_reviewer_email,
                up_approver: up_approver,
                up_approver_email: up_approver_email,
                up_status: up_status,
                up_reviewer_alter: up_reviewer_alter,
                up_reviewer_email_alter: up_reviewer_email_alter,
                up_approver_alter: up_approver_alter,
                up_approver_email_alter: up_approver_email_alter
            },
            success: function(data) {
                Swal.fire({
                    title: "Update successfully",
                    text: "",
                    icon: "success",
                    timer: 1200,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    customClass: {
                        title: 'custom-title-class'
                    }
                }).then(function() {
                    window.location = '<?php echo base_url('index.php/ttc_controller/manageMatrix'); ?>';
                });
            }
        });
    }

    function search_Approver_Matrix() {
        let s_division = document.getElementById("s_division").value;
        let s_section_code = document.getElementById("s_section_code").value;
        let s_project_code = document.getElementById("s_project_code").value;
        let s_cost_code = document.getElementById("s_cost_code").value;
        let s_reviewer = document.getElementById("s_reviewer").value;
        let s_approver = document.getElementById("s_approver").value;
        let s_status = document.getElementById("s_status").value;

        window.location = "?s_division=" + encodeURIComponent(s_division) + "&s_section_code=" + encodeURIComponent(s_section_code) +
            "&s_project_code=" + encodeURIComponent(s_project_code) + "&s_cost_code=" + encodeURIComponent(s_cost_code) + "&s_reviewer=" + encodeURIComponent(s_reviewer) +
            "&s_approver=" + encodeURIComponent(s_approver) + "&s_status=" + encodeURIComponent(s_status)
    }

    function clear_search_Approver_Matrix() {
        window.location = "<?php echo base_url('index.php/ttc_controller/manageMatrix') ?>"
    }
</script>