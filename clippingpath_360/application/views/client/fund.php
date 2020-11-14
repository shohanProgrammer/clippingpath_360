<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content custom-bg">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE TITLE-->
        <form class="form-horizontal form-group" id="fund">
            <div class="col-md-12">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <span class="caption-subject bold uppercase">FUND</span>
                    </div>
                </div>
                <hr>
                <!-- END PAGE TITLE-->
                <!-- END PAGE HEADER-->

                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                <div class="alert alert-success display-hide">
                    <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Select Subject</label>
                        <div class="col-md-4">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <select class="form-control select2me" name="subject">
                                    <option value="">Select</option>
                                    <option value="add_fund">Add Fund</option>
                                    <option value="refund">Refund</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Payment Method</label>
                        <div class="col-md-4">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <select class="form-control select2me" name="p_method">
                                    <option value="">Select</option>
                                    <option value="add_fund">Paypal</option>
                                    <option value="refund">Skrill</option>
                                    <option value="refund">Payoneer</option>
                                    <option value="refund">Neteller</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Amount</label>
                        <div class="col-md-4">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <input class="form-control" type="number" name="amount" placeholder="Amount">
                            </div>
                        </div>
                    </div>
                    <!--<div class="form-group">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="input-icon right">
                                <i class="fa"></i>
                                <input class="form-control input-md" id="taka" type="number" name="amount" placeholder="Amount">
                            </div>
                        </div>
                    </div>-->
                    <!--<div class="form-group">
                        <div class="input-icon right">
                            <span class="fa">After 5% vat</span>
                            <input class="form-control input-md" id="main_taka" disabled type="text" name="amount" placeholder="">
                        </div>
                    </div>-->
                    <div class="form-group">
                        <label class="col-md-3 control-label">Full Name</label>
                        <div class="col-md-5">
                                <input class="form-control input-md" disabled type="text" value="<?php echo $client_info['first_name'];?> <?php echo $client_info['last_name'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Email</label>
                        <div class="col-md-5">
                            <input class="form-control input-md" disabled type="text" value="<?php echo $client_info['email'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Phone</label>
                        <div class="col-md-5">
                            <input class="form-control input-md" disabled type="text" value="<?php echo $client_info['phone'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Attachment</label>
                            <div class="col-md-5">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="input-group input-large">
                                        <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                            <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                            <span class="fileinput-filename">Attachment </span>
                                        </div>
                                        <span class="input-group-addon btn default btn-file">
                                                                        <span class="fileinput-new"> Select file </span>
                                                                        <span class="fileinput-exists"> Change </span>
                                                                            <input class="userfile" name="files" type="file"> </span>
                                        <a class="input-group-addon btn red fileinput-exists" href="javascript:;" data-dismiss="fileinput"> Remove </a>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Comments</label>
                        <div class="col-md-5">
                            <textarea name="description" class="form-control input-md" placeholder="Describe here ..." rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                            <button class="btn grey" type="submit">Submit</button>
                        </div>
                    </div>

        </form>
</div>
</div>
<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->


