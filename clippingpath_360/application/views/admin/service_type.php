<div class="page-content-wrapper page-container-bg-solid">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->

        <!-- BEGIN TICKET LIST CONTENT -->
        <div class="app-ticket app-ticket-list">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light ">
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">Technical Support</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-body">
                                <form class="form-horizontal" id="service_type_input">
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Add Service Type</label>
                                        <div class="col-md-10">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" name="service" class="form-control"
                                                       placeholder="Service Name">
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
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light ">
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">Delete Service Types</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="form-body">
                                <form class="form-horizontal" id="service_type_delete">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Select Service Types</label>
                                        <div class="col-md-10">
                                            <select class="form-control" name="service_id">
                                                <?php
                                                foreach ($menu_item as $m): ?>
                                                    <option value="<?php echo $m->id; ?>"><?php echo $m->service_name; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                                <div class="form-actions right1">
                                    <button type="button" class="btn default">Cancel</button>
                                    <button class="btn btn-default mt-sweetalert delete_sweet"
                                            data-title="Do you want to accept this project?"
                                            data-message="click yes to confirm" data-type="info"
                                            data-show-confirm-button="true"
                                            data-confirm-button-class="btn-success" data-show-cancel-button="true"
                                            data-cancel-button-class="btn-default"
                                            data-close-on-confirm="false" data-close-on-cancel="true"
                                            data-confirm-button-text="Yes, I accept"
                                            data-cancel-button-text="Close" data-popup-title-success="Thank you"
                                            data-popup-message-success="Ticket solved"
                                            data-popup-title-cancel="Cancelled"
                                            data-popup-message-cancel="Closed">Delete
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROFILE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->