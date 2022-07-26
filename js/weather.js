function cloudcoverMeaning(cloudcover){
    switch(cloudcover){
        case(1):
            return '0%-6%';
        case(2):
            return '6%-19%';
        case(3):
            return '19%-31%';
        case(4):
            return '31%-44%';
        case(5):
            return '44%-56%';
        case(6):
            return '56%-69%';
        case(7):
            return '69%-81%';
        case(8):
            return '81%-94%';
        case(9):
            return '94%-100%';
        default:
            return 'ERROR';
    }
}

function precAmountMeaning(precAmount){
    switch(precAmount){
        case(0):
            return 'none';
        case(1):
            return '0-0.25mm/hr';
        case(2):
            return '0.25-1mm/hr';
        case(3):
            return '1-4mm/hr';
        case(4):
            return '4-10mm/hr';
        case(5):
            return '10-16mm/hr';
        case(6):
            return '16-30mm/hr';
        case(7):
            return '30-50mm/hr';
        case(8):
            return '50-75mm/hr';
        case(9):
            return 'Over 75mm/hr';
        default:
            return 'ERROR';
    }
}

function precTypeMeaning(precType){
    if(precType=='frzr'){
        return 'freezing rain';
    }else if(precType=='icep'){
        return 'ice pellets';
    }else{
        return precType;
    }
}

function windSpeedMeaning(speed){
    switch(speed){
        case(1):
            return 'Below 0.3m/s (calm)';
        case(2):
            return '0.3-3.4m/s (light)';
        case(3):
            return '3.4-8.0m/s (moderate)';
        case(4):
            return '8.0-10.8m/s (fresh)';
        case(5):
            return '10.8-17.2m/s (strong)';
        case(6):
            return '17.2-24.5m/s (gale)';
        case(7):
            return '24.5-32.6m/s (storm)';
        case(8):
            return 'Over 32.6m/s (hurricane)';
        default:
            return 'ERROR';
    }
}

//retrieve the longitude and the latitude
fetch('https://ipgeolocation.abstractapi.com/v1/?api_key=4feac17434bf4f80992b9cc8b0f970a7', {mode:'cors'})
.then(function(response){
    if(response.ok){
        return response.json();
    }else{
        return Promise.reject(response);
    }
}).then(function (data){
    //retrieve the weater data base on the longitude and the latitude
    fetch(`http://www.7timer.info/bin/api.pl?lon=${data.longitude}&lat=${data.latitude}&product=civil&output=json`)
    .then(function(response){
        if(response.ok){
            return response.json();
        }else{
            return Promise.reject(response);
        }
    }).then(function(data){
        //choosing the best timepoint
        let timeOfPickUp = data.init%100000000;//in hour
        let nowHour = new Date().getHours;//hour now
        let diff = nowHour - timeOfPickUp;
        let i=0;
        let bestApprox = 1000;
        while(bestApprox>=0){
            bestApprox = diff - data.dataseries[i].timepoint;
            i++;
        }
        
        //getting data in a string
        let weather = `cloudcover : ${cloudcoverMeaning(data.dataseries[i].cloudcover)}\n
                      lifted index : ${data.dataseries[i].lifted_index}\n
                      precipitation amount : ${precAmountMeaning(data.dataseries[i].prec_amount)}\n
                      precipitation type : ${precTypeMeaning(data.dataseries[i].prec_type)}\n
                      relative humidity : ${data.dataseries[i].rh2m}\n
                      temperature : ${data.dataseries[i].temp2m}°C\n
                      weather : ${data.dataseries[i].weather}\n
                      wind : \ndirection : ${(data.dataseries[i].wind10m)['direction']}\nspeed : ${windSpeedMeaning((data.dataseries[i].wind10m)['speed'])}`
                      
        document.getElementById('weather-window').innerText=weather;
        console.log(data);
    }).catch(function(err){
        console.log('something went wrong',err);
    });
    
}).catch(function(err){
    console.warn('Something went wrong.',err);
});


//Part to interact with the window
let resize_button = document.getElementById("resize-button");

resize_button.addEventListener('click',function(){
    if(this.classList=='window-not-hidden'){
        resize_button.innerHTML='>';//change de signe of the resizing button
        resize_button.style.left = 0;//move the button to the left border
        //reduce the window
        document.getElementById('outer-box').style.height=0;
        document.getElementById('outer-box').style.width=0;
        this.classList.replace('window-not-hidden','windowhidden');
    }else{
        resize_button.innerHTML='<';//change de signe of the resizing button
        resize_button.style.left = '300px';//move the button to the left border
        //reduce the window
        document.getElementById('outer-box').style.height='200px';
        document.getElementById('outer-box').style.width='300px';
        this.classList.replace('windowhidden','window-not-hidden');
    }
})