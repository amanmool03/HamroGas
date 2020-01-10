// preloader
$(window).on('load',function(){
    $('#status').fadeOut();
    $('#preloader').delay(300).fadeOut('slow');
});

//home type writer testing
const TypeWriter = function(txtElement, words ,wait =3000)
{
    this.txtElement=txtElement;
    this.words=words;
    this.txt= '';
    this.wordIndex =0;
    this.wait = parseInt(wait , 10);
    this.type();
    this.isDeleting =false;
}

//type method
TypeWriter.prototype.type = function()
{
    //current index of word
    const current = this.wordIndex % this.words.length;
    //get full text of current word
    const fullTxt=this.words[current];

    //check if deleting
    if(this.isDeleting)
    {
        //Remove char
        this.txt=fullTxt.substring(0, this.txt.length - 1);
    }
    else{
        //Add char
        this.txt = fullTxt.substring(0,this.txt.length+1);
    }

    //Insert txt into element
    this.txtElement.innerHTML = `<span class="txt">${this.txt}</span>`;

    //type speed
    let typeSpeed =300;

    if(this.isDeleting){
        typeSpeed/=2;
    }
    
    //If word is completing bhanne chai change garna ko lagi

    if(!this.isDeleting&& this.txt=== fullTxt)
    {
        //to make a pause at the end
        typeSpeed=this.wait;
        //set delete to the true
        this.isDeleting = true;

    }
    else if(this.isDeleting && this.txt === '')
    {
        this.isDeleting = false;
        //move to next
        this.wordIndex++;
        //pause before start typing next
        typeSpeed= 500;
    }

    console.log(this.txt);
    setTimeout(() => this.type(), typeSpeed);
}
//init in dom load
document.addEventListener('DOMContentLoaded',init);

//init function
function init()
{
    const txtElement=document.querySelector('.txt-type');
    const words = JSON.parse(txtElement.getAttribute('data-words'));
    const wait = txtElement.getAttribute('data-wait');

    //Init typewriter
    new  TypeWriter(txtElement,words,wait);
}



/*
   ****************************************Team********************
*/

// short form for document.ready method which takes all the javascript functions

 $(function()
 {

    $("#team-members").owlCarousel({
        items: 2,
        autoplay: true,
        smartSpeed: 500,
        loop: true,
        autoplayHoverPause:true,
        nav: true,
        dots:false,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>']


    });

 });