import daisyui from 'daisyui';

/** @type {import('tailwindcss').Config} */
export default {
  content: ['./resources/**/*.{js,css}', './resources/**/*.blade.php'],
  theme: {
    extend: {},
  },
  daisyui: {
    themes: [
      {
        guitardb: {
          primary: '#38bdf8',
          secondary: '#0284c7',
          accent: '#e879f9',
          neutral: '#111827',
          'base-100': '#132334',
          info: '#0067da',
          success: '#82b300',
          warning: '#ff9500',
          error: '#ff6e77',
        },
      },
    ],
  },
  plugins: [daisyui],
};
