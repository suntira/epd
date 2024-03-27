<link href="{{ asset('css/post_item.css') }}" rel="stylesheet">
<div class="post_container">
    <div class="post_container_content"></div>   
            <p class="post_name">{{$post->name_post}}</p>
        <img class="post_title" src="{{$post->img_title}}">
        <div class="username_cont">
            <p class="post_avtor">Автор:</p>
                <p>{{ $post->users->username }}</p>
        </div>
        <form class="f1_i_p" action="{{route("posts.show", $post->id)}}">
            <button type="submit" class="btn_red">Подробнее</button>
        </form> 
        <form action="#">
            <button type="submit" class="btn_white btn_like">Добавить в избранное</button>
        </form> 
</div>