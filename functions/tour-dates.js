import { checkSlide } from './functions';

const el = (x) => document.querySelector(x);
const all = (x) => Array.from(document.querySelectorAll(x));

all('.tab > button').map((button) => {
	button.addEventListener('click', () => {
		all('.tab > button').map((btn) => btn.classList.remove('active'));
		button.classList.add('active');

		all('.events-container').map((container) => {
			container.style.display =
				button.textContent == container.getAttribute('data-state')
					? 'initial'
					: 'none';
		});
		checkSlide();
	});
});
