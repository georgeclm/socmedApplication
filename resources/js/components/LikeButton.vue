<template>
  <div class="d-flex">
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
</template>

<script>
export default {
  props: ["postId", "liked"],

  mounted() {
    console.log("Component mounted.");
  },

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
          console.log(this.status);

          console.log(response.data);
        })
        .catch((errors) => {
          if (errors.response.status == 401) {
            window.location = "/login";
          }
        });
    },
  },

  computed: {
    buttonText() {
      return this.status ? "Like" : "Unlike";
    },
  },
};
</script>
