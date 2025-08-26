<script setup>
import {ref} from 'vue'
import ChildComponent from './components/ChildComponent.vue'

const showChild = ref(true)

function toggleChild(){
  showChild.value =!showChild.value
}
</script>

<template>
  <div>
  <h1>Vue LifeCycle Demo</h1>
  <ChildComponent v-if="showChild" />
  <button @click="toggleChild">Toggle Child Component</button>
  </div>
</template>


