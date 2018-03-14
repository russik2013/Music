<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function index(){

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

        curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
        curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');

// выполняем запрос для авторизации

        echo curl_exec($ch);
        //echo("<script>location.href='http://turbobit.net/fd7xwoj29agv.html'</script>");


        //$postResult = curl_exec($ch);


    }
}
