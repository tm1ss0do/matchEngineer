<template>
  <section class="p-search__wrap">
    <form class="" action="" method="post">
      <div class="c-search__container--border">
        <span class="c-icon--center"><i class="fas fa-search"></i></span>
        <input v-model="searchText" class="c-input__text" type="text" placeholder="案件を検索する 例：デザイナー">
      </div>
      <div class="c-search__container">
        <div class="c-search__item--border">
          <select v-model="searchType" class="c-select" name="">
            <option value="">全ての案件種別</option>
            <option value="revenue">レベニューシェア</option>
            <option value="single">単発</option>
          </select>
        </div>
        <div class="c-search__item">
          <input v-model="searchStatus" class="c-input__check" type="checkbox" name="recruiting" value="recruiting">
          <label class="c-title--label-check">募集中のみ表示</label></br>
        </div>
      </div>
      <button class="c-btn--simple" type="submit" name="search" @click="clickSearch">検索</button>
    </form>
  </section>
</template>

<script>
    export default {
    props: ['data'],
        data: function() {
          return {
            searchText: "", //検索（文字）
            searchType: "", //検索（種別）
            searchStatus: "", //検索（状態）
          }
        },
        methods: {
          clickSearch: function(event){ //検索ボタンが押されたときの処理
            event.preventDefault(); //submitでポストするのを阻止

            //searchDataのなかへ、検索した結果を格納する
            var searchData = {};
            searchData['searchText'] = this.searchText;
            searchData['searchType'] = this.searchType;
            searchData['searchStatus'] = this.searchStatus;

            this.$emit("search", searchData);
          }
        },

    }
</script>
