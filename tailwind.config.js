/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}"],
  theme: {
    fontFamily: {
      mont: ["Montserrat"],
    },
    extend: {
      boxShadow: {
        "6xl": "0 20px 25px -5px rgba(0, 0, 0, 0.1)",
      },
    },
  },
  plugins: [],
};
