<template>
  <div>
    <div class="d-flex mt-2">
      <div class="px-2">
        <img
          src="/img/like.jpg"
          height="25"
          width="25"
          style="cursor: pointer"
          v-if="buttonText == 'Unlike'"
          @click="likePost"
        />
        <img
          src="/img/unlike.png"
          height="25"
          width="25"
          style="cursor: pointer"
          v-else
          @click="likePost"
        />
      </div>
      <div class="px-2">
        <a :href="this.detail" class="">
          <img src="/img/commenticon.png" height="25" width="25" />
        </a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["postId", "liked"],

  data: function () {
    return {
      status: this.liked,
      detail: "/p/" + this.postId,
    };
  },

  methods: {
    likePost() {
      axios
        .post("/p/" + this.postId + "/like")
        .then((response) => {
          this.status = !this.status;
        })
        .catch((errors) => {
          if (errors.response.status == 401) {
            window.location = "/login";
          }
        });
    },
    getImgUrl() {
      var images = "/storage/uploads/" + this.image;
      return images;
    },
  },

  computed: {
    buttonText() {
      return this.status ? "Like" : "Unlike";
    },
  },
};
</script>
