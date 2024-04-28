<template>
  <div>
    <div v-if="loading">
      it is loading right now
    </div>
    <div v-else>
      {{data}}
    </div>
  </div>
</template>

<script setup lang="ts">
  import {getChatrooms} from '@/api';

  const {data, loading} = getChatrooms();
</script>
