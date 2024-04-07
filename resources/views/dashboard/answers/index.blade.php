@extends('dashboard.layouts.master')
@section('css')
<style>
    .chartTest {
   margin-bottom: 20px;
   display: flex;
   justify-content: space-between;
}
.circle {
   height: 8px;
   width: 8px;
   border-radius: 50%;
   background-color: rgb(46, 211, 85);
}
</style>

@endsection
@section('header')
    <div class="breadcrumb-header  d-flex justify-content-between bg-white mt-0 mb-0 mr-0">
        <div class="left-content mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1">
                    <li class="breadcrumb-item">
                        <a href="../index.html">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#"class="text-muted">المشاريع</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="text-muted"> الدورات </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="text-muted"> عرض نموذج الاجابات </a>
                    </li>
                </ol>
            </nav>
        </div>

    </div>
@endsection
@section('content')
    <div class="row row-sm sales-cardSmall">
        <!-- col  Right-->
        <div class="col-lg-7 col-sm-12">
            <!-- row cardSmall -->
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <div class="card-body  iconfont text-right d-flex justify-content-between">
                            <div class="d-flex mb-0">
                                <div class="card-chart bg-success-transparent brround mt-0">
                                    <!-- <i class="si si-check "></i> -->
                                    <i class="bi bi-patch-check-fill text-success tx-22"></i>
                                </div>
                                <div class="">
                                    <p class="mb-2 tx-12 text-muted"> الأجابات الصحيحة </p>
                                    <div class="">
                                        <h4 class="mb-1 font-weight-bold">{{ $responseAnswersTrue }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class=" mt-3">
                                <div class="dropdown">
                                    <i aria-expanded="false" aria-haspopup="true" class="mdi mdi-dots-vertical"
                                        data-toggle="dropdown" id="dropdownMenuButton"></i>
                                    <div class="dropdown-menu tx-13">
                                        <a class="dropdown-item" href="#">تفاصيل</a>
                                        <a class="dropdown-item" href="#">تعديل</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <div class="card-body iconfont text-right d-flex justify-content-between">
                            <div class="d-flex mb-0">
                                <div class="card-chart bg-danger-transparent brround ml- mt-0">
                                    <i class="bi bi-x-octagon-fill text-danger tx-22"></i>
                                </div>
                                <div class="">
                                    <p class="mb-2 tx-12 text-muted"> الأجابات الخاطئة </p>
                                    <h4 class="mb-1 font-weight-bold">{{ $responseAnswersFalse }}</h4>
                                </div>
                            </div>
                            <div class=" mt-3">
                                <div class="dropdown">
                                    <i aria-expanded="false" aria-haspopup="true" class="mdi mdi-dots-vertical"
                                        data-toggle="dropdown" id="dropdownMenuButton"></i>
                                    <div class="dropdown-menu tx-13">
                                        <a class="dropdown-item" href="#">تفاصيل</a>
                                        <a class="dropdown-item" href="#">تعديل</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="card">
                        <div class="card-body iconfont text-right d-flex justify-content-between">
                            <div class="d-flex mb-0">
                                <div class="card-chart bg-warning-transparent brround ml-2 mt-0">
                                    <i class="typcn typcn-chart-line-outline text-warning tx-24"></i>
                                    <!-- <i class="bi bi-cash-stack text-warning tx-24"></i> -->
                                </div>
                                <div class="">
                                    <p class="mb-2 tx-12 text-muted"> نسبة الأجتياز </p>
                                    <div class="d-flex">
                                        @php
                                            $integerNumber = intval($total);
                                        @endphp
                                        <h4 class="mb-1 font-weight-bold">{{ $integerNumber }}%</h4>
                                    </div>
                                </div>
                            </div>
                            <div class=" mt-3">
                                <div class="dropdown">
                                    <i aria-expanded="false" aria-haspopup="true" class="mdi mdi-dots-vertical"
                                        data-toggle="dropdown" id="dropdownMenuButton"></i>
                                    <div class="dropdown-menu tx-13">
                                        <a class="dropdown-item" href="#">تفاصيل</a>
                                        <a class="dropdown-item" href="#">تعديل</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--closed row cardSmall -->

            <!-- row -->
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mt-3 text-center"> الوقت المستغرق في الأختبار </h5>
                            <p class="text-center mb-4">(مدة الاختبار)</p>
                            <div class="progress mg-b-55">
                                <div class="progress-bar progress-bar-lg bg-success wd-60p ht-20" role="progressbar"
                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60 دقيقة <span
                                        class="pos-absolute l-20 tx-dark">80 دقيقة </span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="card p-0">

                        <div class="card-body">
                            <span class="chart" data-percent="{{ $total }}">
                                <span class="percent"></span>
                            </span>
                            <div class="row pb-4  mg-t-60">
                                <div class="col-md-12 col text-center">
                                    <h3 class=""> درجة الأختبار </h3>
                                    <span class="fs-14 text-muted">

                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- colse row -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body pb-0">
                            <!-- <div class="card"> -->
                            <!-- Elements at the top -->
                            <h5 class="text-center mb-5"> رحلة الاختبار </h5>
                            <!-- Dots with blue and red color -->
                            <div class="chartTest mb-5">
                                <span class="circle bg-success"></span>
                                <span class="circle bg-danger mt-4"></span>
                                <span class="circle bg-success"></span>
                                <span class="circle bg-success"></span>
                                <span class="circle bg-danger"></span>
                                <span class="circle bg-success"></span>
                                <span class="circle bg-danger mt-4"></span>
                                <span class="circle bg-danger mt-4"></span>
                                <span class="circle bg-success"></span>
                                <span class="circle bg-danger mt-4"></span>
                                <span class="circle bg-success"></span>
                                <span class="circle bg-success"></span>
                                <span class="circle bg-danger mt-4"></span>
                                <span class="circle bg-success"></span>
                                <span class="circle bg-success"></span>
                                <span class="circle bg-danger mb-4"></span>
                                <span class="circle bg-success"></span>
                                <span class="circle bg-success"></span>
                                <span class="circle bg-danger mt-4"></span>
                                <span class="circle bg-danger mt-4"></span>
                                <span class="circle bg-success"></span>
                                <span class="circle bg-success"></span>
                                <span class="circle bg-danger mt-4"></span>
                                <span class="circle bg-danger mt-4"></span>
                                <span class="circle bg-success"></span>
                                <span class="circle bg-danger"></span>
                            </div>
                            <div class="chartTest mt-3">
                                <span>1</span>
                                <span>2</span>
                                <span>3</span>
                                <span>4</span>
                                <span>5</span>
                                <span>6</span>
                                <span>7</span>
                                <span>8</span>
                                <span>9</span>
                                <span>10</span>
                                <span>11</span>
                                <span>12</span>
                                <span>13</span>
                                <span>14</span>
                                <span>15</span>
                                <span>16</span>
                                <span>17</span>
                                <span>18</span>
                                <span>19</span>
                                <span>20</span>
                                <span>21</span>
                                <span>22</span>
                                <span>23</span>
                                <span>24</span>
                                <span>25</span>
                            </div>
                            <p class="text-center"> الأسئلة </p>

                            <!-- </div> -->
                            <!-- <canvas id="myChart" style="width:100%;max-width:700px"></canvas> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- closed col -->

        <!-- col Table left-->
        <div class="col-lg-5 col-sm-12">
            <!-- table -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            رقم السؤال
                                        </th>
                                        <th>
                                            الأجابة الصحيحة
                                        </th>
                                        <th>
                                            اجابة المشارك
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="table-body">
                                    <tr>
                                        <p class="p-5 text-center d-none" id="empty-message">لا توجد بيانات لعرضها</p>
                                    </tr>
                                    @foreach ($questions as $item)
                                        <tr class="table-rows">
                                            <td scope="row">{{ $item->name }} </td>
                                            <td> {{ $item->optionTrue->answer ?? '' }} </td>
                                            @php
                                                $userAnswer = App\Models\UserAnswer::where('attendance_id', $attendanceId)
                                                    ->where('question_id', $item->id)
                                                    ->where('quiz_id', $quizId)
                                                    ->first();
                                                if ($userAnswer) {
                                                    $option = App\Models\QuestionOption::find($userAnswer->question_option_id);
                                                }
                                            @endphp
                                            @if ($userAnswer && $userAnswer->is_true == 1)
                                                <td class="bg-success-transparent"> {{ $option->answer ?? '' }} </td>
                                            @else
                                                <td class="bg-danger-transparent"> {{ $option->answer ?? '' }} </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
            <!-- table -->

            <!--open filter bottom  -->
            {{-- <div class="col-12">
            <div class="card mg-b-20">
                <div class="card-body d-flex p-3">
                    <ul class="pagination mb-0">
                        <li class="page-item"><button class="btn btn-previous" id="table-paganite-next"><i class="ti-angle-double-right"></i></button></li>
                        <li class="page-item m-2" id="table-pages">1/10</li>
                        <li class="page-item"><button class="btn btn-previous"  id="table-paganite-prev"><i class="ti-angle-double-left"></i></button>
                        </li>
                    </ul>
                    <div class="d-flex">
                <div class="d-block mt-2"> عرض</div>
                <select class="form-control select2-no-search mr-0 table-rows-number">
                    <option value="all">
                        الكل
                    </option>
                    <option value="1">
                        1
                    </option>
                    <option value="2">
                        2
                    </option>
                    <option value="3">
                        3
                    </option>
                    <option value="10" selected>
                        10
                    </option>
                    <option value="50">
                        50
                    </option>
                    <option value="100">
                        100
                    </option>
                </select>
                    </div>
                    <div class="mr-auto tx-15 mt-2">
                        <span id="table-status">1-6 of 100</span>
                    </div>
                </div>
            </div>
        </div> --}}
            <!--closed filter bottom  -->
        </div>
        <!-- closed col -->

    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/js/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/js/table.js') }}"></script>
    <script src="{{ asset('assets/js/chart.flot.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/js/chartCircle.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
@endsection
