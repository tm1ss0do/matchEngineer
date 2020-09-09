<template>

<div class="">
  I'm an ProjectList Compoent.
  

  <section v-if="errored">
    <p>
    現在、この情報を取得できません。しばらくしてからもう一度お試しください
    </p>
  </section>

  <section v-else>
    <div v-if="loading">Now Loading...</div>
    <div v-else>

      <search-component>
      </search-component>

      <p>{{ from }} 〜 {{ to }}件 / {{ total }}件中</p>

      <pagination-component :data="data" v-model="page" :length="length" :total-visible="10"></pagination-component>

      <project-component
          :data = "data"
      ></project-component>

    </div>

  </section>

</div>
</template>

<script>
    export default {
    props: [],
        data: function() {
            return {
                data: [], //projectのデータ一覧(json形式で取得)
                loading: true,
                errored: false,
                page: 1, //表示中のページ番号
                length: 3, //表示するページリンクの上限
                from: "", //一覧の開始
                to: "", //一覧の終了
                total: "" //件数
            }
        },
        mounted () {
          var self = this;
          var url = '/projects/json';
          axios
            .get(url)
            .then(response => (self.data = response.data))
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
