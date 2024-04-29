<template>
  <div>
    <div v-if="loading">
      loading...
    </div>
    <div v-else>
      {{data}}
      <button @click="post({name: 'what'})">real</button>
    </div>
  </div>
</template>

<script setup lang="ts">
  import {getChatrooms, createChatroom} from '@/api';

  const {data, loading} = getChatrooms();
  const {data: response, inProgress, post} = createChatroom();
</script>
