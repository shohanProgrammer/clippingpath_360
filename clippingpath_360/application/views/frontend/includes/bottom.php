<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>assets/js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
<!-- Bootstarp Min js file -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<!-- Paralux -->
<script src="<?php echo base_url(); ?>assets/js/simpleparallax.js"></script>
<!-- My Custom slider js -->
<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery.easing.1.3.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/camera.min.js'></script>
<!-- Counter Up js -->
<script src="<?php echo base_url(); ?>assets/js/waypoints.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.countup.js"></script>
<!-- FancyBox Js -->
<script src="<?php echo base_url(); ?>assets/js/jquery.fancybox.js"></script>
<!-- swiper -->
<script src="<?php echo base_url(); ?>assets/js/swiper.min.js"></script>
<!--for skill chat jquary-->
<script src="<?php echo base_url(); ?>assets/js/jquery.easypiechart.js"></script>
<!-- google map js -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="<?php echo base_url(); ?>assets/js/gmap3.min.js"></script>
<!-- Flex Slider js -->
<script src="<?php echo base_url(); ?>assets/js/jquery.flexslider.js"></script>
<!-- Filtering js -->
<script src="<?php echo base_url(); ?>assets/js/jquery.nstSlider.min.js"></script>
<!-- Smoth scroll js -->
<script src="<?php echo base_url(); ?>assets/js/jQuery.scrollSpeed.js"></script>
<!-- All Plugin Active code Here -->
<script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
<!-- Main js code here -->
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script>
    $(document).ready(function () {

        var scrollLink = $('.smooth-scroll');

        // Smooth scrolling
        scrollLink.click(function (e) {
            e.preventDefault();
            $('body,html').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });

        // Active link switching
        $(window).scroll(function () {
            var scrollbarLocation = $(this).scrollTop();

            scrollLink.each(function () {

                var sectionOffset = $(this.hash).offset().top - 20;

                if (sectionOffset <= scrollbarLocation) {
                    $(this).parent().addClass('active');
                    $(this).parent().siblings().removeClass('active');
                }
            })

        })

    })
</script>
<script>
    var tag = document.createElement('script');
    tag.src = "//www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    var player;

    onYouTubeIframeAPIReady = function () {
        player = new YT.Player('player', {
            height: '315',
            width: '560',
            videoId: 'ue3diekBTos',  // youtube video id
            playerVars: {
                'controls': 0,
                'modestbranding': 1,
                'rel': 0,
                'fs': 0
            },
            events: {
                'onStateChange': onPlayerStateChange
            }
        });
    }

    var p = document.getElementById("player");
    $(p).hide();

    var t = document.getElementById("thumbnail");
    t.style.backgroundImage = "http://img.youtube.com/vi/fBruHFNIXUw/hqdefault.jpg";

    onPlayerStateChange = function (event) {
        if (event.data == YT.PlayerState.ENDED) {
            $('.start-video').fadeIn('normal');
        }
    }

    $(document).on('click', '.start-video', function () {
        $(this).hide();
        $("#player").show();
        $("#thumbnail_container").hide();
        player.playVideo();
    });
</script>
</body>
</html>