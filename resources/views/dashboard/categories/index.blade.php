@extends('dashboard.layouts.master')
@section('content')
        <!-- row -->
        <div class="row row">

            <!--open filter Top  -->
            <div class="col-lg-12">
                <div class="card mg-b-20">
                    <div class="modal-footer border-0">
                        <a href="{{route('categories.create')}}" class="btn btn-warning-gradient btn-with-icon" type="button" > اضف <i class="bi bi-floppy"></i></a>
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
                                        <tbody>
                                            <th>الاسم</th>
                                        </tbody>

                                        @foreach ($categories as $item)
                                            <tbody id="table-body">
                                                <tr>
                                                    <p class="p-5 text-center d-none" id="empty-message">لا توجد بيانات
                                                        لعرضها
                                                    </p>
                                                </tr>
                                                <tr class="table-rows">
                                                    <td scope="row">{{$item->name}}</td>
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
                           {!! $categories->links() !!}
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
