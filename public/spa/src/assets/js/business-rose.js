$(document).ready(function(){
    $(".investshow").click(function(){
        $('.hideinvest').css('display','block');
    });

    $(".investhides").click(function(){
        $('.hideinvest').css('display','none');
    });


     $(".skillperson").click(function(){
        $('.Investorform').css('display','none');

        $('.Skillpersonform').css('display','block');
    });

$(".smallinvestor").click(function(){
        $('.Investorform').css('display','block');

        $('.Skillpersonform').css('display','none');
    });
	
  function slide(link) {
  
  var down = function (callback, time) {
    var subMenu = link.nextElementSibling;
    var height = subMenu.clientHeight; 
    var part = height / 100;
    
    var paddingTop = parseInt(window.getComputedStyle(subMenu, null).getPropertyValue('padding-top'));
    var paddingBottom = parseInt(window.getComputedStyle(subMenu, null).getPropertyValue('padding-bottom'));
    var paddingTopPart = parseInt(paddingTop) / 50;
    var paddingBottomPart = parseInt(paddingBottom) / 30;
    
    (function innerFunc(i, t, b) {

      subMenu.style.height = i + 'px';
      
      i += part;
      
      if(t < paddingTop) {
      
        t += paddingTopPart;
        subMenu.style.paddingTop = t + 'px';
          
      } else if(b < paddingBottom) {

        b += paddingBottomPart;
        subMenu.style.paddingBottom = b + 'px';
      }
      
      if(i < height) { 
      
        setTimeout(function() {
            
            innerFunc(i, t, b);
            
        }, time / 100);
          
      } else { 
          
        subMenu.removeAttribute('style');
        callback();
      }
        
    })(0, 0, 0);
  },
  
  up = function (callback, time) {
      
    var subMenu = link.nextElementSibling;
    var height = subMenu.clientHeight; 
    var part = subMenu.clientHeight / 100;
    var paddingTop = parseInt(window.getComputedStyle(subMenu).paddingTop);
    var paddingBottom = parseInt(window.getComputedStyle(subMenu).paddingBottom);
    var paddingTopPart = parseInt(paddingTop) / 30;
    var paddingBottomPart = parseInt(paddingBottom) / 50;

    (function innerFunc(i, t, b) {

      subMenu.style.height = i + 'px';
      
      i -= part;
      i = i.toFixed(2);

      if(b > 0) {
          
        b -= paddingBottomPart;
        b = b.toFixed(1);                
        subMenu.style.paddingBottom = b + 'px';
          
      } else if(t > 0) {
          
        t -= paddingTopPart;
        t = t.toFixed(1); 
        subMenu.style.paddingTop = t + 'px';
      }
      
      if(i > 0) { 
      
        setTimeout(function() {
            
            innerFunc(i, t, b);
            
        }, time / 100);
          
      } else {
          
        subMenu.removeAttribute('style');
        callback(); 
      }
        
    })(height, paddingTop, paddingBottom);
  }
      
  return {
    down: down,
    up: up
  }
} 
$(document).on('change', '.registertype', function() { 
 $('.pdescritpin').css('display','none');
  $idthis=this.value;
  $('.form_user_type').val(this.value);
    this.registerUserType = this.value;
    if($idthis==1 || $idthis==2) {  
        $('.Investorform').css('display','block');
        $('.Skillpersonform').css('display','none'); }        
    else if($idthis==3 || $idthis==4 || $idthis==5) {  
        $('.Investorform').css('display','none');
        $('.Skillpersonform').css('display','block'); }
    
    $('.dis'+$idthis).css('display','block');
   
});





$(".emailscroll").click(function() {
    $('html, body').animate({
        scrollTop: $(".emailhere").offset().top
    }, 2000);
});


$(".alertscroll").click(function() {
    $('html, body').animate({
        scrollTop: $(".alerthere").offset().top
    }, 2000);
});


$(".hidescroll").click(function() {
    $('html, body').animate({
        scrollTop: $(".hidehere").offset().top
    }, 2000);
});



$(".delscroll").click(function() {
    $('html, body').animate({
        scrollTop: $(".deletehere").offset().top
    }, 2000);
});


$(".passscroll").click(function() {
    $('html, body').animate({
        scrollTop: $(".changepasswordhere").offset().top
    }, 2000);
});





});



   function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#upload-file-info').html(input.files[0].name);
                $('#img229').attr('src', e.target.result);
                $('#img229').css('display','inline-block');
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


     function readURL1(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#upload-file-info1').html(input.files[0].name);
                $('#img2291').attr('src', e.target.result);
                $('#img2291').css('display','inline-block');
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
	
	
    
