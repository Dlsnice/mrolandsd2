/** @type {import('tailwindcss').Config} */

module.exports = {
	content: [
		'./*.php',
		'./assets/**/*.php',
		'./inc/**/*.php',
		'./templates/**/*.php',
		'./styles_scripts/src/css/*.css',
		'./styles_scripts/src/css/**/*.css',
		'./styles_scripts/src/js/*.js'],
	safelist: [
		'bg-[#36499B]',
		'bg-[#8DCF6A]',
		'bg-[#EEEEEE]',
		'bg-[#333333]',
		'bg-[#000000]',
		'bg-[#FFFFFF]',
	],
	theme: {
		extend: {
			colors: {
				primary: '#36499B',
				secondary: '#8DCF6A',
				lightgrey: '#EEEEEE',
				darkgrey: '#333333',
				black: '#000000',
				white: '#FFFFFF',
			},
			screens: {
				'sm': '410px',
				'md': '768px',
				'lg': '1025px',
				'xl': '1281px',
				'2xl': '1441px',
				'3xl': '1650px',
			},
			fontFamily: {
				heading: ['Fieldwork'],
				body: ['Century Gothic'],
			},
		},
	},
	plugins: [require('tailwindcss-debug-screens')],
};

