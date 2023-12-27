<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            items: 2,
            autoplay: true,
            autoplayTimeout: 2000,
            loop: true,
            nav: true,
            navText: ["<i class='fas fa-long-arrow-alt-left fa-3x pr-2'></i>", "<i class='fas fa-long-arrow-alt-right fa-3x pl-2'></i>"],
            dots: false
        });

        // $(".active-exclusive-product-slider").owlCarousel({
        //     items: 1,
        //     autoplay: false,
        //     autoplayTimeout: 5000,
        //     loop: true,
        //     nav: true,
        //     navText: ["<img src='img/banner/prev.png'>", "<img src='img/banner/next.png'>"],
        //     dots: false
        // });
    });
</script>