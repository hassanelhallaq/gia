@extends('dashboard.layouts.master')
@section('header')
    <div class="breadcrumb-header  d-flex justify-content-between bg-white mt-0 p-2 mr-0">
        <div class="left-content mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1">
                    <li class="breadcrumb-item">
                        <a href="../index.html">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="table_program_management.html"class="text-muted">البرامج</a>
                    </li>
                    {{-- <li class="breadcrumb-item">
                    <a href="#" class="text-muted"> مشروع تطوير المهارات الشخصية </a>
                </li> --}}
                </ol>
            </nav>
        </div>
        <div class="main-dashboard-header-right">
            <div class=" d-flex">
                {{-- <a href="add_tests.html" class="btn btn-warning-gradient btn-with-icon btn-md mr-1"> اضافة اسئلة <i class="bi bi-plus"></i></a> --}}
                <button class="btn btn-warning-gradient btn-with-icon btn-md mr-1" data-target="#select2modal"
                    data-toggle="modal"> اضافة اختبار جديد <i class="bi bi-plus"></i></button>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form role="form" action="{{ route('deipIn.store', [$id]) }}" method="post" class="f1" id="myForm">
                        @csrf
                        <!-- row -->
                        <div class="row row-sm mb-3">
                            <div class="col-lg-6">
                                <div class="form-group has-success mg-b-0">
                                    <label for="example"> قبلي </label>
                                    <select id="quiz_befor" name="quiz_befor_id" class="form-control select2">

                                        @foreach ($quizesBefor as $item)
                                        <option @foreach ($course->quizes->where('type','befor') as $quiz)

                                            @if ($item->id == $quiz->id) selected @endif @endforeach
                                            value="{{ $item->id }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <input name="course_id" value="{{$id}}" hidden>
                            <div class="col-lg-6">
                                <div class="form-group has-success mg-b-0">
                                    <label for="example"> الحاله</label>
                                    <select id="status_befor" name="status_befor" class="form-control select2">
                                        <option value="active">
                                            فعال
                                        </option>
                                        <option value="active">
                                            غير فعال
                                        </option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group has-success mg-b-0">
                                    <label for="example"> بعدي</label>
                                    <select id="quiz_after" name="quiz_after_id" class="form-control select2">
                                        @foreach ($quizesAfter as $item)
                                        <option @foreach ($course->quizes->where('type','after') as $quiz)

                                            @if ($item->id == $quiz->id) selected @endif @endforeach
                                            value="{{ $item->id }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group has-success mg-b-0">
                                    <label for="example"> الحاله</label>
                                    <select id="status_after" name="status_after" class="form-control select2">
                                        <option value="active">
                                            فعال
                                        </option>
                                        <option value="active">
                                            غير فعال
                                        </option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group has-success mg-b-0">
                                    <label for="example"> تفاعلي</label>
                                    <select id="quiz_interactive" name="quiz_interactive_id" class="form-control select2">
                                        @foreach ($quizesInteractive as $item)
                                            <option @foreach ($course->quizes->where('type','interactive') as $quiz)

                                                @if ($item->id == $quiz->id) selected @endif @endforeach
                                                value="{{ $item->id }}">
                                                    {{ $item->name }}
                                                </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group has-success mg-b-0">
                                    <label for="example"> الحاله</label>
                                    <select id="status_interactive" name="status_interactive" class="form-control select2">
                                        <option value="active">
                                            فعال
                                        </option>
                                        <option value="active">
                                            غير فعال
                                        </option>
                                    </select>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group has-success mg-b-0">
                                    <label for="example"> تقيم</label>
                                    <select id="quiz_rate_id" name="quiz_rate_id" class="form-control select2">
                                        @foreach ($quizesRate as $item)
                                            <option @foreach ($course->quizes->where('type','rate') as $quiz)

                                                @if ($item->id == $quiz->id) selected @endif @endforeach
                                                value="{{ $item->id }}">
                                                    {{ $item->name }}
                                                </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group has-success mg-b-0">
                                    <label for="example"> الحاله</label>
                                    <select id="status_rate" name="status_rate" class="form-control select2">
                                        <option value="active">
                                            فعال
                                        </option>
                                        <option value="active">
                                            غير فعال
                                        </option>
                                    </select>

                                </div>
                            </div>

                            <div id="repeater">
                                <div class="item">
                                    <select name="dropdowns[]" class="form-control select2">
                                        <option value="befor">قبلي</option>
                                        <option value="after">بعدي</option>
                                        <option value="interactive">تفاعلي</option>
                                        <option value="تقيم">تقيم</option>

                                    </select>
                                    <input type="datetime-local" name="datetimes[]" class="datetime">
                                    <button class="remove-item">Remove</button>
                                </div>
                                <button type="button" class="btn-warning-gradient btn-with-icon mr-1" id="add-item">Add Item</button>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        document.getElementById('add-item').addEventListener('click', function() {
            var newItem = document.querySelector('#repeater .item').cloneNode(true);
            document.getElementById('repeater').appendChild(newItem);
        });

        document.addEventListener('click', function(e) {
            if (e.target && e.target.className == 'remove-item') {
                e.target.parentNode.remove();
            }
        });
    </script>

    <!-- Include this script in your Blade template -->
<!-- Include this script in your Blade template -->
<script>
    document.getElementById('myForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Prepare data to send
        var formData = new FormData(this);
        var repeaterItems = document.querySelectorAll('#repeater .item');
        var dropdownsAndDates = [];

        repeaterItems.forEach(function(item) {
            var dropdown = item.querySelector('select[name="dropdowns[]"]').value;
            var datetime = item.querySelector('input[name="datetimes[]"]').value;
            dropdownsAndDates.push({ dropdown: dropdown, datetime: datetime });
        });

        formData.append('dropdownsAndDates', JSON.stringify(dropdownsAndDates));

        // Send AJAX request
        fetch(this.getAttribute('action'), {
            method: 'POST',
            body: formData
        })
        .then(response => {
            // Handle response
            location.reload();
        }
            // You can redirect or show a success message here
        })
        .catch(error => console.error('Error:', error));
    });
</script>


@endsection
