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

        <project-component
        :data="sliceData"
        ></project-component>

      <paginate
        :page-count="getPageCount"
        :page-range="3"
        :margin-pages="1"
        :click-handler="clickCallback"
        :prev-text="'＜'"
        :next-text="'＞'"
        :container-class="'c-pagination'"
        :page-class="'c-pagination__item'">
      </paginate>

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
                sliceData: [],
                loading: true,
                errored: false,
                from: "", //表示している件数の最初の番号
                to: "", //表示している件数の最後の番号
                total: "",//該当の全件数

                currentPage: 1, //現在のページ番号
                parPage: 3, //1ページに表示する件数

            }
        },
        methods: {
          clickCallback: function (pageNum) {
            //ページネーション のページ番号が押されたときの処理
             this.currentPage = Number(pageNum);
             //現在のページのアイテムを返す
             let current = this.currentPage * this.parPage;
             console.log('current:' + current);
             let start = current - this.parPage;
             console.log('start:' + start);
             //表示件数の始め
             this.from = start + 1;
             //表示件数の終わり
             if( current > this.total ){
               this.to = this.total;
             }else{
               this.to = current;
             }
             // console.log(this.data.slice(start, current));
             this.sliceData = this.data.slice(start, current);
          }
        },
        computed: {
            // getItems: function() { //現在のページのアイテムを返す
            // let current = this.currentPage * this.parPage;
            // console.log('current:' + current);
            // let start = current - this.parPage;
            // console.log('start:' + start);
            //表示件数の始め
            // this.from = start + 1;
            // //表示件数の終わり
            // if( current > this.total ){
            //   this.to = this.total;
            // }else{
            //   this.to = current;
            // }
            // // console.log(this.data.slice(start, current));
            // return this.data.slice(start, current);
            // },
           getPageCount: function() { //総ページ数を返す・初期処理

            //初期処理ーーーーーー
             //現在のページのアイテムを返す
             //表示件数の終わり
             let current = this.currentPage * this.parPage;
             if( current > this.total ){
               this.to = this.total;
             }else{
               this.to = current;
             }
             //表示件数の始め
             let start = current - this.parPage;
             this.from = start + 1;
             //初期表示データ
             this.sliceData = this.data.slice(start, current);
            //ーーーーーーーーーーーー

            //総ページ数を返すーーーーーー

            var numberOfProjects = Object.keys(this.data).length; //該当の全件数
            this.total = numberOfProjects;
            var totalPage = Math.ceil(numberOfProjects / this.parPage);
            console.log('totalPage:' + totalPage);
            //総ページ返却
            return totalPage;
            //ーーーーーーーーーーーー
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
