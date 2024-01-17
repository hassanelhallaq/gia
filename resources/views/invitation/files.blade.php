@extends('invitation.master')
@section('content')
<section>
    <div class="wrap">
      <div class="container_cards">
        @if($attendance->certficate)
        <div class="card">
            <div>
              <div class="card_title">
                <p>شهاده</p>
              </div>
              <div class="card_text not">
                {{-- <span  data-translate="not_submit">{{$item->type}} </span> --}}
              </div>
            </div>
            <div class="card_icon"><a href="{{asset($attendance->certficate)}}"  data-translate="submit" download>&#10140;  </a></div>
          </div>
          @endif
        @foreach ($files as $item)
        <div class="card">
          <div>
            <div class="card_title">
              <p>{{$item->name}}</p>
            </div>
            <div class="card_text not">
              <span  data-translate="not_submit">{{$item->type}} </span>
            </div>
          </div>
          <div class="card_icon"><a href="{{asset($item->file)}}"  data-translate="submit" download>&#10140;  </a></div>
        </div>
        @endforeach
        @foreach ($links as $item)
        <div class="card">
          <div>
            <div class="card_title">
              <p>{{$item->name}}</p>
            </div>
            <div class="card_text not">
              {{-- <span  data-translate="not_submit">{{$item->type}} </span> --}}
            </div>
          </div>
          <div class="card_icon"><a href="{{($item->link)}}" target="_blank"  data-translate="submit">&#10140;  </a></div>
        </div>
        @endforeach
      </div>
      <div class="btn_links">
        <a  data-translate="show_results" href="{{ route('invitation.second',[$attendance->id,request()->course_id]) }}"><i class="bi bi-arrow-right tx-white"></i> الرجوع الى الرئيسية </a>
      </div>
    </div>
  </section>
@endsection
