 @extends('layout.app')
@section('title', 'Профиль')
@section('content')
@include('partials.header')
<div class="container">
    <div class="section">
      <div class="profile">
      <div class="profile_cont">
        <div class="img-line">
          <div class="line"></div>
          <img src="{{$user->getImageURL()}}" alt="" class="img_profile">
        </div>
        <div class="cont_des">
           <div class="des profile__des">
             <p class="p_des">Ник:</p>
             <p class="p_name2"> {{ $user->username }}</p>
            </div>
            <div class="des profile__des">
             <p class="p_des">О Себе:</p>
             <p class="p_name2"> {{ $user->bio}}</p>
            </div>
           </div>
        </div>
      </div>
         @if( $user->role_id === 2)
         <p class="post-name">Уроки автора:</p>
         <div class="profile_post_cont">
            @if ($randomPosts->isNotEmpty())
            <div class="profile_post_cont">
                @foreach($randomPosts as $post)
                @include("posts.partials.item", ["post" => $post])
                 @endforeach
               </div>
           @else
           <p class="p_not_found">у Автора нет уроков</p>
           @endif
         </div>
            @endif
    </div>
</div>
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@include('partials.footer')
 @endsection