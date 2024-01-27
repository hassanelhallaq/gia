@extends('invitation.master')
@section('content')
    <section>
        <div class="wrap">
            <div class="container_cards">

                <div class="card">
                    <div>
                        <div class="card_title">
                            <p>الاختبار القبلى</p>
                        </div>


                        @if ($course->status_befor == 'InActive')
                            <div class="card_text not">
                                <span data-translate="not_submit"> لا يوجد اختبار</span>
                            </div>
                        @endif

                        @if ($quizAtten == null && $course->status_befor != 'InActive')
                            <div class="card_text">
                                <a data-translate="submit">
                                    الرجاء تقديم الاختبار
                                </a>
                            </div>
                        @elseif($course->status_befor != 'InActive')
                            <div class="card_text">

                                <a data-translate="submit">
                                    تم تقديم الاختبار
                                </a>
                            </div>
                        @endif


                    </div>

                    @if ($quizAtten == null)
                        @if ($course->status_befor == 'active')
                            @if ($quiz->quiz->how_attend = 'questions')
                                <div class="card_icon"><a
                                        href="{{ route('quiz.view', ['quizId' => $quiz->quiz_id, 'clientId' => $attendance->id]) }}"
                                        data-translate="submit">&#10140; </a>
                                @elseif($quiz->quiz->how_attend = 'link')
                                    <div class="card_icon"><a href="{{ $quiz->quiz->link }}"
                                            data-translate="submit">&#10140;
                                        </a>
                                    @else
                                        <div class="card_icon"><a href="https://shorturl.at/osyB0 "
                                                data-translate="submit">&#10140; </a>
                            @endif
                        @endif
                    @endif
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="card_title">
                        <p>الاختبار البعدي</p>
                    </div>
                    @if ($course->status_after == 'InActive')
                        <div class="card_text not">
                            <span data-translate="not_submit"> لا يوجد اختبار</span>
                        </div>
                    @endif

                    @if ($quizAttenAfter == null && $course->status_after != 'InActive')
                        <div class="card_text">
                            <a data-translate="submit">
                                الرجاء تقديم الاختبار
                            </a>
                        </div>
                    @elseif($course->status_after != 'InActive')
                        <div class="card_text">

                            <a data-translate="submit">
                                تم تقديم الاختبار
                            </a>
                        </div>
                    @endif
                </div>
                @if ($quizAttenAfter == null)
                    @if ($course->status_after == 'active')
                        @if ($quizAfter->quiz->how_attend = 'questions')
                            <div class="card_icon"><a
                                    href="{{ route('quiz.view', ['quizId' => $quizAfter->quiz_id, 'clientId' => $attendance->id]) }}"
                                    data-translate="submit">&#10140; </a>
                            @elseif($quizAfter->quiz->how_attend = 'link')
                                <div class="card_icon"><a href="{{ $quizAfter->quiz->link }}"
                                        data-translate="submit">&#10140;
                                    </a>
                        @endif
                    @else

                    @endif
                @endif
            </div>
        </div>
        <div class="card">
            <div>
                <div class="card_title">
                    <p> الحصول على شهادة </p>
                </div>
               @if($attendance)
                @if ($attendance->email == null)
                <div class="card_text">
                    <a data-translate="submit">
                        لم يتم تقديم النموذج
                    </a>
                </div>
            @elseif($attendance->email != null)
                <div class="card_text">

                    <a data-translate="submit">
                        تم تقديم النموذج
                    </a>
                </div>
            @endif
            @endif
            </div>
             @if($attendance)
            @if($attendance->email == null)
            <div class="card_icon"> <a
                    href="{{ route('Certificate_Issuance_form', [$attendance->id, request()->course_id]) }}"
                    data-translate="submit">&#10140; </a></div>
            @endif
            @endif
        </div>

        <div class="btn_links">
            <a data-translate="show_results"
                href="{{ route('invitation.second', [$attendance->id, request()->course_id]) }}"><i
                    class="bi bi-arrow-right tx-white"></i> الرجوع الى الرئيسية </a>
            <a class="btn_primery @if ($course->status_interactive == 'InActive') disable @endif"
                    href="{{ route('rate.attend', [$attendance->id, request()->course_id]) }}"
                data-translate="contact_coach"><i class="bi bi-star tx-white"></i> تقييم الحدث </a>
        </div>


        </div>

    </section>
@endsection
