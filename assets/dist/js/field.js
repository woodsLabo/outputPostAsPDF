/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/src/js/Field.js":
/*!********************************!*\
  !*** ./assets/src/js/Field.js ***!
  \********************************/
/***/ (() => {

eval("class Field {\n  /**\n   * constructor.\n   */\n  constructor() {\n    this.selectOutput = document.querySelectorAll(\".js-selectOutput\");\n    this.field = document.querySelector(\".js-field\");\n    this.mediaButton = document.querySelectorAll(\".js-mediaSelect\");\n    this.settingImage = document.querySelectorAll(\".js-settingImage\");\n    this.hiddenImageUrl = document.querySelectorAll(\".js-hiddenImageUrl\");\n    this.mediaDeleteButton = document.querySelectorAll(\".js-mediaDelete\");\n    this.image_url;\n    this.selectState;\n\n    // this.handleSelect();\n    // this.initTinyMce();\n    this.selectImage();\n    this.imageDelete();\n  }\n\n  /**\n   * handleSelect.\n   * @desc pdf出力選択\n   */\n  handleSelect() {\n    // this.selectOutput.forEach(button => {\n    //   button.addEventListener(\"click\", () => {\n    //     this.selectState = button.value === \"1\" ? \"block\" : \"none\";\n    //     this.field.style.display = this.selectState;\n    //   });\n    // });\n  }\n\n  /**\n   * initTinyMce.\n   * @desc textareaにtinymceを設定\n   */\n  // initTinyMce() {\n  //   tinymce.init({\n  //     selector: \"textarea.has_tinymce\",\n  //   });\n  // }\n\n  /**\n   * selectImage.\n   * @desc 画像選択処理\n   */\n  selectImage() {\n    this.mediaButton.forEach((button, index) => {\n      button.addEventListener(\"click\", () => {\n        const custom_uploader = wp.media({\n          title: \"画像を選択\",\n          button: {\n            text: \"画像を設定\"\n          },\n          library: {\n            type: \"image\"\n          },\n          multiple: false\n        });\n        custom_uploader.open();\n        this.imageUpLoader(custom_uploader, index);\n      });\n    });\n  }\n\n  /**\n   * imageUpLoader.\n   * @desc 画像をアップロード\n   *\n   * @param {object} uploader - 選択した画像の情報\n   * @param {number} index - 選択対象のインデックス\n   */\n  imageUpLoader(uploader, index) {\n    uploader.on(\"select\", () => {\n      const images = uploader.state().get(\"selection\");\n      images.forEach(file => this.image_url = file.attributes.url);\n      this.settingImage[index].src = this.image_url;\n      this.hiddenImageUrl[index].value = this.image_url;\n    });\n  }\n\n  /**\n   * imageDelete.\n   * @desc 選択している画像を削除\n   */\n  imageDelete() {\n    this.mediaDeleteButton.forEach((button, index) => {\n      button.addEventListener(\"click\", () => {\n        this.settingImage[index].src = \"\";\n        this.hiddenImageUrl[index].value = \"\";\n      });\n    });\n  }\n}\nwindow.addEventListener(\"load\", () => {\n  const field = new Field();\n});\n\n//# sourceURL=webpack://output-post-as-pdf/./assets/src/js/Field.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./assets/src/js/Field.js"]();
/******/ 	
/******/ })()
;