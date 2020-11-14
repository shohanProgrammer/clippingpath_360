<form class="form-horizontal form-group" id="adjustment_form">
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
    <div class="alert alert-success display-hide">
        <button class="close" data-close="alert"></button> Your form validation is successful! </div>
    <div class="form-group">
        <label class="control-label col-md-3">Select
            <span class="required" aria-required="true"> * </span>
        </label>
        <div class="col-md-9">
            <select class="form-control" name="subject">
                <option value="addFund_minus">Extend Budget</option>
                <option value="refund_plus">Refund</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Amount</label>
        <div class="col-md-4">
            <div class="input-icon right">
                <i class="fa"></i>
                <input class="form-control" type="number" name="amount" placeholder="Amount">
                <input type="hidden" name="job_id" value="<?php echo $id;?>" >
                <input type="hidden" name="client_id" value="<?php echo $client_id;?>" >
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label"></label>
        <div class="col-md-9">
            <button class="btn grey" type="submit">Submit</button>
        </div>
    </div>
</form>