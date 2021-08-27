$(document).ready(function() {
    //owl full width slider option
    var owlFullSlider = $('.owl-fullSlider  .owl-carousel');
    owlFullSlider.owlCarousel({
        rtl: true,
        margin: 0,
        dots: true,
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            }

        }
    })

    $('.owl-fullSlider .owl-prev').click(function() {
        owlFullSlider.trigger('next.owl.carousel');
    })

    $('.owl-fullSlider .owl-next').click(function() {
        owlFullSlider.trigger('prev.owl.carousel', [300]);
    })

    //owl amazing carousel option
	var amazing = $('#home-amazing .owl-product .owl-carousel');
	amazing.owlCarousel({
		rtl: true,
		margin: 30,
		dots: false,
		loop: true,
		autoplay: true,
		responsive: {
			0: {
				items: 3
			},
			1170: {
				items: 4
			}
		}
	});
	$('#home-amazing .owl-product .owl-prev').click(function() {
		amazing.trigger('next.owl.carousel');
	});
	$('#home-amazing .owl-product .owl-next').click(function() {
		amazing.trigger('prev.owl.carousel', [300]);
	});

    //owl recent product carousel option
	var owlProduct = $('.recent-product .owl-carousel');
	owlProduct.owlCarousel({
		rtl: true,
		margin: 30,
		dots: false,
		loop: true,
		autoplay: true,
		responsive: {
			0: {
				items: 3
			},
			1170: {
				items: 4
			}
		}
	});
	$('.recent-product .owl-prev').click(function() {
		owlProduct.trigger('next.owl.carousel');
	});
	$('.recent-product .owl-next').click(function() {
		owlProduct.trigger('prev.owl.carousel', [300]);
	});

    //owl mode-suggest carousel option
	var owlSuggest = $('.owl-mode-suggest .owl-carousel');
	owlSuggest.owlCarousel({
		rtl: true,
		margin: 30,
		dots: false,
		loop: true,
		responsive: {
			0: {
				items: 1
			},
			768: {
				items: 2
			},
			992: {
				items: 3
			},
			1170: {
				items: 4
			}
		}
	});
	$('.owl-mode-suggest .owl-prev').click(function() {
		owlSuggest.trigger('next.owl.carousel');
	});
	$('.owl-mode-suggest .owl-next').click(function() {
		owlSuggest.trigger('prev.owl.carousel', [300]);
	});


  // create pdp gallery
  var owlPdp = $(".owl-carousel.pdp-gallery");
  // var activeIndex = productData.colors[activeColor].videos.length
  owlPdp.owlCarousel({
      rtl: true,
      items: 1,
      nav: true,
      dots: true,
      // startPosition: activeIndex,
      dotsContainer: '.gallery-dots',
      responsive: {
          0: {
              items: 1
          }

      }
      // navContainer: 'gallery-nav'
  });
  $('.owl-dot').click(function () {
    owl.trigger('to.owl.carousel', [$(this).index(), 300]);
  });

  //owl related products option
  var owlProductRel = $('#home-bani-suggest .owl-product .owl-carousel');
  owlProductRel.owlCarousel({
      rtl: true,
      margin: 28,
      dots: false,
      loop: true,
      autoplay: true,
      responsive: {
          0: {
              items: 1
          },
          768: {
              items: 2
          },
          992: {
              items: 3
          },
          1170: {
              items: 4
          }

      }
  });
  $('#home-bani-suggest .owl-product .owl-prev').click(function() {
      owlProductRel.trigger('next.owl.carousel');
  });
  $('#home-bani-suggest .owl-product .owl-next').click(function() {
      owlProductRel.trigger('prev.owl.carousel', [300]);
  });

  // cart menu
  $(".cart-btn").click(function() {
      var url = window.location.href
      if (url.includes('/order?step=')) {
          window.location.href = window.location.origin + '/order?step=0'
      } else {
          $(".profile").removeClass("active")
          $("#cartMenu").toggleClass("active")
      }

  });
  $(".wishlist-btn").click(function() {
      window.location.href = "/wishlist"
  });
  $('body').click(function() {
      $('#cartMenu, .profile').removeClass("active");
  });

  $('#cartMenu, .cart-btn, #profileMenu, .profile').click(function(event) {
      event.stopPropagation();
  });

  if ($(".cart-products .product-card").length == 0) {
      $('#cartMenu .header-submenu-container').hide()
      $('#cartMenu .empty-cart').fadeIn();
      $(".cart-btn-count").fadeOut(100)
  }
  $(".cart-btn-count").text($(".cart-products .product-card").length)

  //delete product
  $(".product-card .img-box .remove").click(function() {
      var currentProduct = $(this).parent(".img-box").parent(".product-card").attr("product-id")
      $(".product-card").remove("[product-id=" + currentProduct + "]")
      $(".cart-btn-count").text($(".cart-products .product-card").length)
      if ($(".cart-products .product-card").length == 0) {
          $('#cartMenu .header-submenu-container').hide()
          $('#cartMenu .empty-cart').fadeIn();
          $(".cart-btn-count").fadeOut(100)
      }
  })

  // _____________product share
  $(".product-share .share").click(function() {
      $(this).parent(".product-share").children(".share-options").toggleClass("active")
  })

      // _________ product details
      $('.product-details-nav button:first-child').addClass('active')
      $('.product-details-content .tab-content:first-child').addClass('active')
      $("#descriptionBtn").click(function() {
          $(this).addClass("active")
          $("#additional_informationBtn").removeClass("active")
          $("#reviewsBtn").removeClass("active")
          $("#description").addClass("active")
          $("#additional_information").removeClass("active")
          $("#reviews").removeClass("active")
      })
      $("#additional_informationBtn").click(function() {
          $(this).addClass("active")
          $("#descriptionBtn").removeClass("active")
          $("#reviewsBtn").removeClass("active")
          $("#description").removeClass("active")
          $("#additional_information").addClass("active")
          $("#reviews").removeClass("active")
      })
      $("#reviewsBtn").click(function() {
          $(this).addClass("active")
          $("#descriptionBtn").removeClass("active")
          $("#additional_informationBtn").removeClass("active")
          $("#description").removeClass("active")
          $("#additional_information").removeClass("active")
          $("#reviews").addClass("active")
          $(".woocommerce-Reviews").addClass("active")
      })
})
