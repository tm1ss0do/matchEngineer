<template>
  <section class="c-input__line">
    <input class="c-input__text" @change="setImage" ref="file" id="profile_icon" type="file" name="profile_icon" value="old.profile_icon"></br>
    <div class="c-img__container--midi">
      <img v-if="data.image" class="js-preview c-img__img" :src="data.image" alt="">
      <img v-else-if="this.icon" class="js-preview c-img__img" :src="src" alt="">
      <img v-else class="js-preview c-img__img" :src="this.default" alt="">
    </div>
  </section>
</template>

<script>
    export default {
      props:['icon', 'src', 'default'],
      data () {
        return {
          data: {
            image: "",
            name: "",
          }

        }
      },
      methods: {
        setImage(e){ //fileが変更された時（ユーザーが画像をアップロードしたとき）の処理
          const files = this.$refs.file; //DOMを参照
            const fileImg = files.files[0]; //ファイルのdataを取得
            if (fileImg.type.startsWith("image/")) { //画像か判定（"image/"で始まっているか）
              this.data.image = window.URL.createObjectURL(fileImg); //srcにURLを生成し指定
              this.data.name = fileImg.name;
              this.data.type = fileImg.type;
            }
        }
      },
    }

</script>
