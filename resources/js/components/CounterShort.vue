<template>

  <section class="">
    <input @keyup="inputText($event)" v-model.trim="title" :name="name" class="js-count-area" :id="id" :maxlength="countnum" :placeholder="ex" /></br>
    <span class="js-counter">{{ length }}/{{ countnum }}文字</span></br>
    <span>{{ error }}</span>
  </section>
</template>

<script>
    export default {
        props: ['countnum', 'ex', 'id','old','name'],
        data: function() {
          return {
            length: '0',
            error: '',
            title: this.old[this.name],
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
