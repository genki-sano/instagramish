# Instagramish

[![StyleCI](https://github.styleci.io/repos/215065833/shield?branch=master&style=flat)](https://github.styleci.io/repos/215065833)
[![MIT License](http://img.shields.io/badge/license-MIT-blue.svg?style=flat)](LICENSE)

[![PHP Version](http://img.shields.io/badge/php-v7.2-blueviolet.svg?style=flat)](composer.json)
[![Laravel Version](http://img.shields.io/badge/laravel-v6.0-critical.svg?style=flat)](composer.json)
[![Vue.js Version](http://img.shields.io/badge/vue-v2.5.17-green.svg?style=flat)](package.json)
[![Vue-Router Version](http://img.shields.io/badge/vue_router-v3.1.3-green.svg?style=flat)](package.json)
[![Vuex Version](http://img.shields.io/badge/vuex-v3.1.1-green.svg?style=flat)](package.json)


## About Instagramish

Instagramish is a web application created by imitating Instagram. It consists of [laravel](https://laravel.com/) + [vue.js](https://vuejs.org/) + [vue-router](https://router.vuejs.org/) + [vuex](https://vuex.vuejs.org/), and it is a Single-Page Application that allows you to easily share photos.

## Install

1. `git clone https://github.com/genki-sano/laravel-vue-spa.git`
2. `cd instagramish`
3. `composer install`
4. `npm install`
5. Open `.env` file in your favorite text editor and set the database credentials.
6. `php artisan migrate`

## Usage

#### Development

```bash
npm run dev
```

You can access your application at http://localhost:3000.

```bash
# build and watch
npm run watch

# serve with hot reloading
npm run hot
```

#### Production

```bash
npm run prod
```

You can access your application the url you set `APP_URL` to.

## License

This software is released under the MIT License, see LICENSE
