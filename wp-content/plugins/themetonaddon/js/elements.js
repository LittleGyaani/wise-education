(function($) {
    "use strict";
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $("#scroll").fadeIn();
            } else {
                $("#scroll").fadeOut();
            }
        });
        $("#scroll").click(function() {
            $("html, body").animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });
})(jQuery);

(function($) {
    "use strict";
    $(document).ready(function() {
        $(".brand-logo").each(function() {
            var _slider = $(this), _col = _slider.data("col"), _row = _slider.data("row"), _perView = _col * _row;
            var swiper = new Swiper(_slider.find(".swiper-container"), {
                slidesPerView: _col,
                spaceBetween: 30,
                slidesPerGroup: 3,
                loop: true,
                loopFillGroupWithBlank: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true
                },
                navigation: {
                    nextEl: _slider.find(".swiper-button-next"),
                    prevEl: _slider.find(".swiper-button-prev")
                }
            });
        });
    });
})(jQuery);

(function($) {
    "use strict";
    $(document).ready(function() {
        $("#car-ajax-btn").on("click", function() {
            var _min = $("#range-slider-with-tooltip input[type=hidden]").eq(0).val();
            var _max = $("#range-slider-with-tooltip input[type=hidden]").eq(1).val();
            var _mins = $("#range-slider-with-tooltip1 input[type=hidden]").eq(0).val();
            var _maxs = $("#range-slider-with-tooltip1 input[type=hidden]").eq(1).val();
            var cat_id = "";
            $("input[data-cat-id]").each(function() {
                if ($(this).is(":checked")) {
                    cat_id = cat_id + $(this).attr("data-cat-id") + ",";
                }
            });
            var tag_id = "";
            $("input[data-tag-id]").each(function() {
                if ($(this).is(":checked")) {
                    tag_id = tag_id + $(this).attr("data-tag-id") + ",";
                }
            });
            if (typeof theme_options !== "undefined") {
                $.post(theme_options.ajax_url, {
                    action: "mungu_carrental",
                    min_price: _min,
                    max_price: _max,
                    min_seats: _mins,
                    max_seats: _maxs,
                    cat_ids: cat_id,
                    tag_ids: tag_id
                }, function(response) {
                    $(".car-ajax").html(response);
                    try {} catch (e) {}
                });
            }
        });
        $("#real-ajax-btn").on("click", function() {
            var _min = $("#range-slider-with-tooltip input[type=hidden]").eq(0).val();
            var _max = $("#range-slider-with-tooltip input[type=hidden]").eq(1).val();
            var _mins = $("#range-slider-with-tooltip1 input[type=hidden]").eq(0).val();
            var _maxs = $("#range-slider-with-tooltip1 input[type=hidden]").eq(1).val();
            var _bed = $(".real_bedroom").val();
            var _bath = $(".real_bathroom").val();
            var _type = $(".real_rent_type").val();
            var _layout = $(".realstate-widget").attr("data-layout");
            var _post_count = $(".realstate-widget").attr("data-page-count");
            $.post(theme_options.ajax_url, {
                action: "mungu_realstate",
                rent_type: _type,
                min_price: _min,
                max_price: _max,
                min_floor: _mins,
                max_floor: _maxs,
                bedroom: _bed,
                bathroom: _bath,
                layout: _layout,
                post_count: _post_count
            }, function(response) {
                $(".car-ajax").html(response);
                try {} catch (e) {}
            });
        });
    });
})(jQuery);

(function($) {
    "use strict";
    $(document).ready(function() {
        $("#carouselswipper").each(function() {
            var nav = $(".vc_row");
            nav.addClass("swiper-slide");
            var _PerView = $(".swiper-container").attr("data-prev");
            var _PerViewsmall = $(".swiper-container").attr("data-prev-small");
            var _PerViewtab = $(".swiper-container").attr("data-prev-tab");
            var _PerViewmobile = $(".swiper-container").attr("data-prev-mobile");
            var _Perspeed = $(".swiper-container").attr("data-speed");
            var _Perplay = $(".swiper-container").attr("data-play");
            var swiper = new Swiper($(this).find(".swiper-container"), {
                slidesPerView: _PerView,
                spaceBetween: 0,
                autoplay: {
                    delay: 6e3,
                    disableOnInteraction: true
                },
                fadeEffect: {
                    crossFade: true
                },
                speed: 400,
                slidesPerGroup: 1,
                autoResize: true,
                loop: false,
                navigation: {
                    nextEl: $(this).find(".swiper-button-next"),
                    prevEl: $(this).find(".swiper-button-prev")
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                    renderBullet: function(index, className) {
                        return '<span class="' + className + '">' + (index + 1) + "</span>";
                    }
                },
                breakpoints: {
                    1024: {
                        slidesPerView: _PerView,
                        spaceBetween: 0
                    },
                    970: {
                        slidesPerView: _PerViewsmall,
                        spaceBetween: 20
                    },
                    768: {
                        slidesPerView: _PerViewtab,
                        spaceBetween: 20
                    },
                    640: {
                        slidesPerView: _PerViewmobile
                    },
                    320: {
                        slidesPerView: _PerViewmobile,
                        spaceBetween: 10
                    }
                }
            });
        });
    });
})(jQuery);

(function($) {
    "use strict";
    $(document).ready(function() {
        if ($(".masonry-layout").length) {
            var $masonry = $(".masonry-layout");
            $masonry.isotope({
                itemSelector: ".masonry-item",
                masonry: {
                    columnWidth: 1
                }
            });
        }
        $(".jew-blog").each(function() {
            if ($(".jew-blog").length) {
                var $masonry = $(".jew-blog");
                $masonry.isotope({
                    itemSelector: ".jewitem",
                    masonry: {
                        columnWidth: 1,
                        gutter: 30
                    }
                });
            }
        });
    });
    $(window).load(function() {
        var len = $(".bushido-blog-owl-grid").attr("data-kendoshow");
        if (len > 2) var mlen = len - 1; else var mlen = len;
        $(".bushido-blog-owl-grid").owlCarousel({
            loop: true,
            margin: 80,
            dots: true,
            autoHeight: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1e3: {
                    items: 1,
                    loop: false
                }
            }
        });
    });
})(jQuery);

