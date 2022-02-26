# slim

## 参考URL

https://qiita.com/erik_t/items/14d0103e343e440f6dc5#container<br>
https://odan.github.io/2019/11/05/slim4-tutorial.html

## フォルダ構成

- public 公開フォルダ
    - .htaccess 直接のファイル、ディレクトリ以外を全てindexに遷移させるhtaccess
    - index.php エントリーポイント

- config 設定情報全般
    - bootstrap.php public/indexの流れを受けて全ての処理が走る
    - container.php DIコンテナ
    - route ルーティング
        - base.php 基本のルーティング
    - middlware
        - AuthMiddleweare.php 認証ミドルウェア    
        - RenderingMiddleweare.php Rendering後のミドルウェア

- src 
    - Controller コントローラー
        BaseController 基底になるController
    
    - Lib ライブラリ
        - Person Personディレクトリ
            - PersonInterface PersonInterface
            - Man.php 男性クラス
            - Woman.php 女性クラス

- view TwigのHTMLファイル


## migration 

column定義
```
php ./migrations/column_definetion.php 
```

faker
```
php ./migrations/sample_data.php 
```