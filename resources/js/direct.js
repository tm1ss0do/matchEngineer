
$(".js-submit").click(function(){
  if(!$(this).hasClass("c-btn__forbid")){

    $(this).addClass("c-btn__forbid");
    $(this).prop("disabled", true);
    $(this).parents('.js-form').submit();
  }
});
