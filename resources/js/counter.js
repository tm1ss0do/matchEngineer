let count_area = $('.js-count-area');
let counter = $('.js-counter');

count_area.oninput = handleInput;

function handleInput(e) {
  counter.textContent = `フィールドの value は
      ${e.target.value.length} 文字の長さです。`;
}
