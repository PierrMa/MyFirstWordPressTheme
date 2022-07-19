let myButton = document.getElementById("sponsorButton");
let pushed= false;
function animateButton(){
    if(!pushed){
        myButton.classList.replace("pulled","pushed");
    }else{
        myButton.classList.replace("pushed","pulled");
    }
    pushed=!pushed;
    setTimeout(animateButton,500);
}

animateButton();