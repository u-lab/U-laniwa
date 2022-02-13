<!-- @format -->

# U-laniwa

U-lab 内部向けシステム

# ローカルでの使い方

構築

初回

```
.env.exampleをコピーして.envに設定を追加
make init
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

メール

http://127.0.0.1:8025/

ローカルホスト

http://127.0.0.1:213/

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

# 開発メンバー

| GitHub アカウント名                         | 役職                          | 備考 |
| ------------------------------------------- | ----------------------------- | ---- |
| [Usuyuki](https://github.com/Usuyuki)       | 代表＆雑用&インフラエンジニア |      |
| [tomori2226](https://github.com/tomori2226) | デザイン&UI 設計              |      |
| [tetsu1615](https://github.com/tetsu1615)   | フロントエンジニア            |      |
| [SeigoMori](https://github.com/SeigoMori)   | バックエンドエンジニア        |      |

# U-laniwa について

宇都宮大学にある U-lab というサークル(学生団体)の内部向けシステムです。

## 名前の由来

2022/2/5 にブレインストーミングにより決定。

ちなみに、talk という意味を込めて.tk ドメイン

# docker 作成で使用

Copyright (c) 2020 ucan-lab/docker-laravel

Released under MIT License.

https://github.com/ucan-lab/docker-laravel/blob/main/LICENSE
