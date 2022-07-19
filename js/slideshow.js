let slideIndex = 1;
	showSlides();

	function showSlides() {
	let i;
	let slides = document.getElementsByClassName("mySlides");
	let dots = document.getElementsByClassName("dot");
	
	//stop top display all the slides
	for (i = 1; i <= slides.length; i++) {
		slides[i-1].style.display = "none";  
	}
	
	slideIndex++;//go to the next slide and also the next dot
	if (slideIndex > slides.length) {slideIndex = 1} //deal with the case where the variable is out of the boundaries of the index

	//take off the class "active" of all the dots 
	for (i = 1; i <= dots.length; i++) {
		dots[i-1].className = dots[i-1].className.replace(" active", "");
	}
	
	slides[slideIndex-1].style.display = "block";  //makes active only the slide we want to deal with
	dots[slideIndex-1].className += " active";//change the color of the next dot
	
	setTimeout(showSlides, 10000); // Change image every 2 seconds
	}

	showSlidesOnClick(slideIndex);

	function plusSlides(n) {
	showSlidesOnClick(slideIndex += n);
	}

	function currentSlide(n) {
	showSlidesOnClick(slideIndex = n);
	}

	function showSlidesOnClick(n) {
	let i;
	let slides = document.getElementsByClassName("mySlides");
	let dots = document.getElementsByClassName("dot");
	if (n > slides.length) {slideIndex = 1}    
	if (n < 1) {slideIndex = slides.length}
	for (i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";  
	}
	for (i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.replace(" active", "");
	}
	slides[slideIndex-1].style.display = "block";  
	dots[slideIndex-1].className += " active";
	}