@extends('dashboard.layouts.master')
@section('content')
    <div class="container-fluid mt-3">
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
                        @can('اضافه عميل')

                        <div class="mr-auto d-block tx-20">
                            <a href="{{route('clients.create')}}" class="btn btn-warning-gradient btn-with-icon" type="button" > اضف <i class="bi bi-floppy"></i></a>

                        </div>
                        @endcan

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
                                            <tr>
                                                <th>
                                                    اسم
                                                </th>
                                                <th>الدوله</th>
                                                <th> المدينه</th>
                                                <th> البريد الالكتروني </th>
                                                <th>رقم الهاتف </th>
                                                <!-- Filter -->
                                                <th>
                                                    <div class="dropdown">
                                                        <i aria-expanded="false" aria-haspopup="true"
                                                            class="bi bi-filter-square-fill tx-"data-toggle="dropdown"
                                                            id="dropdownMenuButton" type="button"></i></i>
                                                        <div class="dropdown-menu tx-13">
                                                            <p class="dropdown-item" href="#"><label
                                                                    class="ckbox"><input type="checkbox"><span>Checkbox
                                                                        Unchecked</span></label></p>
                                                            <p class="dropdown-item" href="#"><label
                                                                    class="ckbox"><input type="checkbox"><span>Checkbox
                                                                        Unchecked</span></label></p>
                                                            <p class="dropdown-item" href="#"><label
                                                                    class="ckbox"><input type="checkbox"><span>Checkbox
                                                                        Unchecked</span></label></p>
                                                            <p class="dropdown-item" href="#"><label
                                                                    class="ckbox"><input type="checkbox"><span>Checkbox
                                                                        Unchecked</span></label></p>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-body">
                                            <tr>
                                                <p class="p-5 text-center d-none" id="empty-message">لا توجد بيانات لعرضها
                                                </p>
                                            </tr>
                                            @foreach ($clients as $item)
                                                <tr class="table-rows">
                                                    <td scope="row">{{ $item->name }}</td>
                                                    <td>{{ $item->country->name_ar ?? '' }}</td>
                                                    <td class="client-name">{{ $item->city->name_ar ?? '' }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>{{ $item->phone_number }}</td>
                                                     <td><i class="mdi mdi-dots-horizontal text-gray tx-15"></i></td>
                                            @endforeach
                                            </tr>
                                        </tbody>
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
                            {!! $clients->links() !!}

                        </ul>

                    </div>
                </div>
            </div>
            <!--closed filter bottom  -->
        </div>
        <!-- row closed -->



    </div>
@endsection
@section('js')
<script>
    function performDestroy(id, reference) {

        let url = '/dashboard/admin/client/' + id;

        confirmDestroy(url, reference);
    }
</script>
@endsection
