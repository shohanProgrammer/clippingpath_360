    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="min-height: 866px;">
            <div class="m-heading-1 border-green m-bordered">

                <h3><?php if ($item['subject'] == 'add_fund') echo 'Add Fund';else echo 'Refund'?> Request</h3>
                <div class="row list-separated profile-stat">
                    <div class="col-md-3">
                        <div class="profile-stat-title" style="font-weight: bolder"> <?php echo $info['first_name'];?> &nbsp;<?php echo $info['last_name'];?> </div>
                        <div class="uppercase profile-stat-text"> Client Name</div>
                    </div>
                    <div class="col-md-2">
                        <div class="profile-stat-title"> <?php echo $item['amount']; ?> </div>
                        <div class="uppercase profile-stat-text fa fa-dollar">Asked Amount</div>
                    </div>
                    <div class="col-md-2"<?php if ($item['approved_amount'] == null)echo "style=display:none"?>>
                        <div class="profile-stat-title"> <?php echo $item['approved_amount']; ?> </div>
                        <div class="uppercase profile-stat-text fa fa-dollar"> Approved Amount</div>
                    </div>
                    <div class="col-md-2">
                        <div class="profile-stat-title"> <?php echo $item['date']; ?> </div>
                        <div class="uppercase profile-stat-text"> Date</div>
                    </div>
                    <div class="col-md-3">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn green trigger" data-toggle="modal">
                            Contact Info
                        </button>
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
            <div class="row"style="<?php if ($item['permission'] != null)echo 'display:none'?>">
                <div class="col-md-12">
                    <div class="portlet light bordered" id="blockui_sample_1_portlet_body">
                        <div class="portlet-title">
                            <div class="caption">
                                <span class="caption-subject font-green-sharp sbold">Approval</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form class="form-horizontal form-group" id="approve_fund">
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                    <div class="alert alert-success display-hide">
                                        <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Amount</label>
                                        <div class="col-md-4">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input class="form-control" type="number" name="amount" placeholder="Amount">
                                            </div>
                                        </div>
                                        <input type="hidden" value="<?php echo $item['client_id'];?>" name="id">
                                        <input type="hidden" value="<?php echo $item['id'];?>" name="req_id">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"></label>
                                        <div class="col-md-9">
                                            <button class="btn grey" type="submit">Submit</button>
                                            <?php if ($item['status'] == 'new') {
                echo '<button class="btn btn-default mt-sweetalert reject-fund" data-title="Do you want to reject the fund?" 
data-message="click yes to confirm" data-type="info" data-show-confirm-button="true" 
data-confirm-button-class="btn-error" data-show-cancel-button="true" 
data-cancel-button-class="btn-default" data-close-on-confirm="false" data-close-on-cancel="true" 
data-confirm-button-text="Yes, I reject" data-cancel-button-text="Close" data-popup-title-success="Rejected" 
data-popup-message-success="You have rejected the fund" data-popup-title-cancel="Closed" 
data-popup-message-cancel="">Reject</button>'; ?>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php }elseif ($item['status'] == 'rejected')echo '<h3 style="color: red">Rejected!</h3>';elseif ($item['status'] == 'completed')echo '<h3 style="color: green">Accepted!</h3>'?>
        </div>

