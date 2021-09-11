# customerManageSystemSample

## Laravelプロジェクト作成

<pre>
composer create-project --prefer-dist laravel/laravel customer_manage_system_sample
</pre>

## Vue周りの設定

<details>
<summary>package.json</summary>

~~~ json
{
    "private": true,
    "scripts": {
        "dev": "yarn run development",
        "development": "mix",
        "watch": "mix watch",
        "watch-poll": "mix watch -- --watch-options-poll=1000",
        "hot": "mix watch --hot",
        "prod": "yarn run production",
        "production": "mix --production",
        "postinstall": "yarn run prod"
    },
    "devDependencies": {
        "@mdi/font": "^5.9.55",
        "axios": "^0.21",
        "cross-env": "^7.0",
        "deepmerge": "^4.2.2",
        "laravel-mix": "^6.0.19",
        "lodash": "^4.17.21",
        "postcss": "^8.2.15",
        "postcss-loader": "^5.3.0",
        "resolve-url-loader": "^4.0.0",
        "sass": "~1.32",
        "sass-loader": "^12.1.0",
        "vue": "^2.6.12",
        "vue-loader": "^15.9.5",
        "vue-router": "^3.5.1",
        "vue-template-compiler": "^2.6.12"
    },
    "dependencies": {
        "vuetify": "^2.5.8"
    }
}
~~~
</details>

書き換え後にコマンド実行
<pre>
yarn install
</pre>

## Heroku

### マイグレーション
<pre>
heroku login
heroku run php artisan migrate:fresh --seed -a dev-cms1222
</pre>