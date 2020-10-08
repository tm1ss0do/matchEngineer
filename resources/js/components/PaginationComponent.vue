<-- 破棄予定 -->
<template>
  <div class="">
     <ul v-for="project in getItems">
       <li>
         {{ project.id }}:
         {{ project.name }}
       </li>
     </ul>
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
</template>

<script>
    export default {
    props: ['data'],
        data: function() {
            return {
                projects: [],
                parPage: 1, //1ページに表示する件数
                currentPage: 1 //現在のページ番号
            }
        },
        methods: {
          clickCallback: function (pageNum) {
             this.currentPage = Number(pageNum);
          }
        },
        computed: {
           getItems: function() { //現在のページのアイテムを返す
            let current = this.currentPage * this.parPage;
            let start = current - this.parPage;
            return this.data.slice(start, current);
           },
           getPageCount: function() { //総ページ数
            var totalPage = Math.ceil(Object.keys(this.data).length / this.parPage);
            return totalPage;
           }
         }

    }
</script>
