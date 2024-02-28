@extends('dashboard.layouts.master')
@section('css')
<!---Internal Fileupload css-->
<link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
{{-- <link rel="stylesheet" href="{{ asset('assets/plugins/wizard/style copy 3.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/wizard/form-elements.css') }}"> --}}
@endsection

@section('content')

<div class="row m-auto">
    <div class="col-sm-10  m-auto">
        <form role="form" action="" method="post" class="f1">
            <h5 class=" text-center"> مرحبا محمد الزرو </h5>
			<p class=" text-center "> يمكنك البدء فى انشاء جهة لانشاء وادارة الدورات الخاصه بك </p>


            <div class="card p-4">
                <div class="body-cord">
                    <h6 class=" text-center mt-3 mb-5"> هل الجهة مسجلة مسبقاً </h6>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="" for="fname4" class="wizard-form-text-label">  يرجى البحث عن اسم الجهة من خلال القائمة ادناه  *</label>
                                <input type="text" placeholder="اكتب هنا للبحث عن جهة" class="form-control wizard-required" id="fname4">
                                <div class="wizard-form-error"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <h5 class="text-center mt-3 mb-5">او قم بإضافة وتعريف جهة جديدة</h5>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-sm-6 col-md-6 text-center">
							<a href="{{ route('AddProject3') }}" class="card text-center bg-warning-gradient">
								<div class="card-body">
									<div class="feature widget-2 text-center mt-0 mb-3">
										<i class="bi bi-patch-plus text-white p-0"></i>
									</div>
									<h6 class="mb-1  text-white p-0"> اضغط هنا لإضافة عميل </h6>
								</div>
							</a>
						</div>

                        <div class="col-xl-6 col-lg-6 col-sm-6 col-md-6 text-center">
							<a href="{{ route('AddProject2') }}" class="card text-center bg-white border-warning">
								<div class="card-body p-1">
									<div class="feature widget-2 text-center mt-0 mb-3">
										<i class="bi bi-cloud-arrow-down text-warning tx-40"></i>
									</div>
									<h6 class="text-warning p-0"> اضغط هنا لإضافة عميل </h6>
								</div>
							</a>
						</div>

                        {{-- <div class="col-sm-12 col-md-4">
                            <input type="file" class="dropify" data-height="200" />
                        </div> --}}


                        <div class="row mb-3 mt-4  pl-3  mr-auto float-left">
                            <div class="">
                                <button class="btn btn-outline-warning ml-1 btn-with-icon  "> العودة للرئيسية  </button>
                            </div>
                            <div class="d-flex">
                                <button class="btn ml-1 btn-warning-gradient btn-with-icon">  التوجة للخطوه التالية  </button>
                                {{-- <button type="button" class="btn btn-outline-warning btn-next ">   المتابعة لاصدار تكليف </button> --}}
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
