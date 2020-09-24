<template>

  <section class="">
    <textarea v-model="message" class="js-count-area" :id="id" :name="name" rows="8" cols="80" :placeholder="ex"></textarea></br>
    <span class="js-counter">{{ getLength }}/{{ countnum }}文字</span></br>
  </section>
</template>

<script>
    export default {
        props: ['countnum', 'ex', 'id', 'name'],
        data: function() {
          return {
            message: '',
          }
        },
        computed: {
          getLength: function() {
            return this.message.length;
          },
        },
        mounted () {

        }

    }
</script>
