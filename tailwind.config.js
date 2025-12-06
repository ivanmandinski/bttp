/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./app/Livewire/**/*.php",
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          50: '#f0f5fa',
          100: '#dae6f2',
          200: '#b8cfe6',
          300: '#8ab1d5',
          400: '#5a8fc0',
          500: '#3d73a8',
          600: '#1E3A5F', // Main primary color
          700: '#1a3252',
          800: '#162a45',
          900: '#12223a',
        },
        accent: {
          50: '#fdf9ed',
          100: '#f9efd0',
          200: '#f2dc9e',
          300: '#eac463',
          400: '#D4A537', // Main accent color
          500: '#c18f24',
          600: '#a5711c',
          700: '#84541a',
          800: '#6d441c',
          900: '#5c391c',
        },
        success: {
          50: '#f0fdf4',
          100: '#dcfce7',
          500: '#22c55e',
          600: '#2C5F2D', // Secondary color
          700: '#15803d',
        },
      },
      fontFamily: {
        'heading': ['Playfair Display', 'Georgia', 'serif'],
        'body': ['Open Sans', 'system-ui', 'sans-serif'],
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
