<script type="text/javascript">
    $(document).ready(function() {
        $('#up_submit').click(function() {
            let up_status = document.getElementById("up_status").value;
            let up_comment = document.getElementById("up_comment").value;
            if (up_status.length <= 0) {
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
            } else if (up_status == 'Rejected' && up_comment.length <= 0) {
                Swal.fire({
                    title: "You did not input Comment",
                    text: "Please input Comment for Rejected",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
            } else if (up_status == 'More Information' && up_comment.length <= 0) {
                Swal.fire({
                    title: "You did not input Comment",
                    text: "Please input Comment for More Information",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
            } else {
                send_up_Reviewer_Review()
            }
        });
    });

    function send_up_Reviewer_Review() {
        let up_id = document.getElementById("up_id").value;
        let up_username = document.getElementById("up_username").value;
        let up_email = document.getElementById("up_email").value;
        let up_position = document.getElementById("up_position").value;
        let up_status = document.getElementById("up_status").value;
        let up_comment = document.getElementById("up_comment").value;

        $.ajax({
            url: '<?php echo base_url(); ?>index.php/ttc_controller/send_up_Reviewer_Review_ajax',
            type: 'POST',
            dataType: 'json',
            data: {
                up_id: up_id,
                up_username: up_username,
                up_email: up_email,
                up_status: up_status,
                up_comment: up_comment,
                up_position: up_position
            },
            success: function(data) {
                Swal.fire({
                    title: "Submit successfully",
                    text: "",
                    icon: "success",
                    timer: 1200,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    customClass: {
                        title: 'custom-title-class'
                    }
                }).then(function() {
                    window.location = '<?php echo base_url(); ?>index.php/email_alert/email_Reviewer_Review/' + up_id + '/' + up_status + '';
                });
            }
        });
    }
</script>