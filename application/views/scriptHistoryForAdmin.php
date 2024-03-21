<script type="text/javascript">
    $(document).ready(function() {
        $('#s_date_request').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
    });

    function Search_Training_Request_History() {
        let s_tr_no = document.getElementById("s_tr_no").value;
        let s_date_request = document.getElementById("s_date_request").value;
        let s_requestor_name = document.getElementById("s_requestor_name").value;
        let s_course_category = document.getElementById("s_course_category").value;
        let s_course_title = document.getElementById("s_course_title").value;
        let s_approval_status = document.getElementById("s_approval_status").value;
        let s_status = document.getElementById("s_status").value;

        window.location = "?s_tr_no=" + encodeURIComponent(s_tr_no) + '&s_date_request=' + encodeURIComponent(s_date_request) +
            '&s_requestor_name=' + encodeURIComponent(s_requestor_name) + '&s_course_category=' + encodeURIComponent(s_course_category) +
            '&s_course_title=' + encodeURIComponent(s_course_title) + '&s_approval_status=' + encodeURIComponent(s_approval_status) + '&s_status=' + encodeURIComponent(s_status)
    }

    function Clear_Search_Training_Request_History() {
        window.location = "<?php echo base_url('index.php/ttc_controller/HistoryForAdmin'); ?>"
    }
</script>