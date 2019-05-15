<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Album</h3>
        </div>

        <div class="panel-body">
            @if(count($data['images']) > 0)
                <div class="jumbotron col-xs-12" style="background:#fff">
                @foreach($data['images'] as $type)
                    @foreach($type as $image)
                            <img style="height:15vh; width:15vhpx; padding:5px" src="/storage/image/{{$image->filename}}" />
                    @endforeach
                @endforeach
                </div>
            @else
                Sorry, pictures found.
            @endif
        </div>

        <div class="panel-footer">

        </div>
    </div>
</div>
