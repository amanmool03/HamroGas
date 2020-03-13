// preloader
$(window).on('load', function () {
    $('#status').fadeOut();
    $('#preloader').delay(100).fadeOut('slow');
});

//home type writer testing
const TypeWriter = function (txtElement, words, wait = 3000) {
    this.txtElement = txtElement;
    this.words = words;
    this.txt = '';
    this.wordIndex = 0;
    this.wait = parseInt(wait, 10);
    this.type();
    this.isDeleting = false;
}

//type method
TypeWriter.prototype.type = function () {
    //current index of word
    const current = this.wordIndex % this.words.length;
    //get full text of current word
    const fullTxt = this.words[current];

    //check if deleting
    if (this.isDeleting) {
        //Remove char
        this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
        //Add char
        this.txt = fullTxt.substring(0, this.txt.length + 1);
    }

    //Insert txt into element
    this.txtElement.innerHTML = `<span class="txt">${this.txt}</span>`;

    //type speed
    let typeSpeed = 300;

    if (this.isDeleting) {
        typeSpeed /= 2;
    }

    //If word is completing bhanne chai change garna ko lagi

    if (!this.isDeleting && this.txt === fullTxt) {
        //to make a pause at the end
        typeSpeed = this.wait;
        //set delete to the true
        this.isDeleting = true;

    } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        //move to next
        this.wordIndex++;
        //pause before start typing next
        typeSpeed = 500;
    }

    console.log(this.txt);
    setTimeout(() => this.type(), typeSpeed);
}
//init in dom load
document.addEventListener('DOMContentLoaded', init);

//init function
function init() {
    const txtElement = document.querySelector('.txt-type');
    const words = JSON.parse(txtElement.getAttribute('data-words'));
    const wait = txtElement.getAttribute('data-wait');

    //Init typewriter
    new TypeWriter(txtElement, words, wait);
}

/*
 ****************************************Team********************
 */

// short form for document.ready method which takes all the javascript functions

$(function () {

    $("#team-members").owlCarousel({
        items: 2,
        autoplay: true,
        smartSpeed: 500,
        loop: true,
        autoplayHoverPause: true,
        nav: true,
        dots: false,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            // breakpoint for zero
            0: {
                items: 1
            },
            // break point for 480 up
            480: {
                items: 2
            }
        }
    });
});

/*
 ********************************progress bars****************************
 */

$(function () {
    $("#team #progress-elements").waypoint(function () {

        $(".progress-bar").each(function () {
            $(this).animate({
                width: $(this).attr("aria-valuenow") + "%"
            });
        });

        this.destroy();
    }, {
        offset: 'bottom-in-view'
    });

});


/**********************************  testomonial section  **************************/


$(function () {

    $("#testomanial-slider").owlCarousel({
        items: 1,
        autoplay: true,
        smartSpeed: 500,
        loop: true,
        autoplayHoverPause: true,
        nav: true,
        dots: false,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
    });

});

/****************************************Stats section *********************************/

$(function () {

 $(".counter").counterUp({
    delay: 10,
    time: 2000
 });

});

//*******************************************************clients  ***********************************************/
$(function () {
    $("#clients-list").owlCarousel({
        items: 4,
        autoplay: true,
        smartSpeed: 500,
        loop: true,
        autoplayHoverPause: true,
        nav: true,
        dots: false,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
    });
});

//////////////////////*****************NAvigation ko lagi***************** */

// show and hide white navigation
$(function () {

    //   show on page load
    showHideNav();

    $(window).scroll(function(){
    //   show on page scroll
        showHideNav();
    });

    function showHideNav()
    {
         // alert('you scrolled');
       if($(window).scrollTop() > 50)
       {
           //display white nav
           $('nav').addClass("white-nav-top");

        //    show back to top button


        $("#back-to-top").fadeIn();

       }else{
           //hide white bar
           $('nav').removeClass("white-nav-top");
           $("#back-to-top").fadeOut();
       }
    }
});


/******************smooth scrolling ko lagi kina bhanne section ko ma chai css ko external use garena bootstraph ra jquery use gareko lay */
$(function () {

    $('.smooth-scroll').click(function(event){
        event.preventDefault();

        //get the section id

        var section_id = $(this).attr("href");

        $("html,body").animate({
            scrollTop: $(section_id).offset().top - 60

        },1250 , "easeInOutExpo");
    });
 
});


//******************************** */ MObile Menu*************/

$(function () {
//show mobile navigation

$("#mobile-nav-open-btn").click(function(){
    $("#mobile-nav").css("top","0%");
});
 

//hide mobile navigation

$("#mobile-nav-close-btn , #mobile-nav a").click(function(){
    $("#mobile-nav").css("top","-100%");
});
 

});

//*********************************************** */ Animations ko lagi*************************/
//to reveal the animation on scrolling
$(function(){
    new WOW().init();
});

$(window).on('load', function () {
  $("#home-heading").addClass(" animated fadeInDown");
  $("#home-text").addClass(" animated fadeInDown");
  $(".home-container").addClass(" animated fadeInDown");
  $("#home-btn").addClass(" animated zoomIn");
  $("#arrow-down i").addClass(" animated fadeInDown infinite");
});