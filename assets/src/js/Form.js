const DB_NAME = "imagesDB";
const VERSION = "1";

class Form {
  constructor() {
    this.db = "";
    this.onLoad();
  }

  /**
   * ロード時のイベント
   */
  onLoad() {
    window.addEventListener("load", () => {
      this.pdfTypes = document.querySelectorAll(".pdf_types");
      this.bgTypesWrap = document.querySelector(".bg_type_wrap");
      this.bgTypesTitle = document.querySelector(".bg_type_title");
      this.colorTypes = document.querySelectorAll(".color_types");
      this.bgTypes = document.querySelectorAll(".bg_types");
      this.title = document.querySelector(".title");
      this.subCatch = document.querySelector(".sub_catch");
      this.mainCatch = document.querySelector(".main_catch");
      this.noticeText = document.querySelector(".notice_text");
      this.detailItemDate = document.querySelector(".detail_item_date");
      this.detailItemStartTime = document.querySelector(".detail_item_start_time");
      this.detailItemEndTime = document.querySelector(".detail_item_end_time");
      this.detailItemCapacity = document.querySelector(".detail_item_capacity");
      this.detailItemPlace = document.querySelector(".detail_item_place");
      this.detailItemPrice = document.querySelector(".detail_item_price");
      this.listTitle = document.querySelector(".list_title");
      this.lists = Array.from(document.querySelectorAll(".list")); // 配列にキャスト
      this.message = document.querySelector(".message");
      this.seminarText = document.querySelector(".seminar_text");
      this.seminarUrl = document.querySelector(".seminar_url");
      this.seminarWrap = document.querySelector(".seminar_wrap");
      this.profileTitle = document.querySelector(".profile_title");
      this.profileName = document.querySelector(".profile_name");
      this.profileText = document.querySelector(".profile_text");
      this.profileCompany = document.querySelector(".contact_company");
      this.profileTel = document.querySelector(".contact_tel");
      this.profileMail = document.querySelector(".contact_mail");
      this.bgImage = document.querySelector(".bg_image");
      this.bgSettingImage = document.querySelector(".bg_setting_image");
      this.qrImage = document.querySelector(".qr_image");
      this.profileImage = document.querySelector(".profile_image");
      this.previewImage = document.querySelectorAll(".preview_image");
      this.bgImageBtn = document.querySelector(".bg_image_select");
      this.qrImageBtn = document.querySelector(".qr_image_select");
      this.profileImageBtn = document.querySelector(".profile_image_select");
      this.bgImageDeleteBtn = document.querySelector(".bg_image_delete");
      this.qrImageDeleteBtn = document.querySelector(".qr_image_delete");
      this.profileImageDeletBtn = document.querySelector(".profile_image_delete");
      this.footerBg = "";
      this.resetFormBt = document.querySelector(".js-reset-form-bt");

      this.eventListener();
      // window.indexedDB.deleteDatabase("imagesDB");
    });
  }

  /**
   * 各イベントをまとめる
   */
  eventListener() {
    this.initIndexedDB();
    const nodeObjects = this.createNodeObjects();
    const selectObjects = this.createSelectObjects();
    // const imageObjects = this.createImageObjects();
    const sizeRangeObjects = this.createSizeRange();
    const colorArray = this.createColorArray();
    const imageArray = this.createImageArray();

    // return sessionStrage params
    selectObjects.map(e => this.returnSessionStorageSelect(e));
    nodeObjects.map(e => this.returnSessionStorageText(e));
    this.lists.map(e => this.returnSessionStorageText(e));
    sizeRangeObjects.map(e => this.returnSessionStorageRange(e));
    colorArray.map(e => this.returnSessionStorageColor(e));
    imageArray.map(e => this.returnSessionStorageBg(e));

    // init strage and form
    selectObjects.map(e => this.selectTypes(e));
    nodeObjects.map(e => this.handleFormChange(e));
    this.lists.map(e => this.handleFormChange(e));
    this.initImagePreview();
    sizeRangeObjects.map(e => this.initSizeRange(e));
    colorArray.map(e => this.initThemeColor(e));

    this.resetForm();
  }

