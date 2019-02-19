<template>
  <div class="card">
    <div class="card-header">
      <i class="fas fa-code"></i> Example Vue Component
    </div>
    <div class="card-body">I'm an example Vue component!</div>

    <div class="list-group">
      <a
        href="#"
        class="list-group-item list-group-item-action"
        v-for="user in users"
        :key="user.id"
      >{{ user.first_name }}</a>
    </div>

    <div class="progress mb-3">
      <div
        class="progress-bar progress-bar-striped"
        role="progressbar"
        style="width: 20%"
        aria-valuenow="10"
        aria-valuemin="0"
        aria-valuemax="100"
      ></div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      users: [],
      user: {
        id: "",
        id_code: "",
        first_name: "",
        last_name: ""
      },
      user_id: ""
    };
  },
  created() {
    this.fetchUser();
  },
  methods: {
    fetchUser() {
      fetch("/getusers")
        .then(obj => obj.json())
        .then(resp => {
          this.users = resp;
          console.log(this.users);
        });
    }
  },

  mounted() {
    console.log("Component mounted.");
  }
};
</script>
