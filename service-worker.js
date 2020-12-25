var CACHE_NAME = 'my-site-cache-v1';
var urlsToCache = [
  './assets/modules/jqvmap/dist/jqvmap.min.css',
  './assets/modules/summernote/summernote-bs4.css',
  './assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css',
  './assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css',
  './assets/modules/datatables/datatables.min.css',
  './assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css',
  './assets/modules/select2/dist/css/select2.min.css',
  './assets/modules/jquery-selectric/selectric.css',
  './assets/css/style.css',
  './assets/css/components.css',
  './assets/modules/popper.js',
  './assets/modules/tooltip.js',
  './assets/modules/bootstrap/js/bootstrap.min.js',
  './assets/modules/nicescroll/jquery.nicescroll.min.js',
  './assets/modules/moment.min.js',
  './assets/js/stisla.js',
  './assets/modules/monthpicker/MonthPicker.min.js',
  './assets/modules/jquery.sparkline.min.js',
  './assets/modules/chart.min.js',
  './assets/modules/owlcarousel2/dist/owl.carousel.min.js',
  './assets/modules/summernote/summernote-bs4.js',
  './assets/modules/chocolat/dist/js/jquery.chocolat.min.js',
  './assets/modules/datatables/datatables.min.js',
  './assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js',
  './assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js',
  './assets/modules/jquery-ui/jquery-ui.min.js',
  './assets/modules/sweetalert/sweetalert.min.js',
  './assets/modules/jquery-selectric/jquery.selectric.min.js',
  './assets/js/admin/dashboard.js',
  './assets/js/scripts.js',
  './assets/js/admin-custom.js'
  // '/contact.html'
];
self.addEventListener('install', function(event) {
  // Perform install steps
  event.waitUntil(
    caches.open(CACHE_NAME)
    .then(function(cache) {
      console.log('Opened cache');
      return cache.addAll(urlsToCache);
    })
  );
});
