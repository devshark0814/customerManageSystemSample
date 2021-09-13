# customerManageSystemSample

## 構築方法

1. ローカルにクローン
    <pre>git clone -b main https://github.com/devshark0814/customerManageSystemSample.git</pre>
1. 各コンテナの起動（※クローンしたディレクトリで）
    <pre>docker-compose up -d</pre>
1. appコンテナにbash（※クローンしたディレクトリで）
    <pre>docker-compose exec app bash</pre>
1. bash後、appコンテナで下記コマンドを実行（※クローンしたディレクトリで）
    <pre>cd customer_manage_system_sample</pre>
    ↑Laravleプロジェクトルートフォルダに遷移
    <pre>composer install</pre>
    ↑composerでインストール
    <pre>yarn install</pre>
    ↑yarnでnode_modulesインストール
1. .envファイルのDB接続情報を書き換え
    <pre>「.env.example」のDB周りの設定を「.evn」に反映</pre>
1. マイグレーション&初期データ投入
    <pre>cd customer_manage_system_sample</pre>
    <pre>php artisan migrate:fresh --seed</pre>
1. ブラウザで下記URLにアクセス
    <pre>http://localhost:8080/dashboard</pre>


## 開発メモ
### Laravelプロジェクト作成
<pre>
composer create-project --prefer-dist laravel/laravel customer_manage_system_sample
</pre>

### Vue周りの設定

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

### Heroku

#### マイグレーション
<pre>
heroku login
heroku run php artisan migrate:fresh --seed -a dev-cms1222
</pre>