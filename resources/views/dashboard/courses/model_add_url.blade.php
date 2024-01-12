<div class="modal" id="modalurl">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h5 class="modal-title">اضافة رابط ملف</h5><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="row">

                        <div class="col-12 form-group">
                            <label for="example"> الاسم </label>
                            <input class="form-control" required="" id="name" type="text">
                        </div>

                        <div class="col-12 form-group">
                            <label for="example">  الرابط (URL) </label>
                            <input class="form-control" required="" id="name" type="url">
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
