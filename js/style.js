//Scroll animate
$(window).load(function() { 
    $("html").niceScroll({
        cursorcolor: "#d8a052",
        cursorwidth: "8px",
        scrollspeed: 100,
    });
});
 $(document).ready(function() {
          $('nav#menu').mmenu({
              "offCanvas": {
                  "position": "right" //Right on left
              }
          });
          new WOW().init();
      });
// mmenu
// jQuery(document).ready(function( $ ) {
//   $("nav#menu").mmenu({
//      "offCanvas": {
//         "position": "right"
//      },
//      "extensions": [
//         "theme-dark"
//      ],
//      "counters": true,
//      "navbars": [
//         {
//            "position": "top"
//         }
//      ]
//   });
// });


// Slick slide
$(window).load(function() { 
// $('.scroller_horizontal').slick({
//   dots: false,
//   infinite: true, 
//   speed: 1000,  
//   slidesToShow: 3,
//   slidesToScroll: 1,
//   autoplay: false,
//   responsive: [
//     {
//       breakpoint: 991, 
//       settings: {
//         slidesToShow: 2,
//         slidesToScroll: 1,
//         infinite: true,
//         dots: false
//       }
//     },
//     {
//       breakpoint: 600, 
//       settings: {
//         slidesToShow: 2,
//         slidesToScroll: 1,
//         dots: false
//       }
//     },
//     { 
//       breakpoint: 480,
//       settings: {
//         slidesToShow: 1,
//         slidesToScroll: 1,
//         dots: false
//       } 
//     }
//   ]
// });
$('.center').slick({
  // dots: false,
  // centerMode: true,
  // centerPadding: '0px',
  // infinite: true, 
  // speed: 1000,  
  // slidesToShow: 3,
  // slidesToScroll: 1,
  // autoplay: true,
  // responsive: [
  //   {
  //     breakpoint: 1024, 
  //     settings: {
  //       centerMode: true,
  //       centerPadding: '0px',
  //       slidesToShow: 3,
  //       slidesToScroll: 1,
  //       infinite: true,
  //       dots: false
  //     }
  //   },
  //   {
  //     breakpoint: 600, 
  //     settings: {
  //       centerMode: true,
  //       centerPadding: '0px',
  //       slidesToShow: 2,
  //       slidesToScroll: 1,
  //       dots: false
  //     }
  //   },
  //   { 
  //     breakpoint: 480,
  //     settings: {
  //       centerMode: true,
  //       centerPadding: '0px',
  //       slidesToShow: 1,
  //       slidesToScroll: 1,
  //       dots: false
  //     } 
  //   }
  // ]
  arrows:false,
  dots: false,
  infinite: true, 
  speed: 2000,  
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  responsive: [
    {
      breakpoint: 991, 
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600, 
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false
      }
    },
    { 
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false
      } 
    }
  ]
});
  $('#camera_wrap_1').camera({  
               thumbnails: true,
               time:2500,
               pagination: false,
           });
       
})


