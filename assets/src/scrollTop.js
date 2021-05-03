const scrollTop = () => {
	document.body.scrollTop = 0;
	document.documentElement.scrollTop = 0;
};

document.querySelector('.scrollTop').addEventListener('click', scrollTop);

const setDisplay = () => {
	const { innerHeight, scrollY } = window;

	document.querySelector('.scrollTop').style.display =
		scrollY * 2 > innerHeight ? 'block' : 'none';
};

window.addEventListener('DOMContentLoaded', setDisplay);

window.addEventListener('scroll', setDisplay);
