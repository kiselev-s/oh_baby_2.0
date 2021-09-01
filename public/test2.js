// ---------Responsive-navbar-active-animation-----------
function test(){

    TODO: //РЕФАКТОРИТЬ!!!!!!

    //localStorage.setItem('lst', 'Growth');
    var txt = localStorage.getItem('lst');// костыль
    //console.dir(txt);


    var act = $('#navbarSupportedContent').find('.nav-item');////
    //console.dir('act');////
    //console.dir(act);////
    if(txt)
        $('#navbarSupportedContent ul li').removeClass("active"); /////

    for (let i = 0; i < act.length; ++i)
    {
        if(act[i].innerText == txt)
            act[i].classList.add('active');
    }
    //act[3].classList.add('active');////

    var tabsNewAnim = $('#navbarSupportedContent');
    var selectorNewAnim = $('#navbarSupportedContent').find('li').length;
    var activeItemNewAnim = tabsNewAnim.find('.active');

    console.dir('********');

    console.dir(act[3]);
    console.dir(activeItemNewAnim);
    //if(activeItemNewAnim[0].innerText == 'Documents')
        //console.dir('zxcvbn');
    console.dir('********');


    var activeWidthNewAnimHeight = activeItemNewAnim.innerHeight();
    var activeWidthNewAnimWidth = activeItemNewAnim.innerWidth();
    var itemPosNewAnimTop = activeItemNewAnim.position();
    var itemPosNewAnimLeft = activeItemNewAnim.position();
    $(".hori-selector").css({
        "top":itemPosNewAnimTop.top + "px",
        "left":itemPosNewAnimLeft.left + "px",
        "height": activeWidthNewAnimHeight + "px",
        "width": activeWidthNewAnimWidth + "px"
    });
    $("#navbarSupportedContent").on("click","li",function(e){
        $('#navbarSupportedContent ul li').removeClass("active");
        $(this).addClass('active');

        console.dir('+++++++++++++++');
        console.dir(this.innerText);
        console.dir('+++++++++++++++');
        localStorage.setItem('lst', this.innerText);
        var activeWidthNewAnimHeight = $(this).innerHeight();
        var activeWidthNewAnimWidth = $(this).innerWidth();
        var itemPosNewAnimTop = $(this).position();
        var itemPosNewAnimLeft = $(this).position();
        $(".hori-selector").css({
            "top":itemPosNewAnimTop.top + "px",
            "left":itemPosNewAnimLeft.left + "px",
            "height": activeWidthNewAnimHeight + "px",
            "width": activeWidthNewAnimWidth + "px"
        });
    });



    // var act = $('#navbarSupportedContent').find('.nav-item');
    // console.dir('act');
    // console.dir(act);
    // console.dir((act[0].innerText));
    // console.dir((act[3].innerText));
    // var w = $('#navbarSupportedContent').find('li');
    // var s = w[0];
    // for(let i = 0; i < act.length; ++i)
    // {
    //     if(act[i].innerText == txt) {
    //         console.dir('--------------');
    //         console.dir(act[i]);
    //         console.dir('-------------');
    //     }
    // }
    // console.dir(act[2]);


}
$(document).ready(function(){
    setTimeout(function(){ test(); });
});
$(window).on('resize', function(){
    setTimeout(function(){ test(); }, 500);
});
$(".navbar-toggler").click(function(){
    setTimeout(function(){ test(); });
});
