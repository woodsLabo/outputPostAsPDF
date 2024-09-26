class Form {
  constructor() {
    this.onLoad();
  }

  /**
   * ロード時のイベント
   */
  onLoad() {
    window.addEventListener("load", () => {
      this.types = document.querySelectorAll(".types");
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
      this.listStatus = Array.from(document.querySelectorAll(".list_status")); // 配列にキャスト
      this.message = document.querySelector(".message");
      this.seminarText = document.querySelector(".seminar_text");
      this.seminarUrl = document.querySelector(".seminar_url");
      this.profileTitle = document.querySelector(".profile_title");
      this.profileName = document.querySelector(".profile_name");
      this.profileText = document.querySelector(".profile_text");
      this.profileCompany = document.querySelector(".contact_company");
      this.profileTel = document.querySelector(".contact_tel");
      this.profileMail = document.querySelector(".contact_mail");
      this.qrImage = document.querySelector(".qr_image");
      this.profileImage = document.querySelector(".profile_image");
      this.previewImage = document.querySelectorAll(".preview_image");
      this.qrImageBtn = document.querySelector(".qr_image_select");
      this.profileImageBtn = document.querySelector(".profile_image_select");
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

    // init sessionStrage
    nodeObjects.map(e => this.initSessionStrageText(e, "node"));
    this.lists.map(e => this.initSessionStrageText(e, "list"));
    this.initSessionStrageImage();

    this.initImagePreview();



    this.selectPdfType();
    nodeObjects.map(e => this.handleFormChange(e));
    this.lists.map(e => this.handleFormChange(e));

    this.resetForm();
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
        ele: this.qrImage,
        preview: "qr",
      },
      {
        ele: this.profileImage,
        preview: "profile",
      }
    ];
  }

  /**
   * pdfタイプを選択
   */
  selectPdfType() {
    const opapPdfType = document.querySelector(".opap_pdf_type");

    this.types.forEach(e => {
      if (e.checked) opapPdfType.value = e.value; // select type init
      e.addEventListener("change", (e) => { // typeの変更をハンドリング
        opapPdfType.value = e.target.value;
        this.setSessionStrage("type", e.target.value);
        // 選択状態によってリストの表示非表示設定
        this.settingShowList(e.target.value === "a" ? "none" : "block");
      });
    });

    // リストの初期表示設定
    this.settingShowList(opapPdfType.value === "a" ? "none" : "block");
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
    this.qrImageBtn.addEventListener("click", () => imageObjects[0].ele.click());
    this.profileImageBtn.addEventListener("click", () => imageObjects[1].ele.click());
    this.qrImageDeleteBtn.addEventListener("click", () => this.deleteMedia(imageObjects, 0));
    this.profileImageDeletBtn.addEventListener("click", () => this.deleteMedia(imageObjects, 1));

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
          document.querySelector(`.opap_${obj.preview}_img`).value = e.target.result;
          this.setSessionStrage(obj.preview, e.target.result);
          this.setSessionStrage(`${obj.preview}_img`, file.name);
        });
      });
    });
  }

  settingShowList(status) {
    const handleListIndexs = ["07", "08", "09", "10"];
    handleListIndexs.forEach((e, index) => {
      this.listStatus[index].style.display = status;
      document.querySelector(`.list_${e}`).style.display = status;
    });
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
    document.querySelector(`.${imageObjects[index].preview}_image_delete`).style.display = "none";
    sessionStorage.removeItem(imageObjects[index].preview);
  }

  /**
   * sessionStrageに入力値を保存
   *
   * @param {String} key - nodeのname
   * @param {String} value - 値
   * @return {Object} sessionStrageのデータ
   */
  setSessionStrage(key, value) {
    return sessionStorage.setItem(key, value);
  }

  /**
   * sessionStrageに入っているテキストをフォームに返す
   *
   * @param {Object} node - 対象のnode
   * @param {Sring} type - nodeの種類
   */
  initSessionStrageText(node, type) {
    document.querySelector(`.${node.name}`).value = sessionStorage.getItem(node.name) !== null ? sessionStorage.getItem(node.name) : "";
    document.querySelector(`.opap_${node.name}`).value = sessionStorage.getItem(node.name) !== null ? sessionStorage.getItem(node.name) : "";

    if (type === "node") {
      this.types.forEach(e => {
        if (e.value === sessionStorage.getItem("type")) {
          e.checked = true;
          document.querySelector(".opap_pdf_type").value = e.value;
        }
      });
    }
  }

  /**
   * sessionStrageに入っている画像をフォームに返す
   */
  initSessionStrageImage() {
    const imageObjects = this.createImageObjects();
    imageObjects.forEach(obj => {
      if (sessionStorage.getItem(obj.preview) !== null) {
        const imgElm = document.createElement("img");
        imgElm.className = "preview_image";
        imgElm.src = sessionStorage.getItem(obj.preview);
        const targetElm = document.querySelector(`.${obj.preview}_preview`);
        targetElm.appendChild(imgElm);
        document.querySelector(`.opap_${obj.preview}_img`).value = sessionStorage.getItem(obj.preview);
        document.querySelector(`.${obj.preview}_image_delete`).style.display = "inline-block";
      }
    });
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
