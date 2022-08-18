let menu_content = document.querySelector('#dropdown_header_menu .dropdown_header_menu_content');
let menu = document.getElementById('dropdown_header_menu');

if(menu_content){
    menu.addEventListener('click',function(){
        if(menu_content.getAttribute('style')=='display:none;'|!menu_content.getAttribute('style')){
            menu_content.setAttribute('style','display:block;');
        }else{
            menu_content.setAttribute('style','display:none;');
        }
    });
}