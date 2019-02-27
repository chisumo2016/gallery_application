
$(document).ready(function () {
    var user_href;
    var user_href_splitted;
    var user_id;


    // Enbabling Selection Button with Jquery
    $(".modal_thumbnails").click(function () {

        $("#set_user_image").prop('disabled', false);
        //user_id to send over server  //Pulling User Id with jQuery and Javascript
       user_href = $("#user-id").prop('href');
         //slip
        user_href_splitted =user_href.split("=");
        user_id = user_href_splitted[user_href_splitted.length - 1];


        alert( user_id);


    });




    tinymce.init({ selector:'textarea' })
});



// tinymce.init({ selector:'textarea' });