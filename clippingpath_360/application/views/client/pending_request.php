<div class="page-content-wrapper page-container-bg-solid">
    <div class="">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">

            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <span class="caption-subject bold uppercase"><?php echo $portlate_title; ?></span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover order-column pending_project_table" >
                                <thead>
                                <tr>
                                    <!--<th>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                            <span></span>
                                        </label>
                                    </th>-->
                                    <th> <i class="fa fa-cc-jcb"></i> Job Title </th>
                                    <th> <i class="fa fa-question"></i> Descrition </th>
                                    <th> <i class="fa fa-credit-card"></i> Amount </th>
                                    <th> <i class="fa fa-calendar"></i> <?php echo $date_title; ?></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($menu_item){
                                foreach($menu_item  as $r): ?>
                                <tr class="odd gradeX pending_project_row">
                                    <!--<td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes" value="1" />
                                            <span></span>
                                        </label>
                                    </td>-->
                                    <td <?php if ($r->status=='rejected') echo 'style="color: red"' ?>>
                                        <b><?php echo $r->job_title;?></b></td>
                                    <td>
                                        <?php echo substr($r->description,0,100) ;?>
                                    </td>
                                    <td>
                                        <?php echo $r->budget;?>$
                                    </td>
                                    <td>
                                            <p><?php echo $r->posted;?></p>
                                    </td>
                                    <td <?php if ($r->status=='pending'){echo 'style="width: 18%"' ;} ?>>
                                        <form method="post" action="#" class="project-view" id="payNow">
                                            <input type="hidden" class="job_id" name="id" value="<?php echo $r->id;?>">
                                            <input type="hidden" class="job_budget" name="project_amount" value="<?php echo $r->budget;?>">
                                        <button class="btn default pView" type="submit" style="float: left;">view</button>
                                        </form>
                                        <?php if ($r->extra_status=='pending'){echo '<button class="btn btn-default mt-sweetalert pay-now" data-title="Do you want to pay now?" 
data-message="click yes to confirm" data-type="info" data-show-confirm-button="true" 
data-confirm-button-class="btn-success" data-show-cancel-button="true" data-cancel-button-class="btn-default" 
data-close-on-confirm="false" data-close-on-cancel="true" data-confirm-button-text="Yes, I confirm" 
data-cancel-button-text="Close" data-popup-title-success="Thank you" 
data-popup-message-success="Payment sent" data-popup-title-cancel="Cancelled" 
data-popup-message-cancel="Closed">Pay Now</button>' ;} ?>
                                    </td>
                                </tr>
                                <?php endforeach;}?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>

        </div>
        <!-- END VALIDATION STATES-->
    </div>
</div>
<!-- END CONTENT BODY -->
</div>
