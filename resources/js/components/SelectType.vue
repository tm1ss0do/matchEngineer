<template>

<div class="">

  <label for="status">案件種別</label></br>
  <select @change="changeDisplay($event)" class="" name="project_type">
    <option value="">案件種別を選択してください</option>
    <option v-if="project && project.project_type  == 'revenue'" selected value="revenue">レベニュー</option>
    <option v-else value="revenue">レベニュー</option>
    <option v-if="project && project.project_type == 'single'" selected value="single">単発</option>
    <option v-else value="single">単発</option>
  </select></br>
  <div class="js-amount-block" :class="classObjectSelect">
    <label for="amount">金額(千円単位)</label></br>
    <span>半角数字でご入力ください。</span></br>
    <span v-show="compare">最低金額と最高金額をご確認ください。</span></br>
    <input v-model.trim="miniAmount" pattern="^[0-9]+" name="project_mini_amount" maxlength="5" />,000
    〜
    <input v-model.trim="maxAmount" pattern="^[0-9]+" name="project_max_amount" maxlength="5" />,000円

  </div>
  <p v-if="consult">金額は応相談項目です。</p>



</div>
</template>

<script>
export default {
    props: ['project'],
    data: function() {
        return {
          consult: false,
          classObjectSelect: {
            nonDisplay: false,
          },
          classObjectAmountError: {
            nonDisplay: true,
          },
          miniAmount: this.project.project_mini_amount,
          maxAmount: this.project.project_max_amount,
        }
    },
    methods: {
        changeDisplay(event){

          if( event.target.value === 'revenue' ){
            this.consult = true;
            return this.classObjectSelect.nonDisplay = true;

          }else if( event.target.value === 'single' ){
            this.consult = false;
            return this.classObjectSelect.nonDisplay = false;

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
