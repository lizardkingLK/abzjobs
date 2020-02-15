$(document).ready(function(){
    var cdt = new Date();
    console.log('You are now connected to abzjobs server manager');
    console.log(cdt);
    var cdtStr = cdt.getHours() +":"+cdt.getMinutes();
    if(cdt.getHours()/12 > 1) {
        cdtStr = (cdt.getHours()-12) +":"+cdt.getMinutes();
        cdtStr += "pm";
    }
    else
        cdtStr += "am";

    $('p#currentTime').html(cdtStr);
})