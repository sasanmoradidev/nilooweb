$(document).ready(function() {


    //handel back
    var entryLen = window.history.length
    window.addEventListener('popstate', function() {
        history.go(-1 * (window.history.length - entryLen))
    });

    // _____product gallery

    // let color_value = "#000000"

    $.fn.digits = function() {
            return this.each(function() {
                $(this).text($(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
            })
        }
        // COMMENT
        // history.pushState({}, '', 'BM-26423/Ú©ÙØ´-Ø±Ø§Ø­ØªÛŒ-Ù…Ø±Ø¯Ø§Ù†Ù‡-Ù…Ù„-Ø§Ù†Ø¯-Ù…ÙˆÚ˜-mel-moj-Ù…Ø¯Ù„-mcn403.html#/Ø±Ù†Ú¯-Ù†ÛŒÙ„ÛŒ/Ø³Ø§ÛŒØ²-m')
    var activeColorStr
    var activeSize
    var activeColor

    function findProductInfo() {
        if (window.location.hash) {
            var sPageURL = decodeURIComponent(window.location.hash);
            if (sPageURL) {
                var arr = []
                arr = sPageURL.split('#')
                var arr2 = []
                arr2 = arr[1].split('/')
                    // first color
                if (arr2[1]) {
                    activeColorStr = arr2[1].split(/-(.+)/)[1]
                    if (activeColorStr) {
                        activeColorStr = activeColorStr.replace(/-/g, "_")
                        activeColorStr = activeColorStr.replace(/\u200c/g, "_")
                        activeColorStr = activeColorStr.replace(/ /g, "_")
                            // first color index
                        activeColor = productData.colors.map(color => color.color_slug).indexOf(activeColorStr)
                        if (activeColor === -1)
                            activeColor = 0
                    } else
                        activeColor = 0
                } else
                    activeColor = 0
            } else
                activeColor = 0

            // active size
            if (arr2[2]) {
                activeSize = arr2[2].split('-')
                if (activeSize[1])
                    activeSize = activeSize[1].toUpperCase()
                else
                    activeSize = ''
            } else
                activeSize = ''

        } else
            activeColor = 0

    }
    findProductInfo()

    $("#sizeChart .size-chart-tabs button").on("click", function() {
        $(".size-chart-tabs button").removeClass("active");
        $(this).addClass("active");
    })
    $("#sizeChart .size-guide").on("click", function() {
        $("#sizeChartBox").hide();
        $("#sizeGuideBox").fadeIn(400).delay(100);
    })
    $("#sizeChart .size-chart").on("click", function() {
            $("#sizeGuideBox").hide();
            $("#sizeChartBox").fadeIn(400).delay(100);
        })
        // check for available or notavailable
    var checkAvailable = 0

    // create product color list
    function productColorsFunc(item, index) {

        if (item.quantity === 0)
            var createColors = "<div class='item'><label class='unavailable'><input type='radio' rel=" + index + " colorName='" + item.color_name + "'  name='productColor'><img src=" + item.values[0] + " data-zoom='" + item.zoom[0] + "' alt='" + productData.product_name + ' ' + item.color_name + "'><span class='overlay'></span></input><p>" + item.color_name + "</p></label></div>"
        else
            var createColors = "<div class='item'><label><input type='radio' rel=" + index + " colorName='" + item.color_name + "' name='productColor'><img src=" + item.values[0] + " data-zoom='" + item.zoom[0] + "' alt='" + productData.product_name + ' ' + item.color_name + "'><span class='overlay'></span></input><p>" + item.color_name + "</p></label></div>"
        return createColors
    }

    // zoom config
    var zoom = $("#pdp-zoom-container");
    var zoomConfig = {
        zoomType: "inner",
        cursor: "crosshair",
        galleryActiveClass: "active",
        zoomWindowFadeIn: 200,
        zoomWindowFadeOut: 200,
        lensFadeIn: 200,
        lensFadeOut: 200,
        easing: true,
        /* loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif', */
        /* imageSrc: $('.pdp-gallery .owl-stage .owl-item.active img').attr('data-zoom') */
    };


    var owlColorList = $(".owl-carousel.color-list");
    owlColorList.owlCarousel({
        rtl: true,
        nav: true,
        dots: true,
        startPosition: activeColor,
        // mouseDrag: false,
        // loop: true
        responsive: {
            1440: {
                margin: 10,
                items: 7
            },
            1024: {
                margin: 4,
                items: 6
            }
        }
    });
    // active first color defultly
    setTimeout(function() {
        $("#pdpProductColorList .owl-item:nth-child(" + (activeColor + 1) + ") label").addClass("active")
        $("#pdpProductColorList .owl-item:nth-child(" + (activeColor + 1) + ") input").attr("checked", true);
        $('.zoomContainer').remove();
        $('#pdp-zoom-container').removeData('elevateZoom');
        var imgSrc = '';
        if (!$('#gallery-dots .owl-dot.active img').attr('data-video')) {
            $('#pdp-zoom-container').removeAttr('style')
            imgSrc = $('.gallery-dots .active img').attr('data-zoom');

        } else {
            $('.pdp-zoom-spinner').remove();
            $('#pdp-zoom-container').css('display', 'none')
        }
        zoomConfig.imageSrc = imgSrc;
    }, 900)



    // owl dots fade in of bottom after 1 second.
    setTimeout(function() {
        $(".owl-carousel.color-list .owl-nav, .owl-carousel.color-list .owl-dots").css({ "opacity": "1", "top": "-35px" })
    }, 1000)

    // create pdp gallery
    var owlPdp = $(".owl-carousel.pdp-gallery");
    owlPdp.owlCarousel({
        rtl: true,
        items: 1,
        nav: true,
        dots: true,
        dotsContainer: '.gallery-dots',
        // navContainer: 'gallery-nav'
    });




    owlPdp.on('changed.owl.carousel', function(event) {
        $('.zoomContainer').remove();
        $('#pdp-zoom-container').removeData('elevateZoom');
        var imgSrc = '';
        setTimeout(function() {
            if (!$('.gallery-dots .active img').attr('data-video')) {
                imgSrc = $('.gallery-dots .active img').attr('data-zoom');
                $('#pdp-zoom-container').removeAttr('style')
            } else {
                $('.pdp-zoom-spinner').remove()
                $('#pdp-zoom-container').css('display', 'none')
            }
            $('#pdp-zoom-container').attr('data-zoom-image', imgSrc);
            var imgZoom = imgSrc;
            zoomConfig.imageSrc = imgZoom;
            zoom.elevateZoom(zoomConfig);
        }, 500)

    });
    $(document).on('click', '.owl-item.cloned a', function(e) {
        var $slides = $(this)
            .parent()
            .siblings('.owl-item:not(.cloned)');

        $slides
            .eq(($(this).attr("data-index") || 0) % $slides.length)
            .find('a')
            .trigger("click.fb-start", { $trigger: $(this) });

        return false;
    });


    function colorSizes(item) {
        if (item.quantity === 0) {
            if (activeSize && item.name === activeSize)
                var createSizes = "<option class='size-option' refrence='" + item.reference + "' selected available='false' value=" + item.name + " disabled='true' >" + item.name + "</option>"
            else
                var createSizes = "<option class='size-option' refrence='" + item.reference + "' value=" + item.name + " available='false' disabled='true'>" + item.name + "</option>"
        } else if (productData.colors[activeColor].size.length === 1)
            var createSizes = "<option class='size-option' refrence='" + item.reference + "' selected idProductAttribute=" + item.id_product_attribute + " available='true' value=" + item.name + " disabled='false' >" + item.name + "</option>"
        else {
            if (activeSize && item.name === activeSize)
                var createSizes = "<option class='size-option' refrence='" + item.reference + "' selected idProductAttribute=" + item.id_product_attribute + " available='true' value=" + item.name + " disabled='false' >" + item.name + "</option>"
            else
                var createSizes = "<option class='size-option' refrence='" + item.reference + "' idProductAttribute=" + item.id_product_attribute + " available='true' value=" + item.name + " disabled='false' >" + item.name + "</option>"
        }

        return createSizes
    }


    // Customize select options
    function customSelect() {
        var x, i, j, l, ll, selElmnt, a, b, c;
        /*look for any elements with the class "bani-select-box":*/
        x = document.getElementsByClassName("bani-select-box");
        l = x.length;
        for (i = 0; i < l; i++) {
            selElmnt = x[i].getElementsByTagName("select")[0];
            ll = selElmnt.length;
            /*for each element, create a new DIV that will act as the selected item:*/
            a = document.createElement("DIV");
            a.setAttribute("class", "select-selected");
            a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
            x[i].appendChild(a);
            /*for each element, create a new DIV that will contain the option list:*/
            b = document.createElement("DIV");
            b.setAttribute("class", "select-items select-hide");

            for (j = 1; j < ll; j++) {
                /*for each option in the original select element,
                create a new DIV that will act as an option item:*/
                c = document.createElement("DIV");
                c.innerHTML = selElmnt.options[j].innerHTML;

                c.addEventListener("click", function(e) {
                    /*when an item is clicked, update the original select box,
                    and the selected item:*/
                    var y, i, k, s, h, sl, yl;
                    s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                    sl = s.length;
                    h = this.parentNode.previousSibling;


                    for (i = 0; i < sl; i++) {
                        if (s.options[i].innerHTML == this.innerHTML) {
                            s.selectedIndex = i;
                            h.innerHTML = this.innerHTML;
                            y = this.parentNode.getElementsByClassName("same-as-selected");
                            yl = y.length;
                            for (k = 0; k < yl; k++) {
                                y[k].removeAttribute("class");
                            }
                            this.setAttribute("class", "same-as-selected");
                            break;
                        }
                    }
                    h.click();
                });
                b.appendChild(c);
            }
            x[i].appendChild(b);
            a.addEventListener("click", function(e) {
                /*when the select box is clicked, close any other select boxes,
                and open/close the current select box:*/
                e.stopPropagation();
                closeAllSelect(this);
                this.nextSibling.classList.toggle("select-hide");
                // $(this).next().fadeToggle(200);
                this.classList.toggle("select-arrow-active");
            });
        }

        function closeAllSelect(elmnt) {
            /*a function that will close all select boxes in the document,
            except the current select box:*/
            var x, y, i, xl, yl, arrNo = [];
            x = document.getElementsByClassName("select-items");
            y = document.getElementsByClassName("select-selected");
            xl = x.length;
            yl = y.length;
            for (i = 0; i < yl; i++) {
                if (elmnt == y[i]) {
                    arrNo.push(i)
                } else {
                    y[i].classList.remove("select-arrow-active");
                }
            }
            for (i = 0; i < xl; i++) {
                if (arrNo.indexOf(i)) {
                    x[i].classList.add("select-hide");
                    // x[i].fadeOut(200);
                }
            }
        }

        /*if the user clicks anywhere outside the select box,
        then close all select boxes:*/
        document.addEventListener("click", closeAllSelect);

        for (var i = 1; i < $(".bani-select-box select option").length; i++) {
            if ($(".bani-select-box select option:nth-child(" + (i + 1) + ")").attr("available") === "false") {
                $(".select-items div:nth-child(" + i + ")").after("<div class='disabled'>" + $(".bani-select-box select option:nth-child(" + (i + 1) + ")").attr("value") + "</div>")
                $(".select-items div:nth-child(" + i + ")").remove()
            }
        }

    }
    customSelect()

    //color name
    $("#PColorName").text("( " + $("#pdpProductColorList .owl-item:nth-child(" + (activeColor + 1) + ") input").attr("colorName") + " )")

    if (checkAvailable === 0) {
        $(".not-available-pdp").fadeIn()
        $(".product-is-available").hide()
        $(".discount-gallery").hide()
    } else {
        $(".not-available-pdp").hide()
        $(".product-is-available").fadeIn()
        $(".discount-gallery").fadeIn()
    }
    /*if (productData.in_flash_sales && (checkAvailable > 0)) {


        $(".product-countdown-timer").show()

        // Set the date we're counting down to
        var countDownDate = document.getElementById("timer").getAttribute("data-seconds")

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            // Output the result in an element with id="timer"
            document.getElementById("timer").innerHTML = "<span>" + seconds + "</span>" + " : " + "<span>" + minutes + "</span>" + " : " + "<span>" + hours + "</span>" + " ";

            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("timer").innerHTML = "EXPIRED";
            }
        }, 1000);

    } else {
        $(".product-countdown-timer").remove()
    }*/


        // _____________product share
    $(".product-share .share").click(function() {
        $(this).parent(".product-share").children(".share-options").toggleClass("active")
    })


    //add free size tag
    // if (productData.colors[activeColor].size.length === 1) {
    //     $(".owl-carousel.pdp-gallery").after("<div class='tag-gallery haveTag'>ØªÚ© Ø³Ø§ÛŒØ² </div>")
    // }



    $(".bani-select-box .select-items div").click(function() {
        $('#selectSize option').each(function() {
            if (this.selected) {
                $('#product-refrence-size').css('display', 'block')
                $('#product-refrence').css('display', 'none')
                $('#product-refrence-size').text($(this).attr("refrence").toLowerCase())
            }
        })
    })

    function checkColorInWishlist() {
        $('.wishlist').removeClass('active')
        if (window.customer.user && (window.customer.type === 'signin' || window.customer.type === 'signup')) {
            var wishList = window.customer.user.wishlist
            var pdpWishList = $('.wishlist').attr('data-product-id');
            wishList.map(product => {
                if (product.toString() === pdpWishList) {
                    $('.wishlist').addClass('active')
                }
            })
        }
    }
    checkColorInWishlist()
    var rel;

    //id of each color for notify me
    var idColor = productData.colors[activeColor].id_color

    $("#pdpProductColorList input").click(function() {

        // checkAvailable will be 0
        $("#pdpProductColorList label").removeClass("active")

        $("#PColorName").text("( " + $(this).attr("colorName") + " )")

        $(this).parent("label").addClass("active")
        $(".gallery-container .pdp-gallery .owl-stage, .gallery-container .gallery-dots").empty()


        rel = $(this).attr("rel")


        // _____________add product attrebiute id of each color to add to wish list button.
        $(".product-share .wishlist").attr("data-product-id", productData.colors[rel].id_product_attribute)

        // check for which one is into the wishlist
        checkColorInWishlist()

        // product images gallery creator
        var colorsVideoPosters = productData.colors[rel].videos.map(function(item) {
            return item.poster_path
        })

        var colorsMediaThumbs = colorsVideoPosters.concat(productData.colors[rel].values);

        function productGalleryFunc(item, index) {
            if (index < productData.colors[rel].videos.length) {
                var createGallery = '<div class="item"> <img src="' + item + '" alt="' + productData.product_name + ' ' + productData.colors[rel].color_name + '"data-zoom="" data-video="true" class="pdp-video"><span class="overlay  pdp-video-overlay"></span></div>';
                return createGallery
            } else {
                var createGallery = '<div class="item"> <img src="' + item + '" alt="' + productData.product_name + ' ' + productData.colors[rel].color_name + '"><span class="overlay"></span></div>';
                return createGallery
            }

        }

        // replacing new images

        var newColors = colorsMediaThumbs.map(productGalleryFunc)
        $('.owl-carousel.pdp-gallery').trigger('replace.owl.carousel', newColors.toString()).trigger('refresh.owl.carousel');


        // createing new indicators

        for (var i = 0; i < colorsMediaThumbs.length; i++) {

            if (i < colorsVideoPosters.length) {
                $(".gallery-dots .owl-dot:nth-child(" + (i + 1) + ")").empty().append("<img src=" + colorsMediaThumbs[i] + " data-zoom='" + colorsMediaThumbs[i] + "'  alt='" +
                    productData.product_name + ' ' + productData.colors[rel].color_name + "' data-video='true'><span class='overlay pdp-video-overlay'></span>")
            } else {
                $(".gallery-dots .owl-dot:nth-child(" + (i + 1) + ")").empty().append("<img src=" + colorsMediaThumbs[i] + " data-zoom='" + productData.colors[rel].zoom[i - colorsVideoPosters.length] + "'  alt='" +
                    productData.product_name + ' ' + productData.colors[rel].color_name + "'><span class='overlay'></span>")
            }

        }
        $(".gallery-container .gallery-dots button:first").addClass("active")
        if (productData.colors[rel].has_product_set) {
            $('#set-suggest .owl-product .owl-stage').empty();
            showSet(productData.colors[rel].product_sets);

        } else {
            $('#set-suggest .owl-product .owl-stage').empty()
            $('.set-btn-box').remove();
            $('#set-suggest').css('display', 'none')
            $('#set-suggest .owl-product .owl-carousel').owlCarousel('destroy');
        }

        // product sizes gallery creator
        function colorSizes(item) {
            if (item.quantity === 0) {
                var createSizes = "<option class='size-option' refrence='" + item.reference + "' value=" + item.name + " available='false' disabled='true'>" + item.name + "</option>"
            } else {
                if (productData.colors[rel].size.length === 1)
                    var createSizes = "<option class='size-option' refrence='" + item.reference + "' selected idProductAttribute=" + item.id_product_attribute + " available='true' value=" + item.name + " disabled='false' >" + item.name + "</option>"
                else
                    var createSizes = "<option class='size-option' refrence='" + item.reference + "' idProductAttribute=" + item.id_product_attribute + " available='true' value=" + item.name + " disabled='false' >" + item.name + "</option>"
            }
            return createSizes
        }

        $("#selectSize").empty().append("<option class='defult' value='unset'>Ø§Ù†ØªØ®Ø§Ø¨ Ø³Ø§ÛŒØ²</option>" + productData.colors[rel].size.map(colorSizes).toString().replace(/,/g, ''))


        $(".select-selected, .select-items").remove()


        customSelect()
        $('#product-refrence').css('display', 'block')
        $('#product-refrence-size').css('display', 'none')
            // change url
        history.pushState({}, '', window.location.pathname.split('#')[0] + "#/Ø±Ù†Ú¯-" + productData.colors[rel].color_slug)
        $(".bani-select-box .select-items div").not(".disabled").click(function() {
            $('#selectSize option').each(function() {
                if (this.selected) {
                    history.pushState({}, '', window.location.pathname.split('#')[0] + "#/Ø±Ù†Ú¯-" + productData.colors[rel].color_slug + "/Ø³Ø§ÛŒØ²-" + $(this).attr("value").toLowerCase())
                }
            })
        })
        $(".bani-select-box .select-items div").click(function() {
            $('#selectSize option').each(function() {
                if (this.selected) {
                    $('#product-refrence').css('display', 'none')
                    $('#product-refrence-size').css('display', 'block')
                    $('#product-refrence-size').text($(this).attr("refrence").toLowerCase())

                }
            })
        })

        //id of each color for notify me
        idColor = productData.colors[rel].id_color


        // ___ handling available or notavailable product design
        for (var i = 0; i < productData.colors[rel].size.length; i++) {
            checkAvailable = checkAvailable + productData.colors[rel].size[i].quantity
        }
        if (checkAvailable === 0) {
            $(".not-available-pdp").fadeIn()
            $(".product-is-available").hide()
            $(".product-available-price-pdp").hide()
            $(".discount-gallery").fadeOut()
        } else {
            $(".not-available-pdp").hide()
            $(".product-is-available").fadeIn()
            $(".product-available-price-pdp").fadeIn()
            $(".discount-gallery").fadeIn()
        }


        activeIndex = productData.colors[rel].videos.length
        owlPdp.trigger('to.owl.carousel', [activeIndex, 1]);



        // _____________product share
        $(".product-share .whatsapp").attr("href", "https://api.whatsapp.com/send?text=https://www.banimode.com/" + productData.colors[rel].link)
        $(".product-share .telegram").attr("href", "https://telegram.me/share/url?text=" + productData.product_name + "&url=https://www.banimode.com/" + productData.colors[rel].link)
        $(".product-share .twitter").attr("href", "https://twitter.com/intent/tweet?text=https://www.banimode.com/" + productData.colors[rel].link)
        $(".product-share .google").attr("href", "mailto:?body=https://www.banimode.com/" + productData.colors[rel].link)


    })


    if (productData.product_specific_price != null) {
        $(".product-summary-section .old-price").text(Math.round(productData.product_price) + " ØªÙˆÙ…Ø§Ù† ").digits()
        $(".product-summary-section .discount-value span").text(Math.round(productData.product_specific_price.discount_amount) + " ØªÙˆÙ…Ø§Ù† ").digits()
        $(".product-summary-section .price-value span:first").text(Math.round(productData.product_specific_price.specific_price) + " ØªÙˆÙ…Ø§Ù† ").digits()
        $(".owl-carousel.pdp-gallery .owl-stage-outer").append("<div class='discount-gallery'>" + productData.product_specific_price.discount_percent + "%</div>")
            // $(".discount-gallery").text(productData.product_specific_price.discount_percent + "%")

        // __________ timer
        function progress(timeleft, timetotal, $element) {
            var progressBarWidth = timeleft * $element.width() / timetotal;
            $element.find('div').animate({ width: progressBarWidth }, 500);
            if (timeleft > 0) {
                setTimeout(function() {
                    progress(timeleft - 1, timetotal, $element);
                }, 1000);
            }
        };
        progress(new Date(productData.product_specific_price.to), new Date(productData.product_specific_price.to), $('#timeProgress'));

    } else {
        $(".product-summary-section .old-price").hide()
        $(".product-summary-section .discount-value").hide()
        $(".product-summary-section .price-value span:first").text(Math.round(productData.product_price) + " ØªÙˆÙ…Ø§Ù† ").digits()
            // $(".discount-gallery").remove().hide()
    }




    // _________ product details
    $('.product-details-nav button:first-child').addClass('active')
    $('.product-details-content .tab-content:first-child').addClass('active')
    $("#productOptionsBtn").click(function() {
        $(this).addClass("active")
        $("#productCheckingBtn").removeClass("active")
        $("#productSpecificationsBtn").removeClass("active")
        $("#productCommentsBtn").removeClass("active")
        $("#productOptions").addClass("active")
        $("#productSpecifications").removeClass("active")
        $("#productChecking").removeClass("active")
        $("#productComments").removeClass("active")
    })
    $("#productSpecificationsBtn").click(function() {
        $(this).addClass("active")
        $("#productCheckingBtn").removeClass("active")
        $("#productOptionsBtn").removeClass("active")
        $("#productCommentsBtn").removeClass("active")
        $("#productSpecifications").addClass("active")
        $("#productOptions").removeClass("active")
        $("#productComments").removeClass("active")
        $("#productChecking").removeClass("active")
    })
    $("#productCheckingBtn").click(function() {
        $(this).addClass("active")
        $("#productOptionsBtn").removeClass("active")
        $("#productSpecificationsBtn").removeClass("active")
        $("#productCommentsBtn").removeClass("active")
        $("#productSpecifications").removeClass("active")
        $("#productOptions").removeClass("active")
        $("#productComments").removeClass("active")
        $("#productChecking").addClass("active")
    })
    $("#productCommentsBtn").click(function() {
        $(this).addClass("active")
        $("#productSpecificationsBtn").removeClass("active")
        $("#productCheckingBtn").removeClass("active")
        $("#productOptionsBtn").removeClass("active")
        $("#productComments").addClass("active")
        $("#productSpecifications").removeClass("active")
        $("#productOptions").removeClass("active")
        $("#productChecking").removeClass("active")
    })

    //___check for size is selected
    $(".product-add-to-cart-pdp").mouseover(function() {
        if ($("#selectSize option:selected").attr("value") == "unset") {
            $(this).addClass('disable-btn')
                // $(this).children(".tooltip-box").show()
        } else {
            $(this).removeClass('disable-btn').addClass('active-btn')
                // $(this).children(".tooltip-box").fadeOut()
        }
    })

    $("#selectSize").click(function() {
        $(this).removeClass("error")
        $(this).children(".tooltip-box").fadeOut()
    })
    $(".product-add-to-cart-pdp").mouseout(function() {
        $(this).children(".tooltip-box").fadeOut()
    })


    // remove error when click everywhere exept add to cart button.
    $(document).click(function(e) {
        if (!$(e.target).is('.product-add-to-cart-pdp') && !$(e.target).is('.product-add-to-cart-pdp *')) {
            $('#selectSize').removeClass("error")
        }
    });

    //add to cart = > move to main TO DO
    function addToCart(attrId) {
        let token = window.customer.token;
        return axios({
            method: 'post',
            url: baseUriAPI + baseAPIV1 + 'cart',
            data: {
                attribute_id: attrId,
                count: 1,
            },
            headers: {
                'Authorization': `Bearer ` + token,
            }
        })




    }

    function showLoginModal() {
        $("#login").modal('show');
    }

    //____________________________________________________

    // ___ show successful message for adding to cart
    $(".product-add-to-cart-pdp").click(function() {
            if ($("#selectSize option:selected").attr("value") == "unset") {
                $("#selectSize").addClass("error")
                    //$(this).attr("data-target", "")
                $(this).children(".tooltip-box").fadeIn()
            } else {
                $('body').LoadingOverlay("show", {
                    background: "rgba(0, 0, 0, 0.5)",
                    image: tplUri + "assets/images/icon/spinner-loading.svg",
                });
                $("#selectSize").removeClass("error")
                var id_product_attribute = $("#selectSize option:selected").attr("idProductAttribute")
                    //$(this).attr("data-target", "#addToCart")
                $(this).children(".tooltip-box").fadeOut()

                addToCart(id_product_attribute).then(function(response) {
                    if (response.data.status === 'success') {
                        $('body').LoadingOverlay("hide")
                        $('#product-add-to-basket').modal('show');
                        $('#product-add-to-basket .unsuccess').css({ display: 'none' })
                        $('#product-add-to-basket .success').show()
                        $('#product-add-to-basket .success p').text(response.data.message)
                        getMiniCart();
                    } else if (response.data.status === 'error') {
                        $('body').LoadingOverlay("hide")
                        $('#product-add-to-basket').modal('show');
                        $('#product-add-to-basket .unsuccess').show()
                        $('#product-add-to-basket .success').css({ display: 'none' })
                        $('#product-add-to-basket .unsuccess p').text(response.data.message)
                    } else if (result.status_code === 401 || result.status_code === 403) {
                        checkCustomerToken();
                    }

                }).catch(function(response) {

                });


            }
        })
        // notify me
    $("#productRemainder").on("click", function() {
        if (!customer.hasOwnProperty('user')) {
            $('#login').modal('show')
        } else {
            $.ajax({
                type: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + customer.token
                },
                data: {
                    'id_product': productID,
                    'id_color': idColor
                },
                url: baseUriAPI + baseAPIV1 + 'products/available-notify',
                success: function(data) {
                    var content = '';
                    if (data.status_code == 200) {
                        content += '<div class="modal-body">' +
                            '<img src="' + baseUri + tplUri + 'assets/images/icon/big-bell.svg" alt="Ù…ÙˆØ¬ÙˆØ¯ Ø´Ø¯ Ø®Ø¨Ø±Ù… Ú©Ù†">' +
                            '<p>Ù…ÙˆØ¬ÙˆØ¯ Ø´Ø¯ Ø®Ø¨Ø±Øª Ù…ÛŒâ€ŒÚ©Ù†ÛŒÙ….</p>' +
                            '<p>Ø¨Ù‡ Ù…Ø­Ø¶ Ù…ÙˆØ¬ÙˆØ¯ Ø´Ø¯Ù† Ú©Ø§Ù„Ø§ÛŒ Ù…ÙˆØ±Ø¯ Ù†Ø¸Ø± Ø¨Ø§ Ø®Ø¨Ø± Ø®ÙˆØ§Ù‡ÛŒØ¯ Ø´Ø¯.</p>' +
                            '<a href="" class="product-add-to-cart">Ù…Ø´Ø§Ù‡Ø¯Ù‡ Ø³Ø§ÛŒØ± Ù…Ø­ØµÙˆÙ„Ø§Øª</a>' +
                            '</div>';
                    } else {
                        content += '<div class="modal-body">' +
                            '<img src="' + baseUri + tplUri + 'assets/images/icon/big-bell.svg" alt="Ù…ÙˆØ¬ÙˆØ¯ Ø´Ø¯ Ø®Ø¨Ø±Ù… Ú©Ù†">' +
                            '<p>' + data.message + '</p>' +
                            '<a href="" class="product-add-to-cart">Ù…Ø´Ø§Ù‡Ø¯Ù‡ Ø³Ø§ÛŒØ± Ù…Ø­ØµÙˆÙ„Ø§Øª</a>' +
                            '</div>';
                    }
                    $('#productReminder #productReminderResult').html(content)
                    $('#productReminder').modal('show')
                },
                error: function(xhr, status, error) {
                    /*500-401-403*/
                    if (xhr.status == 403) {
                        var content = '';
                        content += '<div class="modal-body">' +
                            '<img src="' + baseUri + tplUri + 'assets/images/icon/big-bell.svg" alt="Ù…ÙˆØ¬ÙˆØ¯ Ø´Ø¯ Ø®Ø¨Ø±Ù… Ú©Ù†">' +
                            '<p>Ø´Ù…Ø§ Ø¨Ù‡ Ø¯Ù„ÛŒÙ„ Ø§ÛŒÙ†Ú©Ù‡ ÙˆØ§Ø±Ø¯ Ø³Ø§ÛŒØª Ù†Ø´Ø¯Ù‡ Ø§ÛŒØ¯ Ù†Ù…ÛŒ ØªÙˆØ§Ù†ÛŒØ¯ Ø¨Ù‡ Ø§ÛŒÙ† Ù‚Ø³Ù…Øª Ø¯Ø³ØªØ±Ø³ÛŒ Ø¯Ø§Ø´ØªÙ‡ Ø¨Ø§Ø´ÛŒØ¯...</p>' +
                            '<a href="" class="product-add-to-cart">Ù…Ø´Ø§Ù‡Ø¯Ù‡ Ø³Ø§ÛŒØ± Ù…Ø­ØµÙˆÙ„Ø§Øª</a>' +
                            '</div>';
                        $('#productReminder #productReminderResult').html(content)
                        $('#productReminder').modal('show')
                    }
                }

            })
        }
    })

    // product comments
    $("#productCommentsBtn").click(function() {
        $('#comments-container').empty();
        $.ajax({
            dataType: 'json',
            url: baseUriAPI + baseAPIV1 + 'products/' + productID + '/comments',
            success: function(data) {
                if (data.data.length > 0) {
                    $.each(data.data, function(key, item) {
                        var comment = '';
                        comment += '<div class="comment" key=' + key + '>' +
                            '<div class="user-img">' +
                            '<span class="font-icon icon-profile-comments" style="font-size: 40px; color: gray;"></span>' +
                            '</div>' +
                            '<div class="details">' +
                            '<div class="title">' +
                            '<p>' +
                            '<span>' + item.title + '</span>' +
                            ' <span>(' + item.customer_name + ')</span>' +
                            '</p>' +
                            '<p class="date">' + new Date(item.date_add).toLocaleDateString('fa-IR') + '</p>' +
                            '</div>' +
                            '<p class="description" style="white-space: pre-wrap;">' + item.content + '</p>';
                        if (item.answer !== null) {
                            comment += '<div class="comment-answer"><span>Ù¾Ø§Ø³Ø®: </span><span>' + item.answer + '</span></div>'
                        }
                        if (item.rate == 1) {
                            comment += '<div class="opinion">' +
                                '<p>' +
                                '<img src="' + baseUri + tplUri + 'assets/images/icon/like.svg" alt="Ø®Ø±ÛŒØ¯ Ø§ÛŒÙ† Ù…Ø­ØµÙˆÙ„ Ø±Ø§ Ø­ØªÙ…Ø§Ù‹ Ù¾ÛŒØ´Ù†Ù‡Ø§Ø¯ Ù…ÛŒ Ú©Ù†Ù….">' +
                                '<span>Ø®Ø±ÛŒØ¯ Ø§ÛŒÙ† Ù…Ø­ØµÙˆÙ„ Ø±Ø§ Ø­ØªÙ…Ø§Ù‹ Ù¾ÛŒØ´Ù†Ù‡Ø§Ø¯ Ù…ÛŒ Ú©Ù†Ù….</span>' +
                                '</p>' +
                                '</div>';
                        } else if (item.rate == 2) {
                            comment += '<div class="opinion">' +
                                '<p>' +
                                '<img src="' + baseUri + tplUri + '/assets/images/icon/dislike.svg" alt="Ø®Ø±ÛŒØ¯ Ø§ÛŒÙ† Ù…Ø­ØµÙˆÙ„ Ø±Ø§ Ù¾ÛŒØ´Ù†Ù‡Ø§Ø¯ Ù†Ù…ÛŒ Ú©Ù†Ù….">' +
                                '<span>Ø®Ø±ÛŒØ¯ Ø§ÛŒÙ† Ù…Ø­ØµÙˆÙ„ Ø±Ø§ Ù¾ÛŒØ´Ù†Ù‡Ø§Ø¯ Ù†Ù…ÛŒ Ú©Ù†Ù….</span>' +
                                '</p>' +
                                '</div>';
                        }
                        comment += '</div>' +
                            '</div>';
                        $('#comments-container').append(comment);
                    });
                } else {
                    var comment = '';
                    comment += ' <div class="comment">' +
                        '<div class="details">' +
                        '<p class="description my-comment">' +
                        '<b>Ø§ÙˆÙ„ÛŒÙ† Ù†ÙØ± Ø¨Ø§Ø´ÛŒØ¯ Ú©Ù‡ Ù†Ø¸Ø± Ù…ÛŒâ€ŒØ¯Ù‡ÛŒØ¯.</b>' +
                        '</p>' +
                        '</div>' +
                        '</div>';
                    $('#comments-container').append(comment);
                }
            }
        });
    });
    // related product
    $.ajax({
        dataType: 'json',
        url: baseUriAPI + baseAPIV1 + 'products?platform=desktop&page_size=20&filter[product_categories.id][eq]=' + productCategoryID + '&filter[total_qty][gt]=0' + '&sort[asc]=shuffle',
        success: function(data) {
            //if (data.statue_code == 200) {
            $.each(data.data, function(key, item) {
                $.each(item, function(key1, item1) {
                    if (key == 'data') {
                        $("#home-bani-suggest .owl-product .owl-carousel").append(product_card(key1, item1));
                    }
                });
            });
            var owlProductRel = $('#home-bani-suggest .owl-product .owl-carousel');
            owlProductRel.owlCarousel({
                rtl: true,
                margin: 28,
                dots: false,
                loop: false,
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
            //}
        }
    });

    //set product

    function showSet(productSet) {
        var setBtn = '<div class="set-btn-box"><div class="set-btn"><img src="' + baseUri + tplUri + 'assets/images/left-arrow.svg" alt="Ù¾Ø§ÛŒÛŒÙ†"  /> Ø³ÙØª Ù¾ÛŒØ´Ù†Ù‡Ø§Ø¯ÛŒ Ø¨Ø§Ù†ÛŒ Ù…Ø¯</div></div>'
        $(".gallery-container").append(setBtn)


        $.ajax({
            dataType: 'json',
            url: baseUriAPI + baseAPIV1 + 'products/product-set?platform=desktop&product_set_id=' + productSet.join(),
            success: function(data) {
                //if (data.statue_code == 200) {
                $.each(data.data, function(key, item) {
                    $.each(item, function(key1, item1) {
                        if (key == 'data') {
                            $("#set-suggest .owl-product .owl-carousel").append(product_card(key1, item1));
                            $("#set-suggest .owl-carousel").removeClass('owl-hidden')
                                //$('#set-suggest .owl-product .owl-carousel').trigger('replace.owl.carousel', product_card(key1, item1).toString()).trigger('refresh.owl.carousel');
                        }
                    });
                });
                var owlProduct = $('#set-suggest .owl-product .owl-carousel');
                $('#set-suggest .owl-product .owl-carousel').owlCarousel('destroy');
                $('#set-suggest').css('display', 'block')
                owlProduct.owlCarousel({
                    rtl: true,
                    margin: 28,
                    dots: false,
                    loop: false,
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
                var viewport = jQuery(window).width();
                var itemCount = jQuery("#set-suggest .owl-stage .owl-item").length;

                if ((viewport >= 992 && itemCount < 5)) //desktop
                {
                    jQuery('#set-suggest .owl-product .owl-next, #set-suggest .owl-product .owl-prev').hide();
                    $('#set-suggest .owl-product .owl-prev').click(function() {
                        owlProduct.trigger('next.owl.carousel');
                    });
                    $('#set-suggest .owl-product .owl-next').click(function() {
                        owlProduct.trigger('prev.owl.carousel', [300]);
                    });
                } else {
                    jQuery('#set-suggest .owl-product .owl-next, #set-suggest .owl-product .owl-prev').show();
                }

            }
        });
    }



    function product_card(index, value) {
        product_specific_price = false;
        if (value['product_specific_price']) {
            product_specific_price = true;
        }
        $cssClass = 'product-card-like';
        if (window.customer.user && (window.customer.type === 'signin' || window.customer.type === 'signup')) {
            var wishList = window.customer.user.wishlist;
            if (wishList.indexOf(value['id_product_attribute']) !== -1) {
                $cssClass = 'product-card-like active'
            }
        }
        card = '';
        card += '<div class="item">';
        if (value['total_qty'] > 0) {
            card += '<div class="product-card">';
        } else {
            card += '<div class="product-card product-card-not-exist">';
        }

        card += '<a href="' + baseUri + value['link'] + '" class="product-card-img-link">';
        card += '<img src="' + value['images']['large_default']['0'] + '" class="product-card-img hover-hide">';
        if (value['images']['large_default']['1']) {
            card += '<img src="' + value['images']['large_default']['1'] + '" class="product-card-img hover-show" alt="' + productData.product_name + '">';
        } else {
            card += '<img src="' + value['images']['large_default']['0'] + '" class="product-card-img hover-show" alt="' + productData.product_name + '">';
        }
        card += '<span class="product-card-over-img"></span>';
        if (product_specific_price) {
            card += '<span class="product-card-discount">%' + value['product_specific_price']['discount_percent'] + '</span>';
        }
        if (value.promotion_label) {
            card += '<div class="product-card-size-tag-box"><span class="product-card-size-tag" style=' + "background-color:" + value.promotion_label.background_color + ";color:" + value.promotion_label.text_color + ';>' + value.promotion_label.title + '</span></div>';
        }
        card += '</a>';
        card += '<div class="product-card-hover">';
        card += '<ul class="product-card-hover-icon">';
        card += '<li class="' + $cssClass + '" data-product-id=' + value['id_product_attribute'] + '><span class="font-icon icon-fav-profile"></span></li>';
        card += '<li class="product-card-detail"><span class="font-icon icon-active-display-pass"></span></li>';
        card += '</ul>';
        if (value['all_colors'].length > 1) {
            number_colors = 5;
            card += '<ul class="product-card-color">';
            $.each(value['all_colors'].slice(0, number_colors), function(index_1, value_1) {
                if (value['color_value'] == value_1['value']) {
                    card += '<li class="active">';
                } else {
                    card += '<li>';
                }
                card += '<a href="/' + value['link'].substring(0, value['link'].lastIndexOf('/') + 1) + 'Ø±Ù†Ú¯-' + value_1['name'] + '">';
                $.each(value_1['image'], function(index_2, value_2) {
                    if (index_2 == 0) {
                        $.each(value_2, function(index_3, value_3) {
                            if (index_3 == 'image_size') {
                                card += '<img src="' + value_3['cart_default'] + '" alt="' + productData.product_name + ' ' + value['all_colors'].name + ' ">';
                            }
                        });
                    }
                });
                card += '</a></li>';
            });
            if (value['all_colors'].length > number_colors) {
                card += '<li class="product-card-count">+' + (value['all_colors'].length - number_colors) + '</li>';
            }
            card += '</ul>';
        }
        card += '</div>';


        card += '<p>';
        card += '<a href="' + baseUri + value['link'] + '" class="product-card-brand-lastprice">';
        card += '<span class="product-card-brand">' + value['product_manufacturer_en_name'] + '</span>';
        if (product_specific_price) {
            card += '<span class="product-card-lastprice price">' + (Math.round(value['product_price']) + ' ØªÙˆÙ…Ø§Ù† ').replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '</span>';
        }
        card += '</a>';
        card += '</p>';

        card += '<p>';
        card += '<a href="' + value['link'] + '" class="product-card-name-price">';
        card += '<span class="product-card-name">' + value['product_name'] + '</span>';


        if (product_specific_price && value['total_qty'] > 0) {
            card += '<span class="product-card-price">' + value['product_specific_price']['specific_price'].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + ' ØªÙˆÙ…Ø§Ù†</span>';
        } else if (value['total_qty'] > 0) {
            card += '<span class="product-card-price">' + value['product_price'].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + ' ØªÙˆÙ…Ø§Ù†</span>';
        } else if (value['total_qty'] == 0) {
            card += '<span class="product-card-not-exist-text"> Ù†Ø§Ù…ÙˆØ¬ÙˆØ¯</span>'
        }

        card += '</a>';
        card += '</p>';

        var sizeQuantity = value['size'].filter(size => {
            if (size.quantity > 0) {
                return size
            }
        })
        if (sizeQuantity) {
            number_size = 3;
            card += '<ul class="product-card-size">';
            $.each(sizeQuantity.slice(0, number_size), function(index_1, value_1) {
                card += '<li><a href="/' + value['link'] + '/Ø³Ø§ÛŒØ²-' + value_1['name'] + '">' + value_1['name'] + '</a></li>';
            });
            if (sizeQuantity.length > number_size) {
                card += '<li class="product-card-more-size"><a href="/' + value['link'] + '">' + (sizeQuantity.length - number_size) + '+' + '</a></li>';
            }
            card += '</ul>';
        }

        card += '</div>';
        card += '</div>';

        // change to price format
        $("#home-bani-suggest .price").digits()
        return card;
    }

    $("#addComment").click(function() {
        // if (window.customer.type == "signin" || window.customer.type == "signup") {
        var commentTitle = $('#comment_title'),
            commentContent = $('#comment_content'),
            commentRate = $('.comment_rate');

        if (commentTitle.val() == 0 && commentContent.val() == 0) {
            commentTitle.addClass('error');
            commentContent.addClass('error');
        } else if (commentTitle.val() == 0) {
            commentTitle.addClass('error')
        } else if (commentContent.val() == 0) {
            commentContent.addClass('error')
        } else {
            var id_product = productID,
                title = commentTitle.val(),
                content = commentContent.val(),
                rate = $('.comment_rate:checked').val() ? $('.comment_rate:checked').val() : 0,
                grade = '5';
            $.ajax({
                type: 'POST',
                url: baseUriAPI + baseAPIV2 + 'products/comments',
                headers: {
                    'Authorization': 'Bearer ' + customer.token
                },
                data: {
                    'id_product': id_product,
                    'title': title,
                    'content': content,
                    'rate': rate,
                    'grade': grade
                },
                success: function() {
                    var comment = '<div class="comment">' +
                        '<div class="user-img">' +
                        '<span class="font-icon icon-profile-comments" style="font-size: 40px; color: gray;"></span>' +
                        '</div>' +
                        '<div class="details">' +
                        '<div class="title">' +
                        '<p>' +
                        '<span>' + title + '</span>' +
                        '<span>(Ú©Ø§Ø±Ø¨Ø± Ù…Ù‡Ù…Ø§Ù†)</span>' +
                        '</p>' +
                        '<p class="date">' + new Date().toLocaleDateString('fa-IR') + '</p>' +
                        '</div>' +
                        '<p class="description my-comment" style="white-space: pre-wrap;">' + content + '</p>' +
                        '<div class="opinion">';
                    if (rate == 1) {
                        comment += '<p>' +
                            '<img src="' + baseUri + tplUri + '/assets/images/icon/like.svg" alt="Ø®Ø±ÛŒØ¯ Ø§ÛŒÙ† Ù…Ø­ØµÙˆÙ„ Ø±Ø§ Ø­ØªÙ…Ø§Ù‹ Ù¾ÛŒØ´Ù†Ù‡Ø§Ø¯ Ù…ÛŒ Ú©Ù†Ù….">' +
                            '<span>Ø®Ø±ÛŒØ¯ Ø§ÛŒÙ† Ù…Ø­ØµÙˆÙ„ Ø±Ø§ Ø­ØªÙ…Ø§Ù‹ Ù¾ÛŒØ´Ù†Ù‡Ø§Ø¯ Ù…ÛŒ Ú©Ù†Ù….</span>' +
                            '</p>';
                    } else if (rate == 2) {
                        comment += '<p>' +
                            '<img src="' + baseUri + tplUri + '/assets/images/icon/dislike.svg" alt="Ø®Ø±ÛŒØ¯ Ø§ÛŒÙ† Ù…Ø­ØµÙˆÙ„ Ø±Ø§ Ù¾ÛŒØ´Ù†Ù‡Ø§Ø¯ Ù†Ù…ÛŒ Ú©Ù†Ù….">' +
                            '<span>Ø®Ø±ÛŒØ¯ Ø§ÛŒÙ† Ù…Ø­ØµÙˆÙ„ Ø±Ø§ Ù¾ÛŒØ´Ù†Ù‡Ø§Ø¯ Ù†Ù…ÛŒ Ú©Ù†Ù….</span>' +
                            '</p>';
                    }
                    comment += '<p class="comment-alert">' +
                        '<span>Ù†Ø¸Ø± Ø´Ù…Ø§ Ø¯Ø± Ø§Ù†ØªØ¸Ø§Ø± ØªØ§ÛŒÛŒØ¯ Ø§Ø³Øª</span>' +
                        '</p>' +
                        '</div>' +
                        '</div>' +
                        '</div>';

                    $('#comments-container .comment:last').after(comment);

                    commentTitle.val('').removeClass('error');
                    commentContent.val('').removeClass('error');
                    commentRate.prop('checked', false);
                },
                error: function() {
                    alert('Whoops! This didn\'t work. Please try it later...')
                }
            });

        }
        // } else {
        //     showLoginModal()
        // }

    });

    $("#comment_title, #comment_content").focus(function() {
        $('#comment_title').removeClass('error');
        $('#comment_content').removeClass('error');
    });


    // scroll to set
    $(document).on('click', '.set-btn-box', function() {
        var x = $("#set-suggest").offset();
        window.scrollTo({ left: 0, top: x.top - 60, behavior: "smooth" })
    })



    //modal-gallery
    var modalGalleryIndex = 0;
    owlPdp.on('changed.owl.carousel', function(event) {
        modalGalleryIndex = event.item.index;
    })

    $('.pdp-gallery').on('click', '.pdp-video-overlay', function(e) {
        $('#product-gallery-modal').modal("show");
    });


    $(document).on('show.bs.modal', '#product-gallery-modal', function() {
        var defultImgModal = productData.colors[activeColor];
        var selectedImgModal = productData.colors[rel];
        var imgGalleryModal;
        if (selectedImgModal) {
            imgGalleryModal = selectedImgModal
        } else {
            imgGalleryModal = defultImgModal
        };
        var videosPosterModal = imgGalleryModal.videos.map(function(video) {
            return video.poster_path
        })
        var videosFileModal = imgGalleryModal.videos.map(function(video) {
            return video.video_path
        })

        var galleryModalMediaThumb = videosPosterModal.concat(imgGalleryModal.values)
        var galleryModalMedia = videosFileModal.concat(imgGalleryModal.values)
        var galleryModalMediaZoom = videosFileModal.concat(imgGalleryModal.zoom)
        $("#product-gallery-modal-box").LoadingOverlay("show", {
            background: "rgba(255, 255, 255, 1)",
            image: tplUri + "assets/images/icon/spinner-loading.svg",
        });

        function modalGalleryFunc(item, index) {
            var createGallery;
            if (index < videosFileModal.length) {
                createGallery = '<div class="item"><video class="pdp-video" poster="' + galleryModalMediaThumb[index] + '"  autobuffer controls><source src="' + item + '" >Your browser does not support the video tag.</video></div>'
            } else {
                createGallery = "<div class='item'><img  src=" + galleryModalMediaZoom[index] + " alt='" + productData.product_name + ' ' + imgGalleryModal.color_name + "' data-zoom='" + item + "' data-zoom-in='" + galleryModalMediaZoom[index] + "'/></div>"
            }
            return createGallery

        }

        function modalIdicatorsFunc(item, index) {
            var createGallery = "<button class='owl-dot active' role='button'><img src=" + item + " alt='" + productData.product_name + ' ' + imgGalleryModal.color_name + "' data-zoom='" + item + "'><span class='overlay"
            if (index < videosPosterModal.length) {
                createGallery += " pdp-video-overlay"
            }
            createGallery += "'></span></button>"
            return createGallery
        }

        $("#product-gallery-modal .modal-pdp-gallery").empty().append(galleryModalMedia.map(modalGalleryFunc));

        var galleryArr = galleryModalMediaThumb.map(modalIdicatorsFunc);
        var html = '<div class="modal-gallery-dots">';
        for (key in galleryArr) {
            html += galleryArr[key];
        }
        html += '</div>'
        $("#product-gallery-modal-box").append(html)
        $('.modal-pdp-gallery').on('initialized.owl.carousel', function(e) {
            $('.modal-gallery-nav').css('display', 'block');
            $('.modal-gallery-dots').css('display', 'flex')
        })
        var owlModalPdp = $('.modal-pdp-gallery').owlCarousel({
            rtl: true,
            loop: true,
            items: 1,
            margin: 10,
            nav: true,
            dots: true,
            video: true,
            dotsContainer: '.modal-gallery-dots',
            navContainer: '.modal-gallery-nav',
            startPosition: modalGalleryIndex,
            navText: ['<img src="' + baseUri + tplUri + 'assets/images/icon/gallery-prev.svg" alt="close"></img>', '<img src="' + baseUri + tplUri + 'assets/images/icon/gallery-next.svg" alt="close"></img>'],
            center: true,
            mouseDrag: false,
            autoheight: true,
        })

        function playModalOwlVideo() {
            $('.modal-pdp-gallery .owl-item.active video').trigger('play')
        }
        setTimeout(playModalOwlVideo, 800)

        owlModalPdp.on('refreshed.owl.carousel', function() {
            $("#product-gallery-modal-box").LoadingOverlay("hide")
        })

        owlModalPdp.on('changed.owl.carousel', function(event) {
            modalGalleryIndex = event.item.index;
        })
        owlModalPdp.on('click.owl.carousel', function() {

            var modalImg = $('.modal-pdp-gallery img')

            if ($('#product-gallery-modal-box').attr('mode') == 'zoom') {

                $('.modal-pdp-gallery img').addClass('zoom-in')
                modalImg.each(function() {
                    $(this).attr('src', $(this).attr('data-zoom'))
                })
                setTimeout(function() {
                    $('#product-gallery-modal-box').attr('mode', '');
                }, 300)


            } else {

                $('.modal-pdp-gallery img').removeClass('zoom-in')
                modalImg.each(function() {
                    $(this).attr('src', $(this).attr('data-zoom-in'))
                })
                setTimeout(function() {
                    $('#product-gallery-modal-box').attr('mode', 'zoom');
                }, 300)

            }
            /* var modalActive=$('.modal-pdp-gallery .active img').attr('class')
            if(modalActive){
                $('.modal-pdp-gallery .active img').removeClass('zoom-in');
                $('.modal-pdp-gallery .active img').attr('src',$('.modal-pdp-gallery .active img').attr('data-zoom-in'))
            }else{
                $('.modal-pdp-gallery .active img').addClass('zoom-in');
                $('.modal-pdp-gallery .active img').attr('src',$('.modal-pdp-gallery .active img').attr('data-zoom'))
            } */

        })
        $(document).on('click', '.modal-gallery-dots .owl-dot', function() {
            setTimeout(playModalOwlVideo, 800)
            $('.modal-pdp-gallery video').trigger('pause');
        })
        $(document).on('hide.bs.modal', '#product-gallery-modal', function() {
            $('video').trigger('pause');

            setTimeout(function() {
                $('.modal-pdp-gallery').owlCarousel('destroy');
                $('#product-gallery-modal-box').attr('mode', 'zoom');
            }, 400)
        })
    })


})
