var select, url;

var value={};
var url_search;

//функця записывает в объект value значения имени поля и его значения
//Если поле не являетс первым к ключу(имени) добавляется знак "+"
 function change(params,id) {
      var pattern = /[1-9]{1}\[1\]/;
      var text = id;
    
      if(pattern.test(text)){
        value[id] ="\+" + params; 
      }
      else{
      value[id] = params;
      }

      access(id);
 } 
 
//Функция дающая доступ к следующему полю при заполнении данного
 function access(id){
  var firstChar = id.charAt(2);
  firstChar = firstChar * 1 + 1;
  id =id.substring(0, 2) + firstChar + id.substring(3, 4);
  id = document.getElementsByName(id);
  id[0].removeAttribute("disabled");
 }
//Функция удаляющая значения имени и значения из массива value при удалении строки
 function del(id_row){
   var tr = document.getElementsByTagName('tr');

for(var i = 1; i<4; i++){

  var tr_ = tr[id_row].cells[i];
   td = tr_.childNodes[1];
   td = td.name;
   value[td] = "";

}


 }

window.onload = function () {
//При загрузке страницы мы будем прослушивать событие отпраки запроса на сервер 
//и очистки всех полей  
  var clear = document.getElementById("Clear");
  var input = document.getElementsByTagName('input');
  input[2].style.display = "none";


  
//При нажатии на кнопку Cleaar делаем перезагрузку страницы и очищаем первое поле 
                

    document.getElementById("Clear").addEventListener("click",
                function () {
     input[0].value = "";
     select[0].value = "";
     select[1].value = ""; 
     select[1].setAttribute("disabled", "disabled");
     input[0].setAttribute("disabled", "disabled");
     value = {};              
     window.location.reload();
                          },
            false);


 
      
}


