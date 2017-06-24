/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
window.Vue = require('vue');
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-default/index.css';
import Vuex from 'vuex'

window.Vue.use(Vuex)
window.Vue.use(ElementUI);
import lang from 'element-ui/lib/locale/lang/en';
import locale from 'element-ui/lib/locale';


// 设置语言
locale.use(lang);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('navbar', require('./components/Navbar.vue'));
Vue.component('searchbox', require('./components/SearchForm.vue'));
Vue.component('tabs', require('./components/HomepageTabs.vue'));
Vue.component('create-book-form',require('./components/CreateBookForm.vue'));
Vue.component('booklist',require('./components/Booklist.vue'));
Vue.component('userbookslist',require('./components/Userbooks.vue'));

const store = new Vuex.Store({
	state:{
		searchResult:null
	},
	mutations: {
		updateSearchResult(state,result){
			state.searchResult = result;
		}
	},
	actions:{
		'updateSearchResult':function(store,result){
			store.commit('updateSearchResult',result);
		}
	}
})


const app = new Vue({
	store,
    el: '#app',
});
