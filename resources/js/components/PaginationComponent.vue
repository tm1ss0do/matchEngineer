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
             console.log('this.currentPage:' + this.currentPage);
          }
        },
        mounted () {
        // console.log(this.data);
        },
        computed: {
           getItems: function() { //現在のページのアイテムを返す
            let current = this.currentPage * this.parPage;
            console.log('current:' + current);
            let start = current - this.parPage;
            console.log('start:' + start);
            return this.data.slice(start, current);
           },
           getPageCount: function() { //総ページ数
            var totalPage = Math.ceil(Object.keys(this.data).length / this.parPage);
            console.log('totalPage:' + totalPage);
            return totalPage;
           }
         }

    }
</script>
