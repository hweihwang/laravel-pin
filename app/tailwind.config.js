/** @type {import('tailwindcss').Config} */
module.exports = {
    purge: ['./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php', './storage/framework/views/*.php', './resources/views/**/*.blade.php', './resources/js/**/*.vue',],

    mode: 'jit',

    plugins: [require("daisyui")],
};
