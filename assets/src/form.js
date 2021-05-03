let isSubmitting = false;

const el = (x) => document.querySelector(x);

const setErrorFor = (input, message, errors) => {
	input.className = 'error';
	const small =
		input.previousSibling.tagName === 'SMALL'
			? input.previousSibling
			: document.createElement('small');
	small.innerText = message;
	input.before(small);
	errors[input.name] = message;
};

const setSuccessFor = (input) => {
	input.className = 'success';
	input.previousSibling.tagName === 'SMALL' && input.previousSibling.remove();
};

const validate = ({ name, email, phone, message }) => {
	let errors = {};
	if (!name.trim()) {
		setErrorFor(el('#name'), 'Name required', errors);
	} else if (
		!/^[a-z\u00C0-\u00ff]+(([',. -][a-z\u00C0-\u00ff ])?[a-z\u00C0-\u00ff]*)*$/i.test(
			name.trim()
		)
	) {
		setErrorFor(el('#name'), 'Valid name required', errors);
	} else {
		setSuccessFor(el('#name'));
	}

	if (!email.trim()) {
		setErrorFor(el('#email'), 'Email required', errors);
	} else if (
		!/^((".{0,62}")|([^. ]{1,64}))(\.((".+")|([^. ]+))){0,32}@[^. ]+(\.[^. ]{1,253}){0,127}$/i.test(
			email
		)
	) {
		setErrorFor(el('#email'), 'Email invalid', errors);
	} else {
		setSuccessFor(el('#email'));
	}

	phone = phone.replace(/\D/g, '');
	if (!phone) {
		setErrorFor(el('#phone'), 'Phone required', errors);
	} else if (
		!/^((((6[14]0?)|0)[0-9])?(\d{8})|((640?|0))(\d{6,8}))$/.test(phone)
	) {
		setErrorFor(el('#phone'), 'Phone invalid', errors);
	} else {
		setSuccessFor(el('#phone'));
	}

	if (!message.trim()) {
		setErrorFor(el('#message'), 'Message required', errors);
	} else if (message.trim().length < 3) {
		setErrorFor(el('#message'), 'Valid message required', errors);
	} else {
		setSuccessFor(el('#message'));
	}
	return errors;
};

const validateTimeDate = ({ date, time }) => {
	let errors = {};

	if (!date.trim()) {
		setErrorFor(el('#date'), 'Date required', errors);
	} else if (new Date(date) <= new Date()) {
		setErrorFor(el('#date'), 'Invalid date', errors);
	} else {
		setSuccessFor(el('#date'));
	}

	if (!time.trim()) {
		setErrorFor(el('#time'), 'Time required', errors);
	} else {
		setSuccessFor(el('#time'));
	}

	return errors;
};

const formFields = Array.from(el('form').children).filter(
	(e) => e.type && e.type !== 'submit'
);

const formValues = () =>
	formFields.reduce((obj, { name, value }) => {
		obj[name] = value;
		return obj;
	}, {});

//		for testing: 'https://formspree.io/f/mdopyaob',
//		for production: 'https://formspree.io/f/mleovakl'
const sendForm = async (values, fields) => {
	const axios = require('axios');

	const response = await axios({
		url: 'https://formspree.io/f/mleovakl',
		method: 'post',
		headers: {
			Accept: 'application/json',
		},
		data: values,
	});
	if (response.status === 200) {
		toggleSubmittedForm();
		fields.map((input) => {
			input.value = '';
			input.className = '';
		});
	}
};

el('form').addEventListener('submit', (e) => {
	e.preventDefault();

	const values = formValues();

	let errors = validate(values);

	if (Object.keys(values).find((key) => key === 'date')) {
		const dateErrors = validateTimeDate(values);

		errors = {
			...errors,
			...dateErrors,
		};
	}

	if (!isSubmitting) {
		isSubmitting = true;
		formFields.map((field) =>
			field.addEventListener('change', () => validate(formValues()))
		);
	}
	if (Object.keys(errors).length > 0) {
		return false;
	} else {
		sendForm(values, formFields);
	}
});

const toggleSubmittedForm = () =>
	el('.form-submitted-bg').classList.toggle('show');

el('.submit-btn').addEventListener('click', toggleSubmittedForm);
