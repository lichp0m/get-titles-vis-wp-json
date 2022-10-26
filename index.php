<?php

$json = file_get_contents("https://spryt.ru/wp-json/wp/v2/posts?_fields=title"); //Получаю json-ответ, записываю в переменную
$cleanedJson = stristr($json, "["); // Вычистил код ошибки, который мешал декодировать JSON из полученной переменной
$decodedJson = json_decode($cleanedJson, true); // Преобразовал юникод-символы в кириллицу

foreach ($decodedJson as $key) {
      foreach ($key as $value) {
          foreach ($value as $title) { // Обхожу вложенные массивы
              print_r($title . "\n");
          }
    }
}