  /**
   * indexedDBの初期設定
   */
  initIndexedDB() {
    const request = window.indexedDB.open(DB_NAME, VERSION);

    request.onupgradeneeded = (event) => {
      this.db = event.target.result;
      this.db.createObjectStore("images", {
        keyPath: "id"
      });
    };

    request.onsuccess = (event) => {
      this.db = event.target.result;

      const imageObjects = this.createImageObjects();
      imageObjects.map((e, index) => this.returnIndexedDBImages(e, index));
    };

    request.onerror = (event) => {
      console.error(event);
    };
  }

  addIndexedDB(index, key, value) {
    const createReadObjectStore = this.db.transaction(["images"], "readonly").objectStore("images").get(index);

    createReadObjectStore.onsuccess = () => {
      const createObjectStore = this.db.transaction("images", "readwrite").objectStore("images");
      const items = {
        id: index,
        key,
        value
      };

      if (!createReadObjectStore.result) { // DBにデータが入っていない場合はadd
        createObjectStore.add(items);
      } else { // DEにデータが入っている場合はupdate
        createObjectStore.put(items);
      }
    };
  }

  /**
   * nodeを代入している変数を配列化
   * @return {Array} nodeの配列
   */
  createNodeObjects() {
    return [
      this.title,
      this.subCatch,
      this.mainCatch,
      this.noticeText,
      this.detailItemDate,
      this.detailItemStartTime,
      this.detailItemEndTime,
      this.detailItemCapacity,
      this.detailItemPlace,
      this.detailItemPrice,
      this.listTitle,
      this.message,
      this.seminarText,
      this.seminarUrl,
      this.profileTitle,
      this.profileName,
      this.profileText,
      this.profileCompany,
      this.profileTel,
      this.profileMail
    ];
  }

  /**
   * 配色周りのフォームのclass名を配列化
   * @return {Array} class名の配列
   */
  createColorArray() {
    return [
      "main_color",
      "seminar_arrow_color",
    ];
  }

  /**
   * 画像周りのフォームのclass名を配列化
   * @return {Array} class名の配列
   */
  createImageArray() {
    return [
      "seminar_bg",
      "footer_bg",
    ];
  }

  /**
   * 画像用に配列オブジェクト生成
   * @return {Array} オブジェクト配列
   */
  createImageObjects() {
    return [
      {
        ele: this.bgImage,
        preview: "bg",
      },
      {
        ele: this.qrImage,
        preview: "qr",
      },
      {
        ele: this.profileImage,
        preview: "profile",
      },
    ];
  }

  /**
   * セレクト用に配列オブジェクト生成
   * @return {Array} オブジェクト配列
   */
  createSelectObjects() {
    return [
      {
        ele: this.pdfTypes,
        type: "pdf",
      },
      {
        ele: this.colorTypes,
        type: "color",
      },
      {
        ele: this.bgTypes,
        type: "bg",
      }
    ];
  }

  /**
   * サイズ指定用に配列オブジェクト生成
   * @return {Array} オブジェクト配列
   */
  createSizeRange() {
    return [
      {
        ele: "notice_text_size",
        type: "notice_size"
      },
      {
        ele: "detail_item_place_text_size",
        type: "place_size"
      },
      {
        ele: "contact_company_text_size",
        type: "company_size"
      },
      {
        ele: "contact_mail_text_size",
        type: "main_size"
      }
    ];
  }

