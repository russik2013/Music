@extends('main')
@section('music')
<div class="content body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page_padding top_offset matchHeight">
                    @if(isset($album))
                    <div class="music">
                        <div class="mobile-filter">
                            <div class="row">
                                <div class="col-lg-5 col-md-7 col-sm-7 col-xs-5">
                                    <div class="mobile-date">
                                        Today, 15:48
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-5 col-sm-5 col-xs-7">
                                    <div class="filter_btn">
                                        <a href="#" class="music_filters">Music&nbsp;Filters</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                <img src="app/img/album_m.png">
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 inf">
                                <h6 class="date">Today, 15:48</h6>
                                <h2 class="name">{{$album -> title}}
                                </h2>
                                <div class="album_info">
                                    <p><span class="category-inf"> Artist:</span> {{$album -> artist}}</p>
                                    <p><span class="category-inf">Title:</span> {{$album -> title}}</p>
                                    <p><span class="category-inf">Year Of Release:</span>{{$album -> year_of_release}}</p>
                                    <p><span class="category-inf">Label: </span>{{$album -> label}}</p>
                                    <p><span class="category-inf">Genre:</span> @foreach($album -> categories as $category){{$category -> categoryName -> name}} @endforeach</p>
                                    <p><span class="category-inf">Quality: </span>{{$album -> quality}}</p>
                                    <p><span class="category-inf">Total Time: </span>{{$album -> total_time}}</p>
                                    <p><span class="category-inf">Total Size: </span>{{$album -> total_size}}</p>
                                    <p><span class="category-inf">WebSite:</span> {{$album -> download_link}}</p>
                                </div>
                                <div class="genres"><span class="category-inf">Genres: </span>
                                    @foreach($album -> categories as $category)
                                        <a href="#">{{$category -> categoryName -> name}} </a> |

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr0 pl0">
                            <p class="info-for-music">
                               {{$album -> description}}
                                <br>
                                Tracklist:
                                <br>
                                {{$album -> tracklist}}
                                <br>
                                <br>
                                ************************<br>
                                Greg Dulli – vocals, rhythm guitar<br>
                                Rick McCollum – lead guitar<br>
                                John Curley – bass<br>
                                Steve Earle – drums<br>
                                Harold Chichester – piano, mellotron<br>
                                Barb Hunter – cello<br>
                                Marcy Mays – vocals on "My Curse"<br>
                                Jody Stephens – back vocals on "Now You Know"<br>
                            </p>
                            <div class="download_wrapper">
                                <a href="#"><span>Download</span></a>
                            </div>
                        </div>
                    </div>
                    @else
                        <h1>ТАКОЙ АЛЬБОМ НЕ НАЙДЕН</h1>
                    @endif
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="popular_album">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <h4 class="title">popular album</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="album_wrapper">
                                            <a href="#"><img src="app/img/logo-album-1.png"></a>
                                            <h2 class="album_title">B-Sides</h2>
                                            <h3 class="description">INot Your Dope ndestructible
                                                (feat. MAX) [B-Sides Remix]</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="album_wrapper">
                                            <a href="#"><img src="app/img/logo-album-2.png"></a>
                                            <h2 class="album_title">Trap Nation</h2>
                                            <h3 class="description">Jordan Comolli Bang</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="album_wrapper">
                                            <a href="#"><img src="app/img/logo-album-3.png"></a>
                                            <h2 class="album_title">TYPE 91</h2>
                                            <h3 class="description">Voliik Born</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="album_wrapper">
                                            <a href="#"><img src="app/img/logo-album-3.png"></a>
                                            <h2 class="album_title">TYPE 91</h2>
                                            <h3 class="description">Voliik Born</h3>
                                        </div>
                                    </div>
                                </div>
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