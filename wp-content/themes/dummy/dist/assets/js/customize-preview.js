/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/assets/js/customize-preview.js":
/*!********************************************!*\
  !*** ./src/assets/js/customize-preview.js ***!
  \********************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _helpers_strip_tags__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./helpers/strip-tags */ "./src/assets/js/helpers/strip-tags.js");


wp.customize('blogname', function (value) {
  value.bind(function (to) {
    console.log(to);
    jquery__WEBPACK_IMPORTED_MODULE_0___default()('.c-header__blogname').html(to);
  });
});
wp.customize('_theme_name_display_author_info', function (value) {
  value.bind(function (to) {
    if (to) {
      jquery__WEBPACK_IMPORTED_MODULE_0___default()('.c-post-author').show();
    } else {
      jquery__WEBPACK_IMPORTED_MODULE_0___default()('.c-post-author').hide();
    }
  });
}); // transport preview for the color accent of WP Customize

wp.customize('_theme_name_accent_colour', function (value) {
  value.bind(function (to) {
    var inlineCSS = "";
    var inlineCSSObj = _theme_name['inline-css'];

    for (var selector in _theme_name['inline-css']) {
      inlineCSS += "".concat(selector, " {");

      for (var prop in inlineCSSObj[selector]) {
        var _value = inlineCSSObj[selector][prop];
        inlineCSS += "".concat(prop, ": ").concat(wp.customize(_value).get());
      }

      inlineCSS += "}";
    }

    jquery__WEBPACK_IMPORTED_MODULE_0___default()('#_theme_name-stylesheet-inline-css').html(inlineCSS);
  });
});
wp.customize('_theme_name_site_info', function (value) {
  value.bind(function (to) {
    console.log(to);
    jquery__WEBPACK_IMPORTED_MODULE_0___default()('.c-site-info__text').html(Object(_helpers_strip_tags__WEBPACK_IMPORTED_MODULE_1__["default"])(to, '<a>'));
  });
});

/***/ }),

/***/ "./src/assets/js/helpers/strip-tags.js":
/*!*********************************************!*\
  !*** ./src/assets/js/helpers/strip-tags.js ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var stripTags = function stripTags(str, allow) {
  // making sure the allow arg is a string containing only tags in lowercase (<a><b><c>)
  allow = (((allow || '') + '').toLowerCase().match(/<[a-z][a-z0-9]*>/g) || []).join('');
  var tags = /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi;
  var commentsAndPhpTags = /<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi;
  return str.replace(commentsAndPhpTags, '').replace(tags, function ($0, $1) {
    return allow.indexOf('<' + $1.toLowerCase() + '>') > -1 ? $0 : '';
  });
};

/* harmony default export */ __webpack_exports__["default"] = (stripTags);

/***/ }),

/***/ 2:
/*!**************************************************!*\
  !*** multi ./src/assets/js/customize-preview.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\Khoi\Local Sites\dummy-theme\app\public\wp-content\themes\dummy\src\assets\js\customize-preview.js */"./src/assets/js/customize-preview.js");


/***/ }),

/***/ "jquery":
/*!*************************!*\
  !*** external "jQuery" ***!
  \*************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = jQuery;

/***/ })

