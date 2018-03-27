<?php

namespace App\Http\Controllers;

use App\Album;
use App\Category;
use App\CategoryAlbum;
use App\Type;
use App\TypeAlbum;
use App\User;

use Carbon\Carbon;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function index(){

        $user = User::find(1);
        dd($user -> handleAdmin());

    }

    public function testHtmlParse(){

        $html = new \Htmldom('https://www.israbox.live/index.php?newsid=3137630403');



        //////////////////////////////////// Take Name//////////////

        $albumName = $html->find('div.story h1',0)->innertext;

        ////////////////////////////////////////////////////////////



        ////////////////////////////////////Take categories and types/////////////////////////////////////

        $categoryNames = [];
        $typesNames = [];

        foreach ($html->find('dt.end a') as $item){

            $category = Category::where('name', 'like', '%'.$item->innertext.'%') -> first();

            if($category)

                $categoryNames[] = $category -> id;

            else{

                $explode = explode('&amp;', $item->innertext);

                if(isset($explode[1])){

                    $searchWord = implode('&', $explode);

                }else

                    $searchWord = $item->innertext;

                $type = Type::where('name', 'like', '%'.strtoupper($searchWord).'%') -> first();

                if($type){

                    $typesNames[] = $type -> id;

                }

            }
            //dump($item->innertext);
        }

       // dd($categoryNames, $typesNames); // идишники категорий и типов для альбома из нашей базы
/////////////////////////////////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////Загрузка картинки///////////////////////////////////////
        $imageURL = $html->find('div[itemprop=thumbnailUrl] img', 0)->src;


        $path = 'https://www.israbox.live'.$imageURL;

        //dd($imageURL);

        $filename = basename($path);

        $image = file_get_contents($imageURL);

        $imageName = Carbon::now();

        file_put_contents('images/albums/album_image_' .$imageName.'.jpg', $image);
//////////////////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////Имя автора//////////////////////////////////////////
        $author = $html->find('span[itemprop="author"]', 0) -> innertext;
////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////Название///////////////////////////////////////////
        $title = $html->find('span[itemprop="name"]', 0) -> innertext;
////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////Год релиза////////////////////////////////////////////
        $yearOfRelease = explode(' ',$html->find('span[itemprop="releasedEvent"]', 0) -> innertext);
        $yearOfRelease = $yearOfRelease[0];

/////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////Лейбел////////////////////////////////////////////
        $label =$html->find('span[itemprop="producer"]', 0) -> innertext;

/////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////Качество////////////////////////////////////////////
        $quality =$html->find('span[itemprope="quality"]', 0) -> innertext;
/////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////Время и размер альбома////////////////////////////////////////////
        $timeAndSizeFinder = $html->find('div[itemscope]',0)-> outertext;

        $parseAll = explode('<b>',$timeAndSizeFinder);

        $parseTime = explode('</b>: ',$parseAll[7]);
        $finalTime = explode('<br/>', $parseTime[1]);

        $parseSize = explode('</b>: ',$parseAll[8]);
        $finalSize = explode('<br/>', $parseSize[1]);

        //dd($finalTime[0],$finalSize[0]);
/////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////Описание альбома////////////////////////////////////////////
        $descriptionParseToDataBase = $html->find('div.quote',0)-> innertext;


/////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////Список треков альбома////////////////////////////////////////////
        $descriptionParse = $html->find('span[itemprop="description"]',0)-> innertext;

        $trackListParse = explode('<br><br><br>',$descriptionParse);

        $trackList = explode('<br><br>',$trackListParse[1]);

        $finalTrackList = explode('*', $trackList[1]);

        $trackListToDataBase = $finalTrackList[0];

/////////////////////////////////////////////////////////////////////////////////////////////

      $album = new Album();

      $album -> fill([

          'title' => $title,
          'artist' => $author,
          'image' => 'images/albums/album_image_' .$imageName.'.jpg',
          'year_of_release' => $yearOfRelease,
          'tracklist' => $trackListToDataBase,
          'description' => $descriptionParseToDataBase,
          'label' => $label,
          // 'genre' => ,
          'quality' => $quality,
          'total_time' => $finalTime[0],
          'total_size' => $finalSize[0],
          //     'download_link',
          'show_in_slider' => 0
          //    'big_image'
      ]);

      $album -> save();


     // dd($categoryNames);

      $inserCategoryMass = [];
      foreach ($categoryNames as $item){

          $inserCategoryMass[] = ['album_id' => $album -> id, 'category_id' => $item,];

      }

      CategoryAlbum::insert($inserCategoryMass);


      $inserTypeMass = [];
      foreach ($typesNames as $type){

          $inserTypeMass[] = ['album_id' => $album -> id, 'type_id' => $type];

      }

      TypeAlbum::insert($inserTypeMass);

        dd('russik');


        //return view('test',compact('trackListToDataBase'));



        dd(explode('<br><br>',$trackList[0]));



        dd('russik');

        foreach($html->find('h1') as $element)

            dd($element->href);
            //echo $element->href . '<br>';

    }

}
