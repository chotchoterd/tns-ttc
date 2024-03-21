<script type="text/javascript">
    $(document).ready(function() {
        $('#submit').click(function() {
            let section_code = document.getElementById("section_code").value;
            let status = document.getElementById("status").value;
            if (section_code.length <= 0) {
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
                document.getElementById("section_code").focus();
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
                send_submit_section_code();
            }
        });

        $('#update').click(function() {
            let up_section_code = document.getElementById("up_section_code").value;
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
                document.getElementById("up_section_code").focus();
            } else {
                send_update_section_code();
            }
        });
    });

    function send_submit_section_code() {
        let section_code = document.getElementById("section_code").value;
        let status = document.getElementById("status").value;

        $.ajax({
            url: '<?php echo base_url() ?>index.php/ttc_controller/send_submit_section_code_ajax',
            type: 'POST',
            dataType: 'json',
            data: {
                section_code: section_code,
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
                    window.location = '<?php echo base_url('index.php/ttc_controller/manageSectionCode'); ?>';
                });
            },
            error: function(data) {
                Swal.fire({
                    icon: "error",
                    title: "Save Unsuccessfully !",
                    text: "Due to Section Code existing already",
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

    function send_update_section_code() {
        let up_id = document.getElementById("up_id").value;
        let up_section_code = document.getElementById("up_section_code").value;
        let up_status = document.getElementById("up_status").value;

        $.ajax({
            url: '<?php echo base_url() ?>index.php/ttc_controller/send_update_section_code_ajax',
            type: 'POST',
            dataType: 'json',
            data: {
                up_id: up_id,
                up_section_code: up_section_code,
                up_status: up_status
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
                    window.location = '<?php echo base_url('index.php/ttc_controller/manageSectionCode'); ?>';
                });
            },
            error: function(data) {
                Swal.fire({
                    icon: "error",
                    title: "Update Unsuccessfully !",
                    text: "Due to Section Code existing already",
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

    function Search_section_code() {
        let s_section_code = document.getElementById("s_section_code").value;
        let s_status = document.getElementById("s_status").value;
        window.location = '?s_section_code=' + encodeURIComponent(s_section_code) + '&s_status=' + encodeURIComponent(s_status)
    }

    function Clear_Search_section_code() {
        window.location = '<?php echo base_url('index.php/ttc_controller/manageSectionCode') ?>'
    }
</script>