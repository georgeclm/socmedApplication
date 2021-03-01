<template>
  <div>
    <img :src="getImgUrl()" height="400" width="400" @dblclick="likePost" />

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
    <div
      class="link-web pt-2 px-2"
      style="cursor: pointer"
      data-toggle="modal"
      id="likesButton"
      data-target="#like"
      :data-attr="this.likes"
    >
      <strong v-text="this.count"></strong> likes
    </div>
  </div>
</template>

<script>
export default {
  props: ["postId", "liked", "image", "count"],

  data: function () {
    return {
      postData: this.postId,
      status: this.liked,
      detail: "/p/" + this.postId,
      likes: "/p/" + this.postId + "/liked_by",
      link: false,
    };
  },
  methods: {
    likePost() {
      axios
        .post("/p/" + this.postId + "/like")
        .then(() => {
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
