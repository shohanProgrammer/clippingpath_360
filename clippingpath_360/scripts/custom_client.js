/**
 Custom module for you to write your own javascript functions
 **/
$(document).ready(function() {

    function image_modal() {
        // Get the modal
        var modal = document.getElementById('imgModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementsByClassName('img_modal');
        //console.log(img);
        //var imgButton = document.getElementById('myImg');
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        /*img.onclick = function(){
            console.log("here i am");
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        };*/
        var modalFunction = function(){
            //console.log("here i am");
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        };
        for (var i=0; i<img.length;i++){
            img[i].addEventListener('click',modalFunction, false);
        }

// Get the <span> element that closes the modal
        var span = document.getElementsByClassName("diss")[0];

// When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        };
    }

    var pageContent=$('.page-content-wrapper');
    $('.project-view').on('submit',  function (e) {
        e.preventDefault();
        //console.log("here");
        $.ajax({
            url: "project_details",
            type: 'POST',
            data: $(this).serialize(),
            success: function (res) {
                pageContent.html(res);
                FormValidation.init();
                image_modal();
                $(function(){
                    $('#star-rating').rating();
                });
            }
        });
    });
    $('.tView').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "ticket_details",
            type: 'POST',
            data: $(this).serialize(),
            success: function (res) {
                pageContent.html(res);
                FormValidation.init();
                SweetAlert.init();
            }
        });
    });
    $('.fView').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "fund_details",
            type: 'POST',
            data: $(this).serialize(),
            success: function (res) {
                pageContent.html(res);
                FormValidation.init();
            }
        });
    });

});

/***
 Usage
 ***/
//Custom.doSomeStuff();



