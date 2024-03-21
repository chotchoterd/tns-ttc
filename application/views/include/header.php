<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>img/images.png">
    <title><?php echo $title ?></title>
    <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>bootstrap/js/sweetalert2.js"></script>
    <link id="myCss" rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/css-ttc.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- <link href="<?php echo base_url(); ?>bootstrap/css/icon.css" rel="stylesheet"> -->
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@600&family=Prompt&display=swap" rel="stylesheet">

    <!-- datepicker -->
    <link href="<?php echo base_url(); ?>bootstrap/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>bootstrap/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    
    <!-- selectpicker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/selectpicker.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js" integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <?php
    function getTypeFile($input)
    {
        $cut = explode(".", $input);
        return "." . $cut[1];
    }
    ?>
</body>
<script type="text/javascript">
    var base_url = '<?php echo base_url(); ?>';

    function getTypeFile(input) {
        var tmp = input.split(".");
        return "." + tmp[1];
    }
</script>

</html>