# devcontainerを使ったLaravel開発環境
## 注意
composerのインストーラは高頻度で更新されるので注意  
更新があった場合はエラーになるので、Dockerfileの「php -r "if (hash_file ~」のコマンドを[公式ページ](https://getcomposer.org/download/)を見て変更する

## 作成の経過
### universalイメージ
まず最初に全部入りのuniversalイメージを使った  
PHPやXdebug、Composerなどは入っていたが、MYSQLのドライバーが入っていなかったためパッケージマネージャでインストールしようとした  
しかし、PHPがコンパイルで直接インストールされており、パッケージマネージャでインストールしたMYSQLのドライバーとうまく連携されなかった（extension_dirにファイル群がインストールされなかった）  

### base-ubuntuイメージ
次にほぼ純粋のlinuxのbaseイメージを使った  
PHP, Xdebug, MYSQL, Composerなどをパッケージマネージャーでインストール  
これでMYSQLとの問題は解消した  
しかし、Xdebugの設定が記述されていないためデバッグができなかった
xdebug.iniをあらかじめ用意して対応  

#### (課題)  
- xdebugファイルの場所が"/usr/lib/php/20230831/xdebug.so"でこの20230831というディレクトリがxdebugのバージョンによって変わる可能性がある？？  
- codespacesの構築に時間がかかる  
