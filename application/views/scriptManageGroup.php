<script type="text/javascript">
    $(document).ready(function() {
        $('#submit').click(function() {
            let group_code = document.getElementById("group_code").value;
            let group_name = document.getElementById("group_name").value;
            let status = document.getElementById("status").value;
            if (group_code.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Group Code",
                    text: "Please fill in Group Code",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("group_code").focus();
            } else if (group_name.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Group Name",
                    text: "Please fill in Group Name",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("group_name").focus();
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
                send_submit_Group();
            }
        });

        $('#update').click(function() {
            let up_group_code = document.getElementById("up_group_code").value;
            let up_group_name = document.getElementById("up_group_name").value;
            if (up_group_code.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Group Code",
                    text: "Please fill in Group Code",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("up_group_code").focus();
            } else if (up_group_name.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Group Name",
                    text: "Please fill in Group Name",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("up_group_name").focus();
            } else {
                send_update_Group();
            }
        });
    });

    function send_submit_Group() {
        let group_code = document.getElementById("group_code").value;
        let group_name = document.getElementById("group_name").value;
        let status = document.getElementById("status").value;
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/ttc_controller/submit_ManageGroup_ajax',
            type: 'POST',
            dataType: 'json',
            data: {
                group_code: group_code,
                group_name: group_name,
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
                    window.location = '<?php echo base_url('index.php/ttc_controller/manageGroup'); ?>';
                });
            }
        });
    }

    function send_update_Group() {
        let up_id = document.getElementById("up_id").value;
        let up_group_code = document.getElementById("up_group_code").value;
        let up_group_name = document.getElementById("up_group_name").value;
        let up_status = document.getElementById("up_status").value;
        console.log(up_id);
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/ttc_controller/update_ManageGroup_ajax',
            type: 'POST',
            dataType: 'json',
            data: {
                up_id: up_id,
                up_group_code: up_group_code,
                up_group_name: up_group_name,
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
                    window.location = '<?php echo base_url('index.php/ttc_controller/manageGroup'); ?>';
                });
            }
        });
    }

    function serach_group() {
        let s_group_code = document.getElementById("s_group_code").value;
        let s_group_name = document.getElementById("s_group_name").value;
        let s_status = document.getElementById("s_status").value;

        window.location = '?s_group_code=' + encodeURIComponent(s_group_code) + '&s_group_name=' + encodeURIComponent(s_group_name) + '&s_status=' + encodeURIComponent(s_status)
    }

    function clear_serach_group() {
        window.location = "<?php echo base_url('index.php/ttc_controller/manageGroup') ?>";
    }
</script>