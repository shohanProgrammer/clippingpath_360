<!-- BEGIN PAGE HEADER-->
<div class="page-content custom-bg">
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PROFILE SIDEBAR -->

            <!-- BEGIN TICKET DETAILS CONTENT -->
            <div class="app-ticket app-ticket-details">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light ">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">Ticket Details</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="ticket-cust">
                                            <span class="bold">Customer:</span><?php echo $item['first_name']; ?> <?php echo $item['last_name'] ?>
                                            (
                                            <a href="mailto:<?php echo $item['email'] ?>"><?php echo $item['email'] ?>
                                                )</a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="ticket-date">
                                            <span class="bold">Posted on:</span><?php echo $item['posted'] ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="ticket-msg">
                                            <h3>
                                                <i class="icon-note"></i> Customer Message
                                            </h3>
                                            <p>
                                                <?php echo $item['description'] ?>
                                            </p>
                                        </div>
                                        <form >
                                            <input type="hidden" name="client_id" value="<?php echo $item['client_id'] ?>">
                                            <input type="hidden" name="ticket_id" value="<?php echo $item['id'] ?>">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($item['status'] == 'new') {
                echo '<h3 style="color: red">Under review</h3>';}else{
                echo '<h3 style="color: green">Solved!</h3>';
            }?>
            <!-- END PROFILE CONTENT -->
        </div>
    </div>
</div>
<!-- END CONTENT -->


