module.exports = {
  future: {
    removeDeprecatedGapUtilities: true,
    purgeLayersByDefault: true,
  },
  purge: [
    './app/**/*.php',
    './resources/**/*.php',
  ],
  theme: {
    extend: {
      spacing: {
        '44': '11rem',
      },
    },
    spinner: (theme) => ({
      default: {
        color: '#dae1e7',
        size: '1em',
        border: '2px',
        speed: '500ms',
      },
    }),
  },
  variants: {},
  plugins: [
    require('tailwindcss-spinner'),
  ],
}
