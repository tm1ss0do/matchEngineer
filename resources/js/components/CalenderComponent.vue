<template>
    <datepicker :format="DatePickerFormat" :bootstrap-styling="true" :language="ja" placeholder="日付を選択してください"></datepicker>
</template>

<script>
import Datepicker from 'vuejs-datepicker'
import {ja} from 'vuejs-datepicker/dist/locale'

  export default {
    name: 'app',
    data () {
      return {
        DatePickerFormat: 'yyyy-MM-dd',
        ja:ja
      }
    },
    components: {
      Datepicker
    }
  }
</script>
