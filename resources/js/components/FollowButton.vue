<template>
  <div>
    <div class="col-2">
      <button
        :class="classText"
        @click="followUser"
        v-text="buttonText"
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
      className: "",
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
      return this.status ? "Following" : "Follow";
    },
    classText() {
      if (this.status) {
        this.className = "btn btn-outline-secondary";
        var classdata = this.className;
        return classdata;
      } else {
        this.className = "btn btn-outline-primary";
        var classdata = this.className;
        return classdata;
      }
    },
  },
};
</script>
