<template>
  <div>
    <form @submit.prevent="submitForm">
      <input v-model.lazy="username" placeholder="Enter username" />
      <p v-if="v$.username.$error">Username is required (min 3 chars)</p>
      <div>
        <input type="radio" value="Female" v-model="gender" />Female
        <input type="radio" value="Male" v-model="gender" />Male
        <p v-if="v$.gender.$error">Please select gender</p>
      </div>

      <div>
        <input type="checkbox" value="Vue" v-model="skills" />Vue
        <input type="checkbox" value="React" v-model="skills" />React
        <input type="checkbox" value="Angular" v-model="skills" />Angular
        <p v-if="v$.skills.$error">Select at least one skill</p>
      </div>

      <div>
        <p>Select Country:</p>
        <select v-model="country">
          <option value="nepal">Nepal</option>
          <option value="india">India</option>
          <option value="china">China</option>
        </select>
      </div>

      <div>
        <label>Age: </label>
        <input
          type="number"
          v-model.number="age"
          min="0"
          placeholder="Enter your age"
        />
      </div>

      <button type="submit">Submit</button>
    </form>

    <p>You typed: {{ username }}</p>
    <p>Gender: {{ gender }}</p>
    <p>Skills: {{ skills }}</p>
    <p>Country: {{ country }}</p>
    <p>Age: {{ age }}</p>
  </div>
</template>

<script>
// export default {
//   name: "Form",
//   data() {
//     return {
//       username: "",
//       gender: "",
//       skills: [],
//       country: "",
//       age: 0,
      
//       errors:{},
//     };
//   },
//   methods: {
//     submitForm() {
//       this.errors= {};
//       if(!this.username){
//       this.errors.username="Username is required";
//     }
//     if(!this.gender){
//       this.errors.gender="Please select gender"
//     }
//     if(this.skills.length===0)
//     {
//       this.errors.skills = "Select at least one skill";
//     }
//     if (Object.keys(this.errors).length === 0) {
//         alert("Form submitted successfully ✅");
//     }
// }
// }
// };

import useVuelidate from "@vuelidate/core";
import { required, minLength, numeric } from "@vuelidate/validators";

export default {
  name: "Form",
  data() {
    return {
      username: "",
      gender: "",
      skills: [],
      country: "",
      age: 0,
    };
  },
  setup() {
    return { v$: useVuelidate() }; // reactive validations
  },
  validations() {
    return {
      username: { required, minLength: minLength(3) },
      gender: { required },
      skills: { required },
      age: { required, numeric },
    };
  },
  methods: {
    submitForm() {
      this.v$.$touch(); // mark all fields as touched
      if (!this.v$.$invalid) {
        alert("Form submitted successfully ✅");
      }
    },
  },
};
</script>
