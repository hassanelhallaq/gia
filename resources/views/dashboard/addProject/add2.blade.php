@extends('dashboard.layouts.master')
@section('css')
<!---Internal Fileupload css-->
<link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

<div class="row m-auto">
    <div class="col-sm-10  m-auto">
        <form role="form" action="" method="post" class="f1">
            <h5 class=" text-center"> مرحبا  {{Auth::user()->name}}  </h5>
			<p class=" text-center "> يمكنك البدء فى انشاء جهة لانشاء وادارة الدورات الخاصه بك </p>
            <div class="card p-4">
                <div class="body-cord">
                    <div class="row">
                        <div class="col-6">
                            <label  class="wizard-form-text-label mb-5 rdiobox"><input name="rdio" type="radio"> <span> القطاع  العام </span></label>
                        </div>
                        <div class="col-6 ">
                            <label class="rdiobox mb-5"><input checked="" name="rdio" type="radio"> <span> القطاع الخاص </span></label>
                        </div>
                        <div class="col-xl-12 col-lg-6 col-sm-6 col-md-6">
                            <label class="" for="fname4" class="wizard-form-text-label">  إدراج ملف العميل ( ملف excel) *</label>
							<a href="#" class="card text-center bg-white border-warning">
								<div class="card-body p-1">
									<div class="feature widget-2 text-center mt-0">
                                        <input type="file" class="dropify" data-height="80" />
									</div>
								</div>

							</a>
						</div>
                        <div class="row mb-3 mt-4  pl-3  mr-auto float-left">

                            <div class="d-flex">
                                <button class="btn ml-1 btn-warning-gradient btn-with-icon"> حفظ بيانات العميل  </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection

@section('js')
<!--Internal Fileuploads js-->
<script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
@endsection
