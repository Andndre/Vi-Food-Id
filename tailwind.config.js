/** @type {import('tailwindcss').Config} */
module.exports = {
  // mode: 'jit',
  content: ["./**/*.php"],
  theme: {
    extend: {
      colors: {
        primary: "#FFB649"
      },
    },
  },
	variants: {
		opacity: ({ after }) => after(['disabled'])
	},
  plugins: [],
  important: true
};
