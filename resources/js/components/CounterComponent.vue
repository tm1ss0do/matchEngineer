<template>

  <section class="p-search">
    <textarea v-model="detail" class="js-count-area" id="案件詳細" name="project_detail_desc" rows="8" cols="80" placeholder="例：既存ブログサイトのデザインを変えたいです。優しいデザインが得意な方を募集します。"></textarea></br>
    <span class="js-counter">{{ getLength }}/5000文字</span></br>
  </section>
</template>

<script>
    export default {
        data: function() {
          return {
            detail: '',
          }
        },
        computed: {
          getLength: function() {
            return this.detail.length;
          },
        },
        mounted () {

        }

    }
</script>
