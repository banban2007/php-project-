
let Navbar = document.querySelector('.navbar ul');

document.querySelector('#buger-btn').onclick = () =>{
    Navbar.classList.toggle('active');
    profile.classList.remove('active');
}

let profile = document.querySelector('header .profile');

document.querySelector('#login-btn').onclick = () =>{
    profile.classList.toggle('active');
    Navbar.classList.remove('active')
}

window.onscroll = () =>{
    Navbar.classList.remove('active')
    profile.classList.remove('active');

}

let slides = document.querySelectorAll('.banner_slider .swiper_wrapper .slide');
let index = 0;

function next(){
    slides[index].classList.remove('active');
    index = (index + 1) % slides.length;
    slides[index].classList.add('active');
}

function prev(){
    slides[index].classList.remove('active');
    index = (index - 1 + slides.length) % slides.length;
    slides[index].classList.add('active');
}

let bigImage = document.querySelector('.quick_view form .image_container .big_image img');
let smallImages = document.querySelectorAll('.quick_view  form .image_container .small_images img');

smallImages.forEach(images =>{
   images.onclick = () =>{
      src = images.getAttribute('src');
      bigImage.src = src;
   }
});