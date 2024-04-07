@extends('dashboard.layouts.master')
@section('header')
    <div class="breadcrumb-header  d-flex justify-content-between bg-white mt-0 mb-0 mr-0">
        <div class="left-content mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('programs.index') }}" class="text-muted">المشاريع</a>

                </ol>
            </nav>

        </div>
        <div class=" text-left d-flex">
            <button  class="btn btn-outline-light btn-print"> طباعة <i class="icon ion-ios-print"></i></button>
            <a href="{{route('programs.xlsx')}}" class="btn btn-outline-light mr-1 btn-export"> تصدير <i class="ti-stats-up project"></i></a>
            {{-- @can('اضافه مشروع') --}}
            <a class="btn btn-warning-gradient btn-with-icon mr-1" href="{{route('programs.create')}}">  انشاء مشروع <i class="bi bi-plus"></i></a>
            {{-- @endcan --}}
        </div>


    </div>
@endsection
@section('content')

        <!-- row -->
        <div class="row row">

            <!--open filter Top  -->
            <div class="col-lg-12">
                <div class="card mg-b-20">
                    <div class="card-body d-flex">
                        <form  method="get">
                        <div class="form">
                            <i class="fa fa-search"></i>
                            {{-- <span class="right-pan"><i class="bi bi-sliders"></i></span> --}}
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group has-success mg-b-0 d-flex" st>
                                        <input type="text" class="form-control form-input" name="name" value="{{request()->name}}" id="name" placeholder="بحث" style="border-radius: 0px">
                                        <button class="btn btn-outline-light " type="submit"> بحث </button>
                                    </div>
                                </div>
                                <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--closed filter Top  -->

            <!-- table -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab11">
                                <div class="table-responsive">
                                    <table class="table table-striped mg-b-0 text-md-nowrap ">
                                        <thead class="">
                                            <tr class="tableHead text-center">
                                                <th><input type="checkbox" class="checkParent"></th>
                                                <th>#</th>
                                                 <th>
                                                     <i class="typcn typcn-folder"></i>
                                                     اسم المشروع
                                                 </th>
                                                 <th>
                                                     <i class="si si-layers"></i>
                                                     عدد الدورات
                                                 </th>
                                                 <th>
                                                     <i class="mdi mdi-account-outline"></i>
                                                     العميل
                                                 </th>
                                                 <th><i class="far fa-calendar"></i> تاريخ البداية </th>
                                                 <th><i class="far fa-calendar"></i> تاريخ النهاية </th>

                                                 <th> الحالة </th>
                                                 <th> المرشحين</th>
                                                 <th> الدورات </th>

                                                <td>
                                                  العمليات
                                                </td>
                                            </tr>
                                         </thead>
                                        @foreach ($programs as $i => $item)
                                            <tbody id="table-body text-center">
                                                <tr>
                                                    <p class="p-5 text-center d-none" id="empty-message">لا توجد بيانات
                                                        لعرضها
                                                    </p>
                                                </tr>
                                                <tr class="table-rows text-center">
                                                    <td><input type="checkbox" class="checkChild"></td>
                                                    <td>{{$i + 1}}</td>
                                                     <td scope="row">{{$item->name}} </td>
                                                     <td>{{$item->courses_count}}</td>
                                                     <td class="client-name">{{$item->client->name ?? ''}}</td>
                                                     @php
                                                     $start = Carbon\Carbon::parse($item->start)->format('y-m-d');
                                                     $end = Carbon\Carbon::parse($item->end)->format('y-m-d');
                                                    $today = Carbon\Carbon::today()->format('Y-m-d');

                                                     @endphp
                                                       <td>{{$start }}</td>
                                                       <td>{{$end }}</td>
                                                     <td>
                                                        @if (Carbon\Carbon::parse($today)->gt(Carbon\Carbon::parse($start)) && $item->status != 'active')
                                                        <span class="tag tag-rounded bg-primary-transparent text-primary">متآخره</span>
                                                        @elseif(!Carbon\Carbon::parse($today)->gt($end) == 'active')
                                                        <span class="tag tag-rounded bg-primary-transparent text-primary">فعال</span>
                                                        @elseif($item->status == 'pending')
                                                        <span class="tag tag-rounded bg-primary-transparent text-primary">في المعالجة</span>
                                                        @elseif (Carbon\Carbon::parse($today)->gt($end))
                                                        <span class="tag tag-rounded bg-primary-transparent text-primary">منتهيه</span>
                                                        @endif
                                                     </td>
                                                    <td>
                                                     <a href="{{ route('candidate.show', [$item->id]) }}"><i
                                                        class="far fa-eye text-gray tx-13 ml-4"></i></a>
                                                    </td>
                                                    <td class="d-flex filter-col-cell">
                                                        <a href="{{route('program.course',[$item->id])}}"><i class="far fa-eye tx-13"></i></a>                                                        <!-- dropdown-menu -->

                                                    </td>
                                                    <td>
                                                        <button data-toggle="dropdown" class="btn btn-previous btn-sm btn-block"><i class="si si-options-vertical text-gray tx-13" ></i></button>
                                                        <div class="dropdown-menu">
                                                            <a href="{{route('programs.edit',[$item->id])}}" class="dropdown-item"> تحرير </a>
                                                            <a href="{{route('program.mangers',[$item->id])}}" class="dropdown-item"> تحرير المشرفين </a>

                                                            <button  class="dropdown-item"data-target="#modalDelete" onclick="performDestroy({{ $item->id }} , this)" > حذف </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                             </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- table -->


            <!--open filter bottom  -->
            <div class="col-12">
                <div class="card mg-b-20">
                    <div class="card-body d-flex p-3">
                        <ul class="pagination mb-0">
                           {!! $programs->links() !!}
                        </ul>

                        {{-- <div class="mr-auto tx-15 mt-2">
                            <span id="table-status">1-6 of 100</span>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!--closed filter bottom  -->
        </div>
        <!-- row closed -->




@endsection
@section('js')
<script src="{{asset('assets/js/xlsx.full.min.js')}}"></script>
<script src="{{asset('assets/js/table.js')}}"></script>

<script>
    $(document).ready(function () {
    // عند النقر على زر الطباعة
    $('.btn-print').on('click', function () {
        // قم بفتح نافذة جديدة لعرض الجدول
        var printWindow = window.open('', '_blank');

        // إضافة الجدول إلى نافذة الطباعة
        printWindow.document.write('<html><head><title>Print</title></head><body style="direction: rtl;">');
        printWindow.document.write('<style>table { width: 100%; border-collapse: collapse; } th, td { border: 1px solid #dddddd; text-align: right; padding: 8px; }</style>');
        printWindow.document.write('<table>');

        // إضافة العنوان (الصف الأول) إلى نافذة الطباعة
        $('.table-responsive table thead tr').each(function () {
            printWindow.document.write('<tr>');
            $(this).find('th').not(':first-child, :last-child').each(function () {
                printWindow.document.write('<th>' + $(this).text() + '</th>');
            });
            printWindow.document.write('</tr>');
        });

        // إضافة البيانات (الصفوف باستثناء العنوان) إلى نافذة الطباعة
        $('.table-responsive table tbody tr').each(function () {
            printWindow.document.write('<tr>');
            $(this).find('td').not(':first-child, :last-child').each(function () {
                printWindow.document.write('<td>' + $(this).text() + '</td>');
            });
            printWindow.document.write('</tr>');
        });

        printWindow.document.write('</table></body></html>');

        // أغلق نافذة الطباعة بعد الانتهاء من الطباعة
        printWindow.document.close();
        printWindow.print();
    });
});

    function performDestroy(id, reference) {

        let url = '/dashboard/admin/programs/' + id;

        confirmDestroy(url, reference);
    }
</script>

@endsection
