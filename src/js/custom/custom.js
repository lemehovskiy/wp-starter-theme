$(function () {

    function initMainNavigation() {

        $('.navbar-nav .menu-item-has-children, .dropdown.search, .dropdown.login-wrap').each(function () {

            var $this = $(this);

            var $sub_menu = $this.children('.dropdown-menu');

            // $sub_menu.attr('id', 'accordion');

            var $sub_menu_items = $sub_menu.children('li');


            $this.on('show.bs.dropdown', function () {

                TweenMax.set($sub_menu, {height: "auto", autoAlpha: 1});
                TweenMax.from($sub_menu, 0.3, {height: 0});
                TweenMax.from($sub_menu, 0.5, {autoAlpha: 0});


                var delay = 0;

                var shift = 0.1;

                var tl = new TimelineMax();

                for(var i = 1; i <= $sub_menu_items.length; i++) {

                    delay = i * 0.2 - shift;

                    tl.to($sub_menu_items[i-1], 0.2,
                        {
                            opacity: 1
                        },
                        delay);

                    shift = shift + 0.11;

                }
            })


            $this.on('hide.bs.dropdown', function () {
                TweenMax.to($sub_menu, 0.3, {height: 0});
                TweenMax.to($sub_menu, 0.5, {autoAlpha: 0});
                TweenMax.set($sub_menu_items, {opacity: 0});
            })

        })

    }


    initMainNavigation();


});