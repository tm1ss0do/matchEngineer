<template>

  <div class="">

    <label class="c-title--label" for="status">案件種別<span class="u-font--require">※</span></label></br>

    <section class="c-input__line">
      <div class="c-input__select-wrap">
        <select @change="changeDisplay($event)" class="c-input__select" name="project_type">
          <option value="" class="c-input__option">案件種別を選択してください</option>
          <option v-if="project && project.project_type  == 'revenue'" selected value="revenue" class="c-input__option">レベニュー</option>
          <option v-else value="revenue" class="c-input__option">レベニュー</option>
          <option v-if="project && project.project_type == 'single'" selected value="single" class="c-input__option">単発</option>
          <option v-else value="single" class="c-input__option">単発</option>
        </select>
      </div>
    </section>
    <div class="c-input__line-inner" :class="classObjectSelect">
      <label class="c-title--label" for="amount">金額(千円単位)</label></br>
      <span class="u-font--sub" >半角数字でご入力ください。</span></br>
      <span v-if="compare" class="u-font--error">最低金額と最高金額をご確認ください。</span>
      <div class="c-input__num-container">
        <span class="c-input__num--wrap">
          <input v-model.trim="miniAmount" pattern="^[0-9]+" name="project_mini_amount" maxlength="5" class="c-input__num" />
          ,000〜
        </span>
        <span class="c-input__num--wrap">
          <input v-model.trim="maxAmount" pattern="^[0-9]+" name="project_max_amount" maxlength="5" class="c-input__num" />
          ,000
        </span>
      </div>
    </div>
    <p v-if="consult" class="u-font--sub">金額は応相談項目です。</p>

  </div>
</template>

<script>
    export default {
        props: ['project'],
        data: function() {
          return {
            consult: false, //相談項目の場合true
            classObjectSelect: {
              'u-non': false,
            },
            miniAmount: this.project.project_mini_amount, //最低金額
            maxAmount: this.project.project_max_amount, //最高金額
          }
        },
        methods: {
          changeDisplay(event){ //レベニュー案件の場合、金額入力部分を隠す(display:none;にする)処理
            if( event.target.value === 'revenue' ){
              this.consult = true;
              return this.classObjectSelect['u-non'] = true;
            }else if( event.target.value === 'single' ){
              this.consult = false;
              return this.classObjectSelect['u-non'] = false;
            }
          },
        },
        computed: {
          compare(){ //最低金額と最高金額の比較
            if( Number(this.maxAmount) < Number(this.miniAmount) ){
              return true;
            }else{
              return false;
            }
          },
        },
    }

</script>
