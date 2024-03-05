let  button = document.querySelector('#open_menu');
let menu = document.querySelector('#menu');
let close = document.querySelector('.close');
button.addEventListener('click',function(){
    if(!menu.classList.contains('active')){
        menu.classList.add('active');
    }
})
close.addEventListener('click',function(){
    if(menu.classList.contains('active')){
        menu.classList.remove('active');
    }
})