<template>
  <div class="row mb-3">
    <div class="col-md-1 m-auto text-end">
      <img :src="showProfile()" width="30" height="30" class="rounded-circle" />
    </div>
    <div class="col-md-11">
      <div class="text-muted">{{ message.user.name }}</div>

      <div class="h4">{{ message.message }}</div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["message"],
  data() {
    return {
      profiles: [],
    };
  },
  methods: {
    showProfile() {
      axios
        .get("/chat/" + this.message.user.id + "/profile")
        .then((response) => {
          this.profiles = response.data;
        });
      return this.profiles;
    },
  },
};
</script>
