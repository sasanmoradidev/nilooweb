$(function() {

    $(window).on('load', function() {
        $('#fullsizeLoading').fadeOut();
    })
    $("a[href^='/']").click(function() {
        $('#fullsizeLoading').show();

    });

    $('.nav .nav-item').click(function() {
        $(this).parent().find('.active').removeClass('active');
        $(this).addClass('active')
    });

    if ($('.banner-slider').length)
        $('.banner-slider').owlCarousel({
            loop: true,
            margin: 0,
            rtl: true,
            items: 1,
            nav: false,
            autoHeight: true,
            dots: true
        });


    if ($('.gallery-slider').length) {
        var owl = $('.gallery-slider');

        //owl.on('initialized.owl.carousel', function (e) {
        //    setTimeout(function () {
        //        $('#fade-pic').addClass('hide');
        //    }, 1000);
        //});
        owl.owlCarousel({
            loop: true,
            margin: 0,
            rtl: true,
            items: 1,
            nav: false,
            autoHeight: true,
            dots: true
        });
    }
    if ($("#orderstatusmap").length)
        $('#orderstatusmap').owlCarousel({
            loop: false,
            margin: 0,
            rtl: true,
            items: 2,
            nav: false,
            dots: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2
                },
                400: {
                    items: 2
                },
                600: {
                    items: 3
                }
            }
        });


    var amazing = $('.amazing-slider');
    if (amazing.length) {
        amazing.owlCarousel({
            loop: true,
            margin: 0,
            rtl: true,
            items: 1,
            nav: false,
            dots: false,
            dotsData: false,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: false
        });
        amazing.on('changed.owl.carousel', function(e) {
            var loopindex = (e.item.index - e.relatedTarget._clones.length / 2) % e.item.count;

            $(".amazin-pager-carousel .item").each(function(index) {
                $(this).removeClass("active");
            });
            $("#page" + loopindex).addClass("active");
            $('.amazin-pager-carousel').trigger('to.owl.carousel', loopindex)
        });
    }
    if ($('.group-carousel').length)
        $('.group-carousel').owlCarousel({
            margin: 10,
            rtl: true,
            nav: false,
            dots: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 3
                },
                400: {
                    items: 4
                },
                600: {
                    items: 5
                }
            }
        });
    if ($('.brands-carousel').length)
        $('.brands-carousel').owlCarousel({
            margin: 10,
            rtl: true,
            nav: false,
            dots: false,
            items: 3
        });
    if ($('.row-slider-carousel').length)
        $('.row-slider-carousel').owlCarousel({
            margin: 10,
            rtl: true,
            nav: false,
            dots: false,
            responsiveClass: true,
            loop: true,
            responsive: {
                0: {
                    items: 1
                },
                345: {
                    items: 1.5,
                    margin: 30
                },
                600: {
                    items: 3
                }
            }
        });
    if ($('.mask-carousel').length)
        $('.mask-carousel').owlCarousel({
            margin: 10,
            rtl: true,
            nav: false,
            loop: true,
            dots: false,
            center: true,
            items: 2
        });
    if ($('.amazin-pager-carousel').length)
        $('.amazin-pager-carousel').owlCarousel({
            margin: 0,
            rtl: true,
            items: 3,
            nav: true,
            dots: false,
            autoWidth: true
        });


    $(".close-detail").click(function() {
        $(this).parent().parent().parent().removeAttr("open");
    });


    $("#register").click(function() {
        $("#form-login").slideUp();
        $("#form-register").slideDown();
        $("#register").addClass("active");
        $("#login").removeClass("active");
    })
    $("#login").click(function() {
        $("#form-register").slideUp();
        $("#form-login").slideDown();
        $("#login").addClass("active");
        $("#register").removeClass("active");

    })
    window.onload = function() {
        $("#register1").click(function() {
            $("#form-login1").slideUp();
            $("#form-register1").slideDown();
            $("#register1").addClass("active");
            $("#login1").removeClass("active");
        });
        $("#login1").click(function() {
            $("#form-register1").slideUp();
            $("#form-login1").slideDown();
            $("#login1").addClass("active");
            $("#register1").removeClass("active");
        });
    };
    $("#search-box").click(function(e) {
        e.preventDefault();
        $('#mobile_search').toggleClass("active");
        $('#mobile_search input').focus();
        $('#mobile_search input').select();
        $('body').addClass("search");

        location.hash = "search";
    })
    $("#close-search").click(function(e) {
        e.preventDefault();
        $('#mobile_search').removeClass("active");
        $('body').removeClass("search");
        history.pushState("", document.title, window.location.pathname +
            window.location.search);
    })
    $(window).on('hashchange', function(e) {
        if (location.hash == "") {
            $('#mobile_search').removeClass("active");
            $('body').removeClass("search");
        }
    });
    $(".show-address-fix").click(function() {
        $('.add-address-fix').fadeIn();
    })
    $(".hide-address-fix").click(function() {
        $('.add-address-fix').fadeOut();
    })

    $('.see-more').click(function() {
        $(this).hide()
        $(this).parent().parent().find('.more').removeClass('more')
    });

    $("[required]").on("invalid", function() {
        this.setCustomValidity('فیلد اجباری');
    });
    $("[required]").on("input", function() {
        this.setCustomValidity('');
    });
    $(document).ready(function() {
        ////attaching the event listener
        //$(window).on('hashchange', function () {
        //    //do something
        //    alert('its done!');
        //});

        //manually tiggering it if we have hash part in URL
        if (window.location.hash) {
            $(window).trigger('hashchange')
        }
    });


    $('#modallogin').on('show.bs.modal', function(e) {

        //get data-id attribute of the clicked element
        var returlurl = $(e.relatedTarget).data('returlurl');
        if (returlurl) {
            //populate the textbox
            $(e.currentTarget).find('form').attr('action', function(i, value) {
                return value + returlurl;
            });
        }
    });

    setTimeout(function() {
        try {
            var url = window.location.pathname.toLowerCase();
            if (url.includes('/product')) {
                if (location.hash == "#comments" ||
                    location.hash == "#!#comments" ||
                    location.hash == "#!#nav-comments") {

                    var offset = $('#tabs').offset();
                    if (offset)
                        $(document).scrollTop($('#tabs').offset().top);
                    $("#tab-comments").trigger("click");
                }
            }
        } catch (e) {

        }
    }, 1000);




    var element = $("#rateYo");
    var ratingNum = element.attr('data-rating');
    var $rateYo = element.rateYo({
        fullStar: true,
        starWidth: "25px",
        rating: ratingNum,
        spacing: "10px",
        multiColor: {

            "startColor": "#424a9b", //RED
            "endColor": "#424a9b" //GREEN
        }
    });

    if (window.customerId) {
        element.click(function() {
            var rating = element.rateYo("rating");
            element.rateYo("option", "readOnly", true);
            element.unbind();
            $.post('/product/' + window.productId + '/Rate/' + rating).done(function(res) {
                element.rateYo("option", "rating", res.newRate);
                $("#rate-result").text(res.newRate + " از " + res.votes + " رای").removeClass("d-none");
            });
        });
    } else {
        element.rateYo("option", "readOnly", true);
    }



    $(function() {
        $.get("/get-captcha-image", function(data) {
            $("img.captcha-img").attr("src", "data:image/png;base64," + data);
        });

    });





    var inputs = document.querySelectorAll('.file-upload+input');
    Array.prototype.forEach.call(inputs, function(input) {
        var label = $(input).parent().find(".file-upload"),
            labelVal = 'انتخاب فایل <i class="icon-upload"></i>';
        input.addEventListener('change', function(e) {
            var fileName = '';
            if (this.files && this.files.length > 1)
                fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
            else
                fileName = e.target.value.split('\\').pop();
            if (fileName) {
                label.html(fileName + '<i class="icon-tick"></i>');
                $("#addmoreuploader").css("display", "inline-block");
            } else {
                label.html(labelVal);
                $("#addmoreuploader").css("display", "hide");
            }
        });
    });

    /* --- new Code --- */

    $("#scrollSheetBtn").addClass('pofix');
    window.addEventListener("scroll", function(event) {
        var scroll = this.scrollY;
        if (scroll < 440) {
            $("#scrollSheetBtn").addClass('pofix');
        } else if (scroll > 441) {
            $("#scrollSheetBtn").removeClass('pofix');
        } else {
            $("#scrollSheetBtn").removeClass('pofix');
        }
    });

}); //ready

