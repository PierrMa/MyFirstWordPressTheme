let post_content = document.getElementById('phpPostContent').value;
post_content= post_content.split('<p>').join(",").split('</p>').join(",").split('\n').join(",").split(/\W/).join(",").split('<h1>').join(",").split('</h1>').join(",").split('<h2>').join(",").split('</h2>').join(",").split('<h3>').join(",").split('</h3>').join(",").split('<h4>').join(",").split('</h4>').join(",").split('<h5>').join(",").split('</h5>').join(",").split('<h6>').join(",").split('</h6>').join(",").split('<div>').join(",").split('</div>').join(",").split('<span>').join(",").split('</span>').join(",").split('</br>').join(",").split('<em>').join(",").split('</em>').join(",").split('<strong>').join(",").split('</strong>').join(",").split('<mark>').join(",").split('</mark>').join(",").split(',');
let n;
let count=0;
for(n=0;n<post_content.length;n++){
    if(post_content[n] != ''){
        count++;
    }
}

document.getElementById('wordCount').innerText = "Number of words in the post content : "+count;