(function($) {
    "use strict";
    $(document).ready(function() {
        $(".mungu-team-container").each(function() {
            var _swiper = $(this);
            var column = 4;
            var attr = $(this).attr("data-col");
            if (typeof attr !== typeof undefined && attr !== false) {
                column = $(this).attr("data-col");
            }
            var swiper = new Swiper(".mungu-team-container", {
                slidesPerView: 4,
                spaceBetween: 30,
                slidesPerGroup: 4,
                loop: true,
                loopFillGroupWithBlank: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev"
                }
            });
        });
    });
    $(window).load(function() {
        var len = $(".bushido-team-owl").attr("data-kendoshow");
        if (len > 2) {
            var mlen = len - 1;
        } else {
            var mlen = len;
        }
        $(".bushido-team-owl").owlCarousel({
            loop: true,
            margin: 10,
            dots: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: mlen
                },
                1e3: {
                    items: len,
                    loop: true
                }
            }
        });
        $(".bushido-team-owl-grid").owlCarousel({
            loop: true,
            margin: 10,
            dots: true,
            autoHeight: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1e3: {
                    items: 1,
                    loop: false
                }
            }
        });
        $(".hover-team-owl").owlCarousel({
            loop: true,
            margin: 80,
            dots: true,
            autoHeight: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1e3: {
                    items: 3,
                    loop: true
                }
            }
        });
    });
})(jQuery);

(function($) {
    "use strict";
    $(document).ready(function() {
        $(".carousel-anything-container").each(function() {
            $(this).find("> .vc_row-full-width").remove();
            var $this = $(this);
            var _arrow = $this.data("navigation");
            var _bullets = $this.data("thumbnails");
            $(this).owlCarousel({
                items: $(this).attr("data-items"),
                itemsDesktop: [ 1199, $(this).attr("data-items") ],
                itemsDesktopSmall: [ 979, $(this).attr("data-items-small") ],
                itemsTablet: [ 768, $(this).attr("data-items-tablet") ],
                itemsMobile: [ 479, $(this).attr("data-items-mobile") ],
                scrollPerPage: $(this).attr("data-scroll_per_page") === "true" ? true : false,
                smartSpeed: $(this).attr("data-speed-rewind"),
                autoplay: $(this).attr("data-autoplay") === "false" ? false : $(this).attr("data-autoplay"),
                autoplayTimeout: 5e3,
                autoplayHoverPause: true,
                margin: 30,
                nav: _arrow,
                loop: true,
                dots: true,
                pagination: _bullets,
                navText: [ "<img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAMCAYAAACX8hZLAAAAu0lEQVQ4jbXSsREBURDG8R8uI3CJEZpTghZOCaQySqAEWrgSKIFURgm0oAXBezdjDAJ3981s8N7u7P/tt681HIxUUIoch19F7SoETLDHLcIagZTKcIzArCnIHBvMcMG6CcgDO4xxxdaLhUm8mPzZPH073zEVJtoKFhZtHzysQY8YkCWCn/8qF15bKhUmWEbICkVSAfCudYxU2M8ugtQF2cfmJ+GXXV+TdU6yQvEp0el1+1Ualwte4Pyt6AlCbR/8M1k/PwAAAABJRU5ErkJggg=='>", "<img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAMCAYAAACX8hZLAAAAu0lEQVQ4jbXSsREBURDG8R8uI3CJEZpTghZOCaQySqAEWrgSKIFURgm0oAXBezdjDAJ3981s8N7u7P/tt681HIxUUIoch19F7SoETLDHLcIagZTKcIzArCnIHBvMcMG6CcgDO4xxxdaLhUm8mPzZPH073zEVJtoKFhZtHzysQY8YkCWCn/8qF15bKhUmWEbICkVSAfCudYxU2M8ugtQF2cfmJ+GXXV+TdU6yQvEp0el1+1Ualwte4Pyt6AlCbR/8M1k/PwAAAABJRU5ErkJggg=='>" ],
                afterInit: function() {
                    setTimeout(function() {
                        $this.data("owlCarousel").updateVars();
                    }, 500);
                }
            });
        });
    });
})(jQuery);

(function($) {
    "use strict";
    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            items: 4,
            itemsDesktop: [ 1e3, 4 ],
            itemsDesktopSmall: [ 900, 3 ],
            itemsTablet: [ 600, 2 ],
            itemsMobile: false
        });
        $(".masonry-events").isotope({
            itemSelector: ".event_content",
            percentPosition: true,
            masonry: {
                columnWidth: ".grid-sizer"
            }
        });
        $(".sermons-list").find(".thumb").each(function() {
            var _this = $(this);
            var url = _this.attr("data-src");
            _this.css({
                "background-image": "url(" + url + ")",
                "background-size": "cover"
            });
        });
        $(".sermons-grid").find(".thumb").each(function() {
            var _this = $(this);
            var url = _this.attr("data-src");
            _this.css({
                "background-image": "url(" + url + ")",
                "background-size": "cover"
            });
        });
    });
})(jQuery);

(function($) {
    "use strict";
    $(document).ready(function() {
        var $container = $(".faq_container");
        $container.isotope({
            filter: "*",
            layoutMode: "vertical",
            animationOptions: {
                duration: 750,
                easing: "linear",
                queue: false
            }
        });
        $("#faq-filter a").on("click", function() {
            var selector = $(this).attr("data-filter");
            if (selector == "*") {
                $("#faq_container").find(".faq_container").find(".search-result-item").each(function() {
                    $(this).remove();
                });
            }
            $container.isotope({
                filter: selector,
                animationOptions: {
                    duration: 750,
                    easing: "linear",
                    queue: false
                }
            });
            return false;
        });
        $("#faq_container").each(function() {
            var _filter_area = $(this).find("#faq-filter");
            _filter_area.find("ul li a").on("click", function() {
                var $filter = $(this);
                var filter = $filter.attr("data-filter");
                _filter_area.find("ul li a").removeClass("active");
                $filter.addClass("active");
            });
        });
        $(".form-faq-search").each(function() {
            var _form = $(this);
            _form.on("submit", function() {
                var _search = _form.find(".search-input-field").eq(0).val();
                _form.find(".search-input-field").eq(0).blur();
                $("#faq-filter").find("a.active").removeClass("active");
                if (_search != "") {
                    $("#the_loader").removeClass("loaded").show();
                }
                if (typeof theme_options !== "undefined") {
                    $.post(theme_options.ajax_url, {
                        action: "faq_search_form",
                        search: _search,
                        params: _form.find(".faq-form-data").eq(0).text()
                    }, function(response) {
                        try {
                            $("#faq_container").find(".faq_container").find(".search-result-item").each(function() {
                                $(this).remove();
                            });
                            var _json = $.parseJSON(response);
                            if (_json.result.length) {
                                $.each(_json.result, function(_index, _item) {
                                    $("#faq_container").find(".faq_container").append($(_item));
                                });
                                $("#faq_container").find(".faq_container").isotope("reloadItems").isotope({
                                    filter: ".search-result-item",
                                    animationOptions: {
                                        duration: 750,
                                        easing: "linear",
                                        queue: false
                                    }
                                });
                            }
                        } catch (e) {}
                        $("#the_loader").addClass("loaded").hide();
                    });
                }
                return false;
            });
        });
    });
})(jQuery);

