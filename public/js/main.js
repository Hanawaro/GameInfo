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

eval("$(document).ready(function () {\n  $('#copy').click(function () {\n    var alertBox = $('.messenger .alert-success');\n\n    if (!alertBox.hasClass('active')) {\n      alertBox.addClass('active');\n      var url = document.getElementById(\"url\");\n      url.innerHTML = window.location.href;\n      url.select();\n      document.execCommand(\"copy\");\n      setTimeout(function () {\n        alertBox.removeClass('active');\n      }, 3000);\n    }\n  });\n  $('.nav-item').click(function () {\n    // set tab button\n    var input = $(this).find('input').first();\n    input.prop('checked', true); // get current input and check\n\n    var current = $(\".tab-content input[name=\".concat(input.data('for'), \"]\")).first();\n    current.prop('checked', true); // clear others\n\n    var tabs = $('.tab-content label');\n    tabs.removeClass('active'); // set new current\n\n    var label = $(\".tab-content label[for='\".concat(current.attr('id'), \"']\"));\n    label.addClass('active');\n    $(\"#\".concat(tabs.attr('for'))).prop('checked', true);\n  });\n  $('.type .nav-link').click(function () {\n    var input = $(this).find('input').first();\n    input.prop('checked', true);\n  });\n  $('.tab-content label').click(function () {\n    $('.tab-content label').removeClass('active');\n    $(this).addClass('active');\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvbWFpbi5qcz9mZGFjIl0sIm5hbWVzIjpbIiQiLCJkb2N1bWVudCIsInJlYWR5IiwiY2xpY2siLCJhbGVydEJveCIsImhhc0NsYXNzIiwiYWRkQ2xhc3MiLCJ1cmwiLCJnZXRFbGVtZW50QnlJZCIsImlubmVySFRNTCIsIndpbmRvdyIsImxvY2F0aW9uIiwiaHJlZiIsInNlbGVjdCIsImV4ZWNDb21tYW5kIiwic2V0VGltZW91dCIsInJlbW92ZUNsYXNzIiwiaW5wdXQiLCJmaW5kIiwiZmlyc3QiLCJwcm9wIiwiY3VycmVudCIsImRhdGEiLCJ0YWJzIiwibGFiZWwiLCJhdHRyIl0sIm1hcHBpbmdzIjoiQUFBQUEsQ0FBQyxDQUFDQyxRQUFELENBQUQsQ0FBWUMsS0FBWixDQUFrQixZQUFZO0FBRTFCRixFQUFBQSxDQUFDLENBQUMsT0FBRCxDQUFELENBQVdHLEtBQVgsQ0FBaUIsWUFBWTtBQUN6QixRQUFJQyxRQUFRLEdBQUdKLENBQUMsQ0FBQywyQkFBRCxDQUFoQjs7QUFDQSxRQUFJLENBQUNJLFFBQVEsQ0FBQ0MsUUFBVCxDQUFrQixRQUFsQixDQUFMLEVBQWtDO0FBQzlCRCxNQUFBQSxRQUFRLENBQUNFLFFBQVQsQ0FBa0IsUUFBbEI7QUFFQSxVQUFJQyxHQUFHLEdBQUdOLFFBQVEsQ0FBQ08sY0FBVCxDQUF3QixLQUF4QixDQUFWO0FBQ0FELE1BQUFBLEdBQUcsQ0FBQ0UsU0FBSixHQUFnQkMsTUFBTSxDQUFDQyxRQUFQLENBQWdCQyxJQUFoQztBQUNBTCxNQUFBQSxHQUFHLENBQUNNLE1BQUo7QUFDQVosTUFBQUEsUUFBUSxDQUFDYSxXQUFULENBQXFCLE1BQXJCO0FBRUFDLE1BQUFBLFVBQVUsQ0FBQyxZQUFZO0FBQ25CWCxRQUFBQSxRQUFRLENBQUNZLFdBQVQsQ0FBcUIsUUFBckI7QUFDSCxPQUZTLEVBRVAsSUFGTyxDQUFWO0FBR0g7QUFDSixHQWREO0FBZ0JBaEIsRUFBQUEsQ0FBQyxDQUFDLFdBQUQsQ0FBRCxDQUFlRyxLQUFmLENBQXFCLFlBQVk7QUFDN0I7QUFDQSxRQUFJYyxLQUFLLEdBQUdqQixDQUFDLENBQUMsSUFBRCxDQUFELENBQVFrQixJQUFSLENBQWEsT0FBYixFQUFzQkMsS0FBdEIsRUFBWjtBQUNBRixJQUFBQSxLQUFLLENBQUNHLElBQU4sQ0FBVyxTQUFYLEVBQXNCLElBQXRCLEVBSDZCLENBSzdCOztBQUNBLFFBQUlDLE9BQU8sR0FBR3JCLENBQUMsbUNBQTRCaUIsS0FBSyxDQUFDSyxJQUFOLENBQVcsS0FBWCxDQUE1QixPQUFELENBQW1ESCxLQUFuRCxFQUFkO0FBQ0FFLElBQUFBLE9BQU8sQ0FBQ0QsSUFBUixDQUFhLFNBQWIsRUFBd0IsSUFBeEIsRUFQNkIsQ0FTN0I7O0FBQ0EsUUFBSUcsSUFBSSxHQUFHdkIsQ0FBQyxDQUFDLG9CQUFELENBQVo7QUFDQXVCLElBQUFBLElBQUksQ0FBQ1AsV0FBTCxDQUFpQixRQUFqQixFQVg2QixDQWE3Qjs7QUFDQSxRQUFJUSxLQUFLLEdBQUd4QixDQUFDLG1DQUE0QnFCLE9BQU8sQ0FBQ0ksSUFBUixDQUFhLElBQWIsQ0FBNUIsUUFBYjtBQUNBRCxJQUFBQSxLQUFLLENBQUNsQixRQUFOLENBQWUsUUFBZjtBQUNBTixJQUFBQSxDQUFDLFlBQUt1QixJQUFJLENBQUNFLElBQUwsQ0FBVSxLQUFWLENBQUwsRUFBRCxDQUEwQkwsSUFBMUIsQ0FBK0IsU0FBL0IsRUFBMEMsSUFBMUM7QUFDSCxHQWpCRDtBQW1CQXBCLEVBQUFBLENBQUMsQ0FBQyxpQkFBRCxDQUFELENBQXFCRyxLQUFyQixDQUEyQixZQUFZO0FBQ25DLFFBQUljLEtBQUssR0FBR2pCLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUWtCLElBQVIsQ0FBYSxPQUFiLEVBQXNCQyxLQUF0QixFQUFaO0FBQ0FGLElBQUFBLEtBQUssQ0FBQ0csSUFBTixDQUFXLFNBQVgsRUFBc0IsSUFBdEI7QUFDSCxHQUhEO0FBS0FwQixFQUFBQSxDQUFDLENBQUMsb0JBQUQsQ0FBRCxDQUF3QkcsS0FBeEIsQ0FBOEIsWUFBVztBQUNyQ0gsSUFBQUEsQ0FBQyxDQUFDLG9CQUFELENBQUQsQ0FBd0JnQixXQUF4QixDQUFvQyxRQUFwQztBQUNBaEIsSUFBQUEsQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRTSxRQUFSLENBQWlCLFFBQWpCO0FBQ0gsR0FIRDtBQUtILENBL0NEIiwic291cmNlc0NvbnRlbnQiOlsiJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24gKCkge1xuXG4gICAgJCgnI2NvcHknKS5jbGljayhmdW5jdGlvbiAoKSB7XG4gICAgICAgIGxldCBhbGVydEJveCA9ICQoJy5tZXNzZW5nZXIgLmFsZXJ0LXN1Y2Nlc3MnKTtcbiAgICAgICAgaWYgKCFhbGVydEJveC5oYXNDbGFzcygnYWN0aXZlJykpIHtcbiAgICAgICAgICAgIGFsZXJ0Qm94LmFkZENsYXNzKCdhY3RpdmUnKTtcblxuICAgICAgICAgICAgbGV0IHVybCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwidXJsXCIpO1xuICAgICAgICAgICAgdXJsLmlubmVySFRNTCA9IHdpbmRvdy5sb2NhdGlvbi5ocmVmO1xuICAgICAgICAgICAgdXJsLnNlbGVjdCgpO1xuICAgICAgICAgICAgZG9jdW1lbnQuZXhlY0NvbW1hbmQoXCJjb3B5XCIpO1xuXG4gICAgICAgICAgICBzZXRUaW1lb3V0KGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICBhbGVydEJveC5yZW1vdmVDbGFzcygnYWN0aXZlJyk7XG4gICAgICAgICAgICB9LCAzMDAwKTtcbiAgICAgICAgfVxuICAgIH0pO1xuXG4gICAgJCgnLm5hdi1pdGVtJykuY2xpY2soZnVuY3Rpb24gKCkge1xuICAgICAgICAvLyBzZXQgdGFiIGJ1dHRvblxuICAgICAgICBsZXQgaW5wdXQgPSAkKHRoaXMpLmZpbmQoJ2lucHV0JykuZmlyc3QoKTtcbiAgICAgICAgaW5wdXQucHJvcCgnY2hlY2tlZCcsIHRydWUpO1xuXG4gICAgICAgIC8vIGdldCBjdXJyZW50IGlucHV0IGFuZCBjaGVja1xuICAgICAgICBsZXQgY3VycmVudCA9ICQoYC50YWItY29udGVudCBpbnB1dFtuYW1lPSR7aW5wdXQuZGF0YSgnZm9yJyl9XWApLmZpcnN0KCk7XG4gICAgICAgIGN1cnJlbnQucHJvcCgnY2hlY2tlZCcsIHRydWUpO1xuXG4gICAgICAgIC8vIGNsZWFyIG90aGVyc1xuICAgICAgICBsZXQgdGFicyA9ICQoJy50YWItY29udGVudCBsYWJlbCcpO1xuICAgICAgICB0YWJzLnJlbW92ZUNsYXNzKCdhY3RpdmUnKTtcblxuICAgICAgICAvLyBzZXQgbmV3IGN1cnJlbnRcbiAgICAgICAgbGV0IGxhYmVsID0gJChgLnRhYi1jb250ZW50IGxhYmVsW2Zvcj0nJHtjdXJyZW50LmF0dHIoJ2lkJyl9J11gKTtcbiAgICAgICAgbGFiZWwuYWRkQ2xhc3MoJ2FjdGl2ZScpO1xuICAgICAgICAkKGAjJHt0YWJzLmF0dHIoJ2ZvcicpfWApLnByb3AoJ2NoZWNrZWQnLCB0cnVlKTtcbiAgICB9KTtcblxuICAgICQoJy50eXBlIC5uYXYtbGluaycpLmNsaWNrKGZ1bmN0aW9uICgpIHtcbiAgICAgICAgbGV0IGlucHV0ID0gJCh0aGlzKS5maW5kKCdpbnB1dCcpLmZpcnN0KCk7XG4gICAgICAgIGlucHV0LnByb3AoJ2NoZWNrZWQnLCB0cnVlKTtcbiAgICB9KTtcblxuICAgICQoJy50YWItY29udGVudCBsYWJlbCcpLmNsaWNrKGZ1bmN0aW9uKCkge1xuICAgICAgICAkKCcudGFiLWNvbnRlbnQgbGFiZWwnKS5yZW1vdmVDbGFzcygnYWN0aXZlJyk7XG4gICAgICAgICQodGhpcykuYWRkQ2xhc3MoJ2FjdGl2ZScpO1xuICAgIH0pO1xuXG59KTtcblxuIl0sImZpbGUiOiIuL3Jlc291cmNlcy9qcy9tYWluLmpzLmpzIiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/main.js\n");

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