!function(e){"use strict";e(window).on("load",(function(){e("#preloader-active").fadeOut("slow")}));var i,s,t,a=e(".sticky-bar"),o=e(window);o.on("scroll",(function(){o.scrollTop()<200?(a.removeClass("stick"),e(".header-style-2 .categories-dropdown-active-large").removeClass("open"),e(".header-style-2 .categories-button-active").removeClass("open")):a.addClass("stick")})),e(".sticky-sidebar").length&&e(".sticky-sidebar").theiaStickySidebar(),e(".categories-button-active").length&&e(".categories-button-active").on("click",(function(i){i.preventDefault(),e(this).hasClass("open")?(e(this).removeClass("open"),e(this).siblings(".categories-dropdown-active-large").removeClass("open")):(e(this).addClass("open"),e(this).siblings(".categories-dropdown-active-large").addClass("open"))})),e(".select-active").length&&e(".select-active").select2(),e(".count").length&&e(".count").counterUp({delay:10,time:2e3}),e(".grid").length&&e(".grid").imagesLoaded((function(){e(".grid").isotope({itemSelector:".grid-item",percentPosition:!0,layoutMode:"masonry",masonry:{columnWidth:".grid-item"}})})),i=e(".search-active"),s=e(".search-close"),t=e(".main-search-active"),i.on("click",(function(e){e.preventDefault(),t.addClass("search-visible")})),s.on("click",(function(){t.removeClass("search-visible")})),function(){var i=e(".burger-icon"),s=e(".mobile-menu-close"),t=e(".mobile-header-active"),a=e("body");a.prepend('<div class="body-overlay-1"></div>'),i.on("click",(function(e){i.toggleClass("burger-close"),e.preventDefault(),t.toggleClass("sidebar-visible"),a.toggleClass("mobile-menu-active")})),s.on("click",(function(){t.removeClass("sidebar-visible"),a.removeClass("mobile-menu-active")})),e(".body-overlay-1").on("click",(function(){t.removeClass("sidebar-visible"),a.removeClass("mobile-menu-active"),i.removeClass("burger-close")}))}();var n=e(".mobile-menu"),l=n.find(".sub-menu");l.parent().prepend('<span class="menu-expand"><i class="fi-rr-angle-small-down"></i></span>'),l.slideUp(),n.on("click","li a, li .menu-expand",(function(i){var s=e(this);s.parent().attr("class").match(/\b(menu-item-has-children|has-children|has-sub-menu)\b/)&&("#"===s.attr("href")||s.hasClass("menu-expand"))&&(i.preventDefault(),s.siblings("ul:visible").length?(s.parent("li").removeClass("active"),s.siblings("ul").slideUp()):(s.parent("li").addClass("active"),s.closest("li").siblings("li").removeClass("active").find("li").removeClass("active"),s.closest("li").siblings("li").find("ul:visible").slideUp(),s.siblings("ul").slideDown()))})),e(".mobile-language-active").on("click",(function(i){i.preventDefault(),e(".lang-dropdown-active").slideToggle(900)})),e(".categories-button-active-2").on("click",(function(i){i.preventDefault(),e(".categori-dropdown-active-small").slideToggle(900)}));var r=e(".tm-demo-options-wrapper");e(".view-demo-btn-active").on("click",(function(e){e.preventDefault(),r.toggleClass("demo-open")})),e(".more_slide_open").slideUp(),e(".more_categories").on("click",(function(){e(this).toggleClass("show"),e(".more_slide_open").slideToggle()})),e(".swiper-group-10").each((function(){new Swiper(this,{spaceBetween:20,slidesPerView:10,slidesPerGroup:2,loop:!0,navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"},pagination:{el:".swiper-pagination-1",type:"custom",renderCustom:function(e,i,s){for(var t="",a=0;a<s;a++)t+=a==i-1?'<span class="swiper-pagination-customs swiper-pagination-customs-active"></span>':'<span class="swiper-pagination-customs"></span>';return t}},autoplay:{delay:1e4},breakpoints:{1199:{slidesPerView:10},800:{slidesPerView:8},600:{slidesPerView:6},400:{slidesPerView:4},250:{slidesPerView:2}}})})),e(".swiper-group-1").each((function(){new Swiper(this,{spaceBetween:30,slidesPerView:1,loop:!0,navigation:{nextEl:".swiper-button-next-1",prevEl:".swiper-button-prev-1"},pagination:{el:".swiper-pagination-1",type:"custom",renderCustom:function(e,i,s){for(var t="",a=0;a<s;a++)t+=a==i-1?'<span class="swiper-pagination-customs swiper-pagination-customs-active"></span>':'<span class="swiper-pagination-customs"></span>';return t}},autoplay:{delay:1e4}})})),e(".list-tags-job .remove-tags-job").on("click",(function(i){i.preventDefault(),e(this).closest(".job-tag").remove()})),e(".popup-youtube").length&&e(".popup-youtube").magnificPopup({type:"iframe",mainClass:"mfp-fade",removalDelay:160,preloader:!1,fixedContentPos:!1}),e(".btn-expanded").on("click",(function(){e(this).hasClass("btn-collapsed")?(e(this).removeClass("btn-collapsed"),e("div.nav").removeClass("close-nav")):(e(this).addClass("btn-collapsed"),e("div.nav").addClass("close-nav"))})),e("document").on("click",".dropdown-menu > li > a",(function(){location.href=this.href})),e(document).ready((function(){var i=e("#circle-staticstic-profile-completed").data("percent-completed");e("#circle-staticstic-profile-completed").circliful({animation:1,foregroundBorderWidth:10,backgroundBorderWidth:10,percent:i,percentageTextSize:20,textStyle:"font-size: 20px; font-weight: bold; font-family: 'Plus Jakarta Sans', sans-serif",fontColor:"#05264E",fillColor:"#d8e0fd",backgroundColor:"#d8e0fd",multiPercentage:0,targetTextSize:20})}))}(jQuery);