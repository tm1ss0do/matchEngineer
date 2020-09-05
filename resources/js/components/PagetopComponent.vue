<template>
<div>
    <div class="c-page-top js-scroll-top" v-scroll-to="'#header'" >
      <a href="#"></a>
    </div>
</div>
</template>

<script>

    $(window).on('load scroll', function(){
      if ($(window).scrollTop() > 300) {
        $('.js-scroll-top').fadeIn(400);
      } else {
        $('.js-scroll-top').fadeOut(400);
      }
    });

</script>
