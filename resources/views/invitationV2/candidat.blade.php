<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('inv/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <style>
        .profile_img {
            width: 16px;
            height: 16px;
            background: grey;
            border-radius: 50%;
        }

        #timePlace {
            margin-top: 4px;
        }

        .card_train {
            display: flex;
            justify-content: space-between;
            padding: 1rem;

        }

        .cards_training {
            margin-top: 2rem;
        }

        section {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .nav_training {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 700;
            padding: 0 12px;
            position: relative;
        }

        .nav_training div {
            position: relative;
            opacity: .5;


        }

        .nav_training::after {
            content: '';
            background: #CECECE;
            position: absolute;
            bottom: -16px;

            width: 95%;
            height: 2px;

        }

        .nav_training div::after {
            content: '';
            position: absolute;
            bottom: -16px;
            z-index: 99;

            height: 2px;
            width: 120%;
            right: 0;

        }

        .nav_training div.active {
            opacity: 1;
        }

        .nav_training div.active::after {
            background: #1644C2;
        }


        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            padding: 5px 10px;
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .form-group {
            align-items: center;
            display: flex;
            border: 1px solid #ffffff;
            padding: 5px;
            border-radius: 6px;
            width: auto;
            background-color: white;
            align-content: center;
            justify-content: space-evenly;
            align-items: center;
        }

        .form-group:focus {
            color: #212529;
            background-color: #fff;
            border-color: #86b7fe;
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgb(13 110 253 / 25%);
        }

        .form-group input {
            display: inline-block;
            width: auto;
            border: none;
            width: 90% !important;
        }

        .spannumber {
            border-left: 1px solid #585858;
        }

        .form-group input:focus {
            box-shadow: none;
        }

        ul,
        ul li {
            width: auto !important;
        }

        p {
            margin-bottom: 0px !important;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="m-auto">
        <header>
            <div class="wrap">
                <div class="df ai-c jc-sb">
                    <div class="df ai-c g0">
                        <a href="/One_Course_Index.html"> <img src="{{ asset('inv/assets/logo.webp') }}" alt=""
                                width="40px " height="40px"></a>
                        <div class="df  f-c ">
                            <span>
                                اهلا بك
                            </span>
                            <span id="profile_name">
                                {{ Auth::user()->name }}
                            </span>
                        </div>

                    </div>
                    <div class="dropdown df ai-c" style="display: flex;">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.66675 6.6665L8.00008 9.99984L11.3334 6.6665" stroke="#1644C2" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>EN

                        <div class="dropdown-content" style="top: 16px; left: 0px;">
                            <a href="">عربي</a>
                            <a href="">نجليزي</a>
                        </div>
                    </div>


                </div>
            </div>
        </header>
        <section>
            <img class="mc" src="{{ asset('inv/assets/training.svg') }}" alt="">
            <!-- <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4 class="mt-2 mb-3 "> اقسام الدورة </h4>

                    </div>
                </div>
            </div> -->
            <div class="wrap text-rieght">
                <h4 class="mt-2 mb-3 mr-2"> اقسام الدورة </h4>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="flex-wrap: nowrap">
                    {{-- <li class="nav-item   mr-4" role="presentation">
                      <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"> الدورات الداخلية</button>
                    </li> --}}
                    @foreach ($categories as $category)
                        <li class="nav-item " role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile_{{ $category->id }}" type="button" role="tab"
                                aria-controls="pills-profile" aria-selected="false"> {{$category->name}}</button>
                        </li>
                    @endforeach

                </ul>
                <div class="tab-content" id="pills-tabContent">
                    @foreach ($categories as $category)
                        @php
                            $candidat = App\Models\Candidat::find($id);
                            $courses = App\Models\Course::where('category_id', $category->id)
                                ->with('candidat')
                                ->whereHas('candidat', function ($q) use ($candidat) {
                                    $q->where('candidat_id', $candidat->id);
                                })
                                ->get();

                        @endphp
                        <div class="tab-pane fade show active" id="pills-profile_{{ $category->id }}" role="tabpanel"
                            aria-labelledby="pills-home-tab_{{ $category->id }}" tabindex="0">
                            <div class="cards_training">
                                @foreach ($courses as $cou)
                                    @php
                                        $candidateCourse = App\Models\CandidateCourse::where([
                                            ['course_id', $cou->id],
                                            ['candidat_id', $candidat->id],['is_attend',1]
                                        ])->first();

                                    @endphp

                                    <div class="card_train">
                                        <div>
                                            <h4>{{ $cou->name }}</h4>
                                            <div id="timePlace" class="flex-g g0 ai-c ">
                                                <div class="df ai-c">
                                                    <span>
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M8.9526 15.4283C9.22722 15.3993 9.4264 15.1533 9.39747 14.8786C9.36854 14.604 9.12246 14.4048 8.84783 14.4338L8.9526 15.4283ZM5.64622 15.954L5.40465 15.5163C5.39277 15.5228 5.38117 15.5298 5.36987 15.5373L5.64622 15.954ZM5.21022 17.376L4.82338 17.6928C4.84021 17.7134 4.85864 17.7325 4.8785 17.7501L5.21022 17.376ZM7.78522 18.567L7.89615 18.0795C7.88271 18.0764 7.86915 18.0739 7.85551 18.072L7.78522 18.567ZM12.0002 19L12.0098 18.5001C12.0035 18.5 11.9971 18.5 11.9907 18.5001L12.0002 19ZM16.2152 18.568L16.1449 18.073C16.1313 18.0749 16.1178 18.0774 16.1044 18.0805L16.2152 18.568ZM18.7902 17.377L19.1219 17.7511C19.1418 17.7335 19.1602 17.7144 19.1771 17.6938L18.7902 17.377ZM18.3542 15.955L18.6306 15.5383C18.6193 15.5309 18.6077 15.5239 18.5959 15.5173L18.3542 15.955ZM15.1527 14.4338C14.8781 14.4048 14.632 14.6039 14.603 14.8785C14.574 15.1531 14.7731 15.3993 15.0477 15.4283L15.1527 14.4338ZM12.0002 14.627L11.656 14.9897C11.8489 15.1728 12.1515 15.1728 12.3444 14.9897L12.0002 14.627ZM9.03022 11.808L9.37445 11.4454L9.37031 11.4415L9.03022 11.808ZM9.03022 6.16803L9.37031 6.53455L9.37081 6.53408L9.03022 6.16803ZM14.9702 6.16803L14.6296 6.53408L14.6301 6.53455L14.9702 6.16803ZM14.9702 11.808L14.6301 11.4415L14.626 11.4454L14.9702 11.808ZM12.0002 10.5L11.9915 11L11.9959 11L12.0002 10.5ZM10.6483 9.10764L11.1483 9.11367L10.6483 9.10764ZM12.0334 7.74827L12.0368 7.24828L12.0334 7.74827ZM13.4002 9.12603L13.9002 9.13105L13.9002 9.12668L13.4002 9.12603ZM8.84783 14.4338C7.63934 14.5611 6.46859 14.9292 5.40465 15.5163L5.88779 16.3918C6.83481 15.8692 7.87691 15.5416 8.9526 15.4283L8.84783 14.4338ZM5.36987 15.5373C4.98951 15.7896 4.67493 16.1086 4.55269 16.5072C4.41984 16.9404 4.54655 17.3548 4.82338 17.6928L5.59705 17.0592C5.48488 16.9223 5.49409 16.8481 5.50875 16.8004C5.53401 16.718 5.63193 16.5635 5.92256 16.3707L5.36987 15.5373ZM4.8785 17.7501C5.67483 18.4562 6.66124 18.9124 7.71493 19.0621L7.85551 18.072C6.99605 17.95 6.19147 17.5778 5.54193 17.0019L4.8785 17.7501ZM7.67428 19.0546C9.09605 19.3781 10.5519 19.5276 12.0097 19.4999L11.9907 18.5001C10.6139 18.5263 9.23893 18.385 7.89615 18.0795L7.67428 19.0546ZM11.9906 19.4999C13.4484 19.528 14.9042 19.3788 16.326 19.0556L16.1044 18.0805C14.7616 18.3857 13.3866 18.5266 12.0098 18.5001L11.9906 19.4999ZM16.2855 19.0631C17.3392 18.9134 18.3256 18.4572 19.1219 17.7511L18.4585 17.0029C17.809 17.5788 17.0044 17.951 16.1449 18.073L16.2855 19.0631ZM19.1771 17.6938C19.4539 17.3558 19.5806 16.9414 19.4477 16.5082C19.3255 16.1096 19.0109 15.7906 18.6306 15.5383L18.0779 16.3717C18.3685 16.5645 18.4664 16.719 18.4917 16.8014C18.5063 16.8491 18.5156 16.9233 18.4034 17.0602L19.1771 17.6938ZM18.5959 15.5173C17.5321 14.9299 16.3613 14.5614 15.1527 14.4338L15.0477 15.4283C16.1235 15.5419 17.1656 15.8698 18.1125 16.3927L18.5959 15.5173ZM12.3444 14.2644L9.37443 11.4454L8.686 12.1707L11.656 14.9897L12.3444 14.2644ZM9.37031 11.4415C8.68777 10.8082 8.2999 9.91914 8.2999 8.98803H7.2999C7.2999 10.1973 7.80365 11.352 8.69012 12.1745L9.37031 11.4415ZM8.2999 8.98803C8.2999 8.05691 8.68777 7.16788 9.37031 6.53455L8.69012 5.80151C7.80365 6.62406 7.2999 7.77872 7.2999 8.98803H8.2999ZM9.37081 6.53408C10.8526 5.15531 13.1478 5.15531 14.6296 6.53408L15.3108 5.80197C13.4451 4.06601 10.5553 4.06601 8.68962 5.80197L9.37081 6.53408ZM14.6301 6.53455C15.3127 7.16788 15.7005 8.05691 15.7005 8.98803H16.7005C16.7005 7.77872 16.1968 6.62406 15.3103 5.80151L14.6301 6.53455ZM15.7005 8.98803C15.7005 9.91914 15.3127 10.8082 14.6301 11.4415L15.3103 12.1745C16.1968 11.352 16.7005 10.1973 16.7005 8.98803H15.7005ZM14.626 11.4454L11.656 14.2644L12.3444 14.9897L15.3144 12.1707L14.626 11.4454ZM12.0089 10.0001C11.5271 9.99169 11.1425 9.59559 11.1483 9.11367L10.1484 9.10161C10.1359 10.1337 10.9595 10.9819 11.9915 10.9999L12.0089 10.0001ZM11.1483 9.11367C11.1541 8.63174 11.5481 8.24503 12.0301 8.24825L12.0368 7.24828C11.0046 7.24138 10.1608 8.06953 10.1484 9.10161L11.1483 9.11367ZM12.0301 8.24825C12.512 8.25147 12.9008 8.64341 12.9002 9.12538L13.9002 9.12668C13.9016 8.09453 13.0689 7.25517 12.0368 7.24828L12.0301 8.24825ZM12.9002 9.121C12.8953 9.61094 12.4945 10.0043 12.0046 10L11.9959 11C13.0375 11.0091 13.8897 10.1727 13.9002 9.13105L12.9002 9.121Z"
                                                                fill="black" />
                                                        </svg>
                                                    </span>
                                                    {{-- <p id="place_content">كراون بلازا</p> --}}

                                                </div>
                                                <div class="df ai-c">
                                                    <span>
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M5 10V16C5 18.2091 6.79086 20 9 20H15C17.2091 20 19 18.2091 19 16V10C19 7.79086 17.2091 6 15 6H9C6.79086 6 5 7.79086 5 10Z"
                                                                stroke="black" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path
                                                                d="M14.5 7C14.5 7.27614 14.7239 7.5 15 7.5C15.2761 7.5 15.5 7.27614 15.5 7H14.5ZM15.5 4C15.5 3.72386 15.2761 3.5 15 3.5C14.7239 3.5 14.5 3.72386 14.5 4H15.5ZM8.5 7C8.5 7.27614 8.72386 7.5 9 7.5C9.27614 7.5 9.5 7.27614 9.5 7H8.5ZM9.5 4C9.5 3.72386 9.27614 3.5 9 3.5C8.72386 3.5 8.5 3.72386 8.5 4H9.5ZM8.5 11.286C8.5 11.5621 8.72386 11.786 9 11.786C9.27614 11.786 9.5 11.5621 9.5 11.286H8.5ZM12 11.286L12.4991 11.3157C12.4997 11.3058 12.5 11.2959 12.5 11.286H12ZM11.3637 12.5674L11.6891 12.9471L11.6891 12.9471L11.3637 12.5674ZM10 13L9.95297 12.5022C9.69619 12.5265 9.5 12.7421 9.5 13C9.5 13.2579 9.69619 13.4735 9.95297 13.4978L10 13ZM11.3637 13.4326L11.6891 13.0529L11.3637 13.4326ZM12 14.714H12.5C12.5 14.7041 12.4997 14.6942 12.4991 14.6843L12 14.714ZM9.5 14.714C9.5 14.4379 9.27614 14.214 9 14.214C8.72386 14.214 8.5 14.4379 8.5 14.714H9.5ZM13.6746 10.4773C13.465 10.657 13.4407 10.9727 13.6203 11.1824C13.8 11.392 14.1157 11.4163 14.3254 11.2367L13.6746 10.4773ZM15 10H15.5C15.5 9.80474 15.3863 9.62735 15.2089 9.54575C15.0316 9.46416 14.8229 9.49329 14.6746 9.62035L15 10ZM14.5 16C14.5 16.2761 14.7239 16.5 15 16.5C15.2761 16.5 15.5 16.2761 15.5 16H14.5ZM15.5 7V4H14.5V7H15.5ZM9.5 7V4H8.5V7H9.5ZM9.5 11.286C9.5 11.0225 9.60738 10.8448 9.77174 10.7196C9.95001 10.5838 10.2126 10.5005 10.5 10.5005C10.7874 10.5005 11.05 10.5838 11.2283 10.7196C11.3926 10.8448 11.5 11.0225 11.5 11.286H12.5C12.5 10.6925 12.2324 10.2274 11.8342 9.92414C11.45 9.63144 10.9626 9.5005 10.5 9.5005C10.0374 9.5005 9.54999 9.63144 9.16576 9.92414C8.76762 10.2274 8.5 10.6925 8.5 11.286H9.5ZM11.5009 11.2563C11.4794 11.6166 11.3125 11.9528 11.0384 12.1878L11.6891 12.9471C12.1692 12.5356 12.4615 11.9469 12.4991 11.3157L11.5009 11.2563ZM11.0384 12.1878C10.7642 12.4227 10.4064 12.5362 10.047 12.5022L9.95297 13.4978C10.5824 13.5573 11.209 13.3585 11.6891 12.9471L11.0384 12.1878ZM10.047 13.4978C10.4064 13.4638 10.7642 13.5773 11.0384 13.8122L11.6891 13.0529C11.209 12.6415 10.5824 12.4427 9.95297 12.5022L10.047 13.4978ZM11.0384 13.8122C11.3125 14.0472 11.4794 14.3834 11.5009 14.7437L12.4991 14.6843C12.4615 14.0531 12.1692 13.4644 11.6891 13.0529L11.0384 13.8122ZM11.5 14.714C11.5 14.9775 11.3926 15.1552 11.2283 15.2804C11.05 15.4162 10.7874 15.4995 10.5 15.4995C10.2126 15.4995 9.95001 15.4162 9.77174 15.2804C9.60738 15.1552 9.5 14.9775 9.5 14.714H8.5C8.5 15.3075 8.76762 15.7726 9.16576 16.0759C9.54999 16.3686 10.0374 16.4995 10.5 16.4995C10.9626 16.4995 11.45 16.3686 11.8342 16.0759C12.2324 15.7726 12.5 15.3075 12.5 14.714H11.5ZM14.3254 11.2367L15.3254 10.3797L14.6746 9.62035L13.6746 10.4773L14.3254 11.2367ZM14.5 10V16H15.5V10H14.5Z"
                                                                fill="black" />
                                                        </svg>

                                                    </span>s
                                                    <p id="day_content">{{ $cou->start }}</p>
                                                </div>
                                                <div class="df ai-c">
                                                    <span>
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M11.9997 19.0007C15.337 19.0009 18.2104 16.6451 18.8644 13.3725C19.5184 10.0998 17.7711 6.82062 14.69 5.53817C11.6089 4.25573 8.05095 5.32674 6.18976 8.0969C4.32856 10.8671 4.6818 14.5659 7.03367 16.9337C8.34765 18.2566 10.1351 19.0006 11.9997 19.0007Z"
                                                                stroke="black" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path d="M10.9106 10.1636V13.5756H14.1776" stroke="black"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    <p id="hour_content">10:00 صباحا</p>
                                                </div>

                                            </div>
                                        </div>

                                        @if($candidateCourse )
                                                <div class="btn_accept ml-5"><button type="button"
                                                    class="btn btn-primary btn-sm"> تم التسجيل </a></div>
                                                @else
                                                <div class="btn_accept ml-5"><button type="button"
                                                    onclick="performStoreAccept({{ $cou->id }},{{ $candidat->id }})"
                                                    class="btn btn-primary btn-sm"> التسجيل بالدورة </a></div>
                                                @endif
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    @endforeach
                    <!--############# top2 ######### -->


                </div>
            </div>




            <div class="sociel_media">
                <a href="#"> <svg width="44" height="44" viewBox="0 0 44 44" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.5" y="0.5" width="43" height="43" rx="11.5" stroke="#8AB7F4" />
                        <path
                            d="M27.0392 23.3039L27.6625 19.3469H23.8228V16.7748C23.8228 15.6928 24.3588 14.6355 26.073 14.6355H27.8433V11.2659C26.8124 11.1016 25.7707 11.0127 24.7266 11C21.5663 11 19.5031 12.8981 19.5031 16.3296V19.3469H16V23.3039H19.5031V32.875H23.8228V23.3039H27.0392Z"
                            fill="#0063E6" />
                    </svg></a>
                <a href="#"> <svg width="44" height="44" viewBox="0 0 44 44" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.5" y="0.5" width="43" height="43" rx="11.5" stroke="#8AB7F4" />
                        <path
                            d="M22.7218 16.9799C24.4989 16.9799 25.6977 17.7475 26.3812 18.389L29.0521 15.781C27.4117 14.2562 25.277 13.3203 22.7218 13.3203C19.0203 13.3203 15.8236 15.4445 14.2673 18.5362L17.3273 20.9128C18.095 18.6309 20.2191 16.9799 22.7218 16.9799Z"
                            fill="#0063E6" />
                        <path
                            d="M31.8071 22.995C31.8071 22.2168 31.744 21.649 31.6073 21.0601H22.7218V24.5724H27.9374C27.8323 25.4452 27.2644 26.7597 26.0026 27.6431L28.989 29.9566C30.7766 28.3056 31.8071 25.8764 31.8071 22.995Z"
                            fill="#0063E6" />
                        <path
                            d="M17.3378 24.6565C17.138 24.0676 17.0224 23.4367 17.0224 22.7847C17.0224 22.1327 17.138 21.5017 17.3273 20.9128L14.2673 18.5362C13.6259 19.8192 13.2578 21.2598 13.2578 22.7847C13.2578 24.3095 13.6259 25.7502 14.2673 27.0331L17.3378 24.6565Z"
                            fill="#0063E6" />
                        <path
                            d="M22.7217 32.249C25.277 32.249 27.4222 31.4078 28.989 29.9566L26.0026 27.6431C25.2034 28.2004 24.1308 28.5895 22.7217 28.5895C20.219 28.5895 18.0949 26.9385 17.3378 24.6565L14.2778 27.0331C15.8341 30.1248 19.0203 32.249 22.7217 32.249Z"
                            fill="#0063E6" />
                        <path
                            d="M22.464 16.6596C24.2411 16.6596 25.4398 17.4272 26.1233 18.0687L28.7943 15.4607C27.1539 13.9359 25.0192 13 22.464 13C18.7625 13 15.5658 15.1242 14.0095 18.2159L17.0695 20.5925C17.8371 18.3106 19.9613 16.6596 22.464 16.6596Z"
                            fill="#0063E6" />
                        <path
                            d="M31.5493 22.6747C31.5493 21.8965 31.4862 21.3286 31.3495 20.7397H22.4639V24.2521H27.6796C27.5745 25.1249 27.0066 26.4394 25.7448 27.3227L28.7312 29.6363C30.5188 27.9853 31.5493 25.5561 31.5493 22.6747Z"
                            fill="#0063E6" />
                        <path
                            d="M17.08 24.3362C16.8802 23.7473 16.7645 23.1163 16.7645 22.4644C16.7645 21.8124 16.8802 21.1814 17.0695 20.5925L14.0095 18.2159C13.3681 19.4989 13 20.9395 13 22.4644C13 23.9892 13.368 25.4299 14.0095 26.7128L17.08 24.3362Z"
                            fill="#0063E6" />
                        <path
                            d="M22.4639 31.9287C25.0192 31.9287 27.1644 31.0875 28.7312 29.6363L25.7448 27.3227C24.9456 27.8801 23.873 28.2692 22.4639 28.2692C19.9612 28.2692 17.8371 26.6182 17.08 24.3362L14.02 26.7128C15.5763 29.8045 18.7625 31.9287 22.4639 31.9287Z"
                            fill="#0063E6" />
                    </svg></a>
                <a href="#"><svg width="44" height="44" viewBox="0 0 44 44" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.5" y="0.5" width="43" height="43" rx="11.5" stroke="#8AB7F4" />
                        <path
                            d="M17.6348 21.9458C17.6348 19.7467 19.418 17.9635 21.6183 17.9635C23.8185 17.9635 25.6027 19.7467 25.6027 21.9458C25.6027 24.1449 23.8185 25.9281 21.6183 25.9281C19.418 25.9281 17.6348 24.1449 17.6348 21.9458ZM15.4809 21.9458C15.4809 25.3336 18.2286 28.0798 21.6183 28.0798C25.0079 28.0798 27.7556 25.3336 27.7556 21.9458C27.7556 18.558 25.0079 15.8118 21.6183 15.8118C18.2286 15.8118 15.4809 18.558 15.4809 21.9458ZM26.5643 15.5686C26.5642 15.8521 26.6482 16.1293 26.8057 16.3651C26.9632 16.6009 27.1871 16.7847 27.4492 16.8933C27.7112 17.0019 27.9996 17.0304 28.2778 16.9752C28.5561 16.92 28.8117 16.7836 29.0124 16.5832C29.213 16.3828 29.3497 16.1274 29.4052 15.8494C29.4606 15.5713 29.4323 15.2831 29.3239 15.0211C29.2154 14.7591 29.0317 14.5352 28.7959 14.3775C28.5601 14.2199 28.2828 14.1357 27.9992 14.1356H27.9986C27.6183 14.1358 27.2537 14.2868 26.9848 14.5555C26.7159 14.8242 26.5646 15.1885 26.5643 15.5686ZM16.7896 31.6694C15.6243 31.6164 14.9909 31.4224 14.57 31.2585C14.012 31.0413 13.6138 30.7827 13.1952 30.3649C12.7766 29.9471 12.5174 29.5495 12.3012 28.9918C12.1371 28.5713 11.943 27.9381 11.89 26.7734C11.8321 25.5143 11.8205 25.136 11.8205 21.9459C11.8205 18.7558 11.833 18.3786 11.89 17.1184C11.9431 15.9537 12.1386 15.3217 12.3012 14.9C12.5184 14.3423 12.7771 13.9443 13.1952 13.5259C13.6132 13.1075 14.011 12.8485 14.57 12.6324C14.9907 12.4684 15.6243 12.2744 16.7896 12.2214C18.0494 12.1635 18.4279 12.152 21.6183 12.152C24.8087 12.152 25.1875 12.1645 26.4484 12.2214C27.6137 12.2745 28.246 12.4699 28.668 12.6324C29.226 12.8485 29.6242 13.1081 30.0428 13.5259C30.4614 13.9437 30.7196 14.3423 30.9368 14.9C31.1009 15.3205 31.295 15.9537 31.348 17.1184C31.4059 18.3786 31.4175 18.7558 31.4175 21.9459C31.4175 25.136 31.4059 25.5132 31.348 26.7734C31.2949 27.9381 31.0999 28.5711 30.9368 28.9918C30.7196 29.5495 30.4608 29.9475 30.0428 30.3649C29.6248 30.7823 29.226 31.0413 28.668 31.2585C28.2473 31.4225 27.6137 31.6165 26.4484 31.6694C25.1886 31.7273 24.8101 31.7389 21.6183 31.7389C18.4264 31.7389 18.049 31.7273 16.7896 31.6694ZM16.6906 10.0723C15.4182 10.1303 14.5488 10.3319 13.7895 10.6272C13.0031 10.9322 12.3374 11.3413 11.6722 12.0051C11.007 12.6689 10.5987 13.3353 10.2936 14.1212C9.9981 14.8806 9.79634 15.7491 9.7384 17.0208C9.6795 18.2945 9.66602 18.7017 9.66602 21.9458C9.66602 25.1899 9.6795 25.5971 9.7384 26.8708C9.79634 28.1426 9.9981 29.011 10.2936 29.7704C10.5987 30.5559 11.0071 31.223 11.6722 31.8865C12.3373 32.55 13.0031 32.9586 13.7895 33.2644C14.5502 33.5597 15.4182 33.7613 16.6906 33.8193C17.9657 33.8772 18.3724 33.8916 21.6183 33.8916C24.8641 33.8916 25.2716 33.8781 26.546 33.8193C27.8184 33.7613 28.6873 33.5597 29.4471 33.2644C30.233 32.9586 30.8992 32.5503 31.5644 31.8865C32.2296 31.2227 32.637 30.5559 32.943 29.7704C33.2385 29.011 33.4412 28.1425 33.4982 26.8708C33.5561 25.5962 33.5696 25.1899 33.5696 21.9458C33.5696 18.7017 33.5561 18.2945 33.4982 17.0208C33.4402 15.749 33.2385 14.8801 32.943 14.1212C32.637 13.3357 32.2285 12.6699 31.5644 12.0051C30.9002 11.3402 30.233 10.9322 29.4481 10.6272C28.6873 10.3319 27.8183 10.1293 26.5469 10.0723C25.2725 10.0144 24.8651 10 21.6192 10C18.3734 10 17.9657 10.0135 16.6906 10.0723Z"
                            fill="#0063E6" />
                    </svg></a>


            </div>
            <p class="para">جميع الحقوق محفوظة لدي جيا لعام 2024</p>
        </section>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('crudjs/crud.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        function performStoreAccept(course_id, candidatId) {
            let formData = new FormData();
            formData.append('candidat_id', candidatId);
            formData.append('course_id', course_id);
            store('/invitation-v2/addCand', formData)
        }
    </script>
</body>

</html>
