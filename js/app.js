$(document).ready(function(){
	$('.b1').click(function(){
		document.getElementById('price').style.visibility='hidden';
		document.getElementById('ex').style.visibility='visible';
	$('.b2').click(function(){
		document.getElementById('ex').style.visibility='hidden';
		document.getElementById('info').style.visibility='visible';
	$('.b3').click(function(){
		document.getElementById('info').style.visibility='hidden';
		document.getElementById('event').style.visibility='visible';
	$('.b5').click(function(){
		document.getElementById('event').style.visibility='hidden';
		document.getElementById('pass').style.visibility='visible';
	$('.b4').click(function(){
		location.replace("event.php");
			});
		});
	});
});
});
});




function animatedForm(){
	const arrows=document.querySelectorAll(".fa-arrow-down");



	arrows.forEach(arrow => {
		arrow.addEventListener("click",()=>{
			const input=arrow.previousElementSibling;
			const parent=arrow.parentElement;
			const nextForm=parent.nextElementSibling;

			//check for validation
			if(input.type==="date"){
				nextSlide(parent,nextForm);
			}else if(input.type==="time" && validateTime(input)){
				nextSlide(parent,nextForm);
			}else if(input.type==="number" && validateNum(input)){
				nextSlide(parent,nextForm);
			}else if(input.type==="text" && validateUser(input)){
				nextSlide(parent,nextForm);
			}else if(input.type==="email" && validateEmail(input)){
				nextSlide(parent,nextForm);
			}else if(input.type==="password" && validatePass(input)){
				nextSlide(parent,nextForm);
			}else{
				parent.style.animation="shake 0.5s ease";
			}
			//get rid of animation
			parent.addEventListener("animationend",()=>{
				parent.style.animation="";
			});
		});
	});
}

function validateUser(user){
	if(user.value.length<6){
		console.log("pas assez de characters");
		error("rgb(189,87,87)");
	}else{
		error("#ffc107");
		return true;

	}
}
function validatePass(user){
	if(user.value.length<6){
		console.log("pas assez de characters");
		error("rgb(189,87,87)");
	}else{
		error("#ffc107");
		document.getElementById('pass').style.visibility='hidden';
		document.getElementById('go').style.visibility='visible';
		return true;

	}
}

function validateEmail(email){
	const validation= /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
	if(validation.test(email.value)){
		error("#ffc107");
		return true;
	}else{
		error("rgb(189,87,87)");
	}
}

function validateTime(time){
	if(document.getElementById('time').value==""){
		error("rgb(189,87,87)");
	}else{
		error("#ffc107");
		return true;
	}
}

function validateNum(num){
	if(document.getElementById('number').value=="" || document.getElementById('number').value<6){
		error("rgb(189,87,87)");
	}else{
		error("#ffc107");
		return true;
	}
}

function nextSlide(parent,nextForm){
	parent.classList.add("innactive");
	parent.classList.remove("active");
	nextForm.classList.add("active");
}

function error(color){
	document.body.style.backgroundColor=color;
}

animatedForm();