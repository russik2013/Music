@extends('main')
@section('result')
<div class="content body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page_padding top_offset matchHeight">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="results">
                                <div class="row">
                                    <div class="results_comp">
                                        <div class="col-lg-12 col-md-12 col-sm-12 xol-xs-12">
                                            <h4 class="title">results</h4>
                                        </div>
                                    </div>
                                    <div class="mobile_title">
                                        <div class="col-lg-5 col-md-7 col-sm-7 col-xs-7">
                                            <h5 class="title">results</h5>
                                        </div>
                                        <div class="col-lg-7 col-md-5 col-sm-5 col-xs-5">
                                            <div class="filter_btn">
                                                <a href="#" class="music_filters">Music Filters</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--{{dd($error)}}--}}

                                @if(!isset($error))
                                    @for($i = 0; $i < count($albumsArray['data']); $i ++)

                                        @if($i % 4 == 0)
                                            <div class="row">
                                            @endif


                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="album_wrapper">
                                                <a href="#"><img src="app/img/logo-album-1.png"></a>
                                                <h2 class="album_title"> {{$albumsArray['data'][$i]['title']}}</h2>
                                                <h3 class="description">{{$albumsArray['data'][$i]['artist']}}</h3>
                                            </div>
                                        </div>

                                        @if(($i + 1) % 4 == 0 || ($i + 1) == count($albumsArray['data']))
                                            </div>
                                            @endif


                                    @endfor

                                    {{$albums -> links()}}
                                @else

                                    <h1>OH FUCK</h1>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 pr0 sidebar_wrapper">
                <div class="sidebar matchHeight">
                    <h6 class="title">
                        Music Genres
                        <a href="#" class="close_sidebar"></a>
                    </h6>
                    <div class="sidebar_menu">
                        @include('category_filter')

                    </div>
                    <div class="calendar">
                        <div class="title">
                            Calendar
                        </div>
                        <div id="datepicker"></div>
                    </div>
                    <div class="info">
                        <div class="title">Information</div>
                        <div class="text">Разнообразный и богатый опыт начало
                            повседневной работы по формированию
                            позиции позволяет выполнять важные
                            задания по разработке соответствующий
                            условий активизации. Не следует, однако
                            забывать, что дальнейшее развитие
                            различных форм деятельности
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
@endsection