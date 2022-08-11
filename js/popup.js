let disclaimer_button = document.getElementById("disclaimer_button");
if(document.getElementById("phpcontent")){
    let content=document.getElementById("phpcontent").value;

    disclaimer_button.addEventListener('click',function(){
        window.alert(content);
    })

    if(content){
        disclaimer_button.setAttribute('style','display:block;')

    }else{
        disclaimer_button.setAttribute('style','display:none;')
    }
}