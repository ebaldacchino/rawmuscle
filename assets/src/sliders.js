const el = (x) => document.querySelector(x);
const all = (x) => Array.from(document.querySelectorAll(x));

const slider = el('.slider');

let index = 0;
let isDown = false;
let startX = 0;
let movement = 0;

const numberOfSlides = slider && slider.children.length;
const slide = slider && slider.children[0];
let slideWidth;
let slidesOffScreen;

const prevSlide = () => (index = index === 0 ? slidesOffScreen : index - 1);
const nextSlide = () => (index = index >= slidesOffScreen ? 0 : index + 1);

const pointerDown = (e) => {
	isDown = true;
	startX = e.pageX;
	movement = 0;
};
const pointerUp = () => {
	if (!isDown) return;
	isDown = false;
	movement > 10 ? scrollSliderLeft() : movement < -10 && scrollSliderRight();
};
const pointerMove = (e) => {
	if (!isDown) return;
	movement = e.pageX - startX;
};

const handleScrollLeft = () =>
	slider.scroll({
		left: index * slideWidth,
		behavior: 'smooth',
	});

const scrollSliderLeft = () => {
	prevSlide();
	handleScrollLeft();
};

const scrollSliderRight = () => {
	nextSlide();
	handleScrollLeft();
};

const handleResize = () => {
	slideWidth = slide.getBoundingClientRect().width;
	slidesOffScreen = numberOfSlides - Math.round(window.innerWidth / slideWidth);
	if (index > slidesOffScreen) index = slidesOffScreen;
	handleScrollLeft();
};

window.addEventListener('load', handleResize);
window.addEventListener('resize', handleResize);

slider.addEventListener('pointerdown', pointerDown);
slider.addEventListener('pointerup', pointerUp);
slider.addEventListener('pointermove', pointerMove);

el('.arrow-container.left').addEventListener('click', scrollSliderLeft);
el('.arrow-container.right').addEventListener('click', scrollSliderRight);
