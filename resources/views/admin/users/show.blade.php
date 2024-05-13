 @extends('layout.admin')
@section('title', 'Профиль.Просмотр')
@section('content')
<div class="container">
    <div class="admin-section">
        
      <div class="profile">
        <a  href="{{ route('admin.users.index') }}" class="btn_back like"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"><path fill="currentColor" d="m4 10l-.354.354L3.293 10l.353-.354zm16.5 8a.5.5 0 0 1-1 0zM8.646 15.354l-5-5l.708-.708l5 5zm-5-5.708l5-5l.708.708l-5 5zM4 9.5h10v1H4zM20.5 16v2h-1v-2zM14 9.5a6.5 6.5 0 0 1 6.5 6.5h-1a5.5 5.5 0 0 0-5.5-5.5z"/></svg></a>
      <div class="profile_cont">
        <div class="img-line">
          <div class="line"></div>
          <img src="{{$user->getImageURL()}}" alt="" class="img_profile">
        </div>
        <div class="cont_des">
            <div class="des profile__des">
                <p class="p_des">Имя:</p>
                <p class="p_name1"> {{ $user->name}}</p>
               </div>
               <div class="des profile__des">
                 <p class="p_des">Ник:</p>
                 <p class="p_name1"> {{ $user->username }}</p>
                </div>
                <div class="des profile__des">
                 <p class="p_des">О Себе:</p>
                 <p class="p_name1"> {{ $user->bio}}</p>
                </div>
                <div class="des profile__des">
                 <p class="p_des">Роль:</p>
                 <p class="p_name1"> {{ $user->role->type }}</p>
                </div>
            </div>
           </div>
        </div>
      </div>
    </div>
</div>
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
 @endsection