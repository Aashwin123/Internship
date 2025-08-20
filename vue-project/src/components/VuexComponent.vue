<template>
<div>
<p>Count: {{$store.state.count}}</p>
<p>Double: {{ $store.getters.doubleCount}}</p>
<button @click="$store.commit('increment')">Increment</button>
<button @click="$store.dispatch('incrementAsync')">Increment after 1s</button>
</div>
</template>
<script>
export default {
    name:'VuexComponent'
}
</script>