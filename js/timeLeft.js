setInterval(function(){
    //get the deadline for the event
    let deadline = document.getElementById('deadline').value;
    //convert it in milliseconds
    let timeFrom1970 = new Date(deadline).getTime();
    //get the date of the moment
    let now = new Date().getTime();
    //caclulate the time left
    let timeleft = timeFrom1970 - now;

    let day='00';
    let hour='00';
    let minute='00';
    let second='00';

    if(timeleft>=0){
        //convert the dat in days, hours, minutes and seconds
        day=Math.floor(timeleft/(24*3600*1000));
        hour=Math.floor((timeleft-day*24*3600*1000)/(3600*1000));
        minute=Math.floor((timeleft-hour*3600*1000-day*24*3600*1000)/(60*1000));
        second=Math.floor((timeleft-hour*3600*1000-day*24*3600*1000-minute*60*1000)/1000);
    }    
    //display the result on the page
    document.getElementById('day').innerHTML=day+'d';
    document.getElementById('hour').innerHTML=hour+'h';
    document.getElementById('minute').innerHTML=minute+'min';
    document.getElementById('second').innerHTML=second+'s';
},1000);