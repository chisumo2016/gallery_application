$(document).ready(function () {
    // Enbabling Selection Button with Jquery
    $(".modal_thumbnails").click(function () {

        $("#set_user_image").prop('disabled', false);
        //user_id to send over server


    });




    tinymce.init({ selector:'textarea' })
});



// tinymce.init({ selector:'textarea' });