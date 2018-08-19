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