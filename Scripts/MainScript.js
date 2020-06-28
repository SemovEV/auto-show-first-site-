const zag1 = document.querySelector('.zag1');
const zag2 = document.querySelector('.zag2');
const zag3 = document.querySelector('.zag3');
const zag4 = document.querySelector('.zag4');
const zag5 = document.querySelector('.zag5');
const save = document.querySelector('.save');
const search = document.querySelector('.search');
const sale = document.querySelector('.sale');
const alarm = document.querySelectorAll('.alarm');
const autor = document.querySelector('.about_autor');
const content = document.querySelector('.content');
const autor_form = document.querySelector('.about_autor_form');
const test = document.querySelector('.test-drive');
const main_serv = document.querySelector('.content_services');
const table_serv = document.querySelector('.table_services');
const credit = document.querySelector('.credit');
const gif = document.querySelector('.gif');
zag1.addEventListener('click', slide);
zag2.addEventListener('click', saveSlide);
zag3.addEventListener('click', searchSlide);
zag4.addEventListener('click', testSlide);
zag5.addEventListener('click', saleSlide);
autor.addEventListener('click', showAutor);
for (var i = 0; i < alarm.length; i++){
    alarm[i].addEventListener('click', AlarmShow);
}
var isPres = false;


function AlarmShow(event){
    alert("Для покупки необходимо войти в свой аккаунт!!!!");
}

function slide(event){
    save.style.display = 'none';
    search.style.display = 'none';
    test.style.display = 'none';
    sale.style.display = 'none';
    if (isPres == false){
        main_serv.style.height = `410px`;
        credit.style.display = 'block';
        isPres = true;
    }
    else if (isPres == true){
            main_serv.style.height = `100px`;
            credit.style.display = 'none';
            isPres = false;
    }
}


function saveSlide(event){
    credit.style.display = 'none';
    search.style.display = 'none';
    test.style.display = 'none';
    sale.style.display = 'none';
    if (isPres == false){
        main_serv.style.height = `380px`;
        save.style.display = 'flex';
        isPres = true;
    }
    else if (isPres == true){
            main_serv.style.height = `100px`;
            save.style.display = 'none';
            isPres = false;
    }
}

function searchSlide(event){
    credit.style.display = 'none';
    save.style.display = 'none';
    test.style.display = 'none';
    sale.style.display = 'none';
    if (isPres == false){
        main_serv.style.height = `600x`;
        search.style.display = 'block';
        isPres = true;
    }
    else if (isPres == true){
            main_serv.style.height = `100px`;
            search.style.display = 'none';
            isPres = false;
    }
}
function testSlide(event){
    credit.style.display = 'none';
    save.style.display = 'none';
    search.style.display = 'none';
    sale.style.display = 'none';
    if (isPres == false){
        main_serv.style.height = `730px`;
        test.style.display = 'block';
        isPres = true;
    }
    else if (isPres == true){
        main_serv.style.height = `100px`;
        test.style.display = 'none';
        isPres = false;
    }
}


function saleSlide(event){
    credit.style.display = 'none';
    save.style.display = 'none';
    search.style.display = 'none';
    if (isPres == false){
        main_serv.style.height = `600px`;
        sale.style.display = 'block';
        isPres = true;
    }
    else if (isPres == true){
        main_serv.style.height = `100px`;
        sale.style.display = 'none';
        isPres = false;
    }
}


function showAutor(event){
    autor_form.style.display = 'block';
    content.classList.toggle('content_active_form');
}


document.addEventListener("keydown", keyDownTextField, false);

function keyDownTextField(e) {
var keyCode = e.keyCode;
  if(keyCode==70) {
    gif.style.display = 'flex';
  }
  else if (keyCode == 71){
    gif.style.display = 'none';
  }
}