var map;

function initMap() {
    var elem = document.getElementById("mungu-google-map");
    var _lat = elem.getAttribute("data-lat");
    var _lng = elem.getAttribute("data-lng");
    var _color = elem.getAttribute("data-color");
    var _sat = elem.getAttribute("data-saturation");
    var _zoom = parseInt(elem.getAttribute("data-zoom"), 10);
    var _marker = elem.getAttribute("data-marker");
    var _contentAddress = elem.innerHTML;
    elem.innerHTML = "";
    var styles = [ {
        elementType: "geometry",
        stylers: [ {
            color: "#ebe3cd"
        }, {
            hue: _color
        }, {
            saturation: _sat
        } ]
    }, {
        elementType: "labels.text.fill",
        stylers: [ {
            color: "#523735"
        } ]
    }, {
        elementType: "labels.text.stroke",
        stylers: [ {
            color: "#f5f1e6"
        } ]
    }, {
        featureType: "administrative",
        elementType: "geometry.stroke",
        stylers: [ {
            color: "#c9b2a6"
        } ]
    }, {
        featureType: "administrative.land_parcel",
        elementType: "geometry.stroke",
        stylers: [ {
            color: "#dcd2be"
        } ]
    }, {
        featureType: "administrative.land_parcel",
        elementType: "labels.text.fill",
        stylers: [ {
            color: "#ae9e90"
        } ]
    }, {
        featureType: "landscape.natural",
        elementType: "geometry",
        stylers: [ {
            color: "#dfd2ae"
        } ]
    }, {
        featureType: "poi",
        elementType: "geometry",
        stylers: [ {
            color: "#dfd2ae"
        } ]
    }, {
        featureType: "poi",
        elementType: "labels.text.fill",
        stylers: [ {
            color: "#93817c"
        } ]
    }, {
        featureType: "poi.park",
        elementType: "geometry.fill",
        stylers: [ {
            color: "#a5b076"
        } ]
    }, {
        featureType: "poi.park",
        elementType: "labels.text.fill",
        stylers: [ {
            color: "#447530"
        } ]
    }, {
        featureType: "road",
        elementType: "geometry",
        stylers: [ {
            color: "#f5f1e6"
        } ]
    }, {
        featureType: "road.arterial",
        elementType: "geometry",
        stylers: [ {
            color: "#fdfcf8"
        } ]
    }, {
        featureType: "road.highway",
        elementType: "geometry",
        stylers: [ {
            color: "#f8c967"
        } ]
    }, {
        featureType: "road.highway",
        elementType: "geometry.stroke",
        stylers: [ {
            color: "#e9bc62"
        } ]
    }, {
        featureType: "road.highway.controlled_access",
        elementType: "geometry",
        stylers: [ {
            color: "#e98d58"
        } ]
    }, {
        featureType: "road.highway.controlled_access",
        elementType: "geometry.stroke",
        stylers: [ {
            color: "#db8555"
        } ]
    }, {
        featureType: "road.local",
        elementType: "labels.text.fill",
        stylers: [ {
            color: "#806b63"
        } ]
    }, {
        featureType: "transit.line",
        elementType: "geometry",
        stylers: [ {
            color: "#dfd2ae"
        } ]
    }, {
        featureType: "transit.line",
        elementType: "labels.text.fill",
        stylers: [ {
            color: "#8f7d77"
        } ]
    }, {
        featureType: "transit.line",
        elementType: "labels.text.stroke",
        stylers: [ {
            color: "#ebe3cd"
        } ]
    }, {
        featureType: "transit.station",
        elementType: "geometry",
        stylers: [ {
            color: "#dfd2ae"
        } ]
    }, {
        featureType: "water",
        elementType: "geometry.fill",
        stylers: [ {
            color: "#b9d3c2"
        } ]
    }, {
        featureType: "water",
        elementType: "labels.text.fill",
        stylers: [ {
            color: "#92998d"
        } ]
    } ];
    var styledMap = new google.maps.StyledMapType(styles, {
        name: "Styled Map"
    });
    var curLatlng = new google.maps.LatLng(_lat, _lng);
    var mapOptions = {
        zoom: _zoom,
        center: curLatlng,
        mapTypeControlOptions: {
            mapTypeIds: [ google.maps.MapTypeId.ROADMAP, "map_style" ]
        },
        scrollwheel: false,
        disableDefaultUI: true,
        streetViewControl: false
    };
    var map = new google.maps.Map(elem, mapOptions);
    var marker = new google.maps.Marker({
        position: curLatlng,
        title: "Themeton: Google Map",
        map: map,
        icon: _marker
    });
    marker.setMap(map);
    var infowindow = new google.maps.InfoWindow({
        content: _contentAddress,
        maxWidth: 400
    });
    marker.addListener("click", function() {
        infowindow.open(map, marker);
    });
    map.mapTypes.set("map_style", styledMap);
    map.setMapTypeId("map_style");
}

