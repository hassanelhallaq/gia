@extends('invitation.master')
@section('content')

    <div class="content">
        <section>
            <div class="wrap">
                <div class="container_cards">
                    <div class="card">
                        <div class="container">
                            <div class="text">
                                نموذج تقديم الشهادة
                            </div>
                            <form action="#">
                               <div class="form-row">
                                  <div class="input-data">
                                     <input type="text" id="name" value="{{$attendance->name}}" required>
                                     <div class="underline"></div>
                                     <label for=""> الإسم </label>
                                  </div>
                                  <div class="input-data">
                                     <input type="text" id="job" value="{{$attendance->job}}" required>
                                     <div class="underline"></div>
                                     <label for=""> المسمى الوظيفي</label>
                                  </div>
                               </div>
                               <div class="form-row">
                                    <div class="input-data">
                                        <input type="text"  id="work_place" value="{{$attendance->work_place}}" required>
                                        <div class="underline"></div>
                                        <label for=""> اسم المؤسسة
                                        </label>
                                    </div>
                                    <div class="input-data">
                                       <input type="number" id="phone_number" value="{{$attendance->phone_number}}"  required>
                                       <div class="underline"></div>
                                       <label for=""> رقم الجوال
                                    </label>
                                    </div>
                                  <div class="input-data">
                                     <input type="email" id="email" value="{{$attendance->email}}" required>
                                     <div class="underline"></div>
                                     <label for="">البريد الالكتروني </label>
                                  </div>
                               </div>

                                <div class="btn_links">
                                    <a  data-translate="show_results" href="{{route('invitation.second',[$attendance->id,request()->course_id])}}"><i class="bi bi-arrow-right tx-white"></i> الرجوع الى الرئيسية </a>
                                    <button class="btn_primery" type="button" onclick="performUpdate({{request()->id}},{{request()->course_id}})" class="df ai-c jc-c g1 w-25" data-translate="signup"> حفظ </button>
                                </div>
                            </form>

                        </div>


                    </div>
                </div>

            </div>
        </section>
    </div>

    @endsection





  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="{{ asset('crudjs/crud.js') }}"></script>

  <script>
      function performUpdate(id,course_id) {
        let formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            formData.append('phone_number', document.getElementById('phone_number').value);
            formData.append('work_place', document.getElementById('work_place').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('job', document.getElementById('job').value);
            storeRoute('/ateendance/update/'+id+'/'+course_id, formData)
      }
  </script>

