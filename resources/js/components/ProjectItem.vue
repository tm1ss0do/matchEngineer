<template>

<div class="c-card">
  ProjectItem:{{ project.id }}:
  <div class="c-card__header">
    <span class="c-card__status">
      <i class="fas fa-comment-alt"></i>
      募集中！
    </span>
    <span class="c-card__status">レベニュー案件</span>
    <p class="c-card__text-sub">募集期限：{{ project.project_reception_end }}</p>
    <h3 class="c-card__title">
      <a class="c-card__title--link" href="#">
        {{ project.project_title }}
      </a>
    </h3>
    <span class="c-card__text-emphasis">{{ project.project_mini_amount }},000</span>〜<span class="c-card__text-emphasis">{{ project.project_max_amount }},000</span>円
  </div>
  <div class="c-card__body">
    <p class="c-card__text">
      {{ project.project_detail_desc }}
    </p>
  </div>
  <div class="c-card__footer">
    <div class="p-profile__mini">
      <div class="c-img__container--mini">
        <img class="c-img__img" src="" alt="">
      </div>
      <a :href="'/projects/'+project.user_id+'/profile'" >{{ project.user.name }}</a>
    </div>
    <div class="c-btn__right">
      <a class="c-btn__medi" href="#">詳細を見る</a>
    </div>
  </div>

</div>
</template>

<script>
export default {
    props: ['project','url'],
    mounted() {
        console.log('ProjectItem mounted.');
    }
}
</script>
