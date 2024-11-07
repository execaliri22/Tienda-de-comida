var swiper = new Swiper(".mySwiper-1",{
    sliderPerview:1,
    spaceBetween: 30,
    loop: true,
    pagination: {
        el:".swiper-pagination",
        clickable: true,
    },

    navigation: {
        nextEl:".swiper-button-next",
        prevEl:".swiper-button-prev",
    }


});

var swiper = new Swiper(".mySwiper-2",{
    sliderPerview:3,
    spaceBetween: 20,
    loop: true,
    loopFillGroupWithBlank:true,

    navigation: {
        nextEl:".swiper-button-next",
        prevEl:".swiper-button-prev",
    },
    breakpoint : {
        0: {
            sliderPerview:1,
        },
        520: {
            sliderPerview: 2,

        },
        950: {
            sliderPerview:3,
        }
    }


});
let tabInputs = document.querySelectorAll(".tabInput");
tabInputs.forEach(function(input){
    input.addEventListener('change', function(){
        let id = input.ariaValueMax;
        let thisSwiper = document.getElementById('swiper'+ id);
         thisSwiper.swiper.update();
    })
});
// submenu







