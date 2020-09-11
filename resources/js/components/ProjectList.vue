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

      <search-component
        :data="data"
        @search="searchProject($event)"
      ></search-component>

      <p>{{ from }} 〜 {{ to }}件 / {{ total }}件中</p>

      <project-component
      :getItems = "getItems"
      :searchNotFlg = "searchNotFlg"
      ></project-component>

      <paginate
        :page-count="getPageCount"
        :page-range="3"
        :margin-pages="2"
        :click-handler="paginateCallback"
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
        data: function() {
            return {
                data: [], //projectのデータ一覧(json形式で取得)
                sliceData: [], //ページネーション表示用データを格納
                filterData: [], //検索表示用データを格納
                loading: true,
                errored: false,
                searchNotFlg: false, //検索結果フラグ
                from: "", //表示している件数の最初の番号
                to: "", //表示している件数の最後の番号
                total: "",//該当の全件数
                currentPage: 1, //現在のページ番号
                parPage: 2, //1ページに表示する件数

            }
        },
        methods: {
          paginateCallback: function (pageNum) {
            //ページネーションのページ番号が押されたときの処理
             this.currentPage = Number(pageNum);
             //現在のページのアイテムを返す
             let current = this.currentPage * this.parPage;
             // console.log('current:' + current);
             let start = current - this.parPage;
             // console.log('start:' + start);
             //表示件数の始め
             this.from = start + 1;
             //表示件数の終わり
             if( current > this.total ){
               this.to = this.total;
             }else{
               this.to = current;
             }
             //dataの該当箇所のみ表示
             // console.log(this.data.slice(start, current));
             if(this.searchNotFlg){
              //検索結果がなかった場合
              this.sliceData = this.data.slice(start, current);
             }else{
              //検索結果があった場合
             this.sliceData = this.filterData.slice(start, current);
             }
          },
          searchProject: function(searchData){
            //現在のページを設定
            this.currentPage = 1;
            //検索結果のデータをfilterDataに格納

            //console.log('emitで来たsearchData：' + searchData);
            //var searchText = searchData['searchText'];
            //console.log('searchText:'+ searchData['searchText']);

            //var filterData = [];

            //データから一致するデータを取得
            //ステータスが"true"だった場合
            //if(searchData['searchStatus'])
            //{
            //  var filterData = this.data.filter(function(project){
            //      var filterData = String(project.id).match(1);
            //      console.log('filterData:'+filterData);
            //      //return filterData;
            //  });
            //}else{
            //  var filterData = this.data;
            //}

            //検索文字があった場合
            if(searchData['searchText'])
            {
              console.log('searchText:'+ searchData['searchText']);

              var filterData = this.data.filter(function(project){
                 return String(project.name).match(searchData['searchText']);
              });
              console.log( 'filterData:' + filterData);
            }else{
              var filterData = this.data;
            }


            //var filtered = searchData.filter(function(project){

              //検索文字があった場合
              //if(searchData['searchText']){
              //  var matchData = String(project.name).match(searchData['searchText']);
              //}

              //種別が検索されていた場合

              //console.log('textMatch:'+ textMatch);

              //return String(project.name).match(searchText);
              //return matchData;
            //});



            //検索結果数
            var numberOfFilterData = Object.keys(filterData).length;
            if(numberOfFilterData){
              //検索結果があった場合)(検索結果を表示)
              this.searchNotFlg = false;
              this.filterData = filterData;
            }else{
              //検索結果がなかった場合(メッセージを表示・全件のデータを格納)
              this.searchNotFlg = true;
              this.filterData = this.data;
            }

            //検索結果に合致するデータを返す
            return filterData;

          }
        },
        computed: {
            getItems: function() { //現在のページのアイテムを返す
                let current = this.currentPage * this.parPage;
                // console.log('current:' + current);
                let start = current - this.parPage;
                // console.log('start:' + start);
                // 表示件数の始め
                  this.from = start + 1;
                //表示件数の終わり
                if( current > this.total ){
                  this.to = this.total;
                }else{
                  this.to = current;
                }

                //検索していた場合、表示データ(useData)としてfilterDataを格納
                 if(this.searchNotFlg){ //検索結果がない
                  var useData = this.data;
                 }else{
                  var useData = this.filterData;
                 }
                 //console.log(this.data.slice(start, current));
                return useData.slice(start, current);

            },
           getPageCount: function() { //総ページ数を返す
             //検索していた場合、表示データ(useData)としてfilterDataを格納
             if(this.searchNotFlg){ //検索結果がない
                var useData = this.data;
              }else{
                var useData = this.filterData;
              }
             //console.log(this.data.slice(start, current));
             //該当の全件数
                var numberOfProjects = Object.keys(useData).length;
                this.total = numberOfProjects;
                var totalPage = Math.ceil(numberOfProjects / this.parPage);
              //総ページ返却
                return totalPage;
           }
         },
        mounted () {
          //非同期通信を使い、json形式で該当の情報を取得
          var self = this;
          var url = '/projects/json'; //取得対象をdataに格納
          axios
            .get(url)
            .then(response => (self.data = response.data, self.filterData = response.data))
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
