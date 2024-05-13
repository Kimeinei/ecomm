let userBox = document.querySelector('.header .flex .account-box');

document.querySelector('#user-btn').onclick = () =>{
    userBox.classList.toggle('active');
    navbar.classList.remove('active');
}

document.querySelectorAll('.image-slider img').forEach(images => {
    images.onclick = () => {
        var src = images.getAttribute('src');
        document.querySelector('.main-banner-image').src = src;
    };
});

let navbar = document.querySelector('.header .flex .navbar');
let menu = document.querySelector('#menu-btn');

document.querySelector('#menu-btn').onclick = () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
    userBox.classList.remove('active');
}

window.onscroll = () =>{
    menu.classList.remove('fa-times');
    userBox.classList.remove('active');
    navbar.classList.remove('active');
}