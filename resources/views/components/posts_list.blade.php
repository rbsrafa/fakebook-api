<div class="col-md-12">
    @if(count($data['posts']) > 0)
        @foreach($data['posts'] as $post)
            @include('components.post_panel')
        @endforeach
    @else
        <div class="panel panel-default">
            <div class="panel-body">
                <span>No Posts found!</span>
            </div>
        </div>
    @endif
</div>

<script>
    function areYouSure(){
        let answer = confirm('Are you sure?');
        if(answer){return true;}
        else{return false;}
    }
</script>
