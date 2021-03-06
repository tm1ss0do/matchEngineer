<template>

  <section class="p-projects">
    <section v-if="errored" class="p-error__wrap">
      <p class="u-font--sub">
      現在、この情報を取得できません。しばらくしてからもう一度お試しください
      </p>
    </section>

    <section v-else class="p-projects__list">
      <div v-if="loading" class="u-font--sub" >Now Loading...</div>
      <div v-else class="p-projects__wrap">
        <search-component
          :data="data"
          @search="searchProject($event)"
        ></search-component>

        <p class="u-font--sub">{{ from }} 〜 {{ to }}件 / {{ total }}件中</p>

        <project-component
        :url = "url"
        :getItems = "getItems"
        :searchNotFlg = "searchNotFlg"
        ></project-component>

        <div class="p-pagination">
          <paginate
            :page-count="getPageCount"
            :page-range="3"
            :margin-pages="2"
            :click-handler="paginateCallback"
            :prev-text="'＜'"
            :next-text="'＞'"
            :container-class="'c-pagination__container'"
            :page-class="'c-pagination__item'"
            :page-link-class="'c-pagination__link'"
            :prev-class="'c-pagination__item-prev'"
            :prev-link-class="'c-pagination__link-prev'"
            :next-class="'c-pagination__item-next'"
            :next-link-class="'c-pagination__link-next'"
            :active-class="'u-pagination--active'"
            :disabled-class="'u-pagination--disable'">
          </paginate>
        </div>

      </div>

    </section>
  </section>
</template>

<script>
    export default {
        props: ['url'],
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
                parPage: 10, //1ページに表示する件数
            }
        },
        methods: {
          paginateCallback: function (pageNum) {
              //ページネーションのページ番号が押されたときの処理
              this.currentPage = Number(pageNum);
              //現在のページのアイテムを返す
              let current = this.currentPage * this.parPage;
              let start = current - this.parPage;

              //表示件数の始め
              this.from = start + 1;
              //表示件数の終わり
              if( current > this.total ){
                this.to = this.total;
              }else{
                this.to = current;
              }
              //dataの該当箇所のみ表示
              if(this.searchNotFlg){
                //検索結果がなかった場合
                this.sliceData = this.data.slice(start, current);
              }else{
                //検索結果があった場合
                this.sliceData = this.filterData.slice(start, current);
              }
              this.$scrollTo('#app', 1000, {offset: -60});
            },
         searchProject: function(searchData){
            //現在のページを設定
            this.currentPage = 1;

            //検索で一致するデータを filterData に格納=======================
            //文字検索があった場合
            if(searchData['searchText']){
              var filterData = this.data.filter(function(project){
                // titleMatchData：project_titleに合致するもの
                var titleMatchData = String(project.project_title).match(searchData['searchText']);

                // detailMatchData：project_detail_descに合致するもの
                var detailMatchData = String(project.project_detail_desc).match(searchData['searchText']);

                // project_detail_desc または project_title に合致するデータを返却
                var MatchTextData = titleMatchData || detailMatchData;
                return MatchTextData;
              });
            }else{
              var filterData = this.data;
            }

            //ステータスが"true"に絞られていた場合(募集中の案件のみ表示)
            if(searchData['searchStatus']){
              var filterData = filterData.filter(function(project){
                return !project.project_status;
              });
            }

            //種別が指定されていた場合
            if(searchData['searchType']){
              var searchType = searchData['searchType'];

              var filterData = filterData.filter(function(project){
                if(searchType === 'revenue'){
                  return String(project.project_type).match('revenue');
                }else if(searchType === 'single'){
                  return String(project.project_type).match('single');
                }
              });
            }
            //==============================================

            //検索結果数=======================
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
            //==============================================

            //検索結果に合致するデータを返す
            return filterData;

          }
        },
        computed: {
          getItems: function() { //現在のページのアイテムを返す

            let current = this.currentPage * this.parPage;

            let start = current - this.parPage;

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

            return useData.slice(start, current);

          },
          getPageCount: function() { //総ページ数を返す
            //検索していた場合、表示データ(useData)としてfilterDataを格納
            if(this.searchNotFlg){ //検索結果がない
              var useData = this.data;
            }else{
              var useData = this.filterData;
            }

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
