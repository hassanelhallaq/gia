<!-- add modal -->
<div class="modal" id="model_add_sms">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h5 class="modal-title">اضافة اختبار جديد</h5><button aria-label="Close" class="close"
                    data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="row mg-t-10">
                        <div class="col  d-flex justify-content-between flex-wrap">
                            <label class="rdiobox"><input name="rdio" type="radio"> <span> اختبار قبلي
                                </span></label>
                            <label class="rdiobox"><input checked="" name="rdio" type="radio"> <span> اختبار بعدي
                                </span></label>
                            <label class="rdiobox"><input disabled="" name="rdio" type="radio"> <span> اختبار تفاعلي
                                </span></label>
                        </div>
                        <div class="col-12 mt-4">
                            <label for="example"> اسم الأختبار </label>
                            <input class="form-control" required="" type="text">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button class="btn btn-warning-gradient btn-with-icon" type="submit"> حفظ <i
                            class="bi bi-floppy"></i></button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button"> إلغاء </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End add modal -->
