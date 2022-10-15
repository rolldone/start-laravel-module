(self["webpackChunk"] = self["webpackChunk"] || []).push([["Resources_assets_js_login_Login_js"],{

/***/ "./Resources/assets/js/login/Login.js":
/*!********************************************!*\
  !*** ./Resources/assets/js/login/Login.js ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var ractive__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ractive */ "./node_modules/ractive/ractive.mjs");
/* harmony import */ var _LoginView_html__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./LoginView.html */ "./Resources/assets/js/login/LoginView.html");
/* harmony import */ var _LoginView_html__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_LoginView_html__WEBPACK_IMPORTED_MODULE_1__);


var LoginApp = ractive__WEBPACK_IMPORTED_MODULE_0__["default"].extend({
  template: (_LoginView_html__WEBPACK_IMPORTED_MODULE_1___default()),
  handleClick: function handleClick(action, props, e) {
    switch (action) {
      case 'SUBMIT':
        e.preventDefault();
        break;
    }
  }
});
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (LoginApp);

/***/ }),

/***/ "./Resources/assets/js/login/LoginView.html":
/*!**************************************************!*\
  !*** ./Resources/assets/js/login/LoginView.html ***!
  \**************************************************/
/***/ ((module) => {

// Module
var code = "<div class=\"page page-center\">\n  <div class=\"container-tight py-4\">\n    <div class=\"text-center mb-4\">\n      <a href=\".\" class=\"navbar-brand navbar-brand-autodark\"></a>\n    </div>\n    <form class=\"card card-md\" action=\".\" method=\"get\" autocomplete=\"off\" id=\"form-auth-login\">\n      <div class=\"card-body\">\n        <h2 class=\"card-title text-center mb-4\">Login to your account</h2>\n        <div class=\"mb-3\">\n          <label class=\"form-label\">Email address</label>\n          <input type=\"email\" class=\"form-control\" value=\"{{form_data.email}}\" placeholder=\"Enter email\">\n          <div class=\"invalid-feedback\">{{form_error.email}}</div>\n        </div>\n        <div class=\"mb-2\">\n          <label class=\"form-label\">\n            Password\n            <span class=\"form-label-description\">\n              <a href=\"./forgot-password\">I forgot password</a>\n            </span>\n          </label>\n          <div class=\"input-group input-group-flat\">\n            <input type=\"password\" class=\"form-control\" value=\"{{form_data.password}}\" placeholder=\"Password\"\n              autocomplete=\"off\">\n            <span class=\"input-group-text\">\n              <a href=\"#\" class=\"link-secondary\" title=\"\" data-bs-toggle=\"tooltip\"\n                data-bs-original-title=\"Show password\">\n                <!-- Download SVG icon from http://tabler-icons.io/i/eye -->\n                <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"\n                  stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\">\n                  <path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"></path>\n                  <circle cx=\"12\" cy=\"12\" r=\"2\"></circle>\n                  <path\n                    d=\"M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7\">\n                  </path>\n                </svg>\n              </a>\n            </span>\n            <div class=\"invalid-feedback\">{{form_error.password}}</div>\n          </div>\n        </div>\n        <div class=\"mb-2\">\n          <label class=\"form-check\">\n            <input type=\"checkbox\" class=\"form-check-input\">\n            <span class=\"form-check-label\">Remember me on this device</span>\n          </label>\n        </div>\n        <div class=\"form-footer\">\n          <button type=\"submit\" class=\"btn btn-primary w-100\" on-click=\"@this.handleClick('SUBMIT',{},@event)\">Sign\n            in</button>\n        </div>\n      </div>\n      <div class=\"hr-text\">or</div>\n      <div class=\"card-body\">\n        <div class=\"row\">\n          <div class=\"col\">\n            <a href=\"#\" class=\"btn btn-white w-100\">\n              <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->\n              <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon text-github\" width=\"24\" height=\"24\"\n                viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\"\n                stroke-linejoin=\"round\">\n                <path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"></path>\n                <path\n                  d=\"M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5\">\n                </path>\n              </svg>\n              Login with Github\n            </a>\n          </div>\n          <div class=\"col\"><a href=\"#\" class=\"btn btn-white w-100\">\n              <!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->\n              <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon text-twitter\" width=\"24\" height=\"24\"\n                viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\"\n                stroke-linejoin=\"round\">\n                <path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"></path>\n                <path\n                  d=\"M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z\">\n                </path>\n              </svg>\n              Login with Twitter\n            </a>\n          </div>\n        </div>\n      </div>\n    </form>\n    <div class=\"text-center text-muted mt-3\">\n      Don't have account yet? <a href=\"./register\" tabindex=\"-1\">Sign up</a>\n    </div>\n  </div>\n</div>";
// Exports
module.exports = code;

/***/ })

}]);