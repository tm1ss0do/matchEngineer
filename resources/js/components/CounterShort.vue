<template>
  <section class="c-input__line">
    <input v-if="value && !title" @keyup="inputText($event)" type="text" v-model.trim="value" :name="name" class="c-input__text" :id="id" :maxlength="countnum" :placeholder="ex" />
    <input v-else @keyup="inputText($event)" type="text" v-model.trim="title" :name="name" class="c-input__text" :id="id" :maxlength="countnum" :placeholder="ex" />
    </br>
    <span v-if="error" class="u-font--error">{{ error }}</span>
    <span v-if="oldvalue" class="u-font--s c-text--right">{{ this.old[this.name].replace(/\r?\n/g, '1').length }}/{{ countnum }}文字</span>
    <span v-else-if="dbvalue" class="u-font--s c-text--right">{{ JSON.stringify(this.db[this.name]).replace( /\\n/g , '1').length -2 }}/{{ countnum }}文字</span>
    <span v-else class="u-font--s c-text--right">{{ length }}/{{ countnum }}文字</span>
  </section>
</template>

<script>
    export default {
        props: ['countnum', 'ex', 'id', 'old', 'name', 'db'],
        data: function() {
          return {
            dbvalue: this.db[this.name], //dbの値が入っているか判定。dbの値を初期値にセット。
            oldvalue: this.old[this.name], //oldの値が入っているか判定。oldの値を初期値にセット。
            length: '0', //初期値
            error: '',
            title: this.old[this.name], //dbの値
            value: this.db[this.name], //oldの値
          }
        },
        methods: {
         inputText(event){ //textがinputされた時
           this.length = event.target.value.length; //長さ取得
           this.oldvalue = false; //oldの値は不要
           this.dbvalue = false; //dbの値は不要

           if( this.length > this.countnum ){
             this.error = this.countnum+'文字以内で入力してください';
           }else{
             this.error = '';
           }

           return this.length;
         }
       },

    }
</script>
