//! Swiper
var swiper = new Swiper(".mySwiper", {
   loopFillGroupWithBlank: true,
   
   breakpoints : {
      480: {
         slidesPerView: 2,
         spaceBetween: 10
      },

      640: {
         slidesPerView: 3,
         spaceBetween: 10
      },

      900: {
         slidesPerView: 4,
         spaceBetween: 10
      },

      1200: {
         slidesPerView: 6,
         spaceBetween: 2
      },

      1400: {
         slidesPerView: 7,
         spaceBetween: 2
      },
   },

   navigation: {
     nextEl: ".swiper-arrow-next",
     prevEl: ".swiper-arrow-previous",
   },
 });

 var swiper2 = new Swiper(".mySwiper2", {
   loopFillGroupWithBlank: true,
   
   breakpoints : {
      480: {
         slidesPerView: 1,
         spaceBetween: 10
      },

      640: {
         slidesPerView: 3,
         spaceBetween: 10
      },

      900: {
         slidesPerView: 3,
         spaceBetween: 10
      },

      1200: {
         slidesPerView: 4,
         spaceBetween: 20
      },
   },

   navigation: {
     nextEl: ".swiper-arrow-next",
     prevEl: ".swiper-arrow-previous",
   },
});


//! Product Gallery
var swiper4 = new Swiper(".mySwiper4", {
   loop: false,
   spaceBetween: 10,
   slidesPerView: 4,
   freeMode: true,
   watchSlidesProgress: true,
});

var swiper5 = new Swiper(".mySwiper5", {
   loop: false,
   spaceBetween: 10,
   navigation: {
       nextEl: ".swiper-button-next",
       prevEl: ".swiper-button-prev",
   },
   thumbs: {
       swiper: swiper4,
   },
});


//! Menu
let openMenu = document.querySelectorAll('.arrow-down');

openMenu.forEach(function(value){
   value.addEventListener('click', function(e){
      let job = e.target.parentElement.parentElement;
      job.classList.toggle('active');
   });
});

let openMenuChild = document.querySelectorAll('.arrow-down-child');

openMenuChild.forEach(function(value){
   value.addEventListener('click', function(e){
      let job = e.target.parentElement.kparentElement;
      job.classList.toggle('active');
   });
});

let barIcon = document.querySelector('.bar-home-icon');
let menuMobile = document.querySelector('.menu-mobile');
let backClose = document.querySelector('.back-close');

barIcon.addEventListener('click', function(){
   menuMobile.classList.add('active-right');
   backClose.classList.add('active-right');
});

backClose.addEventListener('click', function(){
   menuMobile.classList.remove('active-right');
   backClose.classList.remove('active-right');
});


//!Profile Order Box
let orderPageButton = document.querySelectorAll('.order-page-button');
let ContentBox = document.querySelectorAll('.content-box');

orderPageButton.forEach(function(tab, tab_index){
   tab.addEventListener('click', function(){
      orderPageButton.forEach(function(tab){
         tab.classList.remove('active');
         tab.classList.remove('order-page-button-active');
      });
      tab.classList.add('active');
      tab.classList.add('order-page-button-active');

      ContentBox.forEach(function(content, content_index){
         if(content_index == tab_index){
            content.style.display = 'block';
         } else {
            content.style.display = 'none';
         }
      });
   });
});


//! Filters
let filterContent = document.querySelectorAll('.filter-content');
filterContent.forEach(function(item) {
   item.addEventListener('click', function(){
      this.nextElementSibling.classList.toggle('active-brands');
   });
}); 

function change() {
   let results = Array.from(document.querySelectorAll('.filters > div'));
   // Hide all results
   results.forEach(function (result) {
      result.style.display = 'none';
   });
   // Filter results to only those that meet ALL requirements:
   Array.from(document.querySelectorAll('input[rel]:checked'), function (input) {
      const attrib = input.getAttribute('rel');
      results = results.filter(function (result) {
         return result.classList.contains(attrib);
      });
   });
   // Show those filtered results:
   results.forEach(function (result) {
      result.style.display = 'block';
   });
}

change();

let filterSlider = document.querySelector('.filter-slider');
let filterBorder = document.querySelector('.filter-border');
let filterClose = document.querySelector('.close-filter-icon');

filterSlider.addEventListener('click', function() {
   filterBorder.classList.add('active-bottom');
   backClose.classList.add('active-right');
});

filterClose.addEventListener('click', function() {
   filterBorder.classList.remove('active-bottom');
   backClose.classList.remove('active-right');
});


//! Show Compelet Text
// let readMore = document.querySelector('.read-more');
// let aboutSuperMarketText = document.querySelector('.about-super-market-text');

// readMore.addEventListener('click', function(){
//    if(aboutSuperMarketText.classList.contains('active-height')){
//       aboutSuperMarketText.classList.add('active-height');
//       readMore.textContent = 'مشاهده بیشتر';
//    } else {
//       aboutSuperMarketText.classList.remove('active-height');
//       readMore.textContent = 'مشاهده کمتر';
//    }
//    aboutSuperMarketText.classList.toggle('active-height');
// });


