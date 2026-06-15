function stickyNav() {
  if (window.scrollY > 10) {
    document.querySelector("#header").classList.add("f-nav");
  } else {
    document.querySelector("#header").classList.remove("f-nav");
  }
}
;
jQuery(document).ready(function() {
  stickyNav();
  jQuery(window).scroll(function() {
    stickyNav();
  });
});
jQuery(document).ready(function($) {
  $(".banner-slider").owlCarousel({
    items: 1,
    loop: true,
    nav: false,
    dots: false,
    autoplay: true,
    autoplayTimeout: 5e3,
    autoplayHoverPause: false,
    smartSpeed: 2e3,
    animateOut: false,
    animateIn: false
  });
});
jQuery(document).ready(function($) {
  function toggleCarousel() {
    if ($(window).width() > 1024) {
      if (!$(".unique-blk").hasClass("owl-loaded")) {
        $(".unique-blk").addClass("owl-carousel");
        $(".unique-blk").owlCarousel({
          loop: true,
          touchDrag: true,
          mouseDrag: true,
          nav: true,
          dots: false,
          items: 3,
          margin: 0,
          autoplay: true,
          autoplayTimeout: 3e3,
          autoplayHoverPause: true,
          stagePadding: 48,
          responsive: {
            0: {
              items: 1
            },
            1025: {
              stagePadding: 30,
              items: 3
            },
            1281: {
              stagePadding: 35
            },
            1441: {
              stagePadding: 40
            },
            1651: {
              items: 3,
              stagePadding: 48
            }
          }
        });
      }
    } else {
      if ($(".unique-blk").hasClass("owl-loaded")) {
        $(".unique-blk").trigger("destroy.owl.carousel");
        $(".unique-blk").removeClass("owl-carousel owl-loaded").find(".owl-stage-outer").children().unwrap();
      }
    }
  }
  toggleCarousel();
  $(window).on("resize", toggleCarousel);
});
jQuery(document).ready(function($) {
  jQuery(".testi-blk").owlCarousel({
    loop: true,
    touchDrag: true,
    mouseDrag: true,
    nav: false,
    dots: false,
    items: 3,
    margin: 30,
    autoplay: true,
    autoplayTimeout: 3e3,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1,
        margin: 20
      },
      1025: {
        items: 3,
        margin: 21
      },
      1281: {
        items: 3,
        margin: 23
      },
      1441: {
        items: 3,
        margin: 26
      },
      1651: {
        items: 3,
        margin: 30
      }
    }
  });
});
jQuery(document).ready(function($) {
  function handleMenuToggle() {
    if ($(window).width() <= 1024) {
      $("#primary-menu .menu-item-has-children").each(function() {
        if (!$(this).children(".submenu-toggle").length) {
          $(this).append('<span class="submenu-toggle" role="button" aria-label="Toggle submenu"></span>');
        }
      });
      $(".submenu-toggle").off("click").on("click", function(e) {
        e.preventDefault();
        const $parent = $(this).closest(".menu-item-has-children");
        const $submenu = $parent.children(".sub-menu");
        $submenu.slideToggle();
        $parent.toggleClass("submenu-open");
        $(this).toggleClass("open");
      });
    } else {
      $("#primary-menu .submenu-toggle").remove();
      $("#primary-menu .sub-menu").removeAttr("style");
      $("#primary-menu .menu-item-has-children").removeClass("submenu-open");
    }
  }
  handleMenuToggle();
  $(window).on("resize", function() {
    handleMenuToggle();
  });
});
jQuery(".accordion-heading").on("click", function() {
  let parent = jQuery(this).parent();
  parent.children(".accordion-section-content").slideToggle(300);
  parent.siblings(".accordion-section").children(".accordion-section-content").slideUp(300);
  parent.toggleClass("accordien-active");
  parent.siblings(".accordion-section").removeClass("accordien-active");
});
jQuery(document).ready(function($) {
  jQuery(".in-sb-testi-blk").owlCarousel({
    loop: true,
    touchDrag: true,
    mouseDrag: true,
    nav: false,
    dots: false,
    items: 1,
    margin: 20,
    autoplay: false,
    autoplayTimeout: 3e3,
    autoplayHoverPause: true
  });
});
