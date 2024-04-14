<link href="{{ asset('css/post_item.css') }}" rel="stylesheet">
<div class="post_container">
    <div class="post_container_content"></div>   
            <p class="post_name">{{$post->name_post}}</p>
        <img class="post_title" src="{{$post->img_title}}">
        <div class="username_cont">
            <p class="post_avtor">Автор:</p>
                <a class="p_avtor" href="{{ route('user.usershow', ['id' => $post->users->id]) }}">{{ $post->users->username }}</a>
        </div>
        <form class="f1_i_p" action="{{route("posts.show", $post->id)}}">
            <button type="submit" class="btn_red">Подробнее</button>
        </form> 
        <form action="{{route("posts.like", $post->id)}}" method="post">
            @csrf
            @auth
            @if(auth()->user()->favorites->contains($post->id))
            <button type="submit" class="btn_white btn_like">Убрать из избранного</button>
            @else
            <button type="submit" class="btn_white btn_like">Добавить в избранное</button>
            @endif
            @endauth
        </form> 
</div>