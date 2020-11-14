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
                            <table class="table table-striped table-bordered table-hover order-column" id="sample_1">
                                <thead>
                                <tr>
                                    <!--<th>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                            <span></span>
                                        </label>
                                    </th>-->
                                    <th> <i class="fa fa-cc-jcb"></i> Job Title </th>
                                    <th> <i class="fa fa-question"></i> Message </th>
                                    <th> <i class="fa fa-calendar"></i> <?php echo $date_title; ?></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($menu_item){
                                    foreach($menu_item  as $r): if ($r->extra_status == 'onrevision') {?>
                                        <tr class="odd gradeX">
                                            <!--<td>
                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input type="checkbox" class="checkboxes" value="1" />
                                                    <span></span>
                                                </label>
                                            </td>-->
                                            <td>
                                                <b><?php echo $r->job_title;?></b></td>
                                            <td>
                                                <?php echo substr($r->message,0,100) ;?>
                                            </td>
                                            <td>
                                                <p><?php echo $r->posted;?></p>
                                            </td>
                                            <td>
                                                <form method="post" action="#" class="project-view">
                                                    <input type="hidden" name="id" value="<?php echo $r->id;?>">
                                                    <button class="btn default pView" type="submit">view</button>
                                                </form>

                                            </td>
                                        </tr>
                                    <?php } endforeach;}?>
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
