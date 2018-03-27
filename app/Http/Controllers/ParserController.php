<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function index(){


        //dd(file_get_contents(base_path().'/'."cookie.txt"));

        // URL скрипта авторизации
        $login_url = 'https://turbobit.net/user/login';
        //$login_url = 'https://turbobit.net/user/login';

// параметры для отправки запроса - логин и пароль
        //$post_data = 'login=maxhydra@hotmail.com&pass=kamatoz2014';
        $post_data = array('user:login'=>'maxhydra@hotmail.com', 'user:pass'=>'kamatoz2014');

// создание объекта curl
        $ch = curl_init();

// используем User Agent браузера
        $agent = $_SERVER["HTTP_USER_AGENT"];
        curl_setopt($ch, CURLOPT_USERAGENT, $agent);

// задаем URL
        curl_setopt($ch, CURLOPT_URL, $login_url );

// указываем что это POST запрос
        curl_setopt($ch, CURLOPT_POST, 1 );

// задаем параметры запроса
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

// указываем, чтобы нам вернулось содержимое после запроса
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// в случае необходимости, следовать по перенаправлени¤м
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        /*
            Задаем параметры сохранени¤ cookie
            как правило Cookie необходимы для дальнейшей работы с авторизацией
        */
        curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
        curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');

        //echo curl_exec($ch);
        dd(curl_exec($ch));
// выполняем запрос для авторизации

        curl_close($ch);


        $result = $this -> get_web_page( "http://turbobit.net/fd7xwoj29agv.html");

       // dd($result);
        echo $result ['content'];

        //echo("<script>location.href='http://turbobit.net/fd7xwoj29agv.html'</script>");


        //$postResult = curl_exec($ch);


    }

    function get_web_page( $url )
    {
        $user_agent='Mozilla/5.0 (Windows NT 6.1; rv:8.0) Gecko/20100101 Firefox/8.0';

        //dd(file_get_contents('cookie.txt'));

        $options = array(

            CURLOPT_CUSTOMREQUEST  =>"GET",        //set request type post or get
            CURLOPT_POST           =>false,        //set to GET
            CURLOPT_USERAGENT      => $user_agent, //set user agent
            CURLOPT_COOKIEFILE     =>"cookie.txt", //set cookie file
            CURLOPT_COOKIEJAR      =>"cookie.txt", //set cookie jar
            CURLOPT_COOKIE         =>"cookie.txt", //set cookie jar
            CURLOPT_RETURNTRANSFER => true,     // return web page
            CURLOPT_HEADER         => false,    // don't return headers
            CURLOPT_FOLLOWLOCATION => true,     // follow redirects
            CURLOPT_ENCODING       => "",       // handle all encodings
            CURLOPT_AUTOREFERER    => true,     // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
            CURLOPT_TIMEOUT        => 120,      // timeout on response
            CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
        );

        $ch      = curl_init( $url );
        curl_setopt_array( $ch, $options );
        $content = curl_exec( $ch );
        $err     = curl_errno( $ch );
        $errmsg  = curl_error( $ch );
        $header  = curl_getinfo( $ch );
        curl_close( $ch );

        $header['errno']   = $err;
        $header['errmsg']  = $errmsg;
        $header['content'] = $content;
        return $header;
    }





}
