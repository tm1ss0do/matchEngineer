<template>

  <section class="c-input__line">
    <input v-if="value && !title" @keyup="inputText($event)" type="text" v-model.trim="value" :name="name" class="c-input__text" :id="id" :maxlength="countnum" :placeholder="ex" />
    <input v-else @keyup="inputText($event)" type="text" v-model.trim="title" :name="name" class="c-input__text" :id="id" :maxlength="countnum" :placeholder="ex" />
    </br>
    <span class="u-font__s c-text__righ">{{ length }}/{{ countnum }}文字</span></br>
    <span v-if="error" class="u-font__error">{{ error }}</span>
  </section>
</template>

<script>
    export default {
        props: ['countnum', 'ex', 'id', 'old', 'name', 'db'],
        data: function() {
          return {
            length: '0',
            error: '',
            title: this.old[this.name],
            value: this.db[this.name],
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
         }
        },
        mounted () {

        }

    }
</script>
