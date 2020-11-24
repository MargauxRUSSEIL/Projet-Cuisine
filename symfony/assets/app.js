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

const nav = document.getElementById('Test45')

// J'en fait une fonction pour pouvoir l'appeler au chargement de la page car
// le scoll n'est pas forcément en haut au chargement.
function onWindowScroll(event) {
	if (window.pageYOffset < 30) {
  	nav.classList.remove('scrolled')
  } else {
  	nav.classList.add('scrolled')
  }
}

window.addEventListener('scroll', onWindowScroll)

console.log('Hello Webpack Encore! Edit me in assets/app.js');
