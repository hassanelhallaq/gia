<div class="modal" id="select2modal_{{$attendances->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h5 class="modal-title">اضافة شهادة</h5><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="row">

                        <div class="col-12 form-group">
                            <label for="example"> رمز الشهادة  </label>
                            <input class="form-control" required="" id="code_{{$attendances->id}}" type="text">
                        </div>
                        <div class="col-12 form-group">
                        <select id="certifacate_type_{{$attendances->id}}" class="form-control select2">
                            <option value="شهادة حضور">
                                شهادة حضور
                            </option>
                            <option value="شهادة احترافية">
                                شهادة احترافية
                            </option>
                    </select>
                </div>
                        <div class="col-12 form-group">
                            <label for="exampleInputEmail1"> ادراج ملف </label>
                            <input type="file" id="file_{{$attendances->id}}" class="dropify" id="file" data-default-file="../assets/img/photos/1.pdf" data-height="70"  />
                            <p class="tx-11">الحد الاقصى لحجم الملف 8 MB</p>
                        </div>

                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button class="btn btn-warning-gradient btn-with-icon" onclick="performStore({{$attendances->id}})" type="button"> حفظ <i class="bi bi-floppy"></i></button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button"> إلغاء </button>
                </div>
            </form>
        </div>
    </div>
</div>
