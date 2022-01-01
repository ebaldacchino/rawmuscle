const el = (x) => document.querySelector(x);
const all = (x) => Array.from(document.querySelectorAll(x));

import {
	checkSlide,
	toggleNav,
	toLinkLocation,
	pageTransitions,
} from './functions';

import './css/style.css';
import './css/footer.css';
import './css/header.css';
import './css/scroll-top.css';
import './css/animations.css';
import './css/iframe.css';
import './css/scroll-bar.css';
import './css/fonts.css';
import './css/fontawesome.css';

import('./scrollTop');

if (el('.slider')) {
	import('./sliders');
	import('./css/sliders.css');
}
if (el('#tour-dates')) {
	import('./tour-dates');
	import('./css/tour-dates.css');
}
if (el('.stripper-profile')) {
	import('./css/stripper-template.css');
}
if (el('form')) {
	import('./form');
	import('./css/form.css');
	import('./css/form-submitted.css');
}

el('#menu-icon').addEventListener('click', toggleNav);

el('aside').addEventListener('click', toggleNav);

el('#date-year').textContent = new Date().getFullYear();

window.addEventListener('load', checkSlide);
window.addEventListener('scroll', checkSlide);
window.addEventListener('resize', checkSlide);

all('.btn').map((button) => button.addEventListener('click', toLinkLocation));

window.addEventListener('load', pageTransitions);
