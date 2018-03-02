import * as axios from "axios";

// configure
axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

// CSRF-TOKEN
const token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
  axios.defaults.headers.common["X-CSRF-TOKEN"] = token.content;
} else {
  console.error("CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token");
}
