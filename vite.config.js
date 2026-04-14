import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        // BASE
        'resources/css/app.css',
        'resources/js/app.js',

        // CSS
        'resources/css/global.css',
        'resources/css/dashboard/style.css',
        'resources/css/login/style.css',
        'resources/css/login/login_error.css',
        'resources/css/nav/style.css',
        'resources/css/profile/style.css',
        'resources/css/task/style.css',
        'resources/css/user/create.css',

        // JS
        'resources/js/bootstrap.js',
        'resources/js/dashboard/welcomeTextAnimation.js',
        'resources/js/login/showPassword.js',
        'resources/js/nav/hamburguer.js',

        'resources/js/profile/msjProfileUpdate.js',
        'resources/js/profile/showFormUpdatePassword.js',
        'resources/js/profile/showModalUpdateProfile.js',

        'resources/js/task/colorTaskStatus.js',
        'resources/js/task/grafic.js',
        'resources/js/task/modalAddTask.js',
        'resources/js/task/modalEdit.js',
        'resources/js/task/modalShowTask.js',
        'resources/js/task/moveTaskStart.js',
        'resources/js/task/msjSaveTask.js',
        'resources/js/task/msjTaskDelete.js',
        'resources/js/task/msjUpdateTask.js',
        'resources/js/task/notification.js',
        'resources/js/task/taskDelete.js',

        'resources/js/user/msjUserDelete.js',
        'resources/js/user/UserDelete.js',
      ],
      refresh: true,
    }),
  ],
});
