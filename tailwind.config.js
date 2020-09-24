module.exports = {
  future: {
    removeDeprecatedGapUtilities: true,
    purgeLayersByDefault: true,
  },
  purge: [],
  theme: {
    extend: {},
    spinner: (theme) => ({
      default: {
        color: '#dae1e7',
        size: '1em',
        border: '2px',
        speed: '500ms',
      }
    })
  },
  variants: {},
  plugins: [
    require('tailwindcss-spinner')
  ],
}
