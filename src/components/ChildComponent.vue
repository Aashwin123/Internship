<template>
  <div>
    <h2>Child Component</h2>
    <button @click="increment">Increment: {{ count }}</button>
  </div>
</template>

<script setup>
import {
  ref,
  onBeforeMount,
  onMounted,
  onBeforeUpdate,
  onUpdated,
  onBeforeUnmount,
  onUnmounted
} from 'vue'

const count = ref(0)
function increment() {
  count.value++
}

console.log(" setup() called - component instance created")

onBeforeMount(() => {
  console.log(" onBeforeMount - DOM not yet rendered")
})

onMounted(() => {
  console.log(" onMounted - DOM rendered, good for API calls")
})

onBeforeUpdate(() => {
  console.log(" onBeforeUpdate - before DOM changes")
})

onUpdated(() => {
  console.log(" onUpdated - after DOM changes")
})

onBeforeUnmount(() => {
  console.log(" onBeforeUnmount - before component is removed")
})

onUnmounted(() => {
  console.log(" onUnmounted - component destroyed, cleanup here")
})
</script>
