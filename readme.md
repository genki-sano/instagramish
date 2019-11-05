# Instagramish

[![MIT License](http://img.shields.io/badge/license-MIT-blue.svg?style=flat)](LICENSE)

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
