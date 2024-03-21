<script type="text/javascript">
    $(document).ready(function() {
        $('#bt_submit').click(function() {
            let re_training_provider = document.getElementById("re_training_provider").value;
            if (re_training_provider.length <= 0) {
                Swal.fire({
                    title: "You did not fill in Training Provider",
                    text: "Please fill in Training Provider",
                    icon: "warning",
                    allowOutsideClick: false,
                    confirmButtonText: "OK",
                    confirmButtonColor: '#203764',
                    customClass: {
                        title: 'custom-title-class'
                    }
                });
                document.getElementById("re_training_provider").focus();
            } else {
                send_re_training_provider();
            }
        });
    });

    function send_re_training_provider() {
        let re_name = document.getElementById("re_name").value;
        let re_training_provider = document.getElementById("re_training_provider").value;
        let re_email = document.getElementById("re_email").value;
        let re_contact = document.getElementById("re_contact").value;
        let re_training_venue = document.getElementById("re_training_venue").value;
        // let re_trainer_name = document.getElementById("re_trainer_name").value;
        $.ajax({
            url: '<?php echo base_url() ?>index.php/ttc_controller/send_request_training_provider_ajax',
            type: 'POST',
            dataType: 'json',
            data: {
                re_name: re_name,
                re_training_provider: re_training_provider,
                re_email: re_email,
                re_contact: re_contact,
                re_training_venue: re_training_venue,
                // re_trainer_name: re_trainer_name
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
                    window.location = '<?php echo base_url('index.php/email_alert/emailUserRequestTrainingProvider/'); ?>' + re_name + '/' + re_email.replace("@", "00");
                });
            },
            error: function(data) {
                Swal.fire({
                    icon: "error",
                    title: "This<br>" + "\"" + re_training_provider + "\"" + "<br> already exists.",
                    html: "This <b>" + re_training_provider + "</b> provider already exists.",
                    confirmButtonColor: '#375496',
                    confirmButtonText: "ตกลง",
                    allowOutsideClick: false
                });
            }
        });
    }
</script>