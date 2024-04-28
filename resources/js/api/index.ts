import axios from 'axios';
import { onMounted, ref } from 'vue';
import Echo from 'laravel-echo';
import Pusher from "pusher-js";

const BASE_API_URL = '/api';

function apiGetHook(endpoint: string) {
  return () => {
    const loading = ref(true);
    const data = ref(undefined);

    onMounted(() => {
      axios.get(`${BASE_API_URL}${endpoint}`).then((response) => {
        data.value = response.data;
        loading.value = false;
      })
    });

    return {
      loading,
      data,
    };
  }
}

export const getChatrooms = apiGetHook('/chatrooms');
