@extends('dashboard.layouts.master')
@section('content')
        <!-- row -->
        <div class="row row">

            <!--open filter Top  -->
            <div class="col-lg-12">
                <div class="card mg-b-20">
                    <div class="card-body d-flex p-3">
                        <div class="form">
                            <i class="fa fa-search"></i>
                            <input type="text" class="form-control form-input" id="search-table" placeholder="بحث">
                            <span class="right-pan"><i class="bi bi-sliders"></i></span>
                        </div>

                        {{-- <div class="d-flex">
                            <p class="mt-2 mr-2 d-flex"> عرض: </p>
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
                        </div> --}}

                        <div class="mr-auto d-block tx-20">
                            <a href="{{route('programs.create')}}" class="btn btn-warning-gradient btn-with-icon" type="button" > اضف <i class="bi bi-floppy"></i></a>
                            <a href=""{{route('programs.grid')}}><i class="typcn typcn-calendar-outline"></i></a>
                            <a href="{{route('programs.grid')}}"><i class="bi bi-grid"></i></a>
                            <a href=""><i class="bi bi-list bg-black-9 text-white"></i></a>
                        </div>
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
                                    <table class="table table-striped mg-b-0 text-md-nowrap">
                                        <thead>
                                            <tr class="list-unstyled">
                                                <th>
                                                    <i class="typcn typcn-folder"></i>
                                                    اسم البرنامج
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
                                                <th>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                        <path
                                                            d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                                                    </svg>
                                                    الحالة
                                                </th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        @foreach ($programs as $item)
                                            <tbody id="table-body">
                                                <tr>
                                                    <p class="p-5 text-center d-none" id="empty-message">لا توجد بيانات
                                                        لعرضها
                                                    </p>
                                                </tr>
                                                <tr class="table-rows">
                                                    <td scope="row">{{$item->name}}</td>
                                                    <td>{{$item->courses_count}} <a href="{{route('program.course',[$item->id])}}"><i class="far fa-eye tx-15"></i></a>
                                                </td>
                                                    <td class="client-name">{{$item->client->name ?? ''}}</td>
                                                    @php
                                                     $start = Carbon\Carbon::parse($item->start)->format('y-m-d');
                                                     $end = Carbon\Carbon::parse($item->end)->format('y-m-d');

                                                    @endphp
                                                    <td>{{$start }}</td>
                                                    <td>{{$end }}</td>
                                                    <td><span class="tag tag-rounded bg-success-transparent text-success">
                                                        {{$item->show_invited}} </span></td>
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



    </>
@endsection
