<div id="content" class="col-md-12 ">
    {{-- Likes Counter --}}
    <span id="counter{{$post->id}}">{{count($post->likes)}}</span>&nbsp
    {{-- Liked users thumbnail --}}
    @foreach($post->likes()->orderBy('created_at', 'desc')->limit(3)->get() as $likes)
        <img style="width:10%" src="/storage/image/{{$likes->user->getActualProfileImage()}}" />
    @endforeach

    {{-- Array of users id who liked the post --}}
    <?php $ids = [];?>
    @foreach($post->likes as $like)
        <?php array_push($ids, $like->user_id);?>
    @endforeach
    {{-- Check if Auth user liked the post. If true: show unlike, else: show like --}}
    @if(in_array(Auth::user()->id, $ids))
        <button id="{{$post->id}}" name="btn" value="unlike" type="submit" class="btn btn-default btn-xs">
            <span style="font-size: 10px;" class="material-icons">thumb_down</span>
            Unlike
        </button>
    @else
        <button id="{{$post->id}}" name="btn" value="like" type="submit" class="btn btn-default btn-xs">
            <span style="font-size: 10px;" class="material-icons">thumb_up</span>
            Like
        </button>
    @endif

</div>

<script type="text/javascript">
    $(document).ready(function() {

        $("#{{$post->id}}").click(function(){
            let user_id = {{Auth()->user()->id}};
            let post_id = {{$post->id}};
            let value = $('#{{$post->id}}').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: '../../likes/choose',
                data: {user_id: user_id, post_id: post_id, value: value},
                success: function(response) {
                    let images = '';
                    for(let i = 0; i < (response.images).length; i++){
                        images += `
                            <img style="width:10%" src="/storage/image/${response.images[i]}" />
                        `
                    }

                    let button = `
                        <button id="{{$post->id}}" name="btn" value="like" type="submit" class="btn btn-default btn-xs">
                            <span style="font-size: 10px;" class="material-icons">thumb_up</span>
                            Like
                        </button>
                    `

                    $('#content').html(`
                        <span id="counter">${response.amount}</span>&nbsp
                        ${images} ${button}

                    `);

                }
            });
        });
    });
</script>
