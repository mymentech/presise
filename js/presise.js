;(function ($) {
    $(document).on('ready updated_cart_totals', function () {
        $('.dropdown-toggle').click(
            function () {
                if ($(this).next().is(':visible')) {
                    location.href = $(this).attr('href');
                }
            });

        $(".presise-quantity-minus").on('click', function () {
            cq = $(this).parent().find("input").val();
            cq = parseInt(cq);
            maxcq = $(this).parent().find("input").data('max');
            step = $(this).parent().find("input").data('step');

            if (maxcq === '' || cq < maxcq || maxcq === null || maxcq === undefined) {
                $(this).parent().find("input").val(cq + step);
                $("button[name='update_cart']").removeAttr('disabled');
            }

        });

        $(".presise-quantity-plus").on('click', function () {
            cq = $(this).parent().find("input").val();
            cq = parseInt(cq);
            mincq = $(this).parent().find("input").data('min');
            step = $(this).parent().find("input").data('step');

            if (cq > mincq) {
                $(this).parent().find("input").val(cq - step);
                $('button[name="update_cart"]').removeAttr('disabled');
            }
        });
    });

    $(document).ready(function () {
        var slideDelay = 4000;

        // if ($('.slider-parallax').length) {
        //     slideDelay = $('.slider-parallax').data('delay') * 1000;
        // }

        $('.presise-slider').slick({
            dots: false,
            arrows: false,
            infinite: true,
            fade: true,
            cssEase: 'linear',
            autoplay: 1,
            autoplaySpeed: slideDelay,
            pauseOnHover: false,
            speed: 900,
        });
    });

})(jQuery);