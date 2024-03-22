<!-- add modal -->
<div class="modal" id="model_add_sms">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h5 class="modal-title">اضافة قالب رسالة جديد</h5><button aria-label="Close" class="close"
                    data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label for="example"> الرسالة التعريفية </label>
                            <textarea rows="3" class="form-control" required="" type="text"></textarea>
                        </div>

                        <div class="col-12">
                            <label> اختار الفئة  </label>
                            <select class="form-control select2" id="">
                                <option value="">
                                    ----------
                                </option>
                            </select>
                        </div>

                        <div class="col-12 mt-3">
                            <label> اختار الحالة  </label>
                            <select class="form-control select2" id="">
                                <option value="">
                                    فعال
                                </option>
                                <option value="">
                                   غير فعال
                                </option>
                            </select>
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
