<div class="page-content-wrapper page-container-bg-solid">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="portlet box purple ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>New Request</div>
                <div class="tools">
                    <a href="" class="collapse" data-original-title="" title=""> </a>
                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                    <a href="" class="reload" data-original-title="" title=""> </a>
                    <a href="" class="remove" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body form">
                <form class="form-horizontal" id="form_sample_2"">
                    <div class="form-body">
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                        <div class="alert alert-success display-hide">
                            <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Select Service Type <span class="required"> * </span></label>
                            <div class="col-md-9">
                                <div class="input-icon right">
                                <i class="fa"></i>
                                <select class="form-control select2me" name="service_types">
                                    <?php
                                    foreach($services  as $r): ?>
                                        <option value="<?php echo $r->service_name;?>"><?php echo $r->service_name;?></option>
                                    <?php endforeach; ?>
                                </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group margin-top-20">
                            <label class="control-label col-md-3">Job Title <span class="required"> * </span></label>
                            <div class="col-md-9">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                <input type="text" name="name" class="form-control" placeholder="Title"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Description<span class="required"> * </span></label>
                            <div class="col-md-9">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                <textarea class="form-control" name="text" rows="3" placeholder="Some info about the Service"></textarea></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Attachment<span class="required"> * </span></label>
                            <div class="col-md-3">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="input-group input-large">
                                        <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                            <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                            <span class="fileinput-filename"> </span>
                                        </div>
                                        <span class="input-group-addon btn default btn-file">
                                                                    <span class="fileinput-new"> Select file </span>
                                                                    <span class="fileinput-exists"> Change </span>
                                                                        <input class="userfile" name="userfile" type="file"> </span>
                                        <a class="input-group-addon btn red fileinput-exists" href="javascript:;" data-dismiss="fileinput"> Remove </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Budget<span class="required"> * </span></label>
                            <div class="col-md-9">
                                <input type="number" min="5" name="budget" class="form-control" placeholder="Budget">
                                <input type="hidden" name="client_id" value="">
                                <input type="hidden" name="status" value="pending"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Select duration<span class="required"> * </span></label>
                            <div class="col-md-9">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <select class="form-control select2me" id="duration" name="duration">
                                        <option value="Less than 24hours">Less than 24hours</option>
                                        <option value="Less than one week">Less than one week</option>
                                        <option value="1-3 weeks">1-3 weeks</option>
                                        <option value="1-3 months">1-3 months</option>
                                        <option value="More than 4 months">More than 4 months</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions right1">
                        <button type="button" class="btn default">Cancel</button>
                        <button type="submit" id="showtoast" class="btn green">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END VALIDATION STATES-->
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
