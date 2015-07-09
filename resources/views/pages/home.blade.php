@extends('app')
@section('title') Home :: @parent @stop
@section('content')
<!--<div class="col-md-8">-->
<div class="row mainColumn">
    <div class="title-box-left">
        <hgroup>
            <h1><a href="#">Nieuws</a></h1>
        </hgroup>
    </div>

    @if(count($articles)>0)

            @foreach ($articles as $post)
                
                    <a href="{{URL::to('news/'.$post->id.'')}}" class="post box1">
						<img src="http://www.lansalotlan.be/wp-content/uploads/2015/02/speedlink.jpg" alt="HearthStone gesponsord door Speedlink!">
                    <div>Sponsors<span>{!! $post->created_at !!}</span></div>
					<div class="h2">{!!$post->title !!}</div>
					</a>
                
            @endforeach

    @endif

    @if(count($photoAlbums)>0)
        <div class="row">
            <h2>Photos</h2>
            @foreach($photoAlbums as $item)
                <div class="col-sm-3">
                    <div class="row">
                        <a href="{{URL::to('photo/'.$item->id.'')}}"
                           class="hover-effect"> @if($item->album_image!="")
                                <img class="col-sm-12"
                                        src="{!!'appfiles/photoalbum/'.$item->folder_id.'/thumbs/'.$item->album_image !!}">
                            @elseif($item->album_image_first!="")
                                <img class="col-sm-12"
                                     src="{!!'appfiles/photoalbum/'.$item->folder_id.'/thumbs/'.$item->album_image_first !!}">
                            @else
                                <img class="col-sm-12" src="{!!'img/default-image.jpg' !!}">
                            @endif
                        </a>

                        <div class=" col-sm-12">{!!$item->name!!}</div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @if(count($videoAlbums)>0)
        <div class="row">
            <h2>Videos</h2>
            @foreach($videoAlbums as $item)
                <div class="col-sm-3">
                    <div class="row">
                        <a href="{{URL::to('video/'.$item->id.'')}}">
                            @if($item->album_image!="")
                                <img class="col-sm-12"
                                     src="{{{'http://img.youtube.com/vi/'.$item->album_image.'/hqdefault.jpg' }}}">
                            @elseif($item->album_image_first!="")
                                <img class="col-sm-12"
                                     src="{{{'http://img.youtube.com/vi/'.$item->album_image_first.'/hqdefault.jpg' }}}">
                            @else
                                <img class="col-sm-12" src="{{'img/default-image.jpg' }}">
                            @endif
                        </a>

                        <div class=" col-sm-12">{!!$item->name!!}</div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div><!--</div>-->
@endsection

@section('scripts')
    @parent
    <script>
        $('#myCarousel').carousel({
            interval: 4000
        });
    </script>
@endsection
@stop
