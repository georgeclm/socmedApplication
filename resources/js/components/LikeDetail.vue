<template>
  <div>
    <div class="d-flex mt-2">
      <div class="px-2">
        <img
          :src="buttonText"
          height="25"
          width="25"
          style="cursor: pointer"
          @click="likePost"
        />
      </div>
      <div class="px-2">
        <a :href="this.detail" class="">
          <img src="/img/commenticon.png" height="25" width="25" />
        </a>
      </div>
    </div>
    <div class="link-web pt-2 px-2">
      <a :href="this.liked_by"><strong v-text="this.count"></strong> likes</a>
    </div>
  </div>
</template>

<script>
export default {
  props: ["postId", "liked", "count"],

  data: function () {
    return {
      status: this.liked,
      detail: "/p/" + this.postId,
      liked_by: "/p/" + this.postId + "/liked_by",
      link: "",
    };
  },

  methods: {
    likePost() {
      axios
        .post("/p/" + this.postId + "/like")
        .then((response) => {
          this.status = !this.status;
          if (this.status) {
            this.count++;
          } else {
            this.count--;
          }
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
      if (this.status) {
        this.link = "/img/unlike.png";
        var link = this.link;
        return link;
      } else {
        this.link = "/img/like.jpg";
        var link = this.link;
        return link;
      }
    },
  },
};
</script>
