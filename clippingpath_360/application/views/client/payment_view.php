<!-- BEGIN CONTENT BODY -->
<div class="page-content" style="min-height: 866px;">
    <div class="m-heading-1 border-green m-bordered">

        <h3><?php if ($item['subject'] == 'add_fund') echo 'Add Fund';else echo 'Refund'?> Request</h3>
        <div class="row list-separated profile-stat">
            <div class="col-md-3">
            </div>
            <div class="col-md-3">
                <div class="profile-stat-title"> <?php echo $item['amount']; ?> </div>
                <div class="uppercase profile-stat-text fa fa-dollar"> Asked Amount</div>
            </div>
            <div class="col-md-3"<?php if ($item['approved_amount'] == null)echo "style=display:none"?>>
                <div class="profile-stat-title"> <?php echo $item['approved_amount']; ?> </div>
                <div class="uppercase profile-stat-text fa fa-dollar"> Approved Amount</div>
            </div>
            <div class="col-md-3">
                <div class="profile-stat-title"> <?php echo $item['date']; ?> </div>
                <div class="uppercase profile-stat-text"> Date</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered" id="blockui_sample_1_portlet_body">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject font-green-sharp sbold">Details</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <p> <?php echo $item['message']; ?></p>
                    <p><?php if ($item['attachment']) echo '<b>Attachment:</b>'; ?> <a target="_blank"
                                                                                       download=""
                                                                                       href="<?php echo base_url(); ?>upload/<?php echo $item['attachment'] ?>"><?php echo $item['attachment'] ?></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php if ($item['status'] == 'rejected')echo '<h3 style="color: red">Rejected!</h3>';elseif ($item['status'] == 'completed')echo '<h3 style="color: green">Accepted!</h3>'?>
</div>

