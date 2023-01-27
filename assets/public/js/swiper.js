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
	loop: true,
	spaceBetween: 20,
	autoplay: {
		delay: 4500,
		disableOnInteraction: false,
	},
	pagination: {
		el: ".brand__pagination",
		clickable: true,
	},
	centeredSlides: true,
	breakpoints: {
		0: {
			slidesPerView: 1,
		},
		768: {
			slidesPerView: 3,
		},
		1020: {
			slidesPerView: 5,
		},
	},
});
