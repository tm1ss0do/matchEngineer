<template>
  <div>
  メッセージコンポーネント！
  <div v-if="publicmsgs">

  <p v-for="msg in publicmsgs" >
  メッセージ{{ msg.id }}：
  {{ msg.content }}
  {{ msg.user.name }}
  </p>

  </div>
  <p v-else>
  まだメッセージはありません。
  </p>
  </div>
</template>

<script>
  export default {
    props:['publicmsgs'],
    data () {
      return {

      }
    },
  }
</script>
