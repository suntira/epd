<link href="{{ asset('css/post_item.css') }}" rel="stylesheet">
<div class="post_container">
    <div class="post_container_content"></div>   
            <p class="post_name">{{$post->name_post}}</p>
        <img class="post_title" src="{{ asset('storage/' . $post->img_title) }}">
         <div class="username_cont">
            <p class="post_avtor">Автор:</p>
                <a class="p_avtor" href="{{ route('user.usershow', ['id' => $post->users->id]) }}">{{ $post->users->username }}</a>
        </div>
        <form class="f1_i_p" action="{{route("posts.showedit", $post->id)}}">
            <button type="submit" class="btn_red">Подробнее</button>
        </form> 
        {{-- <form  class="f1_i_p"  action="{{ route('posts.destroy', $post) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"  class="btn_white btn_like">Удалить</button>
        </form> --}}
        <p class="p_status">{{$post->statuses->name}}</p>
</div>