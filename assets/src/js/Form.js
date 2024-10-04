class Form {
  constructor() {
    this.onLoad();
  }

  /**
   * ロード時のイベント
   */
  onLoad() {
    window.addEventListener("load", () => {
      this.pdfTypes = document.querySelectorAll(".pdf_types");
      this.bgTypesWrap = document.querySelector(".bg_type_wrap");
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
      this.resetFormBt = document.querySelector(".js-reset-form-bt");

      this.eventListener();
    });
  }

  /**
   * 各イベントをまとめる
   */
  eventListener() {
    const nodeObjects = this.createNodeObjects();
    const selectObjects = this.createSelectObjects();
    const imageObjects = this.createImageObjects();

    // init sessionStrage
    selectObjects.map(e => this.initSessionStrageSelect(e));
    nodeObjects.map(e => this.initSessionStrageText(e));
    this.lists.map(e => this.initSessionStrageText(e));
    imageObjects.map(e => this.initSessionStrageImage(e));

    this.initImagePreview();

    // this.selectPdfType();
    // this.selectTypes(this.pdfTypes, "pdf");
    // this.selectTypes(this.bgTypes, "bg");
    selectObjects.map(e => this.selectTypes(e));
    nodeObjects.map(e => this.handleFormChange(e));
    this.lists.map(e => this.handleFormChange(e));

    this.resetForm();
    this.fittingFontSize(this.detailItemPlace, "place", 20);
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
        ele: this.bgTypes,
        type: "bg",
      }
    ];
  }

  /**
   * ラジオボタンセレクトを検知
   * @return {Object} object - ラジオボタン要素のオブジェクト
   */
  selectTypes(object) {
    const opapType = document.querySelector(`.opap_${object.type}_type`);

    object.ele.forEach(e => {
      if (e.checked) opapType.value = e.value; // select type init
      e.addEventListener("change", (e) => { // typeの変更をハンドリング
        opapType.value = e.target.value;
        this.setSessionStrage(`${object.type}_type`, e.target.value);
        // 選択状態によってリストの表示非表示設定
        if (object.type === "pdf") {
          this.settingShowList(e.target.value === "a" ? "none" : "block");
          this.message.rows = e.target.value === "a" ? "4" : "2";
        }

        if (object.type === "bg") {
          this.bgSettingImage.setAttribute("src", e.target.value);
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
  }

  /**
   * 入力を検知
   *
   * @param {Object} object - 検知対象のオブジェクト
   */
  handleFormChange(node) {
    node.addEventListener("change", (e) => {
      document.querySelector(`.opap_${node.name}`).value = e.target.value;
      this.setSessionStrage(node.name, e.target.value);
    });
    node.addEventListener("keyup", (e) => {
      document.querySelector(`.opap_${node.name}`).value = e.target.value;
      this.setSessionStrage(node.name, e.target.value);
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

    imageObjects.forEach(obj => {
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
            this.bgSettingImage.style.display = "none";
          }

          document.querySelector(`.opap_${obj.preview}_img`).value = e.target.result;
          this.setSessionStrage(obj.preview, e.target.result);
          this.setSessionStrage(`${obj.preview}_img`, file.name);
        });
      });
    });
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
   * @param {Object} imageObjects - 画像の設定配列オブジェクト
   * @param {Number} index - 配列のindex指定
   */
  deleteMedia(imageObjects, index) {
    document.querySelector(`.${imageObjects[index].preview}_preview .preview_image`).remove();
    document.querySelector(`.opap_${imageObjects[index].preview}_img`).value = "";
    document.querySelector(`.${imageObjects[index].preview}_image`).value = "";
    document.querySelector(`.${imageObjects[index].preview}_image_delete`).style.display = "none";
    if (index === 0) {
      document.querySelector(`.${imageObjects[index].preview}_type_wrap`).style.display = "block";
      this.bgSettingImage.style.display = "block";
    }
  }

  fittingFontSize(ele, strage, fontSize) {
    const targetFontLength = ele.value.length;
    const sizeDownLenght = 14;
    if (targetFontLength > sizeDownLenght) this.setSessionStrage(`${strage}_size`, fontSize);
  }

  /**
   * sessionStrageに入力値を保存
   * 画像は容量の問題でstrageに含めない
   *
   * @param {String} key - nodeのname
   * @param {String} value - 値
   * @return {Object} sessionStrageのデータ
   */
  setSessionStrage(key, value) {
    if (key !== "bg" && key !== "qr" && key !== "profile") return sessionStorage.setItem(key, value);
  }

  initSessionStrageSelect(object) {
    object.ele.forEach(e => {
      if (e.value === sessionStorage.getItem(`${object.type}_type`)) {
        e.checked = true;
        document.querySelector(`.opap_${object.type}_type`).value = e.value;
      }
    });
  }

  /**
   * sessionStrageに入っているテキストをフォームに返す
   *
   * @param {Object} node - 対象のnode
   */
  initSessionStrageText(node) {
    document.querySelector(`.${node.name}`).value = sessionStorage.getItem(node.name) !== null ? sessionStorage.getItem(node.name) : "";
    document.querySelector(`.opap_${node.name}`).value = sessionStorage.getItem(node.name) !== null ? sessionStorage.getItem(node.name) : "";
  }

  /**
   * sessionStrageに入っている画像をフォームに返す
   * @param {Object} obj - 画像の設定オブジェクト
   */
  initSessionStrageImage(obj) {
    if (sessionStorage.getItem(obj.preview) !== null) {
      const imgElm = document.createElement("img");
      imgElm.className = "preview_image";
      imgElm.src = sessionStorage.getItem(obj.preview);
      const targetElm = document.querySelector(`.${obj.preview}_preview`);
      targetElm.appendChild(imgElm);
      document.querySelector(`.opap_${obj.preview}_img`).value = sessionStorage.getItem(obj.preview);
      document.querySelector(`.${obj.preview}_image_delete`).style.display = "inline-block";
    }
  }

  /**
   * 全体削除時の処理
   */
  resetForm() {
    this.resetFormBt.addEventListener("click", () => {
      sessionStorage.clear();

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
      });

      if (this.previewImage) {
        this.previewImage.forEach(ele => ele.remove());
      }
    });
  }
}

const form = new Form();
