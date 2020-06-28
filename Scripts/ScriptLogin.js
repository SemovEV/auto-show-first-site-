var firstPas = document.getElementsByTagName('input');



function check(){

     if(firstPas[2].value != firstPas[3].value){
        alert('Вы не правильно ввели пароль второй раз!')
        return false;
    }
}