(function($) {
    "use strict";
    $(document).on("keyup", function(e) {
        if (e.keyCode == 27) {
            $("#menu-toggle").removeClass("open");
            $("nav.main-nav").removeClass("show-mobile-menu");
            $("body").removeClass("opened-menu");
        }
        return false;
    });
    $(document).ready(function() {
        $("#menu-toggle").click(function() {
            $(this).toggleClass("open");
            var attr = $("#header").attr("data-height");
            if (typeof attr !== typeof undefined && attr !== false) {
                if ($("body").hasClass("admin-bar")) {
                    attr = parseInt(attr) + 32;
                }
                $(".burger-menu nav.main-nav").css("top", attr + "px");
            }
        });
        $("#mobile-menu").on("click", function() {
            if ($(window).width() < 992) {
                $("nav.main-nav").addClass("show-mobile-menu");
            }
        });
        $("#close-menu").on("click", function() {
            $("nav.main-nav.show-mobile-menu").removeClass("show-mobile-menu");
            return false;
        });
        $("ul.one-page-menu a").on("click", function() {
            var $this = $(this);
            var href = $this.attr("href") + "";
            href = href.replace("#", "");
            var $row_c = $('div[data-onepage-slug="' + href + '"]');
            if ($row_c.length) {
                var otop = $row_c.offset().top;
                otop = otop - $("header").height();
                if (otop < 0) {
                    otop = 0;
                }
                $("html, body").animate({
                    scrollTop: otop
                }, "slow");
            }
            return false;
        });
        var preparing_menu = function() {
            var $gmc = $(".grid-menu-container");
            $gmc.find(".grid-menu").html("");
            $(".burger-menu nav.main-nav > ul > li").each(function() {
                var _level1 = $(this);
                var _a = _level1.find("> a").clone();
                var _menu = $('<div class="grid-menu-item"><span></span></div>');
                _menu.find("span").append(_a);
                if (_level1.find(">ul").length) {
                    _menu.addClass("has-children");
                }
                $gmc.find(".grid-menu").append(_menu);
                setTimeout(function() {
                    pm_showing();
                }, 100);
            });
            $gmc.find(".grid-menu").attr("data-grid", $gmc.find(".grid-menu .grid-menu-item").length);
            $gmc.find(".grid-menu").find(".grid-menu-item a").off("click").on("click", function() {
                var _link = $(this);
                if (_link.parents(".grid-menu-item").hasClass("has-children")) {
                    pm_closing();
                    var _index = $gmc.find(".grid-menu").find(".grid-menu-item").index(_link.parents(".grid-menu-item"));
                    setTimeout(function() {
                        $gmc.find(".grid-menu").html("");
                        var _mback = $('<div class="grid-menu-item menu-back"><span></span></div>');
                        _mback.find("span").append($('<a href="javascript:;"></a>').html("..."));
                        $gmc.find(".grid-menu").append(_mback);
                        $(".burger-menu nav.main-nav > ul > li").eq(_index).find("> ul > li").each(function() {
                            var _level1 = $(this);
                            var _a = _level1.find("> a").clone();
                            var _menu = $('<div class="grid-menu-item"><span></span></div>');
                            _menu.find("span").append(_a);
                            if (_level1.find(">ul").length) {
                                _menu.addClass("has-children");
                            }
                            $gmc.find(".grid-menu").append(_menu);
                        });
                        setTimeout(function() {
                            $gmc.find(".grid-menu").attr("data-grid", $gmc.find(".grid-menu .grid-menu-item").length);
                            pm_showing();
                        }, 100);
                        $gmc.find(".grid-menu").find(".grid-menu-item a").on("click", function() {
                            var _sm = $(this);
                            if (_sm.parents(".grid-menu-item").hasClass("menu-back")) {
                                pm_closing();
                                setTimeout(function() {
                                    preparing_menu();
                                }, $gmc.find(".grid-menu").find(".grid-menu-item").length * 100 + 200);
                                return false;
                            } else {
                                pm_closing();
                                setTimeout(function() {
                                    $("#menu-handler").trigger("click");
                                    window.location.href = _sm.attr("href");
                                }, $gmc.find(".grid-menu").find(".grid-menu-item").length * 100 + 200);
                                return false;
                            }
                        });
                    }, 800);
                    return false;
                } else {
                    pm_closing();
                    setTimeout(function() {
                        $("#menu-handler").trigger("click");
                        window.location.href = _link.attr("href");
                    }, $gmc.find(".grid-menu").find(".grid-menu-item").length * 100 + 200);
                    if ($("ul.one-page-menu").length) {
                        var href = _link.attr("href") + "";
                        href = href.replace("#", "");
                        var $row_c = $('div[data-onepage-slug="' + href + '"]');
                        if ($row_c.length) {
                            var otop = $row_c.offset().top;
                            otop = otop - $("header").height();
                            if (otop < 0) {
                                otop = 0;
                            }
                            $("html, body").animate({
                                scrollTop: otop
                            }, "slow");
                        }
                    }
                    return false;
                }
            });
        };
        var pm_showing = function() {
            var $gmc = $(".grid-menu-container");
            var _duration = 0;
            $gmc.find(".grid-menu").find(".grid-menu-item").each(function(index) {
                _duration = (index + 1) / 10 + .1;
                $(this).css({
                    "-webkit-transition-delay": _duration + "s",
                    "-moz-transition-delay": _duration + "s",
                    "transition-delay": _duration + "s"
                });
                $(this).addClass("showing-item");
            });
            setTimeout(function() {
                $gmc.find(".grid-menu").find(".grid-menu-item").each(function(index) {
                    $(this).css({
                        "-webkit-transition-delay": "0s",
                        "-moz-transition-delay": "0s",
                        "transition-delay": "0s"
                    });
                });
            }, _duration * 1e3);
        };
        var pm_closing = function() {
            var $gmc = $(".grid-menu-container");
            var _i = $gmc.find(".grid-menu").find(".grid-menu-item").length - 1;
            var _ani = 1;
            for (var _j = _i; _j >= 0; _j--) {
                $gmc.find(".grid-menu").find(".grid-menu-item").eq(_j).css({
                    "-webkit-transition-delay": _ani / 10 + "s",
                    "-moz-transition-delay": _ani / 10 + "s",
                    "transition-delay": _ani / 10 + "s"
                });
                $gmc.find(".grid-menu").find(".grid-menu-item").eq(_j).addClass("hiding-item");
                _ani++;
            }
        };
        $("#menu-handler").on("click", function() {
            $("body").toggleClass("opened-menu");
            if ($("body").hasClass("opened-menu")) {
                preparing_menu();
            }
        });
    });
})(jQuery);

