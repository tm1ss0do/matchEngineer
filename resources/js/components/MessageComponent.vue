<template>
  <div>
    <section v-if="errored">
      <p>
      現在、この情報を取得できません。しばらくしてからもう一度お試しください
      </p>
    </section>

    <section v-else>
      <div v-if="loading">Now Loading...</div>
      <div v-else>
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
    </section>
  </div>
</template>

<script>
  export default {
    props:['project'],
    data () {
      return {
        publicmsgs: [], //関連するメッセージをjson形式で取得
        loading: true,
        errored: false,
      }
    },
    mounted () {
      //非同期通信を使い、json形式で該当の情報を取得
      var self = this;
      var url = '/projects/' + self.project.id + '/msg_json'; //取得対象をdataに格納
      axios
        .get(url)
        .then(response => (self.publicmsgs = response.data))
        .catch(function (error) {
          console.log(error);
          self.errored = true
        })
        .finally(
          () => self.loading = false
          )
    }
  }
</script>
