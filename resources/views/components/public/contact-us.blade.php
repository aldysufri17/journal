<div>
    <form id="form-contact" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="FormControlTextarea">@lang('form_group.message.title') <span class="required">*</span></label>
            <textarea class="form-control" id="FormControlTextarea"
                placeholder="@lang('form_group.message.placeholder')" name="message" rows="3" required></textarea>
            <div class="invalid-feedback">
                Please enter a message in the textarea.
            </div>
        </div>
        <div class="form-group">
            <label for="InputPassword">@lang('form_group.phone.title') <span class="required">*</span></label>
            <input type="number" class="form-control" id="InputPassword" name="phone"
                placeholder="@lang('form_group.phone.placeholder')" required>
            <div class="invalid-feedback">
                Please enter a message in the form.
            </div>
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                    @lang('form_group.aggreement.title') <span class="required">*</span>
                </label>
                <div class="invalid-feedback">
                    You must agree before submitting.
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-submit">@lang('form_group.button.send')</button>
    </form>
</div>