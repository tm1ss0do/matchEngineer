<template>

  <div class="">
     v-model="page" :length="length" :total-visible="10"

     <ul v-for="project in getItems">
       <li>
         {{ project.id }}:
         {{ project.name }}
       </li>
     </ul>
     <paginate
       :page-count="getPageCount"
       :page-range="3"
       :margin-pages="2"
       :click-handler="clickCallback"
       :prev-text="'＜'"
       :next-text="'＞'"
       :container-class="'pagination'"
       :page-class="'page-item'">
     </paginate>

  </div>
</template>

<script>
    export default {
    props: ['data'],
        data: function() {
            return {
                projects: [],
                // page: 1, //表示中のページ番号
                // length: 3, //表示するページリンクの上限
                // :total-visible="10" //表示されるページボタンの最大数
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
