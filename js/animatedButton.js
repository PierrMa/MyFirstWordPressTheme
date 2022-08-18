let myButton = document.getElementById("sponsorButton");
let sponsorButtonMedium = document.getElementById("sponsorButtonMedium");
let increaseButton = document.getElementById("increaseButton");
let changeSubscriptionButton = document.getElementById("changeSubscriptionButton");
let pushed= false;
function animateButton(){
    if(!pushed){
        if(myButton){myButton.classList.replace("pulled","pushed");}
        if(sponsorButtonMedium){sponsorButtonMedium.classList.replace("pulled","pushed");}
        if(increaseButton){increaseButton.classList.replace("pulled","pushed");
        changeSubscriptionButton.classList.replace("pulled","pushed");}
    }else{
        if(myButton){myButton.classList.replace("pushed","pulled");}
        if(sponsorButtonMedium){sponsorButtonMedium.classList.replace("pushed","pulled");}
        if(increaseButton){increaseButton.classList.replace("pushed","pulled");
        changeSubscriptionButton.classList.replace("pushed","pulled");}
    }
    pushed=!pushed;
    setTimeout(animateButton,500);
}

animateButton();