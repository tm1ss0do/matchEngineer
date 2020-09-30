<template>
  <div class="c-comment__body">
    <textarea @keyup="inputText($event)" v-model.trim="message" :name="name" class="js-count-area c-input__textarea" :id="id"  rows="8" cols="80" :placeholder="ex" :maxlength="countnum"></textarea>
    <span class="js-counter u-font__ss">{{ length }}/{{ countnum }}文字</span></br>
    <span class="u-font__error">{{ error }}</span>
  </div>
</template>

<script>
    export default {
        props: ['countnum', 'ex', 'id', 'name', 'old'],
        data: function() {
          return {
            length: '0',
            error: '',
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
        mounted () {

        }

    }
</script>
