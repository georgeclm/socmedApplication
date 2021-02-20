/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


$('.livesearch').select2({
    placeholder: 'Search',
    ajax: {
        url: '/search',
        dataType: 'json',
        delay: 250,
        processResults: function(data) {
            return {
                results: $.map(data, function(item) {
                    return {
                        text: item.name,
                        id: item.id
                    }
                })
            };
        },
        cache: true
    }
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
// new with laravel 8 to add component inside the blade

import Vue from 'vue'
import FollowButton from  './components/FollowButton.vue';
import LikeButton from './components/LikeButton.vue';
import CommentButton from './components/CommentButton.vue';
import LikeDetail from './components/LikeDetail.vue';
import ChatMessages from './components/ChatMessages.vue';
import ChatForm from './components/ChatForm.vue';

Echo.private('chat')
  .listen('MessageSent', (e) => {
      console.log(e.message.message);
    this.messages.push({
      message: e.message.message,
      user: e.user
    });
  });


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components: { FollowButton,LikeButton,CommentButton,LikeDetail,ChatMessages,ChatForm }

});