(function($) {
    "use strict";
    $(document).ready(function() {
        $(function() {
            var owl = $(".owl-carousel").owlCarousel({
                loop: true,
                margin: 30,
                dots: true,
                pagination: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    768: {
                        items: 1
                    },
                    1e3: {
                        items: 3
                    }
                }
            });
            var owlAnimateFilter = function(even) {
                $(this).addClass("__loading").delay(70 * $(this).parent().index()).queue(function() {
                    $(this).dequeue().removeClass("__loading");
                });
            };
            $(".filtera ").on("click", ".filter-item", function(e) {
                var filter_data = $(this).data("filter");
                if ($(this).hasClass("active")) return;
                $(this).addClass("active").siblings().removeClass("active");
                owl.owlFilter(filter_data, function(_owl) {
                    $(_owl).find(".item").each(owlAnimateFilter);
                });
            });
        });
    });
})(jQuery);

(function($) {
    "use strict";
    $(document).ready(function() {
        if ($("#instafeed").length > 0) {
            var id = $("#instafeed").attr("data-id");
            var token = $("#instafeed").attr("data-token");
            var count = $("#instafeed").attr("data-count");
            var feed = new Instafeed({
                get: "user",
                userId: id,
                accessToken: token,
                limit: count,
                resolution: "standard_resolution",
                template: '<li class="item"><div class="item-content"><a href="{{link}}" target="_blank"><img src="{{image}}" /></a><div class="item-hover"><span><i class="fa fa-heart-o"></i> {{likes}}</span> </div></div></li>'
            });
            feed.run();
        }
    });
})(jQuery);

(function($) {
    "use strict";
    $(document).ready(function() {
        $(".loginbox").each(function() {
            $(".login-btn").click(function() {
                $(".hidden").removeClass("hidden");
            });
        });
    });
})(jQuery);

(function($) {
    "use strict";
    $(document).ready(function() {
        $(".simple-image").each(function() {
            $(this).isotope({
                layoutMode: "packery",
                itemSelector: ".image-item",
                packery: {
                    gutter: 30
                }
            });
        });
    });
})(jQuery);

(function($) {
    "use strict";
    $(window).load(function() {
        $(".mungu-card-masonry").each(function() {
            var _masonry = $(this);
            var _col_width = _masonry.data("col-width") + "";
            _masonry.isotope({
                itemSelector: ".masonry-item",
                masonry: {
                    columnWidth: 1
                }
            });
        });
    });
})(jQuery);

(function($) {
    "use strict";
})(jQuery);

(function($) {
    "use strict";
    if ($("#msplayer").length) {
        var svg_pp = new SVGMorpheus("#ms_play_pause");
        var svg_vol = new SVGMorpheus("#ec_volume");
        $("#msplayer").mediaelementplayer({
            features: [ "current", "progress", "duration", "tracks" ],
            success: function(media, node, player) {
                var events = [ "loadstart", "play", "pause", "ended" ];
                var playlist = {
                    playing: 0,
                    list: []
                };
                $("#music_player .pl-list").find(".tr-item").each(function() {
                    var _row = $(this);
                    var _rid = _row.data("id");
                    var _audio = _row.find(".pl-audio-item").data("url");
                    var _thumb = _row.find(".pl-audio-item").data("thumb");
                    var _title = _row.find(".pl-audio-item").find(".pl-item-title").text();
                    var _artist = _row.find(".pl-audio-item").find(".pl-item-artist").text();
                    playlist.list.push({
                        id: _rid,
                        audio: _audio,
                        thumb: _thumb,
                        title: _title,
                        artist: _artist
                    });
                });
                var load_song = function(load_index) {
                    if (playlist.list.length > 0 && playlist.list.length > load_index && load_index > -1) {
                        var _current_media = playlist.list[load_index];
                        playlist.playing = load_index;
                        media.setSrc(_current_media.audio);
                        media.load();
                        $("#music_player .ms-nowplaying").find(".np-thumb").css("background-image", "url(" + _current_media.thumb + ")");
                        $("#music_player .ms-nowplaying").find(".np-title").text(_current_media.title);
                        $("#music_player .ms-nowplaying").find(".np-artist").text(_current_media.artist);
                        $("#music_player .pl-list").find(".tr-item .td-num .number.playing").removeClass("playing");
                        $("#music_player .pl-list").find(".tr-item").eq(load_index).find(".td-num .number").addClass("playing");
                    }
                };
                var play_song = function() {
                    media.play();
                };
                var play_prev = function() {
                    if (playlist.playing == 0 && playlist.list.length > 0) {
                        playlist.playing = playlist.list.length - 1;
                    } else {
                        playlist.playing = playlist.playing - 1;
                    }
                    load_song(playlist.playing);
                    play_song();
                };
                var play_next = function() {
                    if (playlist.list.length > 0 && playlist.playing == playlist.list.length - 1) {
                        playlist.playing = 0;
                    } else {
                        playlist.playing = playlist.playing + 1;
                    }
                    if ($("#music_player .ms-control-shuffle").hasClass("active")) {
                        playlist.playing = Math.floor(Math.random() * playlist.list.length - 1);
                    }
                    load_song(playlist.playing);
                    play_song();
                };
                if (playlist.list.length) {
                    load_song(0);
                }
                for (var i = 0, il = events.length; i < il; i++) {
                    var eventName = events[i];
                    media.addEventListener(events[i], function(e) {
                        if (e.type == "play") {
                            $("#music_player .ms-play").addClass("ms-pause");
                            svg_pp.to("ms_pause", {
                                duration: 400,
                                rotation: "none"
                            });
                        } else if (e.type == "pause") {
                            $("#music_player .ms-play").removeClass("ms-pause");
                            svg_pp.to("ms_play", {
                                duration: 400,
                                rotation: "none"
                            });
                        } else if (e.type == "loadstart") {} else if (e.type == "ended") {
                            var _current_number = playlist.playing;
                            if (playlist.playing == playlist.list.length - 1) {
                                if ($("#music_player .ms-control-repeat").hasClass("active")) {
                                    _current_number = 0;
                                } else {
                                    _current_number = -1;
                                }
                            } else {
                                if ($("#music_player .ms-control-shuffle").hasClass("active")) {
                                    _current_number = Math.floor(Math.random() * playlist.list.length - 1);
                                } else {
                                    _current_number += 1;
                                }
                            }
                            console.log("ended", _current_number);
                            if (_current_number > -1) {
                                load_song(_current_number);
                                play_song();
                            }
                        }
                    });
                }
                $("#music_player .ms-play").on("click", function() {
                    if (media.paused) {
                        media.play();
                    } else {
                        media.pause();
                    }
                });
                $("#music_player .ms-prev").on("click", function() {
                    play_prev();
                });
                $("#music_player .ms-next").on("click", function() {
                    play_next();
                });
                $("#music_player .ec-vol-el").slider({
                    orientation: "vertical",
                    range: "min",
                    min: 0,
                    max: 100,
                    value: 80,
                    slide: function(event, ui) {
                        media.setVolume(ui.value / 100);
                    }
                });
                $("#music_player .ms-controls .ec-volume a").on("click", function() {
                    $(this).toggleClass("ec-vol-mute");
                    if ($(this).hasClass("ec-vol-mute")) {
                        media.setVolume(0);
                        svg_vol.to("vol_mute", {
                            duration: 400,
                            rotation: "none"
                        });
                        $("#music_player .ec-vol-el").slider("value", 0);
                    } else {
                        media.setVolume(.8);
                        svg_vol.to("vol_max", {
                            duration: 400,
                            rotation: "none"
                        });
                        $("#music_player .ec-vol-el").slider("value", 80);
                    }
                });
                $("#music_player .ms-control-shuffle").on("click", function() {
                    $(".ms-control-shuffle").toggleClass("active");
                });
                $("#music_player .ms-control-repeat").on("click", function() {
                    $(this).toggleClass("active");
                });
                $("#music_player .pl-list .tr-item .pl-audio-item").on("click", function() {
                    var _index = $("#music_player .pl-list .tr-item").index($(this).parents(".tr-item"));
                    load_song(_index);
                    play_song();
                });
            }
        });
    }
})(jQuery);

