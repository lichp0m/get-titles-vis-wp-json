<?php

$json = file_get_contents("https://spryt.ru/wp-json/wp/v2/posts?_fields=title"); //Получаю json-ответ, записываю в переменную
$cleanedJson = stristr($json, "["); // Вычистил код ошибки из полученной переменной, который мешал декодировать JSON
$decodedJson = json_decode($cleanedJson, true);
//var_export($decodedJson);

foreach ($decodedJson as $key) {
      foreach ($key as $value) {
          foreach ($value as $title) {
              print_r($title . "\n");
          }
    }
}
