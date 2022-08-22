setInterval(function(){
    if(document.getElementById('deadline')){
        //get the deadline for the event
        let deadline = document.getElementById('deadline').value;
        //convert it in milliseconds
        let timeFrom1970 = new Date(deadline).getTime();
        //get the date of the moment
        let now = new Date().getTime();
        //caclulate the time left
        let timeleft = timeFrom1970 - now;

        //to prevent the script to delete more than 1 time the table account in the database
        let stop; //indicate if the table has to be deleted
        let done = false; //indicate if the table was deleted

        let day='00';
        let hour='00';
        let minute='00';
        let second='00';

        if(timeleft>0){
            //convert the dat in days, hours, minutes and seconds
            day=Math.floor(timeleft/(24*3600*1000));
            hour=Math.floor((timeleft-day*24*3600*1000)/(3600*1000));
            minute=Math.floor((timeleft-hour*3600*1000-day*24*3600*1000)/(60*1000));
            second=Math.floor((timeleft-hour*3600*1000-day*24*3600*1000-minute*60*1000)/1000);
            stop=false;
            done=false;

            //activate the play button
            document.getElementById('playButton').setAttribute('style',"display:block");
        }else{stop=true;}    
        //display the result on the page
        document.getElementById('day').innerHTML=day+'d';
        document.getElementById('hour').innerHTML=hour+'h';
        document.getElementById('minute').innerHTML=minute+'min';
        document.getElementById('second').innerHTML=second+'s';
        
        if(day=='00'&&hour=='00'&&minute=='00'&&second=='00'&&stop==true&&done==false){
            //clean the table account of the database at the end of the event
            $(document).ready(function(){
                $("#php").load('http://fructicash.local/deleteaccount/');
            });
            done=true;

            //deactivate the play button
            document.getElementById('playButton').setAttribute('style', "display:none");
        }
    }
},1000);