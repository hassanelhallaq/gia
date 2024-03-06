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
</head>
<style>
    .container{
        padding-bottom: 10rem;
        margin-top:-100px;
    }
    .title{
        text-align: center;
    }
    .back_image{
        height: 460px;
        object-fit: cover;
    }

    .start{
        gap: 1rem;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

</style>
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
                            {{Auth::user()->name}}
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
            <h2>دعوة حضور دورة تدريبية
              </h2>
        </div>
        <img class="back_image" src="{{asset('inv/assets/back.webp')}}" alt="">

            <div class="container">
                <div class="title">
                    <h3> عزيزي المشارك </h3>
                    <p>تم دعوتك الى المشاركة في دورة مهارات العرض الوظيفي</p>
                </div>
            </div>
            <div class="start">
                <p>
                    لقبول الدعوة يرجى البدء ادناه
                </p>
                <a href="{{route('invitationV2.inviation',[$attendance->id , request()->course_id])}}" class="btn">
                    أبدأ الآن
                </a>
            </div>
            <div class="sociel_media">
               <a href="#"> <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.5" y="0.5" width="43" height="43" rx="11.5" stroke="#8AB7F4"/>
                    <path d="M27.0392 23.3039L27.6625 19.3469H23.8228V16.7748C23.8228 15.6928 24.3588 14.6355 26.073 14.6355H27.8433V11.2659C26.8124 11.1016 25.7707 11.0127 24.7266 11C21.5663 11 19.5031 12.8981 19.5031 16.3296V19.3469H16V23.3039H19.5031V32.875H23.8228V23.3039H27.0392Z" fill="#0063E6"/>
                </svg></a>
               <a href="#"> <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.5" y="0.5" width="43" height="43" rx="11.5" stroke="#8AB7F4"/>
                        <path d="M22.7218 16.9799C24.4989 16.9799 25.6977 17.7475 26.3812 18.389L29.0521 15.781C27.4117 14.2562 25.277 13.3203 22.7218 13.3203C19.0203 13.3203 15.8236 15.4445 14.2673 18.5362L17.3273 20.9128C18.095 18.6309 20.2191 16.9799 22.7218 16.9799Z" fill="#0063E6"/>
                        <path d="M31.8071 22.995C31.8071 22.2168 31.744 21.649 31.6073 21.0601H22.7218V24.5724H27.9374C27.8323 25.4452 27.2644 26.7597 26.0026 27.6431L28.989 29.9566C30.7766 28.3056 31.8071 25.8764 31.8071 22.995Z" fill="#0063E6"/>
                        <path d="M17.3378 24.6565C17.138 24.0676 17.0224 23.4367 17.0224 22.7847C17.0224 22.1327 17.138 21.5017 17.3273 20.9128L14.2673 18.5362C13.6259 19.8192 13.2578 21.2598 13.2578 22.7847C13.2578 24.3095 13.6259 25.7502 14.2673 27.0331L17.3378 24.6565Z" fill="#0063E6"/>
                        <path d="M22.7217 32.249C25.277 32.249 27.4222 31.4078 28.989 29.9566L26.0026 27.6431C25.2034 28.2004 24.1308 28.5895 22.7217 28.5895C20.219 28.5895 18.0949 26.9385 17.3378 24.6565L14.2778 27.0331C15.8341 30.1248 19.0203 32.249 22.7217 32.249Z" fill="#0063E6"/>
                        <path d="M22.464 16.6596C24.2411 16.6596 25.4398 17.4272 26.1233 18.0687L28.7943 15.4607C27.1539 13.9359 25.0192 13 22.464 13C18.7625 13 15.5658 15.1242 14.0095 18.2159L17.0695 20.5925C17.8371 18.3106 19.9613 16.6596 22.464 16.6596Z" fill="#0063E6"/>
                        <path d="M31.5493 22.6747C31.5493 21.8965 31.4862 21.3286 31.3495 20.7397H22.4639V24.2521H27.6796C27.5745 25.1249 27.0066 26.4394 25.7448 27.3227L28.7312 29.6363C30.5188 27.9853 31.5493 25.5561 31.5493 22.6747Z" fill="#0063E6"/>
                        <path d="M17.08 24.3362C16.8802 23.7473 16.7645 23.1163 16.7645 22.4644C16.7645 21.8124 16.8802 21.1814 17.0695 20.5925L14.0095 18.2159C13.3681 19.4989 13 20.9395 13 22.4644C13 23.9892 13.368 25.4299 14.0095 26.7128L17.08 24.3362Z" fill="#0063E6"/>
                        <path d="M22.4639 31.9287C25.0192 31.9287 27.1644 31.0875 28.7312 29.6363L25.7448 27.3227C24.9456 27.8801 23.873 28.2692 22.4639 28.2692C19.9612 28.2692 17.8371 26.6182 17.08 24.3362L14.02 26.7128C15.5763 29.8045 18.7625 31.9287 22.4639 31.9287Z" fill="#0063E6"/>
                </svg></a>
                <a href="#"><svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.5" y="0.5" width="43" height="43" rx="11.5" stroke="#8AB7F4"/>
                    <path d="M17.6348 21.9458C17.6348 19.7467 19.418 17.9635 21.6183 17.9635C23.8185 17.9635 25.6027 19.7467 25.6027 21.9458C25.6027 24.1449 23.8185 25.9281 21.6183 25.9281C19.418 25.9281 17.6348 24.1449 17.6348 21.9458ZM15.4809 21.9458C15.4809 25.3336 18.2286 28.0798 21.6183 28.0798C25.0079 28.0798 27.7556 25.3336 27.7556 21.9458C27.7556 18.558 25.0079 15.8118 21.6183 15.8118C18.2286 15.8118 15.4809 18.558 15.4809 21.9458ZM26.5643 15.5686C26.5642 15.8521 26.6482 16.1293 26.8057 16.3651C26.9632 16.6009 27.1871 16.7847 27.4492 16.8933C27.7112 17.0019 27.9996 17.0304 28.2778 16.9752C28.5561 16.92 28.8117 16.7836 29.0124 16.5832C29.213 16.3828 29.3497 16.1274 29.4052 15.8494C29.4606 15.5713 29.4323 15.2831 29.3239 15.0211C29.2154 14.7591 29.0317 14.5352 28.7959 14.3775C28.5601 14.2199 28.2828 14.1357 27.9992 14.1356H27.9986C27.6183 14.1358 27.2537 14.2868 26.9848 14.5555C26.7159 14.8242 26.5646 15.1885 26.5643 15.5686ZM16.7896 31.6694C15.6243 31.6164 14.9909 31.4224 14.57 31.2585C14.012 31.0413 13.6138 30.7827 13.1952 30.3649C12.7766 29.9471 12.5174 29.5495 12.3012 28.9918C12.1371 28.5713 11.943 27.9381 11.89 26.7734C11.8321 25.5143 11.8205 25.136 11.8205 21.9459C11.8205 18.7558 11.833 18.3786 11.89 17.1184C11.9431 15.9537 12.1386 15.3217 12.3012 14.9C12.5184 14.3423 12.7771 13.9443 13.1952 13.5259C13.6132 13.1075 14.011 12.8485 14.57 12.6324C14.9907 12.4684 15.6243 12.2744 16.7896 12.2214C18.0494 12.1635 18.4279 12.152 21.6183 12.152C24.8087 12.152 25.1875 12.1645 26.4484 12.2214C27.6137 12.2745 28.246 12.4699 28.668 12.6324C29.226 12.8485 29.6242 13.1081 30.0428 13.5259C30.4614 13.9437 30.7196 14.3423 30.9368 14.9C31.1009 15.3205 31.295 15.9537 31.348 17.1184C31.4059 18.3786 31.4175 18.7558 31.4175 21.9459C31.4175 25.136 31.4059 25.5132 31.348 26.7734C31.2949 27.9381 31.0999 28.5711 30.9368 28.9918C30.7196 29.5495 30.4608 29.9475 30.0428 30.3649C29.6248 30.7823 29.226 31.0413 28.668 31.2585C28.2473 31.4225 27.6137 31.6165 26.4484 31.6694C25.1886 31.7273 24.8101 31.7389 21.6183 31.7389C18.4264 31.7389 18.049 31.7273 16.7896 31.6694ZM16.6906 10.0723C15.4182 10.1303 14.5488 10.3319 13.7895 10.6272C13.0031 10.9322 12.3374 11.3413 11.6722 12.0051C11.007 12.6689 10.5987 13.3353 10.2936 14.1212C9.9981 14.8806 9.79634 15.7491 9.7384 17.0208C9.6795 18.2945 9.66602 18.7017 9.66602 21.9458C9.66602 25.1899 9.6795 25.5971 9.7384 26.8708C9.79634 28.1426 9.9981 29.011 10.2936 29.7704C10.5987 30.5559 11.0071 31.223 11.6722 31.8865C12.3373 32.55 13.0031 32.9586 13.7895 33.2644C14.5502 33.5597 15.4182 33.7613 16.6906 33.8193C17.9657 33.8772 18.3724 33.8916 21.6183 33.8916C24.8641 33.8916 25.2716 33.8781 26.546 33.8193C27.8184 33.7613 28.6873 33.5597 29.4471 33.2644C30.233 32.9586 30.8992 32.5503 31.5644 31.8865C32.2296 31.2227 32.637 30.5559 32.943 29.7704C33.2385 29.011 33.4412 28.1425 33.4982 26.8708C33.5561 25.5962 33.5696 25.1899 33.5696 21.9458C33.5696 18.7017 33.5561 18.2945 33.4982 17.0208C33.4402 15.749 33.2385 14.8801 32.943 14.1212C32.637 13.3357 32.2285 12.6699 31.5644 12.0051C30.9002 11.3402 30.233 10.9322 29.4481 10.6272C28.6873 10.3319 27.8183 10.1293 26.5469 10.0723C25.2725 10.0144 24.8651 10 21.6192 10C18.3734 10 17.9657 10.0135 16.6906 10.0723Z" fill="#0063E6"/>
                </svg></a>


            </div>
            <p class="para">جميع الحقوق محفوظة لدي جيا لعام 2024</p>
    </section>
    <script src="{{asset('inv/main.js')}}"></script>


</body>
</html>