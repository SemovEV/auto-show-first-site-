const menuBtn = document.querySelector('.menu_btn');
const menu = document.querySelector('.menu');
//const content = document.querySelector('.content');
const menu_list = document.querySelector('.menu_list');


menuBtn.addEventListener('click', showNav);
menu_list.addEventListener('click', hideNav);
window.addEventListener('scroll', activeBtn);


function showNav(event){
    menu.classList.toggle('menu_active');
    menuBtn.classList.toggle('menu_btn_active');
    content.classList.toggle('content_active');
    event.preventDefault();
}

function hideNav(event){
    menu.classList.remove('menu_active');
    content.classList.remove('content_active');
    menuBtn.classList.remove('menu_btn_active');
}
console.log(document.documentElement.clientHeight);

function activeBtn(event){
    let windowScroll = document.documentElement.clientHeight;
    if (windowScroll > 150) {
        menuBtn.style.display = 'block';
    }
    else{
        menuBtn.style.display = 'none';
    }
}