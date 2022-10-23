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

                if((pageYOffset > animItemOffset - animItemPoint) && pageYOffset < (animItemOffset + animItemHeight)){
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
                scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
                scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            return{top: rect.top + scrollTop, left: rect.left + scrollLeft}
        }
        setTimeout(() =>{
            animOnScroll();
        },300); 
    }

    $(document).ready(function() {
        var element = $(".header_box");
        var height_el = element.offset().top;
         
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
        var element = $(".dropdown-content");
        var height_el = element.offset().top;
         
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

    

    // active class of menu items onscroll
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

window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }

  if (!event.target.matches('.menubtn')) {

    var dropdowns = document.getElementsByClassName("menu-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

function myMenu() {
    document.getElementById("mymenu").classList.toggle("show");
}


function checkButton() {   
    var language = document.querySelector(   
        'input[id="language"]:checked'); 
        
    if(language != null) {
        var language1 = language.value; 
    }   
    else {   
        document.getElementById("error").innerHTML   
            = "Выберите язык. ";   
    }   
    
    var age = document.querySelector(   
        'input[id="age"]:checked'); 
        
    if(age != null) {   
        var age1 = age.value   
    }   
    else {   
        document.getElementById("error1").innerHTML   
         = "Выберите возраст. ";  
         var age = document.querySelector(   
            'input[id="age"]:checked');    
    }   
    var class_schedule = document.querySelector(   
        'input[id="class_schedule"]:checked'); 
        
    if(class_schedule != null) {   
        var class_schedule1 = class_schedule.value   
    }   
    else {   
        document.getElementById("error2").innerHTML   
         = "Выберите график. ";   
    }  
    var class_type = document.querySelector(   
        'input[id="class_type"]:checked'); 
        
    if(class_type != null) {     
        var class_type1 = class_type.value   
    }   
    else {   
        document.getElementById("error3").innerHTML   
         = "Выберите тип занятий. ";   
    }  

    if(language != null && age != null && class_schedule != null && class_type != null){ 
       var calc = language1*age1*class_schedule1*class_type1
       document.getElementById("disp").innerHTML   
       = Math.round(calc); 
       document.getElementById("disp1").innerHTML   
       = Math.round(calc*9*0.95/2); 
       document.getElementById("disp2").innerHTML   
       = Math.round(calc*9*0.92);   
       calcres.classList.add('calcactive');
       calcparametr.classList.add('noactive');
    }else{
        success.classList.add('noactive');
    }
}    


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
    var question;
    var noright;
    var right;
    
    question = 1;
    noright = 0;
    right = 0;
        
    result = "";
    var choice; 
    for (question = 1; question <= 20; question++) {
        var q = document.forms['quiz'].elements['q'+question];
        for (var i = 0; i < q.length; i++) {
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
       var $current = $('.answer.testactive');
       $current.removeClass('testactive');
       $current.next('.answer').addClass('testactive');
    });
});


var popup = document.getElementById('pop-up');

function popYes() {
  sessionStorage.setItem('popup', 'none');
  location.reload();
}

if(sessionStorage.getItem('popup') || !window.sessionStorage) {
  popup.parentNode.removeChild(popup);
}else{
  if(window.stop !== undefined) {
    window.stop();
  } else if (document.execCommand !== undefined) {
    document.execCommand("Stop", false);
  }
}

 


 
