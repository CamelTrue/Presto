require('./bootstrap');
require('bootstrap');
require('aos/dist/aos');

document.Dropzone = require('dropzone');
window.$=window.jQuery=require('jquery');
Dropzone.autoDiscover = false;
require('./announceImages');

require('./home/script');
require('./crea_annuncio/script');
require('./annunci/script');
require('./register/script');
require('./login/script');
require('./announces/script');