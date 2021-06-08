require('./bootstrap');

import { createApp } from 'vue';

import App from  './components/App';

import router from './router';

createApp({
	components: {
		App
	
	}
}).use(router).mount('#app');

