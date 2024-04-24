<link href="{{ asset('css/post_item.css') }}" rel="stylesheet">
<div class="post_container">
    <div class="post_container_content"></div>   
            <p class="post_name">{{$post->name_post}}</p>
        <img class="post_title" src="{{ asset('storage/' . $post->img_title) }}">
        <form class="f1_i_p" action="{{route("posts.show", $post->id)}}">
            <button type="submit" class="btn_red">Подробнее</button>
        </form> 
        @if( $post->status_id === 2)
        <form class="f1_i_p" action="">
            <button type="submit" class="btn_white btn_like">Редактировать</button>
        </form> 
        @endif
        <p class="p_status">{{$post->statuses->name}}</p>
</div>