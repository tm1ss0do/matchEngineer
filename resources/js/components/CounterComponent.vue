<template>
  <div class="c-comment__body">
    <textarea v-if="value && !message" @keyup="inputText($event)" v-model.trim="value" :name="name" class="js-count-area c-input__textarea" :id="id"  rows="8" cols="80" :placeholder="ex" :maxlength="countnum"></textarea>
    <textarea v-else @keyup="inputText($event)" v-model.trim="message" :name="name" class="js-count-area c-input__textarea" :id="id"  rows="8" cols="80" :placeholder="ex" :maxlength="countnum"></textarea>
    <span v-if="error" class="u-font--error">{{ error }}</span>
    <span v-if="oldvalue" class="u-font--s c-text--right">{{ this.old[this.name].replace(/\r?\n/g, '1').length }}/{{ countnum }}文字</span>
    <span v-else-if="dbvalue" class="u-font--s c-text--right">{{ JSON.stringify(this.db[this.name]).replace( /\\n/g , '1').length -2 }}/{{ countnum }}文字</span>
    <span v-else class="u-font--s c-text--right">{{ length }}/{{ countnum }}文字</span></br>
  </div>
</template>

<script>
    export default {
        props: ['countnum', 'ex', 'id', 'name', 'old', 'db'],
        data: function() {
          return {
            dbvalue: this.db[this.name], //dbの値が入っているか判定。dbの値を初期値にセット。
            oldvalue: this.old[this.name], //oldの値が入っているか判定。初期値をoldの値にセット。
            length: '0', //初期値
            error: '',
            value: this.db[this.name], //該当するdbの値
            message: this.old[this.name], //該当するoldの値
          }
        },
        methods: {
         inputText(event){ //textがinputされた時
           this.length = event.target.value.length; //長さ取得
           //ポストされるまでinputされた値を計測し続けるため、
           this.oldvalue = false; //oldの値は不要
           this.dbvalue = false; //dbの値も不要

           if( this.length > this.countnum ){
             this.error = this.countnum+'文字以内で入力してください';
           }else{
             this.error = '';
           }

           return this.length;
         },
        },
    }
</script>