/******/ });
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vd2VicGFjay9ib290c3RyYXAiLCJ3ZWJwYWNrOi8vLy4vc3JjL2Fzc2V0cy9qcy9jdXN0b21pemUtcHJldmlldy5qcyIsIndlYnBhY2s6Ly8vLi9zcmMvYXNzZXRzL2pzL2hlbHBlcnMvc3RyaXAtdGFncy5qcyIsIndlYnBhY2s6Ly8vZXh0ZXJuYWwgXCJqUXVlcnlcIiJdLCJuYW1lcyI6WyJ3cCIsImN1c3RvbWl6ZSIsInZhbHVlIiwiYmluZCIsInRvIiwiY29uc29sZSIsImxvZyIsIiQiLCJodG1sIiwic2hvdyIsImhpZGUiLCJpbmxpbmVDU1MiLCJpbmxpbmVDU1NPYmoiLCJfdGhlbWVfbmFtZSIsInNlbGVjdG9yIiwicHJvcCIsImdldCIsInN0cmlwVGFncyIsInN0ciIsImFsbG93IiwidG9Mb3dlckNhc2UiLCJtYXRjaCIsImpvaW4iLCJ0YWdzIiwiY29tbWVudHNBbmRQaHBUYWdzIiwicmVwbGFjZSIsIiQwIiwiJDEiLCJpbmRleE9mIl0sIm1hcHBpbmdzIjoiO1FBQUE7UUFDQTs7UUFFQTtRQUNBOztRQUVBO1FBQ0E7UUFDQTtRQUNBO1FBQ0E7UUFDQTtRQUNBO1FBQ0E7UUFDQTtRQUNBOztRQUVBO1FBQ0E7O1FBRUE7UUFDQTs7UUFFQTtRQUNBO1FBQ0E7OztRQUdBO1FBQ0E7O1FBRUE7UUFDQTs7UUFFQTtRQUNBO1FBQ0E7UUFDQSwwQ0FBMEMsZ0NBQWdDO1FBQzFFO1FBQ0E7O1FBRUE7UUFDQTtRQUNBO1FBQ0Esd0RBQXdELGtCQUFrQjtRQUMxRTtRQUNBLGlEQUFpRCxjQUFjO1FBQy9EOztRQUVBO1FBQ0E7UUFDQTtRQUNBO1FBQ0E7UUFDQTtRQUNBO1FBQ0E7UUFDQTtRQUNBO1FBQ0E7UUFDQSx5Q0FBeUMsaUNBQWlDO1FBQzFFLGdIQUFnSCxtQkFBbUIsRUFBRTtRQUNySTtRQUNBOztRQUVBO1FBQ0E7UUFDQTtRQUNBLDJCQUEyQiwwQkFBMEIsRUFBRTtRQUN2RCxpQ0FBaUMsZUFBZTtRQUNoRDtRQUNBO1FBQ0E7O1FB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QyxDQUFDLENBQS9DLEdBQW1ETSxFQUFuRCxHQUF3RCxFQUEvRDtBQUNELEdBRk0sQ0FBUDtBQUdELENBVEQ7O0FBV2VULHdFQUFmLEU7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7O0FDWEEsd0IiLCJmaWxlIjoiY3VzdG9taXplLXByZXZpZXcuanMiLCJzb3VyY2VzQ29udGVudCI6WyIgXHQvLyBUaGUgbW9kdWxlIGNhY2hlXG4gXHR2YXIgaW5zdGFsbGVkTW9kdWxlcyA9IHt9O1xuXG4gXHQvLyBUaGUgcmVxdWlyZSBmdW5jdGlvblxuIFx0ZnVuY3Rpb24gX193ZWJwYWNrX3JlcXVpcmVfXyhtb2R1bGVJZCkge1xuXG4gXHRcdC8vIENoZWNrIGlmIG1vZHVsZSBpcyBpbiBjYWNoZVxuIFx0XHRpZihpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSkge1xuIFx0XHRcdHJldHVybiBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXS5leHBvcnRzO1xuIFx0XHR9XG4gXHRcdC8vIENyZWF0ZSBhIG5ldyBtb2R1bGUgKGFuZCBwdXQgaXQgaW50byB0aGUgY2FjaGUpXG4gXHRcdHZhciBtb2R1bGUgPSBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSA9IHtcbiBcdFx0XHRpOiBtb2R1bGVJZCxcbiBcdFx0XHRsOiBmYWxzZSxcbiBcdFx0XHRleHBvcnRzOiB7fVxuIFx0XHR9O1xuXG4gXHRcdC8vIEV4ZWN1dGUgdGhlIG1vZHVsZSBmdW5jdGlvblxuIFx0XHRtb2R1bGVzW21vZHVsZUlkXS5jYWxsKG1vZHVsZS5leHBvcnRzLCBtb2R1bGUsIG1vZHVsZS5leHBvcnRzLCBfX3dlYnBhY2tfcmVxdWlyZV9fKTtcblxuIFx0XHQvLyBGbGFnIHRoZSBtb2R1bGUgYXMgbG9hZGVkXG4gXHRcdG1vZHVsZS5sID0gdHJ1ZTtcblxuIFx0XHQvLyBSZXR1cm4gdGhlIGV4cG9ydHMgb2YgdGhlIG1vZHVsZVxuIFx0XHRyZXR1cm4gbW9kdWxlLmV4cG9ydHM7XG4gXHR9XG5cblxuIFx0Ly8gZXhwb3NlIHRoZSBtb2R1bGVzIG9iamVjdCAoX193ZWJwYWNrX21vZHVsZXNfXylcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubSA9IG1vZHVsZXM7XG5cbiBcdC8vIGV4cG9zZSB0aGUgbW9kdWxlIGNhY2hlXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLmMgPSBpbnN0YWxsZWRNb2R1bGVzO1xuXG4gXHQvLyBkZWZpbmUgZ2V0dGVyIGZ1bmN0aW9uIGZvciBoYXJtb255IGV4cG9ydHNcbiBcdF9fd2VicGFja19yZXF1aXJlX18uZCA9IGZ1bmN0aW9uKGV4cG9ydHMsIG5hbWUsIGdldHRlcikge1xuIFx0XHRpZighX193ZWJwYWNrX3JlcXVpcmVfXy5vKGV4cG9ydHMsIG5hbWUpKSB7XG4gXHRcdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIG5hbWUsIHsgZW51bWVyYWJsZTogdHJ1ZSwgZ2V0OiBnZXR0ZXIgfSk7XG4gXHRcdH1cbiBcdH07XG5cbiBcdC8vIGRlZmluZSBfX2VzTW9kdWxlIG9uIGV4cG9ydHNcbiBcdF9fd2VicGFja19yZXF1aXJlX18uciA9IGZ1bmN0aW9uKGV4cG9ydHMpIHtcbiBcdFx0aWYodHlwZW9mIFN5bWJvbCAhPT0gJ3VuZGVmaW5lZCcgJiYgU3ltYm9sLnRvU3RyaW5nVGFnKSB7XG4gXHRcdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIFN5bWJvbC50b1N0cmluZ1RhZywgeyB2YWx1ZTogJ01vZHVsZScgfSk7XG4gXHRcdH1cbiBcdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsICdfX2VzTW9kdWxlJywgeyB2YWx1ZTogdHJ1ZSB9KTtcbiBcdH07XG5cbiBcdC8vIGNyZWF0ZSBhIGZha2UgbmFtZXNwYWNlIG9iamVjdFxuIFx0Ly8gbW9kZSAmIDE6IHZhbHVlIGlzIGEgbW9kdWxlIGlkLCByZXF1aXJlIGl0XG4gXHQvLyBtb2RlICYgMjogbWVyZ2UgYWxsIHByb3BlcnRpZXMgb2YgdmFsdWUgaW50byB0aGUgbnNcbiBcdC8vIG1vZGUgJiA0OiByZXR1cm4gdmFsdWUgd2hlbiBhbHJlYWR5IG5zIG9iamVjdFxuIFx0Ly8gbW9kZSAmIDh8MTogYmVoYXZlIGxpa2UgcmVxdWlyZVxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy50ID0gZnVuY3Rpb24odmFsdWUsIG1vZGUpIHtcbiBcdFx0aWYobW9kZSAmIDEpIHZhbHVlID0gX193ZWJwYWNrX3JlcXVpcmVfXyh2YWx1ZSk7XG4gXHRcdGlmKG1vZGUgJiA4KSByZXR1cm4gdmFsdWU7XG4gXHRcdGlmKChtb2RlICYgNCkgJiYgdHlwZW9mIHZhbHVlID09PSAnb2JqZWN0JyAmJiB2YWx1ZSAmJiB2YWx1ZS5fX2VzTW9kdWxlKSByZXR1cm4gdmFsdWU7XG4gXHRcdHZhciBucyA9IE9iamVjdC5jcmVhdGUobnVsbCk7XG4gXHRcdF9fd2VicGFja19yZXF1aXJlX18ucihucyk7XG4gXHRcdE9iamVjdC5kZWZpbmVQcm9wZXJ0eShucywgJ2RlZmF1bHQnLCB7IGVudW1lcmFibGU6IHRydWUsIHZhbHVlOiB2YWx1ZSB9KTtcbiBcdFx0aWYobW9kZSAmIDIgJiYgdHlwZW9mIHZhbHVlICE9ICdzdHJpbmcnKSBmb3IodmFyIGtleSBpbiB2YWx1ZSkgX193ZWJwYWNrX3JlcXVpcmVfXy5kKG5zLCBrZXksIGZ1bmN0aW9uKGtleSkgeyByZXR1cm4gdmFsdWVba2V5XTsgfS5iaW5kKG51bGwsIGtleSkpO1xuIFx0XHRyZXR1cm4gbnM7XG4gXHR9O1xuXG4gXHQvLyBnZXREZWZhdWx0RXhwb3J0IGZ1bmN0aW9uIGZvciBjb21wYXRpYmlsaXR5IHdpdGggbm9uLWhhcm1vbnkgbW9kdWxlc1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5uID0gZnVuY3Rpb24obW9kdWxlKSB7XG4gXHRcdHZhciBnZXR0ZXIgPSBtb2R1bGUgJiYgbW9kdWxlLl9fZXNNb2R1bGUgP1xuIFx0XHRcdGZ1bmN0aW9uIGdldERlZmF1bHQoKSB7IHJldHVybiBtb2R1bGVbJ2RlZmF1bHQnXTsgfSA6XG4gXHRcdFx0ZnVuY3Rpb24gZ2V0TW9kdWxlRXhwb3J0cygpIHsgcmV0dXJuIG1vZHVsZTsgfTtcbiBcdFx0X193ZWJwYWNrX3JlcXVpcmVfXy5kKGdldHRlciwgJ2EnLCBnZXR0ZXIpO1xuIFx0XHRyZXR1cm4gZ2V0dGVyO1xuIFx0fTtcblxuIFx0Ly8gT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLm8gPSBmdW5jdGlvbihvYmplY3QsIHByb3BlcnR5KSB7IHJldHVybiBPYmplY3QucHJvdG90eXBlLmhhc093blByb3BlcnR5LmNhbGwob2JqZWN0LCBwcm9wZXJ0eSk7IH07XG5cbiBcdC8vIF9fd2VicGFja19wdWJsaWNfcGF0aF9fXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLnAgPSBcIlwiO1xuXG5cbiBcdC8vIExvYWQgZW50cnkgbW9kdWxlIGFuZCByZXR1cm4gZXhwb3J0c1xuIFx0cmV0dXJuIF9fd2VicGFja19yZXF1aXJlX18oX193ZWJwYWNrX3JlcXVpcmVfXy5zID0gMik7XG4iLCJpbXBvcnQgJCBmcm9tICdqcXVlcnknO1xyXG5pbXBvcnQgc3RyaXBUYWdzIGZyb20gJy4vaGVscGVycy9zdHJpcC10YWdzJztcclxuXHJcbndwLmN1c3RvbWl6ZSgnYmxvZ25hbWUnLCAodmFsdWUpID0+IHtcclxuICB2YWx1ZS5iaW5kKCh0bykgPT4ge1xyXG4gICAgY29uc29sZS5sb2codG8pO1xyXG4gICAgJCgnLmMtaGVhZGVyX19ibG9nbmFtZScpLmh0bWwodG8pO1xyXG4gIH0pO1xyXG59KTtcclxuXHJcbndwLmN1c3RvbWl6ZSgnX3RoZW1lX25hbWVfZGlzcGxheV9hdXRob3JfaW5mbycsICh2YWx1ZSkgPT4ge1xyXG4gIHZhbHVlLmJpbmQoKHRvKSA9PiB7XHJcbiAgICBpZiAodG8pIHtcclxuICAgICAgJCgnLmMtcG9zdC1hdXRob3InKS5zaG93KCk7XHJcbiAgICB9IGVsc2Uge1xyXG4gICAgICAkKCcuYy1wb3N0LWF1dGhvcicpLmhpZGUoKTtcclxuICAgIH1cclxuICB9KTtcclxufSk7XHJcblxyXG4vLyB0cmFuc3BvcnQgcHJldmlldyBmb3IgdGhlIGNvbG9yIGFjY2VudCBvZiBXUCBDdXN0b21pemVcclxud3AuY3VzdG9taXplKCdfdGhlbWVfbmFtZV9hY2NlbnRfY29sb3VyJywgKHZhbHVlKSA9PiB7XHJcbiAgdmFsdWUuYmluZCgodG8pID0+IHtcclxuICAgIGxldCBpbmxpbmVDU1MgPSBgYDtcclxuICAgIGxldCBpbmxpbmVDU1NPYmogPSBfdGhlbWVfbmFtZVsnaW5saW5lLWNzcyddO1xyXG4gICAgZm9yIChsZXQgc2VsZWN0b3IgaW4gX3RoZW1lX25hbWVbJ2lubGluZS1jc3MnXSkge1xyXG4gICAgICBpbmxpbmVDU1MgKz0gYCR7c2VsZWN0b3J9IHtgO1xyXG4gICAgICBmb3IgKGxldCBwcm9wIGluIGlubGluZUNTU09ialtzZWxlY3Rvcl0pIHtcclxuICAgICAgICBsZXQgdmFsdWUgPSBpbmxpbmVDU1NPYmpbc2VsZWN0b3JdW3Byb3BdO1xyXG4gICAgICAgIGlubGluZUNTUyArPSBgJHtwcm9wfTogJHt3cC5jdXN0b21pemUodmFsdWUpLmdldCgpfWA7XHJcbiAgICAgIH1cclxuICAgICAgaW5saW5lQ1NTICs9IGB9YDtcclxuICAgIH1cclxuICAgICQoJyNfdGhlbWVfbmFtZS1zdHlsZXNoZWV0LWlubGluZS1jc3MnKS5odG1sKGlubGluZUNTUyk7XHJcbiAgfSk7XHJcbn0pO1xyXG5cclxud3AuY3VzdG9taXplKCdfdGhlbWVfbmFtZV9zaXRlX2luZm8nLCAodmFsdWUpID0+IHtcclxuICB2YWx1ZS5iaW5kKCh0bykgPT4ge1xyXG4gICAgY29uc29sZS5sb2codG8pO1xyXG4gICAgJCgnLmMtc2l0ZS1pbmZvX190ZXh0JykuaHRtbChzdHJpcFRhZ3ModG8sICc8YT4nKSk7XHJcbiAgfSk7XHJcbn0pO1xyXG4iLCJjb25zdCBzdHJpcFRhZ3MgPSAoc3RyLCBhbGxvdykgPT4ge1xyXG4gIC8vIG1ha2luZyBzdXJlIHRoZSBhbGxvdyBhcmcgaXMgYSBzdHJpbmcgY29udGFpbmluZyBvbmx5IHRhZ3MgaW4gbG93ZXJjYXNlICg8YT48Yj48Yz4pXHJcbiAgYWxsb3cgPSAoKChhbGxvdyB8fCAnJykgKyAnJykudG9Mb3dlckNhc2UoKS5tYXRjaCgvPFthLXpdW2EtejAtOV0qPi9nKSB8fCBbXSkuam9pbignJyk7XHJcblxyXG4gIHZhciB0YWdzID0gLzxcXC8/KFthLXpdW2EtejAtOV0qKVxcYltePl0qPi9naTtcclxuICB2YXIgY29tbWVudHNBbmRQaHBUYWdzID0gLzwhLS1bXFxzXFxTXSo/LS0+fDxcXD8oPzpwaHApP1tcXHNcXFNdKj9cXD8+L2dpO1xyXG4gIHJldHVybiBzdHIucmVwbGFjZShjb21tZW50c0FuZFBocFRhZ3MsICcnKS5yZXBsYWNlKHRhZ3MsIGZ1bmN0aW9uICgkMCwgJDEpIHtcclxuICAgIHJldHVybiBhbGxvdy5pbmRleE9mKCc8JyArICQxLnRvTG93ZXJDYXNlKCkgKyAnPicpID4gLTEgPyAkMCA6ICcnO1xyXG4gIH0pO1xyXG59O1xyXG5cclxuZXhwb3J0IGRlZmF1bHQgc3RyaXBUYWdzO1xyXG4iLCJtb2R1bGUuZXhwb3J0cyA9IGpRdWVyeTsiXSwic291cmNlUm9vdCI6IiJ9