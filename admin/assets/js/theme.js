/**
 * Theme: Opatix - Admin & Dashboard Template
 * Author: Myra Studio
 * File: Main Js
 */


!function(t){"use strict";t(".dropdown-menu a.dropdown-toggle").on("click",function(a){return t(this).next().hasClass("show")||t(this).parents(".dropdown-menu").first().find(".show").removeClass("show"),t(this).next(".dropdown-menu").toggleClass("show"),!1}),t(".topnav-menu .navbar-nav a").each(function(){var a=window.location.href.split(/[?#]/)[0];this.href==a&&(t(this).addClass("active"),t(this).parent().addClass("active"),t(this).parent().parent().addClass("active"),t(this).parent().parent().parent().parent().addClass("active"))}),t(function(){t('[data-toggle="tooltip"]').tooltip()}),t(function(){t('[data-toggle="popover"]').popover()}),Waves.init()}(jQuery);