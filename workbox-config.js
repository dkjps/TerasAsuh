module.exports = {
  globDirectory: './',
  globPatterns: [
    '**/*.{html,json,js,css,woff}'
  ],
  swDest: '/assets/sw.js',
  runtimeCaching: [{
    urlPattern: /\.(?:png|jpg|jpeg|svg)$/,
    handler: 'NetworkFirst',
    options: {
      cacheName: 'images',
      expiration: {
        maxEntries: 10,
      },
    },
  }],
};
