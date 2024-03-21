<?php
$i = 0;
include('checkAdmin.php');
?>
<div class="container-fluid mt-3">
    <table class="table table-form border">
        <tr>
            <th class="display-6 text-center form_request_head" colspan="8">User Request Trainer</th>
        </tr>
        <tr>
            <th class="border text-center form_request_head_yellow mit">No.</th>
            <th class="border text-center form_request_head_yellow mit">Requested Date</th>
            <th class="border text-center form_request_head_yellow mit">Requestor Name</th>
            <th class="border text-center form_request_head_yellow mit">Training Provider</th>
            <th class="border text-center form_request_head_yellow mit">Trainer Name</th>
            <th class="border text-center form_request_head_yellow mit">Progress</th>
            <th class="border text-center form_request_head_yellow mit">Status</th>
            <th class="border text-center form_request_head_yellow mit">Manage</th>
        </tr>
        <?php foreach ($user_request_trainer as $user_request_trainers) {
            $i++ ?>
            <tr>
                <td class="border text-center"><?php echo $i; ?>.</td>
                <td class="border text-center">
                    <?php
                    $dataold_request_trainers = $user_request_trainers->re_date;
                    $datanew_request_trainers = date('d/m/Y h:i A', strtotime($dataold_request_trainers));
                    echo $datanew_request_trainers; ?>
                </td>
                <td class="border text-center"><?php echo $user_request_trainers->re_name ?></td>
                <td class="border text-center"><?php echo $user_request_trainers->re_training_provider ?></td>
                <td class="border text-center"><?php echo $user_request_trainers->re_trainer_name ?></td>
                <td class="border text-center"><?php echo $user_request_trainers->re_status ?></td>
                <td class="border mit">
                    <?php if ($user_request_trainers->status == 1) {
                        echo "<l class=\"active-bg\">Active</l>";
                    } else {
                        echo "<l class=\"inactive-bg\">Inactive</l>";
                    } ?>
                </td>
                <td class="border text-center"><a href="<?php echo base_url() ?>index.php/ttc_controller/manageTrainer/?id_re=<?php echo $user_request_trainers->id; ?>" class="btn btn-primary btn_color_df">Check</a></td>
            </tr>
        <?php } ?>
    </table>
</div>