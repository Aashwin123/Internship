<template>
  <div>
    <h2>User List</h2>
    <ul>
      <li v-for="user in users" :key="user.id">
        {{ user.name }}
      </li>
    </ul>

    <p v-if="loading">Loading...</p>
    <p v-if="error">{{ error }}</p>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "UserList",
  data() { 
    return {
      users: [], // store users data here
      loading: false,
      error: null,
    };
  },
  mounted() {
    this.fetchUsers();
  },
  methods: {
    async fetchUsers() {
      this.loading = true;
      this.error = null;

      try {
        const response = await axios.get("https://jsonplaceholder.typicode.com/users");//http://127.0.0.1:8000/api/users
        console.log("✅ Success:", response.data);                                     //laravel backend bata fetch garna
        this.users = response.data;
      } catch (error) {
        if (error.response) {
          console.error("❌ Error Status:", error.response.status);
          console.error("❌ Error Data:", error.response.data);
          this.error = `Server Error: ${error.response.status}`;
        } else if (error.request) {
          console.error("⚠️ Network Error:", error.message);
          this.error = "Network Error: No response received";
        } else {
          console.error("⚠️ Other Error:", error.message);
          this.error = `Error: ${error.message}`;
        }
      } finally {
        this.loading = false;
      }
    },
  },
};
</script>
