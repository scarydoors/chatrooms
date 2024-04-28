import { createMemoryHistory, createRouter } from 'vue-router';

import ChatroomsView from '@/views/ChatroomsView.vue';

const routes = [
    { path: '/', component: ChatroomsView }
];

const router = createRouter({
    history: createMemoryHistory(),
    routes,
});

export default router;
