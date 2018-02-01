<?php 

//Парсим массив POST. Данные из него собираем в строку.

$params= "";
for ($i=0; $i < count($all); $i++) { 
     for ($j=0; $j <= count($all[$i]); $j++){
          $params.=$all[$i][$j];
     }
     if($i !== count($all)-1){
     $params.="+";}

}
//Добавляем к строке поиска данные строки из массива POST и отправляем запрос 
$str = 'https://api.github.com/search/repositories?q='.$params;
$curl_handle=curl_init();
curl_setopt($curl_handle, CURLOPT_URL, $str);
curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2); 
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Smart2'); 
curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl_handle, CURLOPT_SSL_VERIFYHOST, 0);
 //Полученные данные сохранняем  в переменную $query
  $query = curl_exec($curl_handle); 
  curl_close($curl_handle); 
   //Преобразем строку в объект
$query = json_decode($query);
//Парсим объект и выводим данные в файл
if($query->items[0]->id){
echo "Колличество репозиториев удовлетворяющих поиску:".$query->total_count."</br>";
for ($i=0; $i < count($query->items); $i++) { 
  echo "ID:".$query->items[$i]->id."&nbsp";
  echo "Имя:".$query->items[$i]->full_name."&nbsp";
  echo "Ресурс:".$query->items[$i]->html_url."&nbsp";
  echo "Размер:".$query->items[$i]->size."&nbsp";
  echo "Forks:".$query->items[$i]->forks."&nbsp";
  echo "Follower:".$query->items[$items]->follower."&nbsp";
  echo "Star:".$query->items[$i]->star."&nbsp"."<br>";
  
}
}
  ?>