(function($) {
    "use strict";
    $(document).ready(function() {
        var doc = $(window);
        $(window).bind("resize", function() {
            $(".portfolio-meissa-right").css("top", calculateScrollSpeed());
        });
        $(window).bind("scroll", function() {
            $(".portfolio-meissa-right").css("top", calculateScrollSpeed(".portfolio-meissa-right"));
        });
        function calculateScrollSpeed(id) {
            var leftPaneHeight = $(".portfolio-meissa-left").height();
            var rightPaneHeight = $(id).height();
            var browserHeight = $(window).height();
            var leftPaneScrollTop = $(window).scrollTop();
            return -$(window).scrollTop() * ((browserHeight - rightPaneHeight) / (browserHeight - leftPaneHeight));
        }
    });
})(jQuery);

(function($) {
    "use strict";
})(jQuery);

(function($) {
    "use strict";
    $(document).ready(function() {
        var nxtPortfilio = window.nxtPortfilio || {}, $win = $(window);
        nxtPortfilio.Isotope = function() {
            var isotopeContainer = $(".portfolio-element");
            if (!isotopeContainer.length || !jQuery().isotope) return;
            $win.load(function() {
                isotopeContainer.isotope({
                    itemSelector: ".portfolio-items"
                });
                $(".portfolio-filter").on("click", "a", function(e) {
                    $(".portfolio-filter").find(".active").removeClass("active");
                    $(this).parent().addClass("active");
                    var filterValue = $(this).attr("data-filter");
                    isotopeContainer.isotope({
                        filter: filterValue
                    });
                    e.preventDefault();
                });
            });
        };
        nxtPortfilio.Isotope();
    });
})(jQuery);

(function($) {
    "use strict";
    $(document).ready(function() {
        $(".post-feature-image").each(function() {
            var _swiper = $(this);
            var swiper = new Swiper(_swiper, {
                slidesPerView: 3,
                spaceBetween: 30,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                    type: "bullets"
                },
                renderBullet: function(swiper, index, className) {
                    return '<li class="' + className + '"><span class="tp-bullet-inner"></span></li>';
                },
                breakpoints: {
                    1024: {
                        slidesPerView: 1
                    }
                }
            });
        });
    });
})(jQuery);

(function($) {
    "use strict";
    $(document).ready(function() {
        $(".post-product-thumb").each(function() {
            var _swiper = $(this);
            var swiper = new Swiper(_swiper, {
                slidesPerView: 5,
                spaceBetween: 0,
                breakpoints: {
                    1024: {
                        slidesPerView: 1
                    }
                }
            });
        });
        $("div[data-woo-product]").each(function() {
            var _this = $(this);
            var _img = _this.attr("data-woo-product");
            _this.css({
                background: "url(" + _img + ")",
                "background-size": "cover"
            });
        });
        $(".post-product-slide").each(function() {
            var _swiper = $(this);
            var swiper = new Swiper(_swiper, {
                slidesPerView: 3,
                slidesPerColumn: 2,
                spaceBetween: 0,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true
                },
                paginationBulletRender: function(swiper, index, className) {
                    return '<span class="' + className + '">' + 0 + "" + (index + 1) + "</span>";
                },
                breakpoints: {
                    1024: {
                        slidesPerView: 1
                    }
                }
            });
        });
        $(".post-product-slide-thumb").each(function() {
            var _swiper = $(this);
            var swiper = new Swiper(_swiper, {
                slidesPerView: 3,
                spaceBetween: 30,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true
                },
                paginationBulletRender: function(swiper, index, className) {
                    return '<span class="' + className + '">' + 0 + "" + (index + 1) + "</span>";
                },
                breakpoints: {
                    1024: {
                        slidesPerView: 1
                    }
                }
            });
        });
    });
})(jQuery);

(function($) {
    "use strict";
    $(document).ready(function() {
        $(".project-items").each(function() {
            var $this = $(this);
            var swiper = new Swiper($this.find(".project-completed"), {
                slidesPerView: 5,
                spaceBetween: 20,
                centeredSlides: true,
                loop: true,
                autoplay: 6e3,
                navigation: {
                    nextEl: $this.find(".swiper-button-next"),
                    prevEl: $this.find(".swiper-button-prev")
                }
            });
        });
        $(".swiper-container-feautured-project").each(function() {
            var _swiper = $(this);
            var swiper = new Swiper(_swiper, {
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true
                },
                hashnav: true,
                navigation: {
                    nextEl: $this.find(".swiper-button-next"),
                    prevEl: $this.find(".swiper-button-prev")
                }
            });
        });
    });
})(jQuery);

