<template>
  <div>
    <div class="col-2">
      <button
        class="btn btn-outline-primary"
        @click="followUser"
        v-text="buttonText"
        v-if="buttonText == 'Follow'"
      ></button>
      <button
        class="btn btn-outline-secondary"
        @click="followUser"
        v-text="buttonText"
        v-else
      ></button>
    </div>
  </div>
</template>

<script>
export default {
  props: ["userId", "follows"],

  data: function () {
    return {
      status: this.follows,
    };
  },

  methods: {
    followUser() {
      axios
        .post("/follow/" + this.userId)
        .then((response) => {
          this.status = !this.status;
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
      return this.status ? "Unfollow" : "Follow";
    },
  },
};
</script>
