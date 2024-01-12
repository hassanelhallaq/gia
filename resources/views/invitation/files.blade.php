@extends('invitation.master')
@section('content')
<section>
    <div class="wrap">
      <div class="container_cards">

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
          <div class="card_icon"><a href="{{asset($item->file)}}"  data-translate="submit">&#10140;  </a></div>
        </div>
        @endforeach

      </div>
      <div class="btn_links">
        <a  data-translate="show_results" href="#"><i class="bi bi-arrow-right tx-white"></i> الرجوع الى الرئيسية </a>
        <button class="btn_primery"  data-translate="contact_coach" disabled><i class="bi bi-star tx-white"></i> تقييم المدرب </button>
      </div>
    </div>
  </section>
@endsection
