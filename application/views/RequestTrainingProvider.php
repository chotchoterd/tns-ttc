<?php
$i = 0;
include('checkAdmin.php');
?>
<div class="container-fluid mt-3">
    <table class="table table-form border">
        <tr>
            <th class="display-6 text-center form_request_head" colspan="10">User Request Training Provider</th>
        </tr>
        <tr>
            <th class="border text-center form_request_head_yellow mit">No.</th>
            <th class="border text-center form_request_head_yellow mit">Requested Date</th>
            <th class="border text-center form_request_head_yellow mit">Requestor Name</th>
            <th class="border text-center form_request_head_yellow mit">Training Provider</th>
            <th class="border text-center form_request_head_yellow mit">Contact</th>
            <th class="border text-center form_request_head_yellow mit">Address</th>
            <!-- <th class="border text-center form_request_head_yellow mit">Trainer Name</th> -->
            <th class="border text-center form_request_head_yellow mit">Progress</th>
            <th class="border text-center form_request_head_yellow mit">Status</th>
            <th class="border text-center form_request_head_yellow mit">Manage</th>
        </tr>
        <?php foreach ($user_request_training_provider as $user_request_training_providers) {
            $i++; ?>
            <tr>
                <td class="border text-center"><?php echo $i ?>.</td>
                <td class="border text-center">
                    <?php
                    $dataold_request_training_providers = $user_request_training_providers->re_date;
                    $datanew_request_training_providers = date('d/m/Y h:i A', strtotime($dataold_request_training_providers));
                    echo $datanew_request_training_providers; ?>
                </td>
                <td class="border text-center"><?php echo $user_request_training_providers->re_name ?></td>
                <td class="border"><?php echo $user_request_training_providers->re_training_provider ?></td>
                <td class="border"><?php echo $user_request_training_providers->re_contact ?></td>
                <td class="border"><?php echo $user_request_training_providers->re_training_venue ?></td>
                <!-- <td class="border"><?php echo $user_request_training_providers->re_trainer_name ?></td> -->
                <td class="border mit">
                    <?php echo $user_request_training_providers->re_status; ?>
                </td>
                <td class="border mit">
                    <?php if ($user_request_training_providers->status == 1) {
                        echo "<l class=\"active-bg\">Active</l>";
                    } else {
                        echo "<l class=\"inactive-bg\">Inactive</l>";
                    } ?>
                </td>
                <td class="border mit"><a href="<?php echo base_url() ?>index.php/ttc_controller/manageTrainingProvider/?id_re=<?php echo $user_request_training_providers->id; ?>" class="btn btn-primary btn_color_df">Check</a></td>
            </tr>
        <?php } ?>
    </table>
</div>