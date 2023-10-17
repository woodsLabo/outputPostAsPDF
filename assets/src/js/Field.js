class Field {
  /**
   * constructor.
   */
  constructor() {
    this.selectOutput = document.querySelectorAll(".js-selectOutput");
    this.field = document.querySelector(".js-field");
    this.mediaButton = document.querySelectorAll(".js-mediaSelect");
    this.settingImage = document.querySelectorAll(".js-settingImage");
    this.hiddenImageUrl = document.querySelectorAll(".js-hiddenImageUrl");
    this.mediaDeleteButton = document.querySelectorAll(".js-mediaDelete");
    this.image_url;
    this.selectState;

    this.handleSelect();
    this.initTinyMce();
    this.selectImage();
    this.imageDelete();
  }

  /**
   * handleSelect.
   * @desc pdf出力選択
   */
  handleSelect() {
    this.selectOutput.forEach(button => {
      button.addEventListener("click", () => {
        this.selectState = button.value === "1" ? "block" : "none";
        this.field.style.display = this.selectState;
      });
    });
  }

  /**
   * initTinyMce.
   * @desc textareaにtinymceを設定
   */
  initTinyMce() {
    tinymce.init({
      selector: "textarea.has_tinymce",
    });
  }

  /**
   * selectImage.
   * @desc 画像選択処理
   */
  selectImage() {
    this.mediaButton.forEach((button, index) => {
      button.addEventListener("click", () => {
        const custom_uploader = wp.media({
          title: "画像を選択",
          button: {
            text: "画像を設定"
          },
          library: {
            type: "image"
          },
          multiple: false
        });

        custom_uploader.open();

        this.imageUpLoader(custom_uploader, index);
      });
    });
  }

  /**
   * imageUpLoader.
   * @desc 画像をアップロード
   *
   * @param {object} uploader - 選択した画像の情報
   * @param {number} index - 選択対象のインデックス
   */
  imageUpLoader(uploader, index) {
    uploader.on("select", () => {
      const images = uploader.state().get("selection");
      images.forEach(file => this.image_url = file.attributes.url);
      this.settingImage[index].src = this.image_url;
      this.hiddenImageUrl[index].value = this.image_url;
    });
  }

  /**
   * imageDelete.
   * @desc 選択している画像を削除
   */
  imageDelete() {
    this.mediaDeleteButton.forEach((button, index) => {
      button.addEventListener("click", () => {
        this.settingImage[index].src = "";
        this.hiddenImageUrl[index].value = "";
      });
    });
  }
}

window.addEventListener("load", () => {
  const field = new Field();
});
