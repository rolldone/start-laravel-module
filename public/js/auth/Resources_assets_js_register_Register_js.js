(self["webpackChunk"] = self["webpackChunk"] || []).push([["Resources_assets_js_register_Register_js"],{

/***/ "./Resources/assets/js/register/Register.js":
/*!**************************************************!*\
  !*** ./Resources/assets/js/register/Register.js ***!
  \**************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var ractive__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ractive */ "./node_modules/ractive/ractive.mjs");
/* harmony import */ var _RegisterView_html__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./RegisterView.html */ "./Resources/assets/js/register/RegisterView.html");
/* harmony import */ var _RegisterView_html__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_RegisterView_html__WEBPACK_IMPORTED_MODULE_1__);


var LoginApp = ractive__WEBPACK_IMPORTED_MODULE_0__["default"].extend({
  template: (_RegisterView_html__WEBPACK_IMPORTED_MODULE_1___default())
});
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (LoginApp);

/***/ }),

/***/ "./Resources/assets/js/register/RegisterView.html":
/*!********************************************************!*\
  !*** ./Resources/assets/js/register/RegisterView.html ***!
  \********************************************************/
/***/ ((module) => {

// Module
var code = "<div class=\"page page-center\">\n  <div class=\"container-tight py-4\">\n    <div class=\"text-center mb-4\">\n      <a href=\".\" class=\"navbar-brand navbar-brand-autodark\"></a>\n    </div>\n    <form class=\"card card-md\" action=\".\" method=\"get\" id=\"main-auth-form\">\n      <div class=\"card-body\">\n        <h2 class=\"card-title text-center mb-4\">Create new account</h2>\n        <div class=\"mb-3\">\n          <label class=\"form-label\">First Name</label>\n          <input type=\"text\" class=\"form-control\" value=\"{{form_data.first_name}}\" name=\"first_name\"\n            placeholder=\"Enter first name\">\n          <div class=\"invalid-feedback\">{{form_error.first_name}}</div>\n        </div>\n        <div class=\"mb-3\">\n          <label class=\"form-label\">Last Name</label>\n          <input type=\"text\" class=\"form-control\" value=\"{{form_data.last_name}}\" name=\"last_name\"\n            placeholder=\"Enter last name\">\n          <div class=\"invalid-feedback\">{{form_error.last_name}}</div>\n        </div>\n        <div class=\"mb-3\">\n          <label class=\"form-label\">Email address</label>\n          <input type=\"email\" class=\"form-control\" value=\"{{form_data.email}}\" name=\"email\" placeholder=\"Enter email\">\n          <div class=\"invalid-feedback\">{{form_error.email}}</div>\n        </div>\n        <div class=\"mb-3\">\n          <label class=\"form-label\">Password</label>\n          <div class=\"input-group input-group-flat\">\n            <input type=\"password\" class=\"form-control\" placeholder=\"Password\" value=\"{{form_data.password}}\"\n              name=\"password\" autocomplete=\"off\">\n            <span class=\"input-group-text\">\n              <a href=\"#\" class=\"link-secondary\" title=\"\" data-bs-toggle=\"tooltip\"\n                data-bs-original-title=\"Show password\">\n                <!-- Download SVG icon from http://tabler-icons.io/i/eye -->\n                <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"\n                  stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\">\n                  <path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"></path>\n                  <circle cx=\"12\" cy=\"12\" r=\"2\"></circle>\n                  <path\n                    d=\"M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7\">\n                  </path>\n                </svg>\n              </a>\n            </span>\n            <div class=\"invalid-feedback\">{{form_error.password}}</div>\n          </div>\n        </div>\n        <div class=\"mb-3\">\n          <label class=\"form-check\">\n            <input type=\"checkbox\" name=\"term_policy\" on-change=\"@this.handleChange('TERM_POLICY',{},@event)\"\n              class=\"form-check-input\">\n            <span class=\"form-check-label\">Agree the <a href=\"./terms-of-service.html\" tabindex=\"-1\">terms and\n                policy</a>.</span>\n            <div class=\"invalid-feedback\">{{form_error.term_policy}}</div>\n          </label>\n        </div>\n        <div class=\"form-footer\">\n          <button type=\"submit\" class=\"btn btn-primary w-100\" on-click=\"@this.handleClick('SUBMIT',{},@event)\">Create\n            new account</button>\n        </div>\n      </div>\n    </form>\n    <div class=\"text-center text-muted mt-3\">\n      Already have account? <a href=\"./login\" tabindex=\"-1\">Sign in</a>\n    </div>\n  </div>\n</div>";
// Exports
module.exports = code;

/***/ })

}]);