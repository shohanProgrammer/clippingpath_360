    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" style="min-height: 866px">
        <div class="page-content-body">
            <div class="m-heading-1 border-green m-bordered">

                <h3><?php echo $item['job_title']; ?></h3>
                <div class="row list-separated profile-stat">
                    <div class="col-md-3">
                        <div class="profile-stat-title"> <?php echo $item['service_type']; ?> </div>
                        <div class="uppercase profile-stat-text"> Service Type</div>
                    </div>
                    <div class="col-md-3">
                        <div class="profile-stat-title"> <?php echo $item['budget']; ?> </div>
                        <div class="uppercase profile-stat-text fa fa-dollar"> Budget</div>
                    </div>
                    <div class="col-md-3">
                        <div class="profile-stat-title"> <?php echo $item['duration']; ?> </div>
                        <div class="uppercase profile-stat-text"> Estimated duration</div>
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
                            <p> <?php echo $item['description']; ?></p>
                            <p><?php if ($item['attachment']) echo '<b>Attachment:</b>'; ?> <a target="_blank"
                                                                                               download=""
                                                                                               href="<?php echo base_url(); ?>upload/<?php echo $item['attachment'] ?>"><?php echo $item['attachment'] ?></a>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
                foreach($rev  as $revision): ?>
                <div class="col-md-12" <?php if (!$revision->status) {
                    echo 'style="display:none"';
                } ?>>
                    <?php $revision_number = $revision->revision_limit ?>
                    <div class="portlet light bordered" id="blockui_sample_1_portlet_body">
                        <div class="portlet-title">
                            <div class="caption">
                                <span class="caption-subject font-green-sharp sbold">Revision <?php echo $revision->revision_limit?></span>
                            </div>
                        </div>
                        <div class="portlet-body"><p><?php echo $revision->message; ?></p>
                            <p><?php if ($revision->attachment) echo '<b>Attachment:</b>'; ?> <a target="_blank"
                                                                                              download=""
                                                                                              href="<?php echo base_url(); ?>upload/<?php echo $revision->attachment ?>"><?php echo $revision->attachment ?></a>
                            </p>
                        </div>
                        <div class="portlet-body">
                            <?php
                            foreach($status  as $s): if ($s->revision_number==$revision_number){ ?>
                                <img id="myImg" class="mag img_modal" src="<?php echo base_url(); ?>upload/<?php echo $s->screenshot ?>" alt="<?php echo $s->comment ?>"
                                     width="217" height="140">
                            <?php } endforeach;?>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
                <div class="col-md-12" <?php if ($item['status']!='ongoing') {
                    echo 'style="display:none"';
                } ?>>
                    <div class="portlet light bordered" id="blockui_sample_1_portlet_body">
                        <div class="portlet-title">
                            <div class="caption">
                                <span class="caption-subject font-green-sharp sbold">Screenshots</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <?php
                            foreach($status  as $s): ?>
                                <img id="myImg" class="mag img_modal" src="<?php echo base_url(); ?>upload/<?php echo $s->screenshot ?>" alt="<?php echo $s->comment ?>"
                                     width="217" height="140">
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" <?php if ($item['status']!='completed') {
                    echo 'style="display:none"';
                } ?>>
                    <div class="portlet light bordered" id="blockui_sample_1_portlet_body">
                        <div class="portlet-title">
                            <div class="caption">
                                <span class="caption-subject font-green-sharp sbold">Client's Feedback</span>
                            </div>
                        </div>
                        <div class="portlet-body"><p><?php if ($feed['star']==5){?>
                                    <img class="soto" src="<?php echo base_url(); ?>upload/star.png">
                                    <img class="soto" src="<?php echo base_url(); ?>upload/star.png">
                                    <img class="soto" src="<?php echo base_url(); ?>upload/star.png">
                                    <img class="soto" src="<?php echo base_url(); ?>upload/star.png">
                                    <img class="soto" src="<?php echo base_url(); ?>upload/star.png">
                                <?php }elseif ($feed['star']==4){; ?>
                                    <img class="soto" src="<?php echo base_url(); ?>upload/star.png">
                                    <img class="soto" src="<?php echo base_url(); ?>upload/star.png">
                                    <img class="soto" src="<?php echo base_url(); ?>upload/star.png">
                                    <img class="soto" src="<?php echo base_url(); ?>upload/star.png">
                                    <img class="soto" src="<?php echo base_url(); ?>upload/star2.png">
                                <?php }elseif ($feed['star']==3){;?>
                                    <img class="soto" src="<?php echo base_url(); ?>upload/star.png">
                                    <img class="soto" src="<?php echo base_url(); ?>upload/star.png">
                                    <img class="soto" src="<?php echo base_url(); ?>upload/star.png">
                                    <img class="soto" src="<?php echo base_url(); ?>upload/star2.png">
                                    <img class="soto" src="<?php echo base_url(); ?>upload/star2.png">
                                <?php }elseif ($feed['star']==2){;?>
                                    <img class="soto" src="<?php echo base_url(); ?>upload/star.png">
                                    <img class="soto" src="<?php echo base_url(); ?>upload/star.png">
                                    <img class="soto" src="<?php echo base_url(); ?>upload/star2.png">
                                    <img class="soto" src="<?php echo base_url(); ?>upload/star2.png">
                                    <img class="soto" src="<?php echo base_url(); ?>upload/star2.png">
                                <?php }elseif ($feed['star']==1){;?>
                                    <img class="soto" src="<?php echo base_url(); ?>upload/star.png">
                                    <img class="soto" src="<?php echo base_url(); ?>upload/star2.png">
                                    <img class="soto" src="<?php echo base_url(); ?>upload/star2.png">
                                    <img class="soto" src="<?php echo base_url(); ?>upload/star2.png">
                                    <img class="soto" src="<?php echo base_url(); ?>upload/star2.png">
                                <?php };?>
                            </p>
                            <p><?php echo $feed['comment']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="imgModal" class="modal1">
                <span class="diss">&times;</span>
                <img class="modal-content1" id="img01">
                <div id="caption"></div>
            </div>
            <?php if ($item['status'] == 'pending' && $item['extra_status'] != 'pending') {
                echo '<button class="btn btn-default mt-sweetalert accept-sweet" data-title="Do you want to accept this project?" 
data-message="click yes to confirm" data-type="info" data-show-confirm-button="true" 
data-confirm-button-class="btn-success" data-show-cancel-button="true" data-cancel-button-class="btn-default" 
data-close-on-confirm="false" data-close-on-cancel="true" data-confirm-button-text="Yes, I accept" 
data-cancel-button-text="Close" data-popup-title-success="Thank you" 
data-popup-message-success="You have accepted the project" data-popup-title-cancel="Cancelled" 
data-popup-message-cancel="Closed">Accept</button>&nbsp;
<button class="btn btn-default mt-sweetalert reject-sweet" data-title="Do you want to reject this project?" 
data-message="click yes to confirm" data-type="info" data-show-confirm-button="true" 
data-confirm-button-class="btn-error" data-show-cancel-button="true" 
data-cancel-button-class="btn-default" data-close-on-confirm="false" data-close-on-cancel="true" 
data-confirm-button-text="Yes, I reject" data-cancel-button-text="Close" data-popup-title-success="Rejected" 
data-popup-message-success="You have rejected the project" data-popup-title-cancel="Closed" 
data-popup-message-cancel="">Reject</button>';
            } elseif ($item['status'] == 'ongoing' && $item['extra_status'] != 'onapproval') {
                echo '<button type="button" class="accordion-toggle btn default" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_3"class="">Send Job Status</button>&nbsp;
<button class="btn btn-default mt-sweetalert req-for-complete" data-title="Do you want to reject this project?" 
data-message="click yes to confirm" data-type="info" data-show-confirm-button="true" 
data-confirm-button-class="btn-error" data-show-cancel-button="true" 
data-cancel-button-class="btn-default" data-close-on-confirm="false" data-close-on-cancel="true" 
data-confirm-button-text="Yes, I reject" data-cancel-button-text="Close" data-popup-title-success="Rejected" 
data-popup-message-success="You have rejected the project" data-popup-title-cancel="Closed" 
data-popup-message-cancel="">Mark as complete</button>';
            } elseif ($item['extra_status'] == 'pending') {
                echo '<h3>WAITING FOR PAYMENT</h3>';
            } elseif ($item['extra_status'] == 'onapproval') {
                echo '<h3>WAITING FOR CLIENTS APPROVAL</h3>';
            } elseif ($item['extra_status'] == 'onrevision') {
                echo '<button type="button" class="accordion-toggle btn default" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_3"class="">Send Job Status</button>';
            } ?>
            <!-- END CONTENT BODY -->
            <div id="collapse_3_3" class="panel-collapse collapse" style="padding-top: 20px;">
                <div class="">
                    <div class="app-ticket app-ticket-details">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light ">
                                    <div class="portlet-title tabbable-line">
                                        <div class="caption caption-md">
                                            <i class="icon-globe theme-font hide"></i>
                                            <span class="caption-subject font-blue-madison bold uppercase">Job Status</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <form class="form-group" id="job_status" enctype="multipart/form-data">
                                            <input type="hidden" name="job_id" value="<?php echo $item['id'] ?>">
                                            <input type="hidden" name="id" value="<?php echo $item['client_id'] ?>">
                                            <?php if ($item['status']!='ongoing'){ ?>
                                            <input type="hidden" name="rev_num" value="<?php echo $revision_number ?>">
                                            <?php } ?>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="alert alert-danger display-hide">
                                                        <button class="close" data-close="alert"></button>
                                                        You have some form errors. Please check below.
                                                    </div>
                                                    <div class="alert alert-success display-hide">
                                                        <button class="close" data-close="alert"></button>
                                                        Your form validation is successful!
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">Screenshot<span
                                                                    class="required"> * </span></label>
                                                        <div class="col-md-9">
                                                            <div class="fileinput fileinput-new"
                                                                 data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail"
                                                                     style="width: 200px; height: 150px;">
                                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"
                                                                         alt=""></div>
                                                                <div class="fileinput-preview fileinput-exists thumbnail"
                                                                     style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
                                                                <div>
                                                                <span class="btn default btn-file">
                                                                    <span class="fileinput-new"> Select image </span>
                                                                    <span class="fileinput-exists"> Change </span>
                                                                    <input type="hidden"><input type="file"
                                                                                                name="userfile"> </span>
                                                                    <a href="javascript:;"
                                                                       class="btn red fileinput-exists"
                                                                       data-dismiss="fileinput"> Remove </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Comment<span
                                                                            class="required"> * </span></label>
                                                                <div class="col-md-8">
                                                                    <div class="input-icon right">
                                                                        <i class="fa"></i>
                                                                        <textarea class="form-control" name="text" rows="3"placeholder="Some info..."></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ticket-line"></div>
                                            <button type="button" class="accordion-toggle btn default"
                                                    data-toggle="collapse" data-parent="#accordion3"
                                                    href="#collapse_3_3">Cancel
                                            </button>
                                            <button class="btn btn-square uppercase bold green" type="submit">Submit
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


