const swiper = new Swiper(".swiper", {
	// Optional parameters
	direction: "horizontal",
	loop: true,

	navigation: {
		nextEl: "swiper-button-disabled",
		prevEl: "swiper-button-disabled",
	},

	effect: "fade",
	fadeEffect: {
		crossFade: true,
	},

	autoplay: {
		delay: 5000,
	},
});

const myswiper = new Swiper(".swiper-brand", {
	slidesPerView: 2,
	spaceBetween: 20,
	loop: true,
	centeredSlide: true,
	pagination: {
		el: ".brand__pagination",
		clickable: true,
	},

	autoplay: {
		delay: 2500,
	},

	breakpoints: {
		0: {
			slidesPerView: 1,
		},
		320: {
			slidesPerView: 2,
		},
		520: {
			slidesPerView: 3,
		},
		767: {
			slidesPerView: 4,
		},
		992: {
			slidesPerView: 5,
		},
		1200: {
			slidesPerView: 5,
		},
	},
});
