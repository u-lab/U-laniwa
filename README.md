<!-- @format -->

# U-laniwa

U-lab 内部向けシステム

U-laniwa wiki をご覧ください。
https://github.com/u-lab/U-laniwa/wiki

# ローカルでの使い方

## 構築

初回

```
make init
```

.env のコピーなど不要

※Windows は make コマンド無いので、WSL 側でコマンド叩いて実行する

node は docker 側で持っていないので、ローカルで npm install 関連動かす

```
cd backend && npm install && npm run dev
```

データベースクリア

```
dc exec app php artisan migrate:fresh --seed
```

テスト

```
dc exec app php artisan test
```

Larastan による静的解析

```
dc exec app ./vendor/bin/phpstan analyse
```

それ以降

```
docker-compose up -d
```

Mysql 直打ち

```
docker-compose exec db mysql -u phper -p
Enter password:secret
```

## リンク

メール

http://127.0.0.1:8025/

ローカルホスト

http://127.0.0.1:213/

PHPMyAdmin

http://127.0.0.1:214/

# サイト

https://u-laniwa.tk/

# 技術スタック

- ドメイン取得:Dot tk(Freenom)
  → 無料
- ネームサーバー:Cloudflare
  → 安全面と操作性のため
- メインサーバー:Oracle Cloud Always free osaka Region
  → 永年無料枠を使用、東京は混雑してるので大阪のサーバーに
- タスク管理:Asana+Instagantt
  → 無料でガントチャートが気持ちよく使える構成
- デザイン制作:Figma
- 議事録管理:Notion
- wiki:GitHub Wiki
- ローカル開発環境:Docker
- ブレインストーミングツール:hidane
- 連絡:Slack
- 会議:Discord
- PHP コーディングスタイル:PSR-12

# 開発メンバー

| GitHub アカウント名                         | 役職                          | 備考                                                      |
| ------------------------------------------- | ----------------------------- | --------------------------------------------------------- |
| [Usuyuki](https://github.com/Usuyuki)       | 代表＆雑用&インフラエンジニア |                                                           |
| [tomori2226](https://github.com/tomori2226) | デザイン&UI 設計              |                                                           |
| [tetsu1615](https://github.com/tetsu1615)   | フロントエンジニア            |                                                           |
| [SeigoMori](https://github.com/SeigoMori)   | バックエンドエンジニア        |                                                           |
| [H37kouya](https://github.com/H37kouya)     | スペシャルサンクス            | DB 設計やルーティング、機能に関してアドバイス頂きました。 |

# U-laniwa について

宇都宮大学にある U-lab というサークル(学生団体)の内部向けシステムです。

## 名前の由来

2022/2/5 にブレインストーミングにより決定。

ちなみに、talk という意味を込めて.tk ドメイン
