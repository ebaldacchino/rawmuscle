const el = (x) => document.querySelector(x);
const all = (x) => Array.from(document.querySelectorAll(x));
export const checkSlide = () => {
	all('.slide-in').map((item) => {
		const itemBottom = item.offsetTop + item.clientHeight;
		const midwayPoint = itemBottom - item.clientHeight * 0.75;
		const slideInAt = window.scrollY + window.innerHeight;
		const isHalfHidden = slideInAt < midwayPoint;
		return isHalfHidden
			? item.classList.remove('on-screen')
			: item.classList.add('on-screen');
	});
};

export const toggleNav = () => {
	el('aside').classList.toggle('open');
	el('#menu-icon').classList.toggle('change-menu-icon');
};

export const toLinkLocation = (e) => {
	const link = e.target.getAttribute('href'); 
	if (link && el(link)) { 
		window.scroll({
			top: el(link).offsetTop - el('.navbar').getBoundingClientRect().height,
			behavior: 'smooth',
		});
	} 
};

export const pageTransitions = () => {
	const pageLinks = [
		...all('aside .page-links a'),
		...all('footer nav a'),
	].map((link) => link.getAttribute('href'));

	const transitionEl = el('.page-transition');

	const anchors = all('a');

	anchors.forEach((anchor) => {
		anchor.addEventListener('click', (e) => {
			const { href } = e.target;
			if (href) {
				const thisUrl = window.location.href;

				const currentIndex = pageLinks.indexOf(thisUrl);
				const nextIndex = pageLinks.indexOf(href);

				e.preventDefault();

				const direction = currentIndex > nextIndex ? 'left' : 'right';

				transitionEl.classList.add('leaving', direction);

				setTimeout(() => {
					window.location.href = href;
				}, 100);
			}
		});
	});

	setTimeout(() => {
		transitionEl.classList.remove('arriving');
	}, 300);
};

export function debounce(func, wait, immediate) {
	var timeout;
	return function () {
		var context = this,
			args = arguments;
		clearTimeout(timeout);
		timeout = setTimeout(function () {
			timeout = null;
			if (!immediate) func.apply(context, args);
		}, wait);
		if (immediate && !timeout) func.apply(context, args);
	};
}