function goto(id) {
    $('.amazing-slider').trigger('to.owl.carousel', id)
}

document.addEventListener(
    "DOMContentLoaded", () => {
        const menu = new Mmenu("#menu", {
            "extensions": [
                "position-left"
            ],
            //backButton: {
            //    close: true
            //},
            navbar: {
                title: "منوی سایت"
            }
        });



        document.querySelector('.mainMenu')
            .addEventListener('click', (evnt) => {
                menu.open();

                evnt.preventDefault();
                evnt.stopPropagation();
            });
    }
);


document.addEventListener(
    "DOMContentLoaded", () => {
        const menu = new Mmenu("#categories", {

            //backButton: {
            //    close: true
            //},
            "offCanvas": {
                "position": "right",
                "zposition": "front"
            },
            "counters": true,
            "extensions": [
                "pagedim-black",
                "position-right"
            ],
            navbar: {
                title: "دسته بندی ها"
            }
        });



        document.querySelector('.categoriesMenu')
            .addEventListener('click', (evnt) => {
                menu.open();

                evnt.preventDefault();
                evnt.stopPropagation();
            });
    }
);



function ConvertNumberToPersion() {
    persian = {
        0: '۰',
        1: '۱',
        2: '۲',
        3: '۳',
        4: '۴',
        5: '۵',
        6: '۶',
        7: '۷',
        8: '۸',
        9: '۹'
    };

    function traverse(el) {
        if (el.nodeType == 3) {
            var list = el.data.match(/[0-9]/g);
            if (list != null && list.length != 0) {
                for (var i = 0; i < list.length; i++)
                    el.data = el.data.replace(list[i], persian[list[i]]);
            }
        }
        for (var i = 0; i < el.childNodes.length; i++) {
            traverse(el.childNodes[i]);
        }
    }
    traverse(document.body);
};
/*!
 * The Final Countdown for jQuery v2.2.0 (http://hilios.github.io/jQuery.countdown/)
 * Copyright (c) 2016 Edson Hilios
 */
