<template>

  <section class="">
    <textarea @keyup="inputText($event)" class="js-count-area" :id="id" :name="name" rows="8" cols="80" :placeholder="ex">{{ value }}</textarea></br>
    <span class="js-counter">{{ length }}/{{ countnum }}文字</span></br>
  </section>
</template>

<script>
    export default {
        props: ['countnum', 'ex', 'id', 'name', 'value'],
        data: function() {
          return {
            length: '0'
          }
        },
        methods: {
         inputText(event){
             return this.length = event.target.value.length;
         }
        },
        mounted () {

        }

    }
</script>
