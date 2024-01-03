<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('landingPage/style.css')}}" />
    <title>Home </title>
</head>
<body>
    <!-- header -->

    <header>
       <div class="wrap">
        <div class="sub_header">
            <div class="mh-logo">
                <img src="{{asset('assets/mh-logo 1.png')}}" alt="">

            </div>
            <div class="logo2">
                <img src="{{asset('assets/logo2.png')}}" alt="">
            </div>
        </div>
        <div class="navigation">
            <div class="list_nav">
                <ul>
                  <li class="nav_items"><a class="c-gn" href="index.html" data-translate="home">الرئيسية</a></li>
                  <li class="nav_items"><a href="timeline.html" data-translate="timeline">الجدول الزمني</a></li>
                  <li class="nav_items"><a href="#" data-translate="important_instructions">تعليمات مهمة</a></li>
                  <li class="nav_items"><a href="contact.html" data-translate="contact">التواصل</a></li>
                  <li class="nav_items"><a href="stream.html" data-translate="live_stream">بث مباشر</a></li>

                </ul>
            </div>
            <div class="btn_nav">
              <button onclick="toggleMenu()" id="menu_button_open"><?xml version="1.0" ?> <svg width="32px" height="32px" viewBox="0 0 32 32" enable-background="new 0 0 32 32" id="Editable-line" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><line fill="none" id="XMLID_103_" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" x1="7" x2="25" y1="16" y2="16"/><line fill="none" id="XMLID_102_" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" x1="7" x2="25" y1="25" y2="25"/><line fill="none" id="XMLID_101_" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" x1="7" x2="25" y1="7" y2="7"/></svg></button>
              <button id="btn_download" >
                <span data-translate="download_project_file">
                  تحميل ملف المشروع
                </span>
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                  <g clip-path="url(#clip0_0_358)">
                    <path d="M14.2501 13.5C14.9463 13.5 15.614 13.2235 16.1063 12.7312C16.5985 12.2389 16.8751 11.5712 16.8751 10.875C16.8751 10.1788 16.5985 9.51115 16.1063 9.01887C15.614 8.52659 14.9463 8.25003 14.2501 8.25003H13.5001C13.6095 7.76249 13.6112 7.26033 13.505 6.77222C13.3988 6.28411 13.1868 5.8196 12.8812 5.40522C12.5755 4.99084 12.1822 4.6347 11.7236 4.35713C11.265 4.07957 10.7501 3.88602 10.2084 3.78752C9.66674 3.68903 9.10879 3.68753 8.56644 3.78311C8.0241 3.87869 7.50798 4.06947 7.04755 4.34456C6.11769 4.90014 5.47113 5.76541 5.25011 6.75003C4.45058 6.718 3.66427 6.95283 3.02582 7.4143C2.38736 7.87577 1.93648 8.53519 1.75037 9.27964C1.56425 10.0241 1.65449 10.8073 2.00561 11.4951C2.35674 12.1829 2.94693 12.7326 3.67511 13.05" stroke="#7FBE41" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 9.75V16.5" stroke="#7FBE41" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6.75 14.25L9 16.5L11.25 14.25" stroke="#7FBE41" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </g>
                  <defs>
                    <clipPath id="clip0_0_358">
                      <rect width="18" height="18" fill="white"/>
                    </clipPath>
                  </defs>
                </svg>
              </button>
              <button id="btn_signUp" data-translate="sign_up">تسجيل</button>
              <div class="translate">
                <span id="english" class="lang" >English</span><span>|</span>  <span  class="lang" id="arabic">العربية</span>
              </div>

            </div>
        </div>
        <div class="header_content">
            <div class="img">
                <img src="assets/Rectangle 8.png" alt="">
            </div>
            <div class="txt">
                <div class="title">
                    برنامج التدريب الجماعى
                </div>
                <div class="text">
                    تسعى وزارة الشؤون البلدية والقروية واإلسكان إلى تطوير منسوبيها وضمان توفير المهارات والمعارف، لذلك من خالل التعاقد مع جهات متخصصة في إدارة وتنفيذ برامج تدريب جماعية وبرامج تساعد على تعزيز اإلندماج وتنمية المهارات القيادية بالتعاون مع جهات دولية ومحلية معتمدة ذات كفاءة وخبرة في مجال التدريب وتنمية القيادات
                </div>
            </div>

        </div>

       </div>
    </header>

    <div class="phone_menu_overlay" onclick="closeMenu()"></div>
    <div class="phone_nav">
      <div class="sub_header">
        <div class="logo2">
            <img src="assets/logo2.png" alt="">
        </div>
        <div class="">
            <img src="assets/mh-logo 1.png" alt="">
        </div>
      </div>
      <ul>
        <li class="nav_items_phone"><a  href="index.html" data-translate="home">الرئيسية</a></li>
        <li class="nav_items_phone"><a  href="timeline.html" data-translate="timeline">الجدول الزمني</a></li>
        <li class="nav_items_phone"><a href="#" data-translate="important_instructions">تعليمات مهمة</a></li>
        <li class="nav_items_phone"><a href="contact.html" data-translate="contact">التواصل</a></li>
        <li class="nav_items_phone"><a href="stream.html" data-translate="live_stream">بث مباشر</a></li>

      </ul>
      <div class="translate">
        <span id="englishMobile" class="lang" >English |</span> <span  class="lang" id="arabicMobile">العربية | </span>
      </div>
  </div>
  @yield('content')
  <footer>
    <div class="wrap">
        <div class="footer_container">
            <div class="footer_logo">
                <img src="assets/footer_logo.png" alt="">
            </div>
            <div class="footer_nav ">
              <ul>
                <li class="nav_items"><a href="index.html" data-translate="home">الرئيسية</a></li>
                <li class="nav_items"><a href="index.html" data-translate="about_project">عن المشروع</a></li>
                <li class="nav_items"><a href="timeline.html" data-translate="timeline">الجدول الزمني</a></li>
                <!-- <li class="nav_items"><a href="#" data-translate="important_instructions">تعليمات هامة</a></li> -->
                <li class="nav_items"><a href="contact.html" data-translate="contact">التواصل</a></li>
            </ul>

            </div>
            <div class="sociel_media">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <g clip-path="url(#clip0_0_255)">
                      <path d="M7 10V14H10V21H14V14H17L18 10H14V8C14 7.73478 14.1054 7.48043 14.2929 7.29289C14.4804 7.10536 14.7348 7 15 7H18V3H15C13.6739 3 12.4021 3.52678 11.4645 4.46447C10.5268 5.40215 10 6.67392 10 8V10H7Z" stroke="#7FBE41" stroke-width="1.83333" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                      <clipPath id="clip0_0_255">
                        <rect width="24" height="24" fill="white"/>
                      </clipPath>
                    </defs>
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <g clip-path="url(#clip0_0_251)">
                      <path d="M4 4L15.733 20H20L8.267 4H4Z" stroke="#7FBE41" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M4 20L10.768 13.232M13.228 10.772L20 4" stroke="#7FBE41" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                      <clipPath id="clip0_0_251">
                        <rect width="24" height="24" fill="white"/>
                      </clipPath>
                    </defs>
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <g clip-path="url(#clip0_0_244)">
                      <path d="M18 4H6C4.89543 4 4 4.89543 4 6V18C4 19.1046 4.89543 20 6 20H18C19.1046 20 20 19.1046 20 18V6C20 4.89543 19.1046 4 18 4Z" stroke="#7FBE41" stroke-width="1.83333" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M8 11V16" stroke="#7FBE41" stroke-width="1.83333" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M8 8V8.01" stroke="#7FBE41" stroke-width="1.83333" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M12 16V11" stroke="#7FBE41" stroke-width="1.83333" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M16 16V13C16 12.4696 15.7893 11.9609 15.4142 11.5858C15.0391 11.2107 14.5304 11 14 11C13.4696 11 12.9609 11.2107 12.5858 11.5858C12.2107 11.9609 12 12.4696 12 13" stroke="#7FBE41" stroke-width="1.83333" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                      <clipPath id="clip0_0_244">
                        <rect width="24" height="24" fill="white"/>
                      </clipPath>
                    </defs>
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <g clip-path="url(#clip0_0_239)">
                      <path d="M16 4H8C5.79086 4 4 5.79086 4 8V16C4 18.2091 5.79086 20 8 20H16C18.2091 20 20 18.2091 20 16V8C20 5.79086 18.2091 4 16 4Z" stroke="#7FBE41" stroke-width="1.83333" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" stroke="#7FBE41" stroke-width="1.83333" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M16.5 7.5V7.501" stroke="#7FBE41" stroke-width="1.83333" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                      <clipPath id="clip0_0_239">
                        <rect width="24" height="24" fill="white"/>
                      </clipPath>
                    </defs>
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <g clip-path="url(#clip0_0_235)">
                      <path d="M17 5H7C4.79086 5 3 6.79086 3 9V15C3 17.2091 4.79086 19 7 19H17C19.2091 19 21 17.2091 21 15V9C21 6.79086 19.2091 5 17 5Z" stroke="#7FBE41" stroke-width="1.83333" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M10 9L15 12L10 15V9Z" stroke="#7FBE41" stroke-width="1.83333" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                      <clipPath id="clip0_0_235">
                        <rect width="24" height="24" fill="white"/>
                      </clipPath>
                    </defs>
                  </svg>


            </div>
        </div>
        <div class="copywrite" data-translate="all_rights_reserved">
          <p>
              جميع الحقوق محفوظة © 2023 - 2024
          </p>
      </div>

    </div>
</footer>
    <script src="{{asset('landingPage/js/translate.js')}}"></script>
    <script src="{{asset('landingPage/js/main.js')}}"></script>
</body>
</html>
