import axios from 'axios';
import { onMounted, onUnmounted, ref } from 'vue';
import Echo from "@/echo";

const BASE_API_URL = '/api';

function apiGetHook(endpoint: string, subscribeChannel: string | undefined = undefined) {
  return () => {
    const loading = ref(true);
    const data: any = ref(undefined);

    onMounted(() => {
      axios.get(`${BASE_API_URL}${endpoint}`).then((response) => {
        data.value = response.data.data;
        loading.value = false;
      });

      if (subscribeChannel) {
        Echo.channel(subscribeChannel)
          .listen(".created", ({model}: any) => {
            console.log(model);
            data.value.push(model)
          })
          .listen(".updated", ({model}: any) => {console.log(data.model)})
          .listen(".deleted", ({model}: any) => {console.log(data.model)});
      }
    });

    onUnmounted(() => {
      Echo.leaveChannel("chatrooms");
    });

    return {
      loading,
      data,
    };
  }
}

function apiPostHook(endpoint: string) {
  return () => {
    const inProgress = ref(false);
    const data = ref(undefined);

    function post(data: any) {
      inProgress.value = false;
      axios.post(`${BASE_API_URL}${endpoint}`, data).then((response) => {
        data.value = response.data;
        inProgress.value = false;
      })
    }

    return {
      post,
      inProgress,
      data
    }
  }
}

export const getChatrooms = apiGetHook('/chatrooms', 'chatrooms');
export const createChatroom = apiPostHook('/chatrooms');
export const updateChatroom = apiPostHook('/chatrooms/1');
