let profile = document.querySelector('.adm header .profile');

document.querySelector('#user-btn').onclick = () =>{
    profile.classList.toggle('active');
};

window.onscroll = () => {
    profile.classList.remove('active');
}

let mainImage = document.querySelector('.update_product form .image_container .main_image img');
let subImages = document.querySelectorAll('.update_product form .image_container .sub_images img');

subImages.forEach(images =>{
   images.onclick = () =>{
      src = images.getAttribute('src');
      mainImage.src = src;
   }
});