  /**
   * ラジオボタンセレクトを検知
   * @return {Object} object - ラジオボタン要素のオブジェクト
   */
  selectTypes(object) {
    const opapType = document.querySelector(`.opap_${object.type}_type`);
    const listWrap = document.querySelector(".list_wrap");

    object.ele.forEach(e => {
      if (e.checked) opapType.value = e.value; // select type init
      e.addEventListener("change", (e) => { // typeの変更をハンドリング
        opapType.value = e.target.value;
        this.setSessionStorage(`${object.type}_type`, e.target.value);
        // 選択状態によってリストの表示非表示設定
        if (object.type === "pdf") {
          this.settingShowList(e.target.value === "a" ? "none" : "block");
          this.message.rows = e.target.value === "a" ? "4" : "2";
        }

        if (object.type === "bg") {
          this.bgSettingImage.setAttribute("src", e.target.value);
        }

        if (object.type === "color") {
          this.setSessionStorage("seminar_bg", e.target.dataset.seminar);
          this.setSessionStorage("footer_bg", e.target.dataset.footer);
          this.initBgImage("seminar_bg", e.target.dataset.seminar);
          this.initBgImage("footer_bg", e.target.dataset.footer);
          this.title.style.background = e.target.value;
          this.title.style.color = e.target.value === "yellow" ? "#000" : "#fff";
          this.listTitle.style.background = e.target.value;
          this.listTitle.style.color = e.target.value === "yellow" ? "#000" : "#fff";
          listWrap.style.borderColor = e.target.value;
          this.seminarWrap.style.background = "url(" + e.target.dataset.seminar + ") no-repeat";
          this.seminarWrap.style.backgroundSize = "cover";
        }
      });
    });

    // リストの初期表示設定
    if (object.type === "pdf") {
      this.settingShowList(opapType.value === "a" ? "none" : "block");
      this.message.rows = opapType.value === "a" ? "4" : "2";
    }

    if (object.type === "bg") {
      this.bgSettingImage.setAttribute("src", opapType.value);
    }

    if (object.type === "color") {
      this.title.style.background = opapType.value;
      this.title.style.color = opapType.value === "yellow" ? "#000" : "#fff";
      this.listTitle.style.background = opapType.value;
      this.listTitle.style.color = opapType.value === "yellow" ? "#000" : "#fff";
      listWrap.style.borderColor = opapType.value;
    }
  }

  /**
   * 入力を検知
   *
   * @param {Object} object - 検知対象のオブジェクト
   */
  handleFormChange(node) {
    node.addEventListener("change", (e) => {
      document.querySelector(`.opap_${node.name}`).value = e.target.value;
      this.setSessionStorage(node.name, e.target.value);
    });
    node.addEventListener("keyup", (e) => {
      document.querySelector(`.opap_${node.name}`).value = e.target.value;
      this.setSessionStorage(node.name, e.target.value);
    });
  }

  /**
   * input file周りの処理
   */
  initImagePreview() {
    const imageObjects = this.createImageObjects();

    // input fileのclick eventを登録
    this.bgImageBtn.addEventListener("click", () => imageObjects[0].ele.click());
    this.qrImageBtn.addEventListener("click", () => imageObjects[1].ele.click());
    this.profileImageBtn.addEventListener("click", () => imageObjects[2].ele.click());
    this.bgImageDeleteBtn.addEventListener("click", () => this.deleteMedia(imageObjects, 0));
    this.qrImageDeleteBtn.addEventListener("click", () => this.deleteMedia(imageObjects, 1));
    this.profileImageDeletBtn.addEventListener("click", () => this.deleteMedia(imageObjects, 2));

    imageObjects.forEach((obj, index) => {
      obj.ele.addEventListener("change", (e) => {
        const file = e.target.files[0];
        const fileReader = new FileReader();
        fileReader.readAsDataURL(file);

        fileReader.addEventListener("load", (e) => {
          if (document.querySelector(`.${obj.preview}_preview .preview_image`) === null) {
            const imgElm = document.createElement("img");
            imgElm.className = "preview_image";
            imgElm.src = e.target.result; // e.target.resultに読み込んだ画像のURLが入っている
            const targetElm = document.querySelector(`.${obj.preview}_preview`);
            targetElm.appendChild(imgElm);
            document.querySelector(`.${obj.preview}_image_delete`).style.display = "inline-block";
          } else { // 既に画像が登録されている場合に上書き
            const previewImage = document.querySelector(`.${obj.preview}_preview .preview_image`);
            previewImage.setAttribute("src", e.target.result);
          }

          if (obj.preview === "bg") {
            this.bgTypesWrap.style.display = "none";
            this.bgTypesTitle.style.display = "none";
            this.bgSettingImage.style.display = "none";
          }

          document.querySelector(`.opap_${obj.preview}_img`).value = e.target.result;
          this.addIndexedDB(index, obj.preview, e.target.result);
        });
      });
    });
  }

