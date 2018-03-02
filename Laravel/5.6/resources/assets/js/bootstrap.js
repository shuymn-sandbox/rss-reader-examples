import _ from 'lodash';
import * as axios from "axios";

// set global variables
window._ = _;
window.axios = axios;

// configure
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// CSRF-TOKEN
const token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

