<template>
  <div class="p-comments__content">
    <section v-if="errored" class="p-error__wrap">
      <p class="u-font--sub">
      現在、この情報を取得できません。しばらくしてからもう一度お試しください
      </p>
    </section>

    <section v-else class="p-comments__list">
      <div v-if="loading" class="u-font--sub">Now Loading...</div>
      <div v-else class="p-comments__wrap">
        <div class="c-comment" v-if="publicmsgs">
          <p class="u-font--s">{{ publicmsgs.length }}件のメッセージがあります。</p>
           <div v-if="publicmsgs.length > 5 && !getAll">
            <p class="u-font--s">最新の4件を表示中</p>
            <p @click="getMsg" class="c-btn--moderate">全件表示する</p>
              <div class="c-comment__wrap" v-for="msg in publicmsgs.slice(-4, publicmsgs.length)" >
                <div class="c-comment__header">
                  <span class="c-comment__info">
                    From:
                    <a v-if="msg.user.name" class="c-comment__link" :href="'/projects/'+msg.user.id+'/profile'" >
                      {{ msg.user.name }}
                    </a>
                    <span v-else >このユーザーは退会しています</span>
                  </span>
                </div>
                <div class="c-comment__body u-indention">{{ msg.content }}</div>
                <div class="c-comment__footer">
                  <span class="c-comment__info" >送信日：{{ msg.send_date }}</span>
                </div>
              </div>
           </div>
           <div v-else>
            <p class="u-font--s">全件表示中</p>
            <p v-if="publicmsgs.length > 5" @click="closeMsg" class="c-btn--moderate">最新のコメントだけ表示する</p>
             <div class="c-comment__wrap" v-for="msg in publicmsgs" >
               <div class="c-comment__header">
                 <span class="c-comment__info">
                   From:
                   <a v-if="msg.user.name" class="c-comment__link" :href="'/projects/'+msg.user.id+'/profile'" >
                     {{ msg.user.name }}
                   </a>
                   <span v-else >このユーザーは退会しています</span>
                 </span>
               </div>
               <div class="c-comment__body u-indention">{{ msg.content }}</div>
               <div class="c-comment__footer">
                 <span class="c-comment__info" >送信日：{{ msg.send_date }}</span>
               </div>
             </div>
           </div>
        </div>
        <p v-else class="u-font--sub">
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
          getAll: false, //全てのコメントを表示するか
        }
      },
      methods: {
        getMsg(){ //全て表示する
          this.getAll = true;
        },
        closeMsg(){ //全て表示しない
          this.getAll = false;
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