  /**
   * サイズ指定フォーム値の反映と受け渡し用に設定
   * @param {object} obj - サイズ指定要素のオブジェクト
   */
  initSizeRange(obj) {
    document.querySelector(`.${obj.ele}`).addEventListener("change", () => {
      const rangeValue = document.querySelector(`.${obj.ele}`).value;
      this.setSessionStorage(obj.type, rangeValue);
      document.querySelector(`.opap_${obj.ele}`).value = rangeValue;
    });
  }

  /**
   * システムの全体色の反映と受け渡し様に設定
   * @param {string} ele - 色指定の要素
   */
  initThemeColor(ele) {
    document.querySelector(`.${ele}`).addEventListener("change", () => {
      const colorCode = document.querySelector(`.${ele}`).value;
      this.setSessionStorage(ele, colorCode);
      document.querySelector(`.opap_${ele}`).value = colorCode;
    });
  }

  /**
   * 背景画像の受け渡し
   * @param {string} ele - 背景指定の要素
   * @param {string} value - 画像のurl
   */
  initBgImage(ele, value) {
    document.querySelector(`.opap_${ele}`).value = value;
  }

  /**
   * タイプによってリストの表示数を変更
   *
   * @param {string} status - cssで設定する状態
   */
  settingShowList(status) {
    const handleListIndexs = ["07", "08", "09", "10"];
    handleListIndexs.forEach(e => document.querySelector(`.list_${e}`).style.display = status);
  }

  /**
   * メディア削除時の処理
   *
   * @param {object} imageobjects - 画像の設定配列オブジェクト
   * @param {number} index - 配列のindex指定
   */
  deleteMedia(imageObjects, index) {
    document.querySelector(`.${imageObjects[index].preview}_preview .preview_image`).remove();
    document.querySelector(`.opap_${imageObjects[index].preview}_img`).value = "";
    document.querySelector(`.${imageObjects[index].preview}_image`).value = "";
    document.querySelector(`.${imageObjects[index].preview}_image_delete`).style.display = "none";

    const deleteObjectStore = this.db.transaction(["images"], "readwrite").objectStore("images").delete(index);
    deleteObjectStore.onsuccess = (e) => console.log(e);

    if (index === 0) {
      document.querySelector(`.${imageObjects[index].preview}_type_wrap`).style.display = "block";
      document.querySelector(`.${imageObjects[index].preview}_type_title`).style.display = "block";
      this.bgSettingImage.style.display = "block";
    }
  }

  /**
   * sessionStrageに入力値を保存
   * 画像は容量の問題でstorageに含めない
   *
   * @param {String} key - nodeのname
   * @param {String} value - 値
   * @return {Object} sessionStrageのデータ
   */
  setSessionStorage(key, value) {
    if (key !== "bg" && key !== "qr" && key !== "profile") return sessionStorage.setItem(key, value);
  }

  /**
   * sessionStrageに入っている選択情報をフォームに返す
   *
   * @param {Object} obj - 対象のオブジェクト
   */
  returnSessionStorageSelect(obj) {
    obj.ele.forEach(e => {
      if (e.value === sessionStorage.getItem(`${obj.type}_type`)) {
        e.checked = true;
        document.querySelector(`.opap_${obj.type}_type`).value = e.value;
      }
    });
  }

  /**
   * sessionStrageに入っているテキストを画面とフォームに返す
   *
   * @param {Object} node - 対象のnode
   */
  returnSessionStorageText(node) {
    document.querySelector(`.${node.name}`).value = sessionStorage.getItem(node.name) !== null ? sessionStorage.getItem(node.name) : "";
    document.querySelector(`.opap_${node.name}`).value = sessionStorage.getItem(node.name) !== null ? sessionStorage.getItem(node.name) : "";
  }

