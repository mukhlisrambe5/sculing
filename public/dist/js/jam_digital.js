setInterval(function(){
    var currentTime=new Date();
    
    var days= ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu" ];
    var day= days[currentTime.getDay()];
    var year= currentTime.getFullYear();
    var months = ["Jan", "Feb", "Mar", "Apr", "Mei", "Juni", "Juli", "Agust", "Sept", "Okt", "Nop", "Des"];
    var month= months[currentTime.getMonth()];
    var date= currentTime.getDate();
    var hours= currentTime.getHours();
    var minutes= currentTime.getMinutes();
    var seconds= currentTime.getSeconds();

    if (hours <10){
        hours= "0" + hours;
    }
    if (minutes <10){
        minutes= "0" + minutes;
    }
    if(seconds <10){
        seconds= "0" + seconds;
    }
   
    var dateTimes=  date + "-" + month + "-" + year ;
    var clockTimes= hours + ":" + minutes + ":" + seconds  ;

    
    document.querySelector('.tgl_digital').innerHTML= dateTimes;
    document.querySelector('.jam_digital').innerHTML= clockTimes;
}, 1000);