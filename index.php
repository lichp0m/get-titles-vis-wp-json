<?php

$json = file_get_contents("https://spryt.ru/wp-json/wp/v2/posts?_fields=title"); //Получаю json-ответ, записываю в переменную
$cleanedJson = str_replace('{"title":{', "\n", $json);
$badchars = array("}]", "},", "[", "\"rendered\":", "}", "\""); // Массив символов для очистки кода для json_decode
$cleanedJson = str_replace($badchars, "", $cleanedJson); // Очищаю получившиеся данные от символов, мешающих json_decode

$arrayJson = explode("\n", $cleanedJson); // Преобразовываю чистые данные в массив для прохождения foreach
unset($arrayJson[0]);
unset($arrayJson[1]);
unset($arrayJson[2]); // Удаляю лишние элементы, которые не вычистились str_replace`ом
foreach ($arrayJson as &$result) {
    print_r(json_decode('"' . $result . '"') . "\n"); // Декодирую юникод-символы и вывожу 10 заголовков
}