! function(a) {
    "use strict";
    "function" == typeof define && define.amd ? define(["jquery"], a) : a(jQuery)
}(function(a) {
    "use strict";

    function b(a) {
        if (a instanceof Date) return a;
        if (String(a).match(g)) return String(a).match(/^[0-9]*$/) && (a = Number(a)), String(a).match(/\-/) && (a = String(a).replace(/\-/g, "/")), new Date(a);
        throw new Error("Couldn't cast `" + a + "` to a date object.")
    }

    function c(a) {
        var b = a.toString().replace(/([.?*+^$[\]\\(){}|-])/g, "\\$1");
        return new RegExp(b)
    }

    function d(a) {
        return function(b) {
            var d = b.match(/%(-|!)?[A-Z]{1}(:[^;]+;)?/gi);
            if (d)
                for (var f = 0, g = d.length; f < g; ++f) {
                    var h = d[f].match(/%(-|!)?([a-zA-Z]{1})(:[^;]+;)?/),
                        j = c(h[0]),
                        k = h[1] || "",
                        l = h[3] || "",
                        m = null;
                    h = h[2], i.hasOwnProperty(h) && (m = i[h], m = Number(a[m])), null !== m && ("!" === k && (m = e(l, m)), "" === k && m < 10 && (m = "0" + m.toString()), b = b.replace(j, m.toString()))
                }
            return b = b.replace(/%%/, "%")
        }
    }

    function e(a, b) {
        var c = "s",
            d = "";
        return a && (a = a.replace(/(:|;|\s)/gi, "").split(/\,/), 1 === a.length ? c = a[0] : (d = a[0], c = a[1])), Math.abs(b) > 1 ? c : d
    }
    var f = [],
        g = [],
        h = {
            precision: 100,
            elapse: !1,
            defer: !1
        };
    g.push(/^[0-9]*$/.source), g.push(/([0-9]{1,2}\/){2}[0-9]{4}( [0-9]{1,2}(:[0-9]{2}){2})?/.source), g.push(/[0-9]{4}([\/\-][0-9]{1,2}){2}( [0-9]{1,2}(:[0-9]{2}){2})?/.source), g = new RegExp(g.join("|"));
    var i = {
            Y: "years",
            m: "months",
            n: "daysToMonth",
            d: "daysToWeek",
            w: "weeks",
            W: "weeksToMonth",
            H: "hours",
            M: "minutes",
            S: "seconds",
            D: "totalDays",
            I: "totalHours",
            N: "totalMinutes",
            T: "totalSeconds"
        },
        j = function(b, c, d) {
            this.el = b, this.$el = a(b), this.interval = null, this.offset = {}, this.options = a.extend({}, h), this.firstTick = !0, this.instanceNumber = f.length, f.push(this), this.$el.data("countdown-instance", this.instanceNumber), d && ("function" == typeof d ? (this.$el.on("update.countdown", d), this.$el.on("stoped.countdown", d), this.$el.on("finish.countdown", d)) : this.options = a.extend({}, h, d)), this.setFinalDate(c), this.options.defer === !1 && this.start()
        };
    a.extend(j.prototype, {
        start: function() {
            null !== this.interval && clearInterval(this.interval);
            var a = this;
            this.update(), this.interval = setInterval(function() {
                a.update.call(a)
            }, this.options.precision)
        },
        stop: function() {
            clearInterval(this.interval), this.interval = null, this.dispatchEvent("stoped")
        },
        toggle: function() {
            this.interval ? this.stop() : this.start()
        },
        pause: function() {
            this.stop()
        },
        resume: function() {
            this.start()
        },
        remove: function() {
            this.stop.call(this), f[this.instanceNumber] = null, delete this.$el.data().countdownInstance
        },
        setFinalDate: function(a) {
            this.finalDate = b(a)
        },
        update: function() {
            if (0 === this.$el.closest("html").length) return void this.remove();
            var a, b = new Date;
            return a = this.finalDate.getTime() - b.getTime(), a = Math.ceil(a / 1e3), a = !this.options.elapse && a < 0 ? 0 : Math.abs(a), this.totalSecsLeft === a || this.firstTick ? void(this.firstTick = !1) : (this.totalSecsLeft = a, this.elapsed = b >= this.finalDate, this.offset = {
                seconds: this.totalSecsLeft % 60,
                minutes: Math.floor(this.totalSecsLeft / 60) % 60,
                hours: Math.floor(this.totalSecsLeft / 60 / 60) % 24,
                days: Math.floor(this.totalSecsLeft / 60 / 60 / 24) % 7,
                daysToWeek: Math.floor(this.totalSecsLeft / 60 / 60 / 24) % 7,
                daysToMonth: Math.floor(this.totalSecsLeft / 60 / 60 / 24 % 30.4368),
                weeks: Math.floor(this.totalSecsLeft / 60 / 60 / 24 / 7),
                weeksToMonth: Math.floor(this.totalSecsLeft / 60 / 60 / 24 / 7) % 4,
                months: Math.floor(this.totalSecsLeft / 60 / 60 / 24 / 30.4368),
                years: Math.abs(this.finalDate.getFullYear() - b.getFullYear()),
                totalDays: Math.floor(this.totalSecsLeft / 60 / 60 / 24),
                totalHours: Math.floor(this.totalSecsLeft / 60 / 60),
                totalMinutes: Math.floor(this.totalSecsLeft / 60),
                totalSeconds: this.totalSecsLeft
            }, void(this.options.elapse || 0 !== this.totalSecsLeft ? this.dispatchEvent("update") : (this.stop(), this.dispatchEvent("finish"))))
        },
        dispatchEvent: function(b) {
            var c = a.Event(b + ".countdown");
            c.finalDate = this.finalDate, c.elapsed = this.elapsed, c.offset = a.extend({}, this.offset), c.strftime = d(this.offset), this.$el.trigger(c)
        }
    }), a.fn.countdown = function() {
        var b = Array.prototype.slice.call(arguments, 0);
        return this.each(function() {
            var c = a(this).data("countdown-instance");
            if (void 0 !== c) {
                var d = f[c],
                    e = b[0];
                j.prototype.hasOwnProperty(e) ? d[e].apply(d, b.slice(1)) : null === String(e).match(/^[$A-Z_][0-9A-Z_$]*$/i) ? (d.setFinalDate.call(d, e), d.start()) : a.error("Method %s does not exist on jQuery.countdown".replace(/\%s/gi, e))
            } else new j(this, b[0], b[1])
        })
    }
});






function resetCaptcha() {
    $("img.captcha-img").attr("src", "/assets/images/Ripple-loading.gif");
    $.get("/get-captcha-image", function(data) {
        $("img.captcha-img").attr("src", "data:image/png;base64," + data);
    });
}


////https://addyosmani.com/blog/lazy-loading/
//(async () => {

//    //Dynamically import the LazySizes library
//    const lazySizesLib = await import('/assets/lib/lazysizes/lazysizes.min.js');
//    //Initiate LazySizes (reads data-src & class=lazyload)
//    lazySizes.init(); // lazySizes works off a global.

//})();

/*search box*/
$(document).ready(function(){
    $("#search").focus(function() {
      $(".search-box").addClass("border-searching");
      $(".search-icon").addClass("si-rotate");
    });
    $("#search").blur(function() {
      $(".search-box").removeClass("border-searching");
      $(".search-icon").removeClass("si-rotate");
    });
    $("#search").keyup(function() {
        if($(this).val().length > 0) {
          $(".go-icon").addClass("go-in");
        }
        else {
          $(".go-icon").removeClass("go-in");
        }
    });
    $(".go-icon").click(function(){
      $(".search-form").submit();
    });
});
