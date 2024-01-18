<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="{{asset('site/style.css')}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;700&family=Montserrat:wght@500;700&family=Poppins:wght@400;500;700&display=swap"
      rel="stylesheet"
    />

    <title>third connect</title>
  </head>
  <body>
    <!-- header -->
    <header>
      <div class="wrap">
        <div class="head_container">
          <div class="profile">
            <div class="profile_img">
              <img src="{{asset('site/assets/profile.jpg')}}" alt="" />
            </div>
            <div class="profile_txt">
              <span id=""  data-translate="profile_txt">مرحبا بك</span>
              <h3 id=""  data-translate="profile_title"> name</h3>
            </div>
          </div>
          <div class="menu_icon">
           <a href="{{route('third_connect')}}" class="tx-25"> ؟ </a>
          </div>
        </div>
      </div>
    </header>

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
                                     <input type="text" required>
                                     <div class="underline"></div>
                                     <label for=""> الإسم </label>
                                  </div>
                                  <div class="input-data">
                                     <input type="text" required>
                                     <div class="underline"></div>
                                     <label for=""> المسمى الوظيفي</label>
                                  </div>
                               </div>
                               <div class="form-row">
                                    <div class="input-data">
                                        <input type="text" required>
                                        <div class="underline"></div>
                                        <label for=""> اسم المؤسسة
                                        </label>
                                    </div>
                                    <div class="input-data">
                                       <input type="number" required>
                                       <div class="underline"></div>
                                       <label for=""> رقم الجوال
                                    </label>
                                    </div>
                                  <div class="input-data">
                                     <input type="email" required>
                                     <div class="underline"></div>
                                     <label for="">البريد الالكتروني </label>
                                  </div>
                               </div>

                                <div class="btn_links">
                                    <a  data-translate="show_results" href=""><i class="bi bi-arrow-right tx-white"></i> الرجوع الى الرئيسية </a>
                                    <button class="btn_primery" type="button" class="df ai-c jc-c g1 w-25" data-translate="signup"> حفظ </button>
                                </div>
                            </form>

                        </div>


                    </div>
                </div>

            </div>
        </section>
    </div>


      <script src="{{asset('site/main.js')}}"></script>
    </body>
  </html>







