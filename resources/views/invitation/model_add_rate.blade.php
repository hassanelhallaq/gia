
<div class="modal" id="select2modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            {{-- <div class="modal-header">
                <h5 class="modal-title">اضافة ملف</h5><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div> --}}
            <form action="">
                <div class="modal-body">
                    <div class="row">
                        <tbody id="table-body">
                            <tr>
                                <p class="p-5 text-center d-none" id="empty-message">لا توجد بيانات لعرضها
                                </p>
                            </tr>
                            @foreach ($rates as $item)
                                <tr class="table-rows">
                                    <td scope="row"> {{ $item->question }} </td>
                                    <td scope="row"> <div class="rate">
                                        <input type="radio" id="star5" name="rate" value="5" />
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" />
                                        <label for="star1" title="text">1 star</label>
                                      </div> </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button class="btn btn-warning-gradient btn-with-icon" type="button"
                        onclick="performStore({{ $course->id }})"> حفظ <i class="bi bi-floppy"></i></button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button"> إلغاء </button>
                </div>
            </form>
        </div>
    </div>
</div>
