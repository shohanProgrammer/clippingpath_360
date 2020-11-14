        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content custom-bg">
                <!-- BEGIN PAGE HEADER-->
                <!-- BEGIN PAGE TITLE-->
                <form class="form-group" id="contact">
                    <div class="col-md-12">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <span class="caption-subject bold uppercase">contact support</span>
                    </div>
                </div>
                <hr>
                <!-- END PAGE TITLE-->
                <!-- END PAGE HEADER-->

                    <div class="alert alert-danger display-hide">
                        <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                    <div class="alert alert-success display-hide">
                        <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                    <div class="c-contact">
                        <div class="form-group">
                            <div class="input-icon right">

                                <i class="fa"></i>
                            <input class="form-control input-md" type="text" name="subject" value="" placeholder="Subject">
                            </div>
                        </div>
                            <div class="form-group">
                                    <div class="input-icon right">

                                        <i class="fa"></i>
                                        <select class="form-control select2me" name="category">
                                                <option value="">Select</option>
                                                <option value="General">General</option>
                                                <option value="Payment">Payment</option>
                                                <option value="Technical">Technical</option>
                                                <option value="Others">Others</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <input class="form-control input-md" disabled type="text" value="<?php echo $client_info['first_name'];?> <?php echo $client_info['last_name'];?>"> </div>
                            <div class="form-group">
                                <input class="form-control input-md" disabled type="text" value="<?php echo $client_info['email'];?>"> </div>
                            <div class="form-group">
                                <input class="form-control input-md" disabled type="text" value="<?php echo $client_info['phone'];?>"> </div>
                            <div class="form-group">
                                <textarea name="description" class="form-control input-md" placeholder="Describe here ..." rows="5"></textarea>
                            </div>
                            <button class="btn grey" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->


