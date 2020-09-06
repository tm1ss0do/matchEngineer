<template>

<div class="card-body">
  I'm an Project Compoent.

  <section v-if="errored">
    <p>
    現在、この情報を取得できません。しばらくしてからもう一度お試しください
    </p>
  </section>

  <section v-else>
    <div v-if="loading">Now Loading...</div>

    <ul v-for="inf in info">
      <li>
      {{ inf.name }}
      </li>
    </ul>

  </section>

  <!-- <ul v-for="post in posts">
    <li>
    {{ post.title }}
    </li>
  </ul>
  <ul v-for="user in users">
    <li>
    {{ user.name }}
    </li>
  </ul> -->

</div>
</template>

<script>
    export default {
    props: ['users'],
        data: function() {
            return {
                info: null,
                loading: true,
                errored: false,
                // posts: [
                //     {
                //       id:1,
                //       title: 'sample1',
                //       content: '<p>サンプル投稿のコンテント1</p>'
                //     },
                //     {
                //       id:2,
                //       title: 'sample2',
                //       content: '<p>サンプル投稿のコンテント2</p>'
                //     },
                //     {
                //       id:3,
                //       title: 'sample3',
                //       content: '<p>サンプル投稿のコンテント3</p>'
                //     }
                //   ],
            }
        },
        mounted () {
          var self = this;
          var url = '/projects/json';
          axios
            .get(url)
            .then(response => (self.info = response.data))
            .catch(function (error) {
              console.log(error);
              self.errored = true
            })
            .finally(
              () => self.loading = false
              )
        }

    }
</script>
