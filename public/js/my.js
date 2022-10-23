const popup = document.getElementById('pop-up');

function popYes() {
  sessionStorage.setItem('popup', 'none');
  location.reload();
}

if(sessionStorage.getItem('popup') || !window.sessionStorage) {
  popup.parentNode.removeChild(popup);
}else{
  if(window.stop !== undefined) {
    window.stop();
  } 
}

const animItems = document.querySelectorAll('._anim-items');

if(animItems.length>0){
    window.addEventListener('scroll', animOnScroll);
    function animOnScroll(){
        for(let index = 0; index < animItems.length; index++){
            const animItem = animItems[index];
            const animItemHeight = animItem.offsetHeight;
            const animItemOffset = offset(animItem).top;
            const animStart = 4;
                
            let animItemPoint = window.innerHeight - animItemHeight / animStart;
            if(animItemHeight > window.innerHeight){
                animItemPoint = window.innerHeight - window.innerHeight / animStart;
            }

            if((scrollY > animItemOffset - animItemPoint) && scrollY < (animItemOffset + animItemHeight)){
                animItem.classList.add('_active');
            }else{
                if(!animItem.classList.contains('_anim-no-hide')){
                    animItem.classList.remove('_active');
                }
            }
        }
    }
    function offset(el){
        const rect = el.getBoundingClientRect(),
            scrollLeft = window.scrollY || document.documentElement.scrollLeft,
            scrollTop = window.scrollY || document.documentElement.scrollTop;
        return{top: rect.top + scrollTop, left: rect.left + scrollLeft}
    }
    setTimeout(() =>{
        animOnScroll();
    },300); 
}

$(document).ready(function() {
    const element = $(".header_box");
    const height_el = element.offset().top;
         
    $(".header_box_position").css({
        "width": element.outerWidth(),
        "height": element.outerHeight()
    });
     
    $(window).scroll(function() {
        if($(window).scrollTop() > height_el) {
            element.addClass("fixed");
        } else {
            element.removeClass("fixed");
        }
    });
});


$(document).ready(function() {
    const element = $(".dropdown-content");
    const height_el = element.offset().top;
         
    $(".dropdown-content").css({
        "width": element.outerWidth(),
        "height": element.outerHeight()
    });
     
    $(window).scroll(function() {
        if($(window).scrollTop() > height_el) {
            element.addClass("contentfixed");
        } else {
            element.removeClass("contentfixed");
        }
    });
});

    
window.addEventListener('scroll', () => {
	let scrollDistance = window.scrollY;

	if (window.innerWidth > 768) {
		document.querySelectorAll('.section_menu').forEach((el, i) => {
			if (el.offsetTop - document.querySelector('.header_menu').clientHeight <= scrollDistance) {
				document.querySelectorAll('.header_menu a').forEach((el) => {
					if (el.classList.contains('active')) {
						el.classList.remove('active');
					}
				});

				document.querySelectorAll('.header_menu li')[i].querySelector('a').classList.add('active');
			}
		});
	}
});


function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

function myMenu() {
    document.getElementById("mymenu").classList.toggle("show");
}

function showMenu(el){
    let i;
    for (i = 0; i < el.length; i++) {
        let openDropdown = el[i];
        if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
        }
    }
}

window.onclick = function(event) {
    const dropdowns = document.getElementsByClassName("dropdown-content")
    const dropdownsMini = document.getElementsByClassName("menu-content")
    if(!event.target.matches('.dropbtn')) {
    showMenu(dropdowns)
    }  
    if(!event.target.matches('.menubtn')) {
    showMenu(dropdownsMini)  
    }
} 

function checkButton(){
    calcerror.classList.remove('noactive')
    let language = document.querySelector('input[id="language"]:checked') 
    let age = document.querySelector('input[id="age"]:checked') 
    let class_schedule = document.querySelector('input[id="class_schedule"]:checked') 
    let class_type = document.querySelector('input[id="class_type"]:checked') 
        
    language === null ?
        document.querySelector("#error").innerHTML = "Выберите язык. " : document.querySelector("#error").innerHTML = ""  
    age === null ?  
        document.querySelector("#error1").innerHTML = "Выберите возраст. " : document.querySelector("#error1").innerHTML = ""  
    class_schedule === null ?   
        document.querySelector("#error2").innerHTML = "Выберите график. " : document.querySelector("#error2").innerHTML = ""          
    class_type === null ?       
        document.querySelector("#error3").innerHTML = "Выберите тип занятий. " : document.querySelector("#error3").innerHTML = ""   
      
    if(language && age && class_schedule && class_type != null){ 
       let calc = language.value*age.value*class_schedule.value*class_type.value
       document.querySelector("#disp").innerHTML = Math.ceil(calc); 
       document.querySelector("#disp1").innerHTML = Math.ceil(calc*9*0.95/2); 
       document.querySelector("#disp2").innerHTML = Math.ceil(calc*9*0.92);   
       calcres.classList.add('calcactive');
       calcparametr.classList.add('noactive');
    }else{
        success.classList.add('noactive');
    }
}  

document.getElementById('calcparametr').addEventListener('click', function(event){
    let tagName = event.target.tagName.toLowerCase()
    if(tagName === 'input'){
        calcerror.classList.add('noactive')
    }
})

function showModal() {
    document.getElementById("myModal").classList.add("show-window");
    myTest.classList.remove("show-window");
}

function exitModal() {
    myModal.classList.remove("show-window");
}
function showTest() {
    document.getElementById("myTest").classList.add("show-window");
    myModal.classList.remove("show-window");
}
function exitTest() {
    myTest.classList.remove("show-window");
}

function check() {    
    let question;
    let noright;
    let right;
    
    question = 1;
    noright = 0;
    right = 0;
        
    result = "";
    let choice; 
    for (question = 1; question <= 20; question++) {
        let q = document.forms['quiz'].elements['q'+question];
        for (let i = 0; i < q.length; i++) {
            if (q[i].checked) {
                choice = q[i].value;
            }
        }
        if (choice == "noright") {
            noright++;
        }
        if (choice == "right") {
            right++;
        }
    }
    if (right>=0 && right<=7) {
        document.getElementById("res1").innerHTML   
        = right + " балла(ов) Уровень подготовки - Beginner ";
        document.getElementById("begginer").classList.add("active"); 
    }else{
        if(right>7 && right<=15){
            document.getElementById("res1").innerHTML   
            = right + " балла(ов) Уровень подготовки - Elementary ";
            document.getElementById("elementary").classList.add("active"); 
        }else{
            document.getElementById("res1").innerHTML   
            = right + " балл(ов) Уровень подготовки - Intermediate ";
            document.getElementById("intermediate").classList.add("active"); 
        }  
    }
}    
 
$(function() {
    $('.btn-next').click(function(e) {
       const $current = $('.answer.testactive');
       $current.removeClass('testactive');
       $current.next('.answer').addClass('testactive');
    });
});




 


 
