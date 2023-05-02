/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import {
    createApp
} from 'vue';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);
import ManageAdministrationComponent from './components/admin/users/manage_administration/ManageAdministrationComponent.vue';
app.component('manage-administration-component', ManageAdministrationComponent);
import UserProfileComponent from './components/admin/users/user_profile/UserProfileComponent.vue';
app.component('user-profile-component', UserProfileComponent);
import NotificationComponent from './components/admin/notifications/NotificationComponent.vue';
app.component('notification-component', NotificationComponent);
import ActiveUserComponent from './components/admin/users/active_user/ActiveUserComponent.vue';
app.component('active-user-component', ActiveUserComponent);
import BlockedUserComponent from './components/admin/users/blocked_user/BlockedUserComponent.vue';
app.component('blocked-user-component', BlockedUserComponent);
import DeletedUserComponent from './components/admin/users/deleted_user/DeletedUserComponent.vue';
app.component('deleted-user-component', DeletedUserComponent);
import TermsConditionsComponent from './components/admin/terms-conditions/TermsConditionsComponent.vue';
app.component('terms-conditions-component', TermsConditionsComponent);
import PrivacyPolicyComponent from './components/admin/privacy-policy/PrivacyPolicyComponent.vue';
app.component('privacy-policy-component', PrivacyPolicyComponent);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#app');
