/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';
 //assets/js/app.js
import 'bootstrap';
//fichier scss contenant nos css
import './styles/app.scss';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';

$(function() {
  $('a[href*=#]').on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: $($(this).attr('ok')).offset().top}, 500, 'linear');
  });
});

$( window ).on( "load", function() {
    mainNav();
    $(window).on('scroll', function() {
        mainNav();
    });
    function mainNav() {
        var top = (document.documentElement && document.documentElement.scrollTop) || document.body.scrollTop;
        if (top > 40) $('.navbar-fixed-top').stop().animate({
            "opacity": '1',
            "top": '0'
        });
        else $('.navbar-fixed-top').stop().animate({
            "top": '-70',
            "opacity": '0'
        });

  }
  });

console.log('Hello Webpack Encore! Edit me in assets/app.js');
