<template>

<div class="c-card">
  ProjectItem:{{ project.id }}
  <div class="c-card__header">

      <span v-if="project.project_status" class="c-card__status">
        <i class="fas fa-comment-alt"></i>
        募集中！
      </span>
      <span v-else class="c-card__status">
        募集終了
      </span>

    <span v-if="project.project_type === 'revenue'" class="c-card__status">レベニュー案件</span>
    <span v-if="project.project_type === 'single'" class="c-card__status">単発案件</span>

    <p class="c-card__text-sub">募集期限：
      {{ project.created_at | moment("YYYY/MM/DD") }} 〜
      <span v-if="project.project_reception_end">{{ project.project_reception_end | moment("YYYY/MM/DD") }}</span>
      <span v-else>
        未定です
      </span>
    </p>
    <h3 class="c-card__title">
      <a class="c-card__title--link" :href="'/projects/'+project.id" >{{ project.project_title }}</a>
    </h3>
    <div v-if="project.project_type === 'single'">
      <span class="c-card__text-emphasis">{{ project.project_mini_amount }},000</span>〜<span class="c-card__text-emphasis">{{ project.project_max_amount }},000</span>円
    </div>
    <div v-if="project.project_type === 'revenue'">
      <span class="c-card__text-emphasis">応相談</span>
    </div>
  </div>
  <div class="c-card__body">
    <p class="c-card__text">
      {{ project.project_detail_desc }}
    </p>
  </div>
  <div class="c-card__footer">
    <div class="p-profile__mini">
      <div class="c-img__container--mini">
        <img v-if="project.user.profile_icon" class="c-img__img" :src="url+'/storage/avatar/'+project.user.profile_icon" :alt="project.user.profile_icon">
        <img v-else class="c-img__img" :src="url+'/img/default_prof.png'" :alt="default_icon_image">
      </div>
      <a :href="'/projects/'+project.user_id+'/profile'" >{{ project.user.name }}</a>
    </div>
    <div class="c-btn__right">
      <a class="c-btn__medi" :href="'/projects/'+project.id">詳細を見る</a>
    </div>
  </div>

</div>
</template>

<script>
export default {
    props: ['project','url'],
    data: function() {
        return {

        }
    },
    mounted() {
        console.log('ProjectItem mounted.');

    }
}
</script>
