/** @type {import('tailwindcss').Config} */
module.exports = {
  
  content: [
    './front-page.php',
    './index.php',
    "./**/*.{php, png}",
  ],
  theme: {
    extend: {
      fontSize: {
        'display-48': ['48px', { lineHeight: '60px', letterSpacing: '-1.2px' }],
        'display-42': ['42px', { lineHeight: '50px', letterSpacing: '-1.1px' }],
        'display-24': ['24px', { lineHeight: '32px', letterSpacing: '-0.24px' }],
        'display-22': ['22px', { lineHeight: '28px', letterSpacing: '-0.11px' }],
        'display-20': ['20px', { lineHeight: '26px', letterSpacing: '-0.1px' }],
        'display-18': ['18px', { lineHeight: '28px', letterSpacing: '0px' }],
        'display-16': ['16px', { lineHeight: '24px', letterSpacing: '0px' }],
        'display-14': ['14px', { lineHeight: '21px', letterSpacing: '0px' }],
      }
    }
  },
  plugins: [],
}

