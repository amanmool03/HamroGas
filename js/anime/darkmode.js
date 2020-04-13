

const moonPath = "M17.5 27.5C17.5 42.6878 27.5 55 27.5 55C12.3122 55 0 42.6878 0 27.5C0 12.3122 12.3122 0 27.5 0C27.5 0 17.5 12.3122 17.5 27.5Z";

const sunPath = "M55 27.5C55 42.6878 42.6878 55 27.5 55C12.3122 55 0 42.6878 0 27.5C0 12.3122 12.3122 0 27.5 0C42.6878 0 55 12.3122 55 27.5Z";

const darkMode = document.querySelector('#darkMode');

let toggle = false;


darkMode.addEventListener('click', () => {

    //We need to use anime.js to add the timeline and animate

    const timeline = anime.timeline(
        {
            duration: 700,
            easing: "easeOutExpo"
        }
    );

    //ADD DIFFERENT ANIMATION TO THE TIMELINE

    timeline.add(
        {
            targets: ".sun",
            d: [
                {
                    value: toggle ? sunPath: moonPath
                }
            ]
        }
    )
    .add(
        {
            targets : "#darkMode",
            rotate:toggle? 0: 320
        },"-= 350"
    )

    .add({
        targets: "body",
        backgroundColor: toggle ? "rgb(255,255,255)" : "rgb(31,30,30)",
        color: toggle ? "rgb(22,22,22)": "rgb(255,255,255)"
    }, "-=700"
    )


    .add({
        targets: ".content-box-lg ",
        backgroundColor: toggle ? "rgb(255,255,255)" : "rgb(31,30,30)",   
    }, "-=700"
    )
    .add({
        targets: ".content-box-md ",
        backgroundColor: toggle ? "rgb(255,255,255)" : "rgb(31,30,30)",
        
    }, "-=700"
    )

    .add({
        targets: "#about-bottom ",
        opacity:toggle ? 1: 0.6   
    }, "-=700"
    )
    .add({
        targets: ".about-item ",
        backgroundColor: toggle ? "rgb(255,255,255)" : "rgb(38,39,40)",
        color: toggle ? " rgb(22,22,22)":"rgb(255,255,255)" ,
    }, "-=700"
    )
    
    .add({
        targets: "#about-02 ",
        backgroundColor: toggle ? "rgb(244,244,244)" : "rgb(255,255,255)",
        color: toggle ? " rgb(22,22,22)":"rgb(255,255,255)" ,
    }, "-=700"
    )

    .add(
        {
            targets: "#waveDm",
            fill:toggle ? "rgb(255,255,255)" : "rgb(31,30,30)",

        } , "-=700"
    )

    .add({targets: "h2", color: toggle ?  "rgb(58,131,255)" : "rgb(255,255,255)"}, "-=700")

    .add({targets: ".content", backgroundColor: toggle ? "rgb(22,22,22)":"rgb(255,255,255)"},"-=700");
    ;
    

if(!toggle)
{
    toggle=true;
}
else{
    toggle=false;
}


});
