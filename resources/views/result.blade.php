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


                                @for($i = 0; $i < count($albumsArray['data']); $i ++)

                                    @if($i % 4 == 0)
                                        <div class="row">
                                        @endif


                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="album_wrapper">
                                            <a href="#"><img src="app/img/logo-album-1.png"></a>
                                            <h2 class="album_title"> {{$albumsArray['data'][$i]['title']}}</h2>
                                            <h3 class="description">INot Your Dope ndestructible
                                                (feat. MAX) [B-Sides Remix]</h3>
                                        </div>
                                    </div>

                                    @if(($i + 1) % 4 == 0 || ($i + 1) == count($albumsArray['data']))
                                        </div>
                                        @endif


                                @endfor



                                {{$albums -> links()}}
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
                        <ul>
                            <li>
                                <a href="#">Blues</a>
                            </li>
                            <li>
                                <a href="#">Classical Music</a>
                            </li>
                            <li>
                                <a href="#">Country</a>
                            </li>
                            <li class="has_submenu">
                                <a href="#">
                                    Electronic
                                    <button class="sub_menu_activator"></button>
                                </a>
                                <ul class="sub_menu">
                                    <li>
                                        <a href="#">Ambient</a>
                                    </li>
                                    <li class="has_submenu">
                                        <a href="#">Dance
                                            <button class="sub_menu_activator"></button>
                                        </a>
                                        <ul class="sub_menu">
                                            <li>
                                                <a href="#">Eurodance</a>
                                            </li>
                                            <li>
                                                <a href="#">Disco</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="has_submenu">
                                        <a href="#">Downtempo
                                            <button class="sub_menu_activator"></button>
                                        </a>
                                        <ul class="sub_menu">
                                            <li>
                                                <a href="#">Lounge</a>
                                            </li>
                                            <li>
                                                <a href="#">Lo-Fi</a>
                                            </li>
                                            <li>
                                                <a href="#">Trip-Hop</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Hardcore</a>
                                    </li>
                                    <li class="has_submenu">
                                        <a href="#">House
                                            <button class="sub_menu_activator"></button>
                                        </a>
                                        <ul class="sub_menu">
                                            <li>
                                                <a href="#">Deep House</a>
                                            </li>
                                            <li>
                                                <a href="#">Minimal House</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">New Age</a>
                                    </li>
                                    <li>
                                        <a href="#">Techno</a>
                                    </li>
                                    <li class="has_submenu">
                                        <a href="#">Trance
                                            <button class="sub_menu_activator"></button>
                                        </a>
                                        <ul class="sub_menu">
                                            <li>
                                                <a href="#">Psychedelic</a>
                                            </li>
                                            <li>
                                                <a href="#">Progressive</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="has_submenu">
                                        <a href="#">Garage
                                            <button class="sub_menu_activator"></button>
                                        </a>
                                        <ul class="sub_menu">
                                            <li>
                                                <a href="#">Dubstep/Grime</a>
                                            </li>
                                            <li>
                                                <a href="#">UK Funky/2 Step</a>
                                            </li>
                                            <li>
                                                <a href="#">Breakbeat</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Funk</a>
                            </li>
                            <li>
                                <a href="#">Hip-Hop</a>
                            </li>
                            <li class="has_submenu">
                                <a href="#">Jazz
                                    <button class="sub_menu_activator"></button>
                                </a>
                                <ul class="sub_menu">
                                    <li>
                                        <a href="#">Nu Jazz</a>
                                    </li>
                                    <li>
                                        <a href="#">Smooth Jazz</a>
                                    </li>
                                    <li>
                                        <a href="#">Bossa Nova</a>
                                    </li>
                                    <li>
                                        <a href="#">Vocal Jazz</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Instrumental</a>
                            </li>
                            <li>
                                <a href="#">Pop</a>
                            </li>
                            <li>
                                <a href="#">R&B</a>
                            </li>
                            <li>
                                <a href="#">Reggae</a>
                            </li>
                            <li class="has_submenu">
                                <a href="#">Rock
                                    <button class="sub_menu_activator"></button>
                                </a>
                                <ul class="sub_menu">
                                    <li>
                                        <a href="#">Alternative</a>
                                    </li>
                                    <li>
                                        <a href="#">Indie</a>
                                    </li>
                                    <li>
                                        <a href="#">Metal</a>
                                    </li>
                                    <li>
                                        <a href="#">Punk</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Soul</a>
                            </li>
                            <li>
                                <a href="#">Soundtrack</a>
                            </li>
                            <li class="has_submenu">
                                <a href="#">World
                                    <button class="sub_menu_activator"></button>
                                </a>
                                <ul class="sub_menu">
                                    <li>
                                        <a href="#">German</a>
                                    </li>
                                    <li>
                                        <a href="#">Latin</a>
                                    </li>
                                    <li>
                                        <a href="#">Celtic</a>
                                    </li>
                                    <li>
                                        <a href="#">Ethnic</a>
                                    </li>
                                    <li>
                                        <a href="#">Japanese</a>
                                    </li>
                                    <li>
                                        <a href="#">French</a>
                                    </li>
                                    <li>
                                        <a href="#">Folk</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Oldies</a>
                            </li>
                            <li>
                                <a href="#">Easy Listening</a>
                            </li>
                            <li><a href="#">XMAS abd Holiday</a>
                            </li>
                        </ul>
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