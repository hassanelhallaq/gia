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
                        <div class="card_text">
                            <a data-translate="submit">
                                الرجاء تقديم الاختبار
                                {{-- @if ($quizAtten)
                تم التقديم
                @else
               لم يقدم
                @endif --}}
                            </a>
                        </div>
                    </div>
                    {{-- @if ($quizAtten == null) --}}
                    {{-- <div class="card_icon"><a href="{{route('quiz.view',['quizId'=>$quiz->quiz_id,'clientId'=>$attendance->id])}}"  data-translate="submit">&#10140;  </a> --}}
                    {{-- <div class="card_icon"><a href="https://shorturl.at/osyB0 "  data-translate="submit">&#10140;  </a> --}}
                    {{-- @endif --}}
                    @if ($quizAtten == null)
                        @if ($course->status_befor == 'active')
                            @if ($quiz->how_attend = 'questions')
                                <div class="card_icon"><a
                                        href="{{ route('quiz.view', ['quizId' => $quiz->quiz_id, 'clientId' => $attendance->id]) }}"
                                        data-translate="submit">&#10140; </a>
                                @elseif($quiz->how_attend = 'link')
                                    <div class="card_icon"><a href="{{ $quiz->link }}" data-translate="submit">&#10140;
                                        </a>
                                    @else
                                        <div class="card_icon"><a href="https://shorturl.at/osyB0 "
                                                data-translate="submit">&#10140; </a>
                            @endif
                        @else
                            <div class="card_text not">
                                <span data-translate="not_submit"> غير متوفر الان </span>
                            </div>
                        @endif
                    @endif
                </div>
            </div>

            {{-- <div class="card">
                <div>
                    <div class="card_title">
                        <p>التكليف </p>
                    </div>
                    <div class="card_text not">
                        <span data-translate="not_submit"> غير متوفر الان </span>
                    </div>
                </div>
                <div class="card_icon">&#10140;</div>

            </div> --}}
            {{-- <div class="card">
                <div>
                    <div class="card_title">
                        <p>الاختبار التفاعلي</p>
                    </div>

                    <div class="card_text not">
                        <span data-translate="not_submit"> غير متوفر الان </span>
                    </div>
                </div>
                <div class="card_icon">&#10140;</div>
            </div> --}}
            <div class="card">
                <div>
                    <div class="card_title">
                        <p>الاختبار البعدي</p>
                    </div>
                    <div class="card_text not">
                        <span data-translate="not_submit"> غير متوفر الان </span>
                    </div>
                </div>
                @if ($quizAtten == null)
                    @if ($course->status_after == 'active')
                        @if ($quizAfter->how_attend = 'questions')
                            <div class="card_icon"><a
                                    href="{{ route('quiz.view', ['quizId' => $quizAfter->quiz_id, 'clientId' => $attendance->id]) }}"
                                    data-translate="submit">&#10140; </a>
                            @elseif($quizAfter->how_attend = 'link')
                                <div class="card_icon"><a href="{{ $quizAfter->link }}" data-translate="submit">&#10140; </a>
                                @else
                                    <div class="card_icon"><a href="https://shorturl.at/osyB0 "
                                            data-translate="submit">&#10140; </a>
                        @endif
                    @else
                        <div class="card_text not">
                            <span data-translate="not_submit"> غير متوفر الان </span>
                        </div>
                    @endif
                @endif


            </div>



            <div class="card">
                <div>
                    <div class="card_title">
                        <p> الحصول علي شهادة </p>

                    </div>


                    <div class="card_text not">
                        <span data-translate="not_submit"> غير متوفر الان </span>
                    </div>
                </div>
                <div class="card_icon">  <a href="{{ route('Certificate_Issuance_form', [$attendance->id, request()->course_id]) }}" data-translate="submit">&#10140; </a></div>
            </div>
            {{-- <div class="card">
                <div>
                    <div class="card_title">
                        <p>الاختبار البعدي</p>
                    </div>

                </div>

                <div class="card_icon">
                    &#10140;
                </div>

                @if ($quizAtten == null)
                    @if ($course->status_after == 'active')
                        @if ($quizAfter->how_attend = 'questions')
                            <div class="card_icon"><a
                                    href="{{ route('quiz.view', ['quizId' => $quizAfter->quiz_id, 'clientId' => $attendance->id]) }}"
                                    data-translate="submit">&#10140; </a>
                            @elseif($quizAfter->how_attend = 'link')
                                <div class="card_icon"><a href="{{ $quizAfter->link }}" data-translate="submit">&#10140; </a>
                                @else
                                    <div class="card_icon"><a href="https://shorturl.at/osyB0 "
                                            data-translate="submit">&#10140; </a>
                        @endif
                    @else
                        <div class="card_text not">
                            <span data-translate="not_submit"> غير متوفر الان </span>
                        </div>
                    @endif
                @endif

            </div> --}}

            <div class="btn_links">
                <a data-translate="show_results"
                    href="{{ route('invitation.second', [$attendance->id, request()->course_id]) }}"><i
                        class="bi bi-arrow-right tx-white"></i> الرجوع الى الرئيسية </a>
                <a class="btn_primery disabled" href="{{ $course->rate }}" data-translate="contact_coach"><i
                        class="bi bi-star tx-white"></i> تقييم المدرب </a>
            </div>
        </div>


        </div>

    </section>
@endsection
