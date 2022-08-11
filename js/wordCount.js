//paragraphs parsing
let post_content = document.querySelectorAll('div.entry-content.post-entry-content p');
let modif_content='';
post_content.forEach(element => {
    modif_content=modif_content+' '+element.innerHTML;
});

//titles
post_content = document.querySelectorAll('div.entry-content.post-entry-content h1');
post_content.forEach(element => {
    modif_content=modif_content+' '+element.innerHTML;
});
post_content = document.querySelectorAll('div.entry-content.post-entry-content h2');
post_content.forEach(element => {
    modif_content=modif_content+' '+element.innerHTML;
});
post_content = document.querySelectorAll('div.entry-content.post-entry-content h3');
post_content.forEach(element => {
    modif_content=modif_content+' '+element.innerHTML;
});
post_content = document.querySelectorAll('div.entry-content.post-entry-content h4');
post_content.forEach(element => {
    modif_content=modif_content+' '+element.innerHTML;
});
post_content = document.querySelectorAll('div.entry-content.post-entry-content h5');
post_content.forEach(element => {
    modif_content=modif_content+' '+element.innerHTML;
});
post_content = document.querySelectorAll('div.entry-content.post-entry-content h6');
post_content.forEach(element => {
    modif_content=modif_content+' '+element.innerHTML;
});

//list parsing
post_content = document.querySelectorAll('div.entry-content.post-entry-content li');
post_content.forEach(element => {
    modif_content=modif_content+' '+element.innerHTML;
});

//cite parsing
post_content = document.querySelectorAll('div.entry-content.post-entry-content cite');
post_content.forEach(element => {
    modif_content=modif_content+' '+element.innerHTML;
});

//probably other tags can wrap words in a post so feel free to add the situtation you want to fit

//split sentences into words
modif_content= modif_content.split('<p>').join(",").split('</p>').join(",").split('\n').join(",").split(/\W/).join(",").split('<h1>').join(",").split('</h1>').join(",").split('<h2>').join(",").split('</h2>').join(",").split('<h3>').join(",").split('</h3>').join(",").split('<h4>').join(",").split('</h4>').join(",").split('<h5>').join(",").split('</h5>').join(",").split('<h6>').join(",").split('</h6>').join(",").split('<div>').join(",").split('</div>').join(",").split('<span>').join(",").split('</span>').join(",").split('</br>').join(",").split('<em>').join(",").split('</em>').join(",").split('<strong>').join(",").split('</strong>').join(",").split('<mark>').join(",").split('</mark>').join(",").split(',');

//word count
let n;
let count=0;
for(n=0;n<modif_content.length;n++){
    if(modif_content[n] != ''){
        count++;
    }
}

//displaying the wordcount
if(document.getElementById('wordCount')){
    document.getElementById('wordCount').innerText = "Number of words in the post content : "+count;
}