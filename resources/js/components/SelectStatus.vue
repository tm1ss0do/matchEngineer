<template>

<div class="">

  <label for="status">案件種別</label></br>
  <select @change="changeDisplay($event)" class="" name="project_type">
    <option value="">案件種別を選択してください</option>
    <option value="revenue">レベニュー</option>
    <option value="single">単発</option>
  </select></br>
  <div class="js-amount-block" :class="classObject_select">
    <label for="amount">金額(千円単位)</label></br>
    <span>半角数字でご入力ください。</span></br>
    <input type="text" name="project_mini_amount" maxlength="5" oninput="value = value.replace(/[^0-9]+/i,'');" />,000
    〜
    <input type="text" name="project_max_amount" maxlength="5" oninput="value = value.replace(/[^0-9]+/i,'');" />,000円
  </div>
  <p v-if="consult">金額は応相談項目です。</p>


</div>
</template>

<script>
export default {
    data: function() {
        return {
          consult: false,
          classObject_select: {
            nonDisplay: false,
          }
        }
    },
    methods: {
        
        changeDisplay(event){

          if( event.target.value === 'revenue' ){
            this.consult = true;
            return this.classObject_select.nonDisplay = true;

          }else if( event.target.value === 'single' ){
            this.consult = false;
            return this.classObject_select.nonDisplay = false;

          }
        }
    }
}
</script>
