# devcontainerを使ったLaravel開発環境
## 注意
- composerのインストーラは高頻度で更新されるので注意  
更新があった場合はエラーになるので、Dockerfileの「php -r "if (hash_file ~」のコマンドを[公式ページ](https://getcomposer.org/download/)を見て変更する  
- php-custom.iniの「xdebug.start_with_request=yes」はコメントアウトしている  
デフォルトは「xdebug.start_with_request=trigger」となっていて、条件を満たしたHTTPリクエスト（トリガー）でのみxdebugが開始する  
デバッグする場合は、GETパラメーターとして「XDEBUG_TRIGGER」を付けて、Webブラウザからアクセスする(例：localhost/hoge?XDEBUG_TRIGGER)  
もしくはコメントアウトを外してリビルド   

## 作成の経過
### universalイメージ
まず最初に全部入りのuniversalイメージを使った  
→PHPやXdebug、Composerなどは入っていたが、MYSQLのドライバーが入っていなかったためパッケージマネージャでインストール
→しかし、PHPがコンパイルで直接インストールされており、パッケージマネージャでインストールしたMYSQLのドライバーとうまく連携されなかった（extension_dirにファイル群がインストールされなかった）  

### base-ubuntuイメージ
次にほぼ純粋のlinuxのbaseイメージを使った  
PHP, Xdebug, MYSQL, Composerなどをパッケージマネージャーでインストール  
→MYSQLとの問題は解消した  
→Xdebugの設定が記述されていないためデバッグができない
→php.iniをカスタムするためにiniファイルを用意して対応  

