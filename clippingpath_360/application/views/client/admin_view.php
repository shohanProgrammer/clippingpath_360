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
                            <p> <?php echo $item['description'] ?></p>
                            <p><?php if ($item['attachment']) echo '<b>Attachment:</b>' ?> <a target="_blank"
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
                        <?php $revision_number = $revision->revision_limit; ?>
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
            <!-- The Modal -->
            <div id="imgModal" class="modal1">
                <span class="diss">&times;</span>
                <img class="modal-content1" id="img01">
                <div id="caption"></div>
            </div>
            <!-- END CONTENT BODY -->
            <?php if ($item['extra_status'] == 'onapproval'||$item['extra_status']=='onrevision' && $revmax['MAX(revision_limit)']==1) {
                echo '<div class="form-actions right1">
                <span>You have <b>2</b> revisions left!
                </span>
                        <h4 class="panel-title" style="padding-top: 10px;">
                            <button type="button" class="accordion-toggle btn default" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1"class="">Revision</button>
                            <button type="button" class="accordion-toggle btn default" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_2">Approve as Complete</button>
                        </h4>
                    </div>
                    ';
            }elseif($revmax['MAX(revision_limit)']>=3 && $item['status']!='completed'){
                echo '<div class="form-actions right1">
           <h4 style="color: #af1822;">You have reached the revision limit!</h4>
                        <h4 class="panel-title" style="padding-top: 10px;">                        
                            <button type="button" class="accordion-toggle btn default" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_2">Approve as Complete</button>
                        </h4>
                    </div>';
            }elseif($revmax['MAX(revision_limit)']==2){
                echo '<div class="form-actions right1">
           <span style="margin-bottom: 10px;">You have <b>1</b> revision left!</span>
                        <h4 class="panel-title" style="padding-top: 10px;">
                            <button type="button" class="accordion-toggle btn default" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1"class="">Revision</button>
                            <button type="button" class="accordion-toggle btn default" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_2">Approve as Complete</button>
                        </h4>
                    </div>
                    ';
            } ?>
            <div id="collapse_3_1" class="panel-collapse collapse" style="padding-top: 20px;">
                    <div class="app-ticket app-ticket-details">
                        <form class="form-group" id="revision" enctype="multipart/form-data">
                            <input type="hidden" name="job_id" value="<?php echo $item['id'] ?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet light ">
                                        <div class="portlet-title tabbable-line">
                                            <div class="caption caption-md">
                                                <i class="icon-globe theme-font hide"></i>
                                                <span class="caption-subject font-blue-madison bold uppercase">Request for Revision</span>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
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
                                                        <label class="control-label col-md-2">Attachment<span
                                                                    class="required"> * </span></label>
                                                        <div class="col-md-8">
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="input-group input-large">
                                                                    <div class="form-control uneditable-input input-fixed input-medium"
                                                                         data-trigger="fileinput">
                                                                        <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                                        <span class="fileinput-filename"> </span>
                                                                    </div>
                                                                    <span class="input-group-addon btn default btn-file">
                                                                        <span class="fileinput-new"> Select file </span>
                                                                        <span class="fileinput-exists"> Change </span>
                                                                            <input class="userfile" name="userfile"
                                                                                   type="file"> </span>
                                                                    <a class="input-group-addon btn red fileinput-exists"
                                                                       href="javascript:;" data-dismiss="fileinput">
                                                                        Remove </a>
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
                                                                        <textarea class="form-control" name="text" rows="3"
                                                                                  placeholder="Some info..."></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="ticket-line"></div>


                                            <button type="button" class="accordion-toggle btn default"
                                                    data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1">
                                                Cancel
                                            </button>
                                            <button class="btn btn-square uppercase bold green" type="submit">Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>

    &nbsp;
        <div id="collapse_3_2" class="panel-collapse collapse">
            <div class="">
                <div class="app-ticket app-ticket-details">
                    <form class="form-group" id="feedback">
                        <input type="hidden" name="job_id" value="<?php echo $item['id'] ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light ">
                                    <div class="portlet-title tabbable-line">
                                        <div class="caption caption-md">
                                            <i class="icon-globe theme-font hide"></i>
                                            <span class="caption-subject font-blue-madison bold uppercase">Give us Feedback</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h3>
                                                    <i class="icon-action-redo"></i> Rate our Service</h3>
                                                <div id="star-rating">
                                                    <input type="radio" name="star" class="rating" value="1"/>
                                                    <input type="radio" name="star" class="rating" value="2"/>
                                                    <input type="radio" name="star" class="rating" value="3"/>
                                                    <input type="radio" name="star" class="rating" value="4"/>
                                                    <input type="radio" name="star" class="rating" value="5"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="ticket-msg">
                                                    <h3>
                                                        <i class="icon-note"></i> Comment</h3>
                                                    <textarea class="ticket-reply-msg" name="comment" row="10"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ticket-line"></div>

                                        <button type="button" class="accordion-toggle btn default" data-toggle="collapse"
                                                data-parent="#accordion3" href="#collapse_3_2">Cancel
                                        </button>
                                        <button class="btn btn-square uppercase bold green" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
    </div>
</div>




