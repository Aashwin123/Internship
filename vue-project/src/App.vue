<script setup>
import HelloWorld from './components/HelloWorld.vue'
import TheWelcome from './components/TheWelcome.vue'
import VuexComponent from './components/VuexComponent.vue'
</script>

<template>
  

  <main>
    <div>
    <VuexComponent />
    </div>
    <div>
    <h1>Vue router demo</h1>
    <nav>
    <router-link to="/">Home</router-link> |
    <router-link to ="/about">About</router-link>
    <router-link to ="/user">User</router-link>
    </nav>
    <router-view />
    </div>
  </main>
</template>

