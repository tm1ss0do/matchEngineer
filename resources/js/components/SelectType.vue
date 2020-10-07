<template>

<div class="">

  <label class="c-title__label" for="status">案件種別</label></br>

  <section class="c-input__line">
    <div class="c-input__select--wrap">
      <select @change="changeDisplay($event)" class="c-input__select" name="project_type">
        <option value="" class="c-input__option">案件種別を選択してください</option>
        <option v-if="project && project.project_type  == 'revenue'" selected value="revenue" class="c-input__option">レベニュー</option>
        <option v-else value="revenue" class="c-input__option">レベニュー</option>
        <option v-if="project && project.project_type == 'single'" selected value="single" class="c-input__option">単発</option>
        <option v-else value="single" class="c-input__option">単発</option>
      </select>
    </div>
  </section>
  <div class="c-input__line--inner" :class="classObjectSelect">
    <label class="c-title__label" for="amount">金額(千円単位)</label></br>
    <span class="u-font__sub" >半角数字でご入力ください。</span></br>
    <span v-if="compare" class="u-font__error">最低金額と最高金額をご確認ください。</span>
    <div class="c-input__num--container">
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
  <p v-if="consult" class="u-font__sub">金額は応相談項目です。</p>



</div>
</template>

<script>
export default {
    props: ['project'],
    data: function() {
        return {
          consult: false,
          classObjectSelect: {
            'u-non': false,
          },
          classObjectAmountError: {
            'u-non': true,
          },
          miniAmount: this.project.project_mini_amount,
          maxAmount: this.project.project_max_amount,
        }
    },
    methods: {
        changeDisplay(event){

          if( event.target.value === 'revenue' ){
            this.consult = true;
            return this.classObjectSelect['u-non'] = true;

          }else if( event.target.value === 'single' ){
            this.consult = false;
            return this.classObjectSelect['u-non'] = false;

          }
        },
        //replace(event){
        //  return event.target.value.replace(/[^0-9]+/i,'');
        //},

        maxNum(event){
          console.log(this.maxAmount);
           this.maxAmount = Number(event.target.value);
        },
        miniNum(event){
          console.log(this.miniAmount);

           this.miniAmount = Number(event.target.value);
        }
    },
    computed: {
      compare(){
        if( Number(this.maxAmount) < Number(this.miniAmount) ){
            return true;
        }else{
            return false;
        }
      },
      amLen(){
        if( this.maxAmount > 11 || this.miniAmount > 11 ){
        console.log(this.maxAmount);
            return true;
        }else{
            return false;
        }
      }
    },
    mounted () {


    }
}
</script>
