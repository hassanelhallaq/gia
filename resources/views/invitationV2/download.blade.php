<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('inv/style.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <style>
        .containerr{
            color: white;
            overflow: hidden;
            background: url(assets/back.webp);
            background-position-y: center;

        }
        .containerr  h2{
            backdrop-filter: blur(34.6px);
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }
        .card{
                border-bottom: 1px solid #E9E9E9;
                padding: 1rem;
            }
        .card p{
            color: #3F3F3F;
        }
        .card h2 span{
            font-weight: 300;
            font-size: 12px;
            margin-right: 10px;
        }
        .btn_download{
            padding: .5rem 1rem;
            border-radius: 50px;
            border: solid 1px #1644C2;
        }
        .end{
            color: #3F3F3F;
            margin-top: 1rem;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <div class="wrap">
            <div class="df ai-c jc-sb">
                <div class="df ai-c g0">
                    <a href="/One_Course_Index.html"> <img src="{{asset('inv/assets/logo.webp')}}" alt="" width="40px " height="40px"></a>
                     <div class="df  f-c ">
                        <span>
                            اهلا بك
                         </span>
                         <span id="profile_name">
                             محمد الزرو
                         </span>
                     </div>

                 </div>
                 <div class="df ai-c" id="open_menu">
                    <span> متطلبات الشهادة </span>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5 11V13C5 16.3137 7.68629 19 11 19H13C16.3137 19 19 16.3137 19 13V11C19 7.68629 16.3137 5 13 5H11C7.68629 5 5 7.68629 5 11Z" stroke="#1644C2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11.25 16C11.25 16.4142 11.5858 16.75 12 16.75C12.4142 16.75 12.75 16.4142 12.75 16H11.25ZM12 11H12.75C12.75 10.5858 12.4142 10.25 12 10.25V11ZM11 10.25C10.5858 10.25 10.25 10.5858 10.25 11C10.25 11.4142 10.5858 11.75 11 11.75V10.25ZM12 16.75C12.4142 16.75 12.75 16.4142 12.75 16C12.75 15.5858 12.4142 15.25 12 15.25V16.75ZM11 15.25C10.5858 15.25 10.25 15.5858 10.25 16C10.25 16.4142 10.5858 16.75 11 16.75V15.25ZM12 15.25C11.5858 15.25 11.25 15.5858 11.25 16C11.25 16.4142 11.5858 16.75 12 16.75V15.25ZM13 16.75C13.4142 16.75 13.75 16.4142 13.75 16C13.75 15.5858 13.4142 15.25 13 15.25V16.75ZM12.75 8C12.75 7.58579 12.4142 7.25 12 7.25C11.5858 7.25 11.25 7.58579 11.25 8H12.75ZM11.25 9C11.25 9.41421 11.5858 9.75 12 9.75C12.4142 9.75 12.75 9.41421 12.75 9H11.25ZM12.75 16V11H11.25V16H12.75ZM12 10.25H11V11.75H12V10.25ZM12 15.25H11V16.75H12V15.25ZM12 16.75H13V15.25H12V16.75ZM11.25 8V9H12.75V8H11.25Z" fill="#1644C2"/>
                        </svg>
                </div>


            </div>
        </div>
        <div class="drop_down" id="menu">
            <div class="close" ><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.99998 1.3335C11.6818 1.3335 14.6666 4.31826 14.6666 8.00016C14.6666 11.682 11.6818 14.6668 7.99998 14.6668C4.31808 14.6668 1.33331 11.682 1.33331 8.00016C1.33331 4.31826 4.31808 1.3335 7.99998 1.3335ZM7.99998 2.3335C4.87037 2.3335 2.33331 4.87055 2.33331 8.00016C2.33331 11.1298 4.87037 13.6668 7.99998 13.6668C11.1296 13.6668 13.6666 11.1298 13.6666 8.00016C13.6666 4.87055 11.1296 2.3335 7.99998 2.3335ZM10.2974 5.5982L10.3535 5.64661C10.531 5.82412 10.5472 6.1019 10.4019 6.29764L10.3535 6.35372L8.70731 8.00016L10.3535 9.64663C10.531 9.8241 10.5472 10.1019 10.4019 10.2976L10.3535 10.3537C10.176 10.5312 9.89825 10.5474 9.70251 10.4021L9.64645 10.3537L7.99998 8.7075L6.35353 10.3537C6.17602 10.5312 5.89825 10.5474 5.70251 10.4021L5.64643 10.3537C5.46891 10.1762 5.45278 9.89843 5.59801 9.70269L5.64643 9.64663L7.29265 8.00016L5.64643 6.35372C5.46891 6.1762 5.45278 5.89843 5.59801 5.70269L5.64643 5.64661C5.82394 5.4691 6.10171 5.45296 6.29745 5.5982L6.35353 5.64661L7.99998 7.29283L9.64645 5.64661C9.82391 5.4691 10.1017 5.45296 10.2974 5.5982Z" fill="#212121"/>
                </svg>
            </div>
            <div class="drop_down_content">
               <div class="one"> <span>1</span>التزام بنسبة الحضور ٨٠٪</div>
               <div class="line"></div>
               <div class="one"> <span>2</span>الأختبار القبلي</div>
               <div class="line"></div>
               <div class="one"> <span>3</span>الأختبار البعدي</div>
               <div class="line"></div>
               <div class="one"> <span>4</span>تقييم الخدمة</div>
               <div class="line"></div>
               <div class="one"> <span>5</span>الحصل على الشهادة</div>

            </div>
        </div>
    </header>
    <section>
        <div class="containerr">
                <h2>ملفات الدورة</h2>
        </div>
        <div class="cards df f-c">
            @foreach ($files as $item)
            <div class="card df jc-sb">
                <div>
                    <h2>{{$item->name}}</h2>
                    <p>  {{$item->type}}</p>
                </div>
                <div class="df ai-c">
                   <div class="flex-g btn_download g0">
                    <span>تحميل</span>
                    <a href="{{asset($item->file)}}"  data-translate="submit" download>&#10140;
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14 4.5V14C14 14.5304 13.7893 15.0391 13.4142 15.4142C13.0391 15.7893 12.5304 16 12 16H11V15H12C12.2652 15 12.5196 14.8946 12.7071 14.7071C12.8946 14.5196 13 14.2652 13 14V4.5H11C10.6022 4.5 10.2206 4.34196 9.93934 4.06066C9.65804 3.77936 9.5 3.39782 9.5 3V1H4C3.73478 1 3.48043 1.10536 3.29289 1.29289C3.10536 1.48043 3 1.73478 3 2V11H2V2C2 1.46957 2.21071 0.960859 2.58579 0.585786C2.96086 0.210714 3.46957 0 4 0L9.5 0L14 4.5ZM1.6 11.85H0V15.849H0.791V14.507H1.594C1.881 14.507 2.125 14.45 2.326 14.334C2.529 14.217 2.684 14.059 2.789 13.86C2.89799 13.6512 2.95331 13.4185 2.95 13.183C2.95 12.933 2.897 12.707 2.792 12.506C2.68756 12.3062 2.52789 12.1406 2.332 12.029C2.132 11.909 1.889 11.85 1.6 11.85ZM2.145 13.183C2.1486 13.3148 2.1194 13.4453 2.06 13.563C2.00671 13.6654 1.92377 13.7494 1.822 13.804C1.70559 13.8616 1.57683 13.8897 1.447 13.886H0.788V12.48H1.448C1.666 12.48 1.837 12.54 1.96 12.661C2.083 12.783 2.145 12.957 2.145 13.183ZM3.362 11.85V15.849H4.822C5.223 15.849 5.556 15.769 5.82 15.612C6.08716 15.4522 6.29577 15.2106 6.415 14.923C6.545 14.623 6.611 14.261 6.611 13.839C6.611 13.419 6.546 13.061 6.415 12.764C6.29718 12.4797 6.09056 12.2412 5.826 12.084C5.562 11.928 5.227 11.85 4.821 11.85H3.362ZM4.153 12.495H4.716C4.964 12.495 5.166 12.545 5.325 12.647C5.49004 12.7549 5.61456 12.9146 5.679 13.101C5.758 13.302 5.797 13.553 5.797 13.854C5.8001 14.0534 5.77724 14.2524 5.729 14.446C5.69337 14.5986 5.62665 14.7423 5.533 14.868C5.44599 14.9801 5.33072 15.0671 5.199 15.12C5.04466 15.1777 4.88075 15.2056 4.716 15.202H4.153V12.495ZM7.896 14.258V15.849H7.106V11.85H9.654V12.503H7.896V13.62H9.502V14.258H7.896Z" fill="#1644C2"/>
                        </svg></a>
                   </div>
                </div>
            </div>
            @endforeach


            <div class="card df jc-sb">
                <div>
                    <h2>شهادة الحضور <span>(اظهار رقم الشهادة)</span></h2>
                    <p> تم اصدار الشهادة</p>
                </div>
                <div class="df ai-c">
                   <div class="flex-g btn_download g0">
                    <span>تحميل</span>
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14 4.5V14C14 14.5304 13.7893 15.0391 13.4142 15.4142C13.0391 15.7893 12.5304 16 12 16H11V15H12C12.2652 15 12.5196 14.8946 12.7071 14.7071C12.8946 14.5196 13 14.2652 13 14V4.5H11C10.6022 4.5 10.2206 4.34196 9.93934 4.06066C9.65804 3.77936 9.5 3.39782 9.5 3V1H4C3.73478 1 3.48043 1.10536 3.29289 1.29289C3.10536 1.48043 3 1.73478 3 2V11H2V2C2 1.46957 2.21071 0.960859 2.58579 0.585786C2.96086 0.210714 3.46957 0 4 0L9.5 0L14 4.5ZM1.6 11.85H0V15.849H0.791V14.507H1.594C1.881 14.507 2.125 14.45 2.326 14.334C2.529 14.217 2.684 14.059 2.789 13.86C2.89799 13.6512 2.95331 13.4185 2.95 13.183C2.95 12.933 2.897 12.707 2.792 12.506C2.68756 12.3062 2.52789 12.1406 2.332 12.029C2.132 11.909 1.889 11.85 1.6 11.85ZM2.145 13.183C2.1486 13.3148 2.1194 13.4453 2.06 13.563C2.00671 13.6654 1.92377 13.7494 1.822 13.804C1.70559 13.8616 1.57683 13.8897 1.447 13.886H0.788V12.48H1.448C1.666 12.48 1.837 12.54 1.96 12.661C2.083 12.783 2.145 12.957 2.145 13.183ZM3.362 11.85V15.849H4.822C5.223 15.849 5.556 15.769 5.82 15.612C6.08716 15.4522 6.29577 15.2106 6.415 14.923C6.545 14.623 6.611 14.261 6.611 13.839C6.611 13.419 6.546 13.061 6.415 12.764C6.29718 12.4797 6.09056 12.2412 5.826 12.084C5.562 11.928 5.227 11.85 4.821 11.85H3.362ZM4.153 12.495H4.716C4.964 12.495 5.166 12.545 5.325 12.647C5.49004 12.7549 5.61456 12.9146 5.679 13.101C5.758 13.302 5.797 13.553 5.797 13.854C5.8001 14.0534 5.77724 14.2524 5.729 14.446C5.69337 14.5986 5.62665 14.7423 5.533 14.868C5.44599 14.9801 5.33072 15.0671 5.199 15.12C5.04466 15.1777 4.88075 15.2056 4.716 15.202H4.153V12.495ZM7.896 14.258V15.849H7.106V11.85H9.654V12.503H7.896V13.62H9.502V14.258H7.896Z" fill="#1644C2"/>
                        </svg>
                   </div>

                </div>
            </div>
            <p class="end"> لا توجد ملفات أخرى</p>
        </div>


    </section>
    <nav>
        <div class="main_nav">
            <div id="home " class="home">
               <a href="{{route('invitationV2.second',[$attendance->id,request()->course_id])}}" class=" df f-c ai-c"> <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.367 16.3321L18.373 10.5391L14.25 6.42908C13.0057 5.19031 10.9942 5.19031 9.74999 6.42908L5.63599 10.5291V16.3291C5.6393 18.0833 7.06377 19.5028 8.81799 19.5001H15.185C16.938 19.5029 18.362 18.0851 18.367 16.3321Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M19.124 6.51807C19.124 6.10385 18.7882 5.76807 18.374 5.76807C17.9598 5.76807 17.624 6.10385 17.624 6.51807H19.124ZM18.374 10.5391H17.624C17.624 10.7384 17.7033 10.9295 17.8445 11.0702L18.374 10.5391ZM19.4705 12.6912C19.7638 12.9837 20.2387 12.9829 20.5311 12.6896C20.8236 12.3962 20.8229 11.9214 20.5295 11.6289L19.4705 12.6912ZM6.16552 11.0602C6.45886 10.7678 6.45959 10.2929 6.16714 9.99955C5.8747 9.70621 5.39982 9.70548 5.10648 9.99793L6.16552 11.0602ZM3.47048 11.6289C3.17714 11.9214 3.17641 12.3962 3.46886 12.6896C3.7613 12.9829 4.23618 12.9837 4.52952 12.6912L3.47048 11.6289ZM13.25 19.5001C13.25 19.9143 13.5858 20.2501 14 20.2501C14.4142 20.2501 14.75 19.9143 14.75 19.5001H13.25ZM9.25 19.5001C9.25 19.9143 9.58579 20.2501 10 20.2501C10.4142 20.2501 10.75 19.9143 10.75 19.5001H9.25ZM17.624 6.51807V10.5391H19.124V6.51807H17.624ZM17.8445 11.0702L19.4705 12.6912L20.5295 11.6289L18.9035 10.0079L17.8445 11.0702ZM5.10648 9.99793L3.47048 11.6289L4.52952 12.6912L6.16552 11.0602L5.10648 9.99793ZM14.75 19.5001V17.7201H13.25V19.5001H14.75ZM14.75 17.7201C14.75 16.2013 13.5188 14.9701 12 14.9701V16.4701C12.6904 16.4701 13.25 17.0297 13.25 17.7201H14.75ZM12 14.9701C10.4812 14.9701 9.25 16.2013 9.25 17.7201H10.75C10.75 17.0297 11.3096 16.4701 12 16.4701V14.9701ZM9.25 17.7201V19.5001H10.75V17.7201H9.25Z" fill="white"/>
                    </svg>
                    الرئيسية
                </a>
            </div>
            <div id="files"  >
               <a href="{{ route('invitationV2.files',[$attendance->id,request()->course_id]) }} "class=" df f-c ai-c"> <svg width="25" height="25" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.70534 3.16651H10.386C10.4242 3.16651 10.4622 3.16895 10.5 3.17384C11.9982 3.27862 13.1616 4.52197 13.1667 6.02384V10.3098C13.1612 11.8912 11.8761 13.1695 10.2947 13.1665H6.70534C5.12368 13.1695 3.83849 11.8908 3.83334 10.3092V6.02384C3.83849 4.44219 5.12368 3.16356 6.70534 3.16651Z" stroke="#265AE8" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10.5 11.6665C10.7761 11.6665 11 11.4426 11 11.1665C11 10.8904 10.7761 10.6665 10.5 10.6665V11.6665ZM6.5 10.6665C6.22386 10.6665 6 10.8904 6 11.1665C6 11.4426 6.22386 11.6665 6.5 11.6665V10.6665ZM13.1667 6.52383C13.4428 6.52383 13.6667 6.29997 13.6667 6.02383C13.6667 5.74769 13.4428 5.52383 13.1667 5.52383V6.52383ZM10.5 6.02383H10C10 6.29997 10.2239 6.52383 10.5 6.52383V6.02383ZM11 3.17383C11 2.89769 10.7761 2.67383 10.5 2.67383C10.2239 2.67383 10 2.89769 10 3.17383H11ZM10.1869 8.18671C10.3821 7.99145 10.3821 7.67487 10.1869 7.47961C9.99162 7.28435 9.67504 7.28435 9.47978 7.47961L10.1869 8.18671ZM8.14645 8.81294C7.95118 9.0082 7.95118 9.32479 8.14645 9.52005C8.34171 9.71531 8.65829 9.71531 8.85355 9.52005L8.14645 8.81294ZM8.14645 9.52005C8.34171 9.71531 8.65829 9.71531 8.85355 9.52005C9.04882 9.32479 9.04882 9.0082 8.85355 8.81294L8.14645 9.52005ZM7.52022 7.47961C7.32496 7.28435 7.00838 7.28435 6.81311 7.47961C6.61785 7.67487 6.61785 7.99145 6.81311 8.18671L7.52022 7.47961ZM8 9.16649C8 9.44264 8.22386 9.66649 8.5 9.66649C8.77614 9.66649 9 9.44264 9 9.16649H8ZM9 5.16649C9 4.89035 8.77614 4.66649 8.5 4.66649C8.22386 4.66649 8 4.89035 8 5.16649H9ZM10.5 10.6665H6.5V11.6665H10.5V10.6665ZM13.1667 5.52383H10.5V6.52383H13.1667V5.52383ZM11 6.02383V3.17383H10V6.02383H11ZM9.47978 7.47961L8.14645 8.81294L8.85355 9.52005L10.1869 8.18671L9.47978 7.47961ZM8.85355 8.81294L7.52022 7.47961L6.81311 8.18671L8.14645 9.52005L8.85355 8.81294ZM9 9.16649V5.16649H8V9.16649H9Z" fill="#265AE8"/>
                    </svg>
                    ملفات الدورة
                </a>
            </div>
            <div id="contact"  >
               <a href="https://wa.me/{{$course->contact_number}}" class=" df f-c ai-c"> <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.24033 8.66807C6.99433 7.87307 7.26133 7.65007 7.58233 7.54707C7.80482 7.48855 8.03822 7.48512 8.26233 7.53707C8.55733 7.62307 8.63433 7.68807 9.60233 8.65107C10.4523 9.49707 10.5363 9.58907 10.6183 9.75107C10.7769 10.0427 10.8024 10.3884 10.6883 10.7001C10.6043 10.9351 10.4803 11.0911 9.96533 11.6091L9.62933 11.9461C9.54093 12.0357 9.51997 12.172 9.57733 12.2841C10.3232 13.5566 11.3812 14.6181 12.6513 15.3681C12.7978 15.4466 12.9783 15.4211 13.0973 15.3051L13.4203 14.9871C13.6199 14.7823 13.8313 14.5893 14.0533 14.4091C14.4015 14.1936 14.8362 14.1728 15.2033 14.3541C15.3823 14.4381 15.4423 14.4931 16.3193 15.3671C17.2193 16.2671 17.2483 16.2961 17.3493 16.5031C17.5379 16.846 17.536 17.2619 17.3443 17.6031C17.2443 17.7951 17.1883 17.8651 16.6803 18.3841C16.3733 18.6981 16.0803 18.9841 16.0383 19.0261C15.6188 19.3728 15.081 19.5431 14.5383 19.5011C13.5455 19.4102 12.5847 19.103 11.7233 18.6011C9.81416 17.5896 8.18898 16.1156 6.99633 14.3141C6.73552 13.9374 6.50353 13.5416 6.30233 13.1301C5.76624 12.211 5.48909 11.164 5.50033 10.1001C5.54065 9.54159 5.8081 9.02404 6.24033 8.66807Z" stroke="#265AE8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M18.7383 9.5C18.7383 9.91421 19.0741 10.25 19.4883 10.25C19.9026 10.25 20.2383 9.91421 20.2383 9.5H18.7383ZM20.2383 5.5C20.2383 5.08579 19.9026 4.75 19.4883 4.75C19.0741 4.75 18.7383 5.08579 18.7383 5.5H20.2383ZM14.7383 9.5C14.7383 9.91421 15.0741 10.25 15.4883 10.25C15.9026 10.25 16.2383 9.91421 16.2383 9.5H14.7383ZM16.2383 5.5C16.2383 5.08579 15.9026 4.75 15.4883 4.75C15.0741 4.75 14.7383 5.08579 14.7383 5.5H16.2383ZM20.2383 9.5V5.5H18.7383V9.5H20.2383ZM16.2383 9.5V5.5H14.7383V9.5H16.2383Z" fill="#265AE8"/>
                    </svg>
                    التواصل المباشر
                 </a>
            </div>

        </div>
        <div class="sub_nav">
            <div id="qr_code" >
              <a href="#" class=" df f-c ai-c">  <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.6666 12.167C10.3905 12.167 10.1666 12.3908 10.1666 12.667C10.1666 12.9431 10.3905 13.167 10.6666 13.167V12.167ZM13.8333 9.33366C13.8333 9.05752 13.6094 8.83366 13.3333 8.83366C13.0572 8.83366 12.8333 9.05752 12.8333 9.33366H13.8333ZM6.66664 13.167C6.94278 13.167 7.16664 12.9431 7.16664 12.667C7.16664 12.3908 6.94278 12.167 6.66664 12.167V13.167ZM4.49997 9.33366C4.49997 9.05752 4.27611 8.83366 3.99997 8.83366C3.72383 8.83366 3.49997 9.05752 3.49997 9.33366H4.49997ZM6.66664 3.83366C6.94278 3.83366 7.16664 3.6098 7.16664 3.33366C7.16664 3.05752 6.94278 2.83366 6.66664 2.83366V3.83366ZM3.49997 6.66699C3.49997 6.94313 3.72383 7.16699 3.99997 7.16699C4.27611 7.16699 4.49997 6.94313 4.49997 6.66699H3.49997ZM10.6666 2.83366C10.3905 2.83366 10.1666 3.05752 10.1666 3.33366C10.1666 3.6098 10.3905 3.83366 10.6666 3.83366V2.83366ZM12.8333 6.66699C12.8333 6.94313 13.0572 7.16699 13.3333 7.16699C13.6094 7.16699 13.8333 6.94313 13.8333 6.66699H12.8333ZM10.6666 13.167C12.4155 13.167 13.8333 11.7492 13.8333 10.0003H12.8333C12.8333 11.1969 11.8633 12.167 10.6666 12.167V13.167ZM13.8333 10.0003V9.33366H12.8333V10.0003H13.8333ZM6.66664 12.167C5.47002 12.167 4.49997 11.1969 4.49997 10.0003H3.49997C3.49997 11.7492 4.91773 13.167 6.66664 13.167V12.167ZM4.49997 10.0003V9.33366H3.49997V10.0003H4.49997ZM6.66664 2.83366C4.91773 2.83366 3.49997 4.25142 3.49997 6.00033H4.49997C4.49997 4.80371 5.47002 3.83366 6.66664 3.83366V2.83366ZM3.49997 6.00033V6.66699H4.49997V6.00033H3.49997ZM10.6666 3.83366C11.8633 3.83366 12.8333 4.80371 12.8333 6.00033H13.8333C13.8333 4.25142 12.4155 2.83366 10.6666 2.83366V3.83366ZM12.8333 6.00033V6.66699H13.8333V6.00033H12.8333Z" fill="#265AE8"/>
                    <path d="M12 8.00033H5.33331" stroke="#265AE8" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    رمز تسجيل الدخول
                 </a>
            </div>
            <div id="site" class="border ">
                <a href="{{$course->location}}" class=" df f-c ai-c"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.98584 10.4514C6.26046 10.4225 6.45964 10.1764 6.43071 9.9018C6.40178 9.62717 6.1557 9.428 5.88107 9.45693L5.98584 10.4514ZM3.76412 10.6362L3.52255 10.1984C3.51068 10.205 3.49908 10.212 3.48778 10.2195L3.76412 10.6362ZM3.47346 11.5842L3.08662 11.901C3.10345 11.9215 3.12188 11.9407 3.14174 11.9583L3.47346 11.5842ZM5.19012 12.3782L5.30106 11.8906C5.28762 11.8876 5.27406 11.8851 5.26042 11.8831L5.19012 12.3782ZM8.00012 12.6668L8.00974 12.1669C8.00337 12.1668 7.997 12.1668 7.99063 12.1669L8.00012 12.6668ZM10.8101 12.3788L10.7398 11.8838C10.7262 11.8857 10.7127 11.8882 10.6993 11.8913L10.8101 12.3788ZM12.5268 11.5848L12.8585 11.959C12.8784 11.9414 12.8968 11.9222 12.9136 11.9016L12.5268 11.5848ZM12.2361 10.6368L12.5125 10.2202C12.5012 10.2127 12.4897 10.2057 12.4778 10.1991L12.2361 10.6368ZM10.1193 9.45694C9.84469 9.42794 9.59856 9.62705 9.56956 9.90167C9.54055 10.1763 9.73966 10.4224 10.0143 10.4514L10.1193 9.45694ZM8.00012 9.75151L7.65591 10.1142C7.84885 10.2973 8.1514 10.2973 8.34434 10.1142L8.00012 9.75151ZM6.02012 7.87218L6.36436 7.5095L6.36022 7.50566L6.02012 7.87218ZM6.02012 4.11218L6.36022 4.4787L6.36072 4.47823L6.02012 4.11218ZM9.98012 4.11218L9.63953 4.47823L9.64003 4.4787L9.98012 4.11218ZM9.98012 7.87218L9.64001 7.50564L9.63591 7.50953L9.98012 7.87218ZM8.00012 7.00018L7.9914 7.50012L7.99578 7.50016L8.00012 7.00018ZM7.09886 6.07192L7.59882 6.07795L7.09886 6.07192ZM8.02226 5.16567L8.0256 4.66568L8.02226 5.16567ZM8.93346 6.08418L9.43345 6.0892L9.43346 6.08483L8.93346 6.08418ZM5.88107 9.45693C5.05328 9.54414 4.25134 9.79625 3.52255 10.1984L4.00569 11.074C4.61756 10.7363 5.29085 10.5246 5.98584 10.4514L5.88107 9.45693ZM3.48778 10.2195C3.21925 10.3976 2.97342 10.6376 2.87576 10.9561C2.7675 11.3091 2.87462 11.6421 3.08662 11.901L3.86029 11.2674C3.83268 11.2337 3.83068 11.219 3.83203 11.2245C3.83419 11.2333 3.83329 11.2445 3.83182 11.2493C3.83145 11.2505 3.83698 11.2316 3.86935 11.1947C3.902 11.1575 3.95602 11.1089 4.04047 11.0529L3.48778 10.2195ZM3.14174 11.9583C3.69709 12.4507 4.385 12.7689 5.11983 12.8732L5.26042 11.8831C4.71981 11.8064 4.21373 11.5723 3.80517 11.2101L3.14174 11.9583ZM5.07919 12.8657C6.0402 13.0844 7.02422 13.1855 8.00962 13.1668L7.99063 12.1669C7.08622 12.1841 6.18308 12.0913 5.30106 11.8906L5.07919 12.8657ZM7.99051 13.1668C8.97588 13.1857 9.9599 13.0848 10.9209 12.8664L10.6993 11.8913C9.81726 12.0918 8.91411 12.1843 8.00974 12.1669L7.99051 13.1668ZM10.8804 12.8739C11.6152 12.7695 12.3032 12.4514 12.8585 11.959L12.1951 11.2107C11.7865 11.573 11.2804 11.807 10.7398 11.8838L10.8804 12.8739ZM12.9136 11.9016C13.1256 11.6428 13.2327 11.3098 13.1245 10.9568C13.0268 10.6383 12.781 10.3982 12.5125 10.2202L11.9598 11.0535C12.0442 11.1095 12.0982 11.1582 12.1309 11.1954C12.1633 11.2323 12.1688 11.2511 12.1684 11.2499C12.167 11.2451 12.1661 11.2339 12.1682 11.2252C12.1696 11.2197 12.1676 11.2343 12.14 11.268L12.9136 11.9016ZM12.4778 10.1991C11.7491 9.79674 10.9472 9.54438 10.1193 9.45694L10.0143 10.4514C10.7093 10.5248 11.3826 10.7367 11.9944 11.0745L12.4778 10.1991ZM8.34434 9.38886L6.36434 7.50953L5.67591 8.23483L7.65591 10.1142L8.34434 9.38886ZM6.36022 7.50566C5.93918 7.11498 5.69991 6.56656 5.69991 5.99218H4.69991C4.69991 6.84475 5.05506 7.65879 5.68003 8.2387L6.36022 7.50566ZM5.69991 5.99218C5.69991 5.4178 5.93918 4.86938 6.36022 4.4787L5.68003 3.74566C5.05506 4.32557 4.69991 5.13961 4.69991 5.99218H5.69991ZM6.36072 4.47823C7.28462 3.61858 8.71563 3.61858 9.63953 4.47823L10.3207 3.74613C9.01293 2.52929 6.98732 2.52929 5.67953 3.74613L6.36072 4.47823ZM9.64003 4.4787C10.0611 4.86938 10.3003 5.4178 10.3003 5.99218H11.3003C11.3003 5.13961 10.9452 4.32557 10.3202 3.74566L9.64003 4.4787ZM10.3003 5.99218C10.3003 6.56656 10.0611 7.11498 9.64003 7.50566L10.3202 8.2387C10.9452 7.65879 11.3003 6.84475 11.3003 5.99218H10.3003ZM9.63591 7.50953L7.65591 9.38886L8.34434 10.1142L10.3243 8.23483L9.63591 7.50953ZM8.00885 6.50026C7.77927 6.49625 7.59605 6.30755 7.59882 6.07795L6.5989 6.06589C6.58949 6.84563 7.21173 7.4865 7.9914 7.5001L8.00885 6.50026ZM7.59882 6.07795C7.60159 5.84836 7.78931 5.66413 8.01891 5.66566L8.0256 4.66568C7.24582 4.66047 6.6083 5.28615 6.5989 6.06589L7.59882 6.07795ZM8.01891 5.66566C8.24852 5.6672 8.43376 5.85392 8.43346 6.08353L9.43346 6.08483C9.43447 5.30504 8.80537 4.67089 8.0256 4.66568L8.01891 5.66566ZM8.43348 6.07916C8.43113 6.31382 8.23914 6.50224 8.00447 6.5002L7.99578 7.50016C8.78218 7.507 9.42553 6.8756 9.43343 6.0892L8.43348 6.07916Z" fill="#265AE8"/>
                    </svg>
                    موقع الدورة
                 </a>
            </div>

            <div id="activity">
               <a href="{{route('invitation.third',[$attendance->id,request()->course_id])}}"  class=" df f-c ai-c"> <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.66663 8.66683V7.3335C3.66663 5.12436 5.45749 3.3335 7.66663 3.3335H8.99996C11.2091 3.3335 13 5.12436 13 7.3335V8.66683C13 10.876 11.2091 12.6668 8.99996 12.6668H7.66663C5.45749 12.6668 3.66663 10.876 3.66663 8.66683Z" stroke="#265AE8" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6.99994 6.42621C6.99994 5.69955 7.59994 5.29955 8.49794 5.33355C9.146 5.35602 9.66128 5.88512 9.66661 6.53355C9.69795 7.1399 9.4106 7.71866 8.90861 8.06021C8.48191 8.33355 8.25639 8.83268 8.33327 9.33355" stroke="#265AE8" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M8.33327 11.0002C8.14947 11.0002 7.99994 10.8506 7.99994 10.6668C7.99994 10.483 8.14947 10.3335 8.33327 10.3335C8.51707 10.3335 8.66661 10.483 8.66661 10.6668C8.66661 10.8506 8.51707 11.0002 8.33327 11.0002Z" fill="#265AE8"/>
                    <path d="M8.33329 10C8.70148 10 8.99996 10.2985 8.99996 10.6667C8.99996 11.0349 8.70148 11.3333 8.33329 11.3333C7.96511 11.3333 7.66663 11.0349 7.66663 10.6667C7.66663 10.2985 7.96511 10 8.33329 10Z" fill="#265AE8"/>
                    </svg>
                    الأنشطة
                 </a>
            </div>
        </div>

    </nav>
    <script src="{{asset('inv/main.js')}}"></script>
</body>
</html>
