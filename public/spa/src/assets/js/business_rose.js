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