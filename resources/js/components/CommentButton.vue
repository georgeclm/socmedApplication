<template>
  <form @submit.prevent="commentPost">
    <div class="d-flex pb-3">
      <div class="col-10 pl-2">
        <input
          type="text"
          name="comment"
          class="form-control"
          id="comment"
          placeholder="Add a comment..."
          required
          v-model="data.comment"
        />
      </div>
      <div class="col-2">
        <button type="submit" class="btn btn-outline-primary btn-sm">
          Post
        </button>
      </div>
    </div>
  </form>
</template>
<script>
export default {
  props: ["postId"],

  data() {
    return {
      data: {
        comment: "",
      },
    };
  },

  methods: {
    commentPost() {
      let postData = this.data;
      axios
        .post("/p/" + this.postId + "/comment", postData)
        .then((response) => {
          //   this.status = !this.status;
          this.data.comment = "";
          console.log(postData);
          console.log(response.data);
        })
        .catch((errors) => {
          if (errors.response.status == 401) {
            window.location = "/login";
          }
        });
    },
  },
};
</script>