(function($) {
    "use strict";
    $(document).ready(function() {
        if (typeof theme_options !== "undefined") {
            $.post(theme_options.ajax_url, {
                action: "get_gym",
                data: $.parseJSON($("#gym_data").text()),
                gym_type: $(".themeton-fitnes-drop").val()
            }, function(response) {
                $(".schedule").find(".fitness-column").html(response);
                try {} catch (e) {}
            });
        }
        if (typeof theme_options !== "undefined") {
            $(".dropdown").change(function() {
                $.post(theme_options.ajax_url, {
                    action: "get_gym",
                    data: $.parseJSON($("#gym_data").text()),
                    gym_type: $(".themeton-fitnes-drop").val()
                }, function(response) {
                    $(".schedule").find(".fitness-column").html(response);
                    try {} catch (e) {}
                });
            });
        }
    });
})(jQuery);

(function($) {
    "use strict";
    $(document).ready(function() {
        $(".nxt-service-icon").each(function() {
            var $this = $(this), _col = $this.data("col"), _row = $this.data("row"), _perView = _col * _row;
            var swiper = new Swiper($this.find(".swiper-container"), {
                slidesPerView: _col,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true
                },
                renderBullet: function(swiper, index, className) {
                    return '<li class="' + className + '"><span class="tp-bullet-inner"></span></li>';
                },
                spaceBetween: 30,
                navigation: {
                    nextEl: $this.find(".swiper-button-next"),
                    prevEl: $this.find(".swiper-button-prev")
                },
                breakpoints: {
                    1080: {
                        slidesPerView: 3,
                        slidesPerGroup: 3
                    },
                    768: {
                        slidesPerView: 2,
                        slidesPerGroup: 2
                    },
                    480: {
                        slidesPerView: 1,
                        slidesPerGroup: 1
                    }
                }
            });
        });
    });
})(jQuery);

(function($) {
    "use strict";
    $(window).load(function() {
        $(".single-product-slide").each(function() {
            var _swiper = $(this);
            var swiper = new Swiper(_swiper, {
                slidesPerView: 2,
                slidesPerColumn: 1,
                spaceBetween: 0,
                loop: true,
                navigation: {
                    nextEl: _swiper.find(".swiper-button-next")
                },
                pagination: {
                    el: _swiper.find(".single-swiper-pagination"),
                    clickable: true
                },
                paginationBulletRender: function(swiper, index, className) {
                    var text = $(".single-product-text").eq(_swiper.find(".swiper-slide").eq(index).attr("data-swiper-slide-index")).text();
                    return '<span class="' + className + '">' + text + "</span>";
                },
                breakpoints: {
                    1024: {
                        slidesPerView: 1
                    }
                }
            });
        });
    });
})(jQuery);

(function($) {
    "use strict";
    $(document).ready(function() {
        $(".woo-product-thumbnail").each(function() {
            var _swiper = $(this);
            var swiper = new Swiper(_swiper, {
                slidesPerView: 1,
                spaceBetween: 0,
                pagination: {
                    clickable: true,
                    el: ".swiper-pagination"
                }
            });
        });
        $(".woo-product-thumbnail-style-2").each(function() {
            var _swiper = $(this);
            var swiper = new Swiper(_swiper, {
                slidesPerView: 2,
                loop: true,
                spaceBetween: 0,
                navigation: {
                    nextEl: _swiper.find(".woo-button-next"),
                    prevEl: _swiper.find(".woo-button-prev")
                },
                pagination: {
                    clickable: true
                }
            });
        });
    });
})(jQuery);

(function($) {
    "use strict";
    $(window).load(function() {
        $(".upking-team-owl").owlCarousel({
            loop: true,
            margin: 70,
            nav: true,
            dots: false,
            autoHeight: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1e3: {
                    items: 3,
                    loop: true
                }
            }
        });
        $(".upking-team-owl").find(".owl-stage-outer").addClass("uk-width-2-3");
        $(".upking-team-owl").find(".owl-controls").addClass("uk-width-1-3 uk-flex-first uk-visible@s");
        $(".upking-team-owl").find(".owl-controls").find(".owl-nav").addClass("uk-flex uk-flex-center");
        var _cnr = $(".upking-team-owl");
        $(".upking-team-owl").find(".owl-controls").prepend('<div class="upking-title"><h1>' + _cnr.data("team-title") + "</h1><h3>" + _cnr.data("team-subtitle") + "</h3></div>");
        $(".upking-team-owl").find(".owl-controls").find(".owl-prev").html('<span class="uk-icon" data-uk-icon="icon: chevron-left; ratio: 1.5"></span>');
        $(".upking-team-owl").find(".owl-controls").find(".owl-next").html('<span class="uk-icon" data-uk-icon="icon: chevron-right; ratio: 1.5"></span>');
    });
})(jQuery);

(function($) {
    "use strict";
    $(document).ready(function() {
        $(".nxt-testimonial").each(function() {
            var _PerView = $(".nxt-testimonial").attr("data-prev");
            var galleryTop = new Swiper($(this).find(".swiper-container:not(.gallery-thumbs)"), {
                slidesPerView: _PerView,
                navigation: {
                    nextEl: $(this).find(".swiper-button-next"),
                    prevEl: $(this).find(".swiper-button-prev")
                },
                effect: "slide",
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1
                    },
                    480: {
                        slidesPerView: 1
                    },
                    640: {
                        slidesPerView: 1
                    },
                    768: {
                        slidesPerView: 1
                    }
                },
                renderBullet: function(index, className) {
                    return '<li class="' + className + '"><span class="tp-bullet-inner"></span></li>';
                },
                paginationClickable: true
            });
            if ($(this).find(".gallery-thumbs").length) {
                var galleryThumbs = new Swiper($(this).find(".gallery-thumbs"), {
                    spaceBetween: 10,
                    centeredSlides: true,
                    slidesPerView: "auto",
                    touchRatio: .2,
                    slideToClickedSlide: true
                });
                galleryTop.controller.control = galleryThumbs;
                galleryThumbs.controller.control = galleryTop;
            }
        });
        $(".nxt-testimonial-two").each(function() {
            var _PerView = $(".nxt-testimonial-two").attr("data-prev");
            var sliderTop = new Swiper($(this).find(".swiper-container:not(.gallery-thumbs)"), {
                slidesPerView: _PerView,
                loop: true,
                navigation: {
                    nextEl: $(this).find(".swiper-button-next"),
                    prevEl: $(this).find(".swiper-button-prev")
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1
                    },
                    480: {
                        slidesPerView: 1
                    },
                    640: {
                        slidesPerView: 1
                    },
                    768: {
                        slidesPerView: 1
                    }
                }
            });
            if ($(this).find(".gallery-thumbs").length) {
                var sliderThumbs = new Swiper($(this).find(".gallery-thumbs"), {
                    spaceBetween: 2,
                    centeredSlides: true,
                    slidesPerView: 3,
                    loop: true,
                    slideToClickedSlide: true,
                    breakpoints: {
                        320: {
                            slidesPerView: 1
                        },
                        480: {
                            slidesPerView: 1
                        },
                        640: {
                            slidesPerView: 1
                        },
                        768: {
                            slidesPerView: 1
                        }
                    }
                });
                sliderTop.controller.control = sliderThumbs;
                sliderThumbs.controller.control = sliderTop;
            }
        });
    });
})(jQuery);