  /**
   * sessionStrageに入っている選択範囲を画面とフォームに返す
   *
   * @param {Object} obj - 対象のオブジェクト
   */
  returnSessionStorageRange(obj) {
    document.querySelector(`.${obj.ele}`).value = sessionStorage.getItem(obj.type) !== null ? sessionStorage.getItem(obj.type) : "";
    document.querySelector(`.opap_${obj.ele}`).value = sessionStorage.getItem(obj.type) !== null ? sessionStorage.getItem(obj.type) : "";
  }

  /**
   * sessionStrageに入っている色情報を画面とフォームに返す
   *
   * @param {Object} ele - 対象のエレメント
   */
  returnSessionStorageColor(ele) {
    document.querySelector(`.${ele}`).value = sessionStorage.getItem(ele) !== null ? sessionStorage.getItem(ele) : "";
    document.querySelector(`.opap_${ele}`).value = sessionStorage.getItem(ele) !== null ? sessionStorage.getItem(ele) : "";
  }

  /**
   * sessionStrageに入っている画像情報を画面とフォームに返す
   *
   * @param {Object} obj - 対象のオブジェクト
   */
  returnSessionStorageBg(ele) {
    if (ele === "seminar_bg" && sessionStorage.getItem(ele) !== null) {
      this.seminarWrap.style.background = "url(" + sessionStorage.getItem(ele) + ") no-repeat";
      this.seminarWrap.style.backgroundSize = "cover";
    }
    document.querySelector(`.opap_${ele}`).value = sessionStorage.getItem(ele);
  }

  /**
   * sessionStrageに入っている画像をフォームに返す
   * @param {Object} obj - 画像の設定オブジェクト
   */
  returnIndexedDBImages(obj, index) {
    const createObjectStore = this.db.transaction(["images"], "readonly").objectStore("images");
    const storeIndex = createObjectStore.get(index);

    storeIndex.onsuccess = () => {
      if (storeIndex.result) {
        const resultValue = storeIndex.result.value;
        const imgElm = document.createElement("img");
        imgElm.className = "preview_image";
        imgElm.src = resultValue;
        const targetElm = document.querySelector(`.${obj.preview}_preview`);
        targetElm.appendChild(imgElm);
        document.querySelector(`.opap_${obj.preview}_img`).value = resultValue;
        document.querySelector(`.${obj.preview}_image_delete`).style.display = "inline-block";
        if (index === 0) {
          document.querySelector(`.${obj.preview}_type_wrap`).style.display = "none";
          document.querySelector(`.${obj.preview}_type_title`).style.display = "none";
          document.querySelector(`.${obj.preview}_setting_image`).style.display = "none";
        }
      }
    };
  }

  /**
   * 全体削除時の処理
   */
  resetForm() {
    this.resetFormBt.addEventListener("click", () => {
      sessionStorage.clear();

      const deleteObjectStore = this.db.transaction(["images"], "readwrite").objectStore("images").clear();
      deleteObjectStore.onsuccess = (e) => console.log(e);

      this.createNodeObjects().map(e => {
        document.querySelector(`.opap_${e.name}`).value = "";
        e.value = "";
      });

      this.lists.map(e => {
        document.querySelector(`.opap_${e.name}`).value = "";
        e.value = "";
      });

      this.createImageObjects().forEach(obj => {
        document.querySelector(`.opap_${obj.preview}_img`).value = "";
        document.querySelector(`.${obj.preview}_image_delete`).style.display = "none";

        if (obj.preview === "bg") document.querySelector(`.${obj.preview}_setting_image`).style.display = "block";
      });

      const previewImage = document.querySelectorAll(".preview_image");
      if (previewImage) {
        previewImage.forEach(ele => ele.remove());
      }
    });
  }
}

const form = new Form();
