<div class="modal" id="select2modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h5 class="modal-title">اضافة ملف</h5><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="row">

                        <div class="col-12 form-group">
                            <label for="example"> الاسم </label>
                            <input class="form-control" required="" id="name" type="text">
                        </div>
                        <div class="col-12 form-group">
                            <label class=""> نوع الملف </label>
                            <select class="form-control select2" id="program_id">
                                <option value="">اختار نوع الملف</option>
                                <option value=""> word </option>
                                <option value=""> Execl </option>
                                <option value=""> pdf </option>
                            </select>
                        </div>

                        <div class="col-12 form-group">
                            <label for="exampleInputEmail1"> ادراج ملف </label>
                            <input type="file" class="dropify" data-default-file="../assets/img/photos/1.pdf" data-height="70"  />
                            <p class="tx-11">الحد الاقصى لحجم الملف 8 MB</p>
                        </div>

                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button class="btn btn-warning-gradient btn-with-icon" type="button" onclick="performStore()"> حفظ <i class="bi bi-floppy"></i></button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button"> إلغاء </button>
                </div>
            </form>
        </div>
    </div>
</div>
