<?php
include "scriptTRRegisterData.php";
?>
<form action="<?php echo base_url(); ?>index.php/export_csv/export" method="post">
    <div class="container mt-5">
        <table class="table table-form">
            <tr>
                <th colspan="3" class="display-6 text-center form_request_head">Export TR Register Data</th>
            </tr>
            <tr>
                <th class="border text-center form_request_head_yellow">Year</th>
                <th class="border text-center form_request_head_yellow">Month</th>
                <th class="border text-center form_request_head_yellow">Action</th>
            </tr>
            <tr>
                <td class="mit border">
                    <select name="year" id="year" class="form-select">
                        <?php
                        $current_year = date('Y');
                        for ($y = $current_year - 5; $y < $current_year + 5; $y++) { ?>
                            <option value="<?php echo $y ?>" <?php if ($y == $current_year) echo "selected"; ?>><?php echo $y ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td class="mit border">
                    <select name="month" id="month" class="form-select">
                        <!-- <option value="">- All -</option> -->
                        <?php
                        for ($m = 1; $m <= 12; $m++) {
                            $month = date("F", mktime(0, 0, 0, $m, 1));
                            $month_num = date("m");
                        ?>
                            <option value="<?php echo $m; ?>" <?php if ($m == $month_num) echo "selected"; ?>><?php echo $month; ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td class="mit border">
                    <input type="submit" class="btn btn-primary btn_color_df" name="export_csv" value="Export CSV"></input>
                </td>
            </tr>
        </table>
    </div>
</form>
<section class="">
    <footer class="text-center text-white fixed-bottom" style="background-color: #203764;">
        <div class="container p-2 pb-0">
            <section class="">
                <p class="d-flex justify-content-center align-items-center">
                    <span class="me-3">Training Program Developed by PMIS & ERP Programmer Team.</span>
                </p>
            </section>
        </div>
        <div class="text-center p-3 bg-nav-background">
            Copyright © 2023 THAI NIPPON STEEL ENGINEERING & CONSTRUCTION CORPORATION LTD.
        </div>
    </footer>
</section>