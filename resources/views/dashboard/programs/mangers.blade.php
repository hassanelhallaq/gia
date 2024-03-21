@extends('dashboard.layouts.master')
@section('header')
    <div class="breadcrumb-header  d-flex justify-content-between bg-white mt-0 p-2 mr-0">
        <div class="left-content mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1">
                    @if (!Auth::guard('trainer')->check())
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                        </li>
                    @endif
                    <li class="breadcrumb-item">
                        <a href="{{ route('programs.index') }}" class="text-muted">البرامج</a>
                    </li>

                </ol>
            </nav>
        </div>
        <div class="main-dashboard-header-right">
            @if (!Auth::guard('trainer')->check())
                <div class=" d-flex">
                    <button class="btn btn-outline-light btn-print"> طباعة <i class="icon ion-ios-print"></i></button>
                    <a href="{{ route('programs.xlsx') }}" class="btn btn-outline-light mr-1 btn-export"> تصدير <i
                            class="ti-stats-up project"></i></a>
                    {{-- @can('اضافه برنامج') --}}

                    <a class="btn btn-warning-gradient btn-with-icon mr-1" href="{{ route('programs.create') }}"> انشاء
                        برنامج <i class="bi bi-plus"></i></a>
                    {{-- @endcan --}}

                </div>
            @endif
        </div>
    </div>
@endsection
@section('content')
    <div class="col-12 mb-4">
        <p class="mg-b-10"> يرجي اختيار مدير المشروع </p>
        <select class="form-control select2" id="mang_select">
            @foreach ($manger as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach

        </select>
    </div>

    <div class="col-12 mb-4">
        <p class="mg-b-10"> يرجي اختيار منسق المشروع </p>
        <select class="form-control select2" id="cord_select">
            @foreach ($cordreator as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach

        </select>
    </div>

    <div class="col-12 mb-4">
        <p class="mg-b-10"> يرجي اختيار مدرب المشروع </p>
        <select class="form-control select2" id="trainers">
            @foreach ($trainers as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach

        </select>
    </div>
    <div class="col-12 mb-4">
        <p class="mg-b-10"> يرجي اختيار منسق مدرب المشروع </p>
        <select class="form-control select2" id="cordTrainner">
            @foreach ($cordTrainner as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach

        </select>
    </div>
    <div class="col-12 mb-4">
        <p class="mg-b-10"> يرجي اختيار المستشارون المشروع </p>
        <select class="form-control select2" id="consultants">
            @foreach ($consultants as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach

        </select>
    </div>


    </div>

    <div class="row mb-3 mt-4 justify-content-between d-flex">
        <div class="">
            <a href="javascript:;" class="btn btn-warning-gradient form-wizard-previous-btn float-left btn-previous ">
                السابق </a>
        </div>
        <div class="d-flex">
            <button class="btn ml-1 btn-warning-gradient btn-with-icon" type="button" onclick="performStoreFinal()"> حفظ
                بيانات المشروع
            </button>
            {{-- <button type="button" class="btn btn-outline-warning btn-next ">   المتابعة لاصدار تكليف </button> --}}
        </div>
    </div>
@endsection





<script>
    function update(id) {
        let formData = new FormData();
        formData.append("_method", "PUT")
        formData.append('mang_select', document.getElementById('mang_select').value);
        formData.append('cord_select', document.getElementById('cord_select').value);
        formData.append('trainers', document.getElementById('trainers').value);
        formData.append('consultants', document.getElementById('consultants').value);
        formData.append('cordTrainner', document.getElementById('cordTrainner').value);
        storeRoute('/dashboard/admin/program/manger/' + id, formData)
    }
</script>
