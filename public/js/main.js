/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/main.js":
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
/***/ (() => {

eval("$(function () {\n  // 分頁\n  $(document).on('click', '.pagination a', function (event) {\n    event.preventDefault(); // 為選到的 li 加上 active\n\n    $('.pagination li').removeClass('active');\n    $(this).parent('li').addClass('active'); // 取得服務器位址\n\n    var target = $(this).attr('href');\n    $.ajax({\n      type: \"GET\",\n      url: target,\n      dataType: 'html',\n      success: function success(response) {\n        $('#list').empty().html(response);\n      },\n      error: function error(thrownError) {\n        alert('No response from server');\n      }\n    });\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvbWFpbi5qcz9mZGFjIl0sIm5hbWVzIjpbIiQiLCJkb2N1bWVudCIsIm9uIiwiZXZlbnQiLCJwcmV2ZW50RGVmYXVsdCIsInJlbW92ZUNsYXNzIiwicGFyZW50IiwiYWRkQ2xhc3MiLCJ0YXJnZXQiLCJhdHRyIiwiYWpheCIsInR5cGUiLCJ1cmwiLCJkYXRhVHlwZSIsInN1Y2Nlc3MiLCJyZXNwb25zZSIsImVtcHR5IiwiaHRtbCIsImVycm9yIiwidGhyb3duRXJyb3IiLCJhbGVydCJdLCJtYXBwaW5ncyI6IkFBQUFBLENBQUMsQ0FBQyxZQUFZO0FBQ1Y7QUFDQUEsRUFBQUEsQ0FBQyxDQUFDQyxRQUFELENBQUQsQ0FBWUMsRUFBWixDQUFlLE9BQWYsRUFBd0IsZUFBeEIsRUFBeUMsVUFBVUMsS0FBVixFQUFpQjtBQUN0REEsSUFBQUEsS0FBSyxDQUFDQyxjQUFOLEdBRHNELENBR3REOztBQUNBSixJQUFBQSxDQUFDLENBQUMsZ0JBQUQsQ0FBRCxDQUFvQkssV0FBcEIsQ0FBZ0MsUUFBaEM7QUFDQUwsSUFBQUEsQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRTSxNQUFSLENBQWUsSUFBZixFQUFxQkMsUUFBckIsQ0FBOEIsUUFBOUIsRUFMc0QsQ0FPdEQ7O0FBQ0EsUUFBSUMsTUFBTSxHQUFHUixDQUFDLENBQUMsSUFBRCxDQUFELENBQVFTLElBQVIsQ0FBYSxNQUFiLENBQWI7QUFFQVQsSUFBQUEsQ0FBQyxDQUFDVSxJQUFGLENBQU87QUFDSEMsTUFBQUEsSUFBSSxFQUFFLEtBREg7QUFFSEMsTUFBQUEsR0FBRyxFQUFFSixNQUZGO0FBR0hLLE1BQUFBLFFBQVEsRUFBRSxNQUhQO0FBSUhDLE1BQUFBLE9BQU8sRUFBRSxpQkFBVUMsUUFBVixFQUFvQjtBQUN6QmYsUUFBQUEsQ0FBQyxDQUFDLE9BQUQsQ0FBRCxDQUFXZ0IsS0FBWCxHQUFtQkMsSUFBbkIsQ0FBd0JGLFFBQXhCO0FBQ0gsT0FORTtBQU9IRyxNQUFBQSxLQUFLLEVBQUUsZUFBVUMsV0FBVixFQUF1QjtBQUMxQkMsUUFBQUEsS0FBSyxDQUFDLHlCQUFELENBQUw7QUFDSDtBQVRFLEtBQVA7QUFXSCxHQXJCRDtBQXNCSCxDQXhCQSxDQUFEIiwic291cmNlc0NvbnRlbnQiOlsiJChmdW5jdGlvbiAoKSB7XHJcbiAgICAvLyDliIbpoIFcclxuICAgICQoZG9jdW1lbnQpLm9uKCdjbGljaycsICcucGFnaW5hdGlvbiBhJywgZnVuY3Rpb24gKGV2ZW50KSB7XHJcbiAgICAgICAgZXZlbnQucHJldmVudERlZmF1bHQoKTtcclxuXHJcbiAgICAgICAgLy8g54K66YG45Yiw55qEIGxpIOWKoOS4iiBhY3RpdmVcclxuICAgICAgICAkKCcucGFnaW5hdGlvbiBsaScpLnJlbW92ZUNsYXNzKCdhY3RpdmUnKTtcclxuICAgICAgICAkKHRoaXMpLnBhcmVudCgnbGknKS5hZGRDbGFzcygnYWN0aXZlJyk7XHJcblxyXG4gICAgICAgIC8vIOWPluW+l+acjeWLmeWZqOS9jeWdgFxyXG4gICAgICAgIGxldCB0YXJnZXQgPSAkKHRoaXMpLmF0dHIoJ2hyZWYnKTtcclxuXHJcbiAgICAgICAgJC5hamF4KHtcclxuICAgICAgICAgICAgdHlwZTogXCJHRVRcIixcclxuICAgICAgICAgICAgdXJsOiB0YXJnZXQsXHJcbiAgICAgICAgICAgIGRhdGFUeXBlOiAnaHRtbCcsXHJcbiAgICAgICAgICAgIHN1Y2Nlc3M6IGZ1bmN0aW9uIChyZXNwb25zZSkge1xyXG4gICAgICAgICAgICAgICAgJCgnI2xpc3QnKS5lbXB0eSgpLmh0bWwocmVzcG9uc2UpO1xyXG4gICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICBlcnJvcjogZnVuY3Rpb24gKHRocm93bkVycm9yKSB7XHJcbiAgICAgICAgICAgICAgICBhbGVydCgnTm8gcmVzcG9uc2UgZnJvbSBzZXJ2ZXInKVxyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfSk7XHJcbiAgICB9KTtcclxufSk7Il0sImZpbGUiOiIuL3Jlc291cmNlcy9qcy9tYWluLmpzLmpzIiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/main.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/main.js"]();
/******/ 	
/******/ })()
;