(function($) {
    "use strict";
    $("[data-number-style]").each(function() {
        var _ul = $(this).find("ul li");
        $(_ul).each(function() {
            if ($(this).text() < 10 && $(this).text() != "") {
                $(this).find("span").text("0" + $(this).text());
                $(this).find("a").text("0" + $(this).text());
            }
        });
    });
    $(window).load(function() {
        $(".meissa-owl").owlCarousel({
            margin: 10,
            dots: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1e3: {
                    items: 3,
                    loop: true
                }
            }
        });
    });
})(jQuery);

(function(window) {
    "use strict";
    function isIOSSafari() {
        var userAgent;
        userAgent = window.navigator.userAgent;
        return userAgent.match(/iPad/i) || userAgent.match(/iPhone/i);
    }
    function isTouch() {
        var isIETouch;
        isIETouch = navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0;
        return [].indexOf.call(window, "ontouchstart") >= 0 || isIETouch;
    }
    var isIOS = isIOSSafari(), clickHandler = isIOS || isTouch() ? "touchstart" : "click";
    function extend(a, b) {
        for (var key in b) {
            if (b.hasOwnProperty(key)) {
                a[key] = b[key];
            }
        }
        return a;
    }
    function Animocon(el, options) {
        if (typeof mojs !== "undefined" && mojs != "") {
            this.el = el;
            this.options = extend({}, this.options);
            extend(this.options, options);
            this.checked = false;
            this.timeline = new mojs.Timeline();
            for (var i = 0, len = this.options.tweens.length; i < len; ++i) {
                this.timeline.add(this.options.tweens[i]);
            }
            var self = this;
            this.el.addEventListener(clickHandler, function() {
                if (self.checked) {
                    self.options.onUnCheck();
                } else {
                    self.options.onCheck();
                    self.timeline.replay();
                }
                self.checked = !self.checked;
            });
        }
    }
    jQuery(document).ready(function() {
        if (typeof mojs !== "undefined" && mojs != "") {
            Animocon.prototype.options = {
                tweens: [ new mojs.Burst({}) ],
                onCheck: function() {
                    return false;
                },
                onUnCheck: function() {
                    return false;
                }
            };
        }
    });
    var items = [].slice.call(document.querySelectorAll(".play-button-con"));
    function init() {
        var el11 = items[0].querySelector(".icobutton"), el11span = el11.querySelector("span");
        var opacityCurve11 = mojs.easing.path("M0,0 C0,87 27,100 40,100 L40,0 L100,0");
        var scaleCurve11 = mojs.easing.path("M0,0c0,80,39.2,100,39.2,100L40-100c0,0-0.7,106,60,106");
        new Animocon(el11, {
            tweens: [ new mojs.Shape({
                parent: el11,
                radius: {
                    0: 95
                },
                fill: "transparent",
                stroke: "#C0C1C3",
                strokeWidth: {
                    50: 0
                },
                opacity: .4,
                duration: 1e3,
                delay: 100,
                easing: mojs.easing.bezier(0, 1, .5, 1)
            }), new mojs.Shape({
                parent: el11,
                radius: {
                    0: 80
                },
                fill: "transparent",
                stroke: "#C0C1C3",
                strokeWidth: {
                    40: 0
                },
                opacity: .2,
                duration: 1800,
                delay: 300,
                easing: mojs.easing.bezier(0, 1, .5, 1)
            }), new mojs.Tween({
                duration: 1300,
                easing: mojs.easing.ease.out,
                onUpdate: function(progress) {
                    var opacityProgress = opacityCurve11(progress);
                    el11span.style.opacity = opacityProgress;
                    var scaleProgress = scaleCurve11(progress);
                    el11span.style.WebkitTransform = el11span.style.transform = "scale3d(" + scaleProgress + "," + scaleProgress + ",9)";
                    var colorProgress = opacityCurve11(progress);
                    el11.style.color = colorProgress >= 1 ? "#E87171" : "#C0C1C3";
                }
            }) ],
            onUnCheck: function() {
                el11.style.color = "#C0C1C3";
            }
        });
    }
    if (typeof mojs !== "undefined" && mojs != "") {
        if (items != "") init();
    }
})(window);

(function($) {
    "use strict";
    $("[data-thumbd]").each(function() {
        var img_url = $(this).attr("data-thumbd");
        $(this).css({
            "background-image": "url(" + img_url + ")",
            "background-size": "cover"
        });
    });
})(jQuery);

(function($) {
    "use strict";
})(jQuery);

(function($) {
    "use strict";
    $(".woo-themeton-children").each(function() {
        var _this = $(this);
        _this.on("click", function() {
            $(_this).find("ul").toggle("slow");
            if ($(_this).hasClass("active")) $(_this).removeClass("active"); else $(_this).addClass("active");
        });
    });
})(jQuery);

(function($) {
    "use strict";
    $(document).ready(function() {
        $(".single-product-gallery-container").each(function() {
            var _swiper = $(this);
            var swiper = new Swiper(_swiper, {
                slidesPerView: 1,
                navigation: {
                    nextEl: _swiper.find(".swiper-button-next"),
                    prevEl: _swiper.find(".swiper-button-prev")
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true
                },
                spaceBetween: 0
            });
        });
    });
})(jQuery);

(function($) {
    "use strict";
})(jQuery);

(function($) {
    "use strict";
})(jQuery);

(function($) {
    "use strict";
})(jQuery);

(function($) {
    "use strict";
    $(document).ready(function() {
        if ($("#single_review_form").length) {
            var _form = $("#respond").html();
            $("#respond").remove();
            $("#single_review_form").append('<div id="respond">' + _form + "</div>");
            $(".woocommerce-review-link").on("click", function() {
                $("#single_review_form").css("display", "block");
            });
        }
    });
})(jQuery);