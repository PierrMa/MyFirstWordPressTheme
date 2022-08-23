let slider = tns({
    container : ".my-slider",
    "slideBy":1,
    "speed":400,
    "nav":false,
    controlsContainer:".slider-wrapper",
    prevButton: ".previous",
    nextButton: ".next",
    responsive:{
        1600:{
            items:8,
            gutter:20
        },
        1024:{
            items:6,
            gutter:20
        },
        768:{
            items:4,
            gutter:20
        },
        480:{
            items:2,
        }
    }
})