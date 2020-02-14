try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');

    window.PNotify = require('pnotify');
    require('pnotify/src/pnotify.buttons');

} catch (e) {}
