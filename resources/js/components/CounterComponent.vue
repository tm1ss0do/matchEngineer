<template>
  <div class="c-comment__body">
    <textarea v-if="value && !message" @keyup="inputText($event)" v-model.trim="value" :name="name" class="js-count-area c-input__textarea" :id="id"  rows="8" cols="80" :placeholder="ex" :maxlength="countnum"></textarea>
    <textarea v-else @keyup="inputText($event)" v-model.trim="message" :name="name" class="js-count-area c-input__textarea" :id="id"  rows="8" cols="80" :placeholder="ex" :maxlength="countnum"></textarea>
    <span v-if="error" class="u-font__error">{{ error }}</span>
    <span class="u-font__s c-text__right">{{ message.length }}/{{ countnum }}文字</span></br>
  </div>
</template>

<script>
    export default {
        props: ['countnum', 'ex', 'id', 'name', 'old', 'db'],
        data: function() {
          return {
            length: '0',
            error: '',
            value: this.db[this.name],
            message: this.old[this.name],
          }
        },
        methods: {
         inputText(event){
              this.length = event.target.value.length;

              if( this.length > this.countnum ){
                this.error = this.countnum+'文字以内で入力してください';
              }else{
               this.error = '';
              }

             return this.length;
         },
        },
        conputed: {

        },
        mounted () {

        }

    }
</script>
