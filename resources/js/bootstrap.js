import jQuery from 'jquery';
window.$ = jQuery;

import 'jquery-validation';
import 'jquery-validation/dist/additional-methods'
import axios from 'axios';
window.axios = axios;

// import toastr from 'toastr';
// window.toastr = toastr;

import 'bootstrap';
import 'bootstrap/js/dist/util'
import 'bootstrap/js/dist/modal'
/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */



window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
