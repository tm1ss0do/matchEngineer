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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("throw new Error(\"Module build failed (from ./node_modules/babel-loader/lib/index.js):\\nSyntaxError: /Applications/MAMP/htdocs/docker-laravel-lamp/my-site/resources/js/app.js: Unexpected token (31:0)\\n\\n\\u001b[0m \\u001b[90m 29 | \\u001b[39m\\u001b[33mVue\\u001b[39m\\u001b[33m.\\u001b[39mcomponent(\\u001b[32m'project-item'\\u001b[39m\\u001b[33m,\\u001b[39m require(\\u001b[32m'./components/ProjectItem.vue'\\u001b[39m)\\u001b[33m.\\u001b[39m\\u001b[36mdefault\\u001b[39m)\\u001b[33m;\\u001b[39m\\u001b[0m\\n\\u001b[0m \\u001b[90m 30 | \\u001b[39m\\u001b[0m\\n\\u001b[0m\\u001b[31m\\u001b[1m>\\u001b[22m\\u001b[39m\\u001b[90m 31 | \\u001b[39m\\u001b[33m<<\\u001b[39m\\u001b[33m<<\\u001b[39m\\u001b[33m<<\\u001b[39m\\u001b[33m<\\u001b[39m \\u001b[33mHEAD\\u001b[39m\\u001b[0m\\n\\u001b[0m \\u001b[90m    | \\u001b[39m\\u001b[31m\\u001b[1m^\\u001b[22m\\u001b[39m\\u001b[0m\\n\\u001b[0m \\u001b[90m 32 | \\u001b[39m\\u001b[0m\\n\\u001b[0m \\u001b[90m 33 | \\u001b[39m\\u001b[33mVue\\u001b[39m\\u001b[33m.\\u001b[39mcomponent(\\u001b[32m'pagination-component'\\u001b[39m\\u001b[33m,\\u001b[39m require(\\u001b[32m'./components/PaginationComponent.vue'\\u001b[39m)\\u001b[33m.\\u001b[39m\\u001b[36mdefault\\u001b[39m)\\u001b[33m;\\u001b[39m\\u001b[0m\\n\\u001b[0m \\u001b[90m 34 | \\u001b[39m\\u001b[33mVue\\u001b[39m\\u001b[33m.\\u001b[39mcomponent(\\u001b[32m'pagetop-component'\\u001b[39m\\u001b[33m,\\u001b[39m require(\\u001b[32m'./components/PagetopComponent.vue'\\u001b[39m)\\u001b[33m.\\u001b[39m\\u001b[36mdefault\\u001b[39m)\\u001b[33m;\\u001b[39m\\u001b[0m\\n    at Parser._raise (/Applications/MAMP/htdocs/docker-laravel-lamp/my-site/node_modules/@babel/parser/lib/index.js:766:17)\\n    at Parser.raiseWithData (/Applications/MAMP/htdocs/docker-laravel-lamp/my-site/node_modules/@babel/parser/lib/index.js:759:17)\\n    at Parser.raise (/Applications/MAMP/htdocs/docker-laravel-lamp/my-site/node_modules/@babel/parser/lib/index.js:753:17)\\n    at Parser.unexpected (/Applications/MAMP/htdocs/docker-laravel-lamp/my-site/node_modules/@babel/parser/lib/index.js:8966:16)\\n    at Parser.parseExprAtom (/Applications/MAMP/htdocs/docker-laravel-lamp/my-site/node_modules/@babel/parser/lib/index.js:10282:20)\\n    at Parser.parseExprSubscripts (/Applications/MAMP/htdocs/docker-laravel-lamp/my-site/node_modules/@babel/parser/lib/index.js:9844:23)\\n    at Parser.parseUpdate (/Applications/MAMP/htdocs/docker-laravel-lamp/my-site/node_modules/@babel/parser/lib/index.js:9824:21)\\n    at Parser.parseMaybeUnary (/Applications/MAMP/htdocs/docker-laravel-lamp/my-site/node_modules/@babel/parser/lib/index.js:9813:17)\\n    at Parser.parseExprOps (/Applications/MAMP/htdocs/docker-laravel-lamp/my-site/node_modules/@babel/parser/lib/index.js:9683:23)\\n    at Parser.parseMaybeConditional (/Applications/MAMP/htdocs/docker-laravel-lamp/my-site/node_modules/@babel/parser/lib/index.js:9657:23)\\n    at Parser.parseMaybeAssign (/Applications/MAMP/htdocs/docker-laravel-lamp/my-site/node_modules/@babel/parser/lib/index.js:9620:21)\\n    at Parser.parseExpressionBase (/Applications/MAMP/htdocs/docker-laravel-lamp/my-site/node_modules/@babel/parser/lib/index.js:9564:23)\\n    at allowInAnd (/Applications/MAMP/htdocs/docker-laravel-lamp/my-site/node_modules/@babel/parser/lib/index.js:9558:39)\\n    at Parser.allowInAnd (/Applications/MAMP/htdocs/docker-laravel-lamp/my-site/node_modules/@babel/parser/lib/index.js:11296:16)\\n    at Parser.parseExpression (/Applications/MAMP/htdocs/docker-laravel-lamp/my-site/node_modules/@babel/parser/lib/index.js:9558:17)\\n    at Parser.parseStatementContent (/Applications/MAMP/htdocs/docker-laravel-lamp/my-site/node_modules/@babel/parser/lib/index.js:11561:23)\\n    at Parser.parseStatement (/Applications/MAMP/htdocs/docker-laravel-lamp/my-site/node_modules/@babel/parser/lib/index.js:11430:17)\\n    at Parser.parseBlockOrModuleBlockBody (/Applications/MAMP/htdocs/docker-laravel-lamp/my-site/node_modules/@babel/parser/lib/index.js:12012:25)\\n    at Parser.parseBlockBody (/Applications/MAMP/htdocs/docker-laravel-lamp/my-site/node_modules/@babel/parser/lib/index.js:11998:10)\\n    at Parser.parseTopLevel (/Applications/MAMP/htdocs/docker-laravel-lamp/my-site/node_modules/@babel/parser/lib/index.js:11361:10)\\n    at Parser.parse (/Applications/MAMP/htdocs/docker-laravel-lamp/my-site/node_modules/@babel/parser/lib/index.js:13044:10)\\n    at parse (/Applications/MAMP/htdocs/docker-laravel-lamp/my-site/node_modules/@babel/parser/lib/index.js:13097:38)\\n    at parser (/Applications/MAMP/htdocs/docker-laravel-lamp/my-site/node_modules/@babel/core/lib/parser/index.js:54:34)\\n    at parser.next (<anonymous>)\\n    at normalizeFile (/Applications/MAMP/htdocs/docker-laravel-lamp/my-site/node_modules/@babel/core/lib/transformation/normalize-file.js:99:38)\\n    at normalizeFile.next (<anonymous>)\\n    at run (/Applications/MAMP/htdocs/docker-laravel-lamp/my-site/node_modules/@babel/core/lib/transformation/index.js:31:50)\\n    at run.next (<anonymous>)\\n    at Function.transform (/Applications/MAMP/htdocs/docker-laravel-lamp/my-site/node_modules/@babel/core/lib/transform.js:27:41)\\n    at transform.next (<anonymous>)\\n    at step (/Applications/MAMP/htdocs/docker-laravel-lamp/my-site/node_modules/gensync/index.js:254:32)\\n    at gen.next (/Applications/MAMP/htdocs/docker-laravel-lamp/my-site/node_modules/gensync/index.js:266:13)\\n    at async.call.value (/Applications/MAMP/htdocs/docker-laravel-lamp/my-site/node_modules/gensync/index.js:216:11)\");//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IiIsImZpbGUiOiIuL3Jlc291cmNlcy9qcy9hcHAuanMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/app.js\n");

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvc2Fzcy9hcHAuc2Nzcz8wZTE1Il0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL3Nhc3MvYXBwLnNjc3MuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvLyByZW1vdmVkIGJ5IGV4dHJhY3QtdGV4dC13ZWJwYWNrLXBsdWdpbiJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/sass/app.scss\n");

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Applications/MAMP/htdocs/docker-laravel-lamp/my-site/resources/js/app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! /Applications/MAMP/htdocs/docker-laravel-lamp/my-site/resources/sass/app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });