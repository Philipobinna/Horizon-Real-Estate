//
// Navbar
//
"use strict";var Navbar=function(){var o=$(".navbar-nav, .navbar-nav .nav"),a=$(".navbar .collapse"),n=$(".navbar .dropdown");a.on({"show.bs.collapse":function(){var n;(n=$(this)).closest(o).find(a).not(n).collapse("hide")}}),n.on({"hide.bs.dropdown":function(){var o,a;o=$(this),(a=o.find(".dropdown-menu")).addClass("close"),setTimeout(function(){a.removeClass("close")},200)}})}(),NavbarCollapse=function(){$(".navbar-nav");var o=$(".navbar .navbar-custom-collapse");o.length&&(o.on({"hide.bs.collapse":function(){o.addClass("collapsing-out")}}),o.on({"hidden.bs.collapse":function(){o.removeClass("collapsing-out")}}));var a=0;$(".sidenav-toggler").click(function(){if(1==a)$("body").removeClass("nav-open"),a=0,$(".bodyClick").remove();else{$('<div class="bodyClick"></div>').appendTo("body").click(function(){$("body").removeClass("nav-open"),a=0,$(".bodyClick").remove()}),$("body").addClass("nav-open"),a=1}})}();