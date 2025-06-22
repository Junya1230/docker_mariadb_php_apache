# Docker MariaDB PHP Apache 開発環境

Laravel + MariaDB + Apache + PHP の開発環境をDockerで構築したプロジェクトです。

## 必要な環境

- Docker
- Docker Compose
- Git

## セットアップ手順

### 1. リポジトリのクローン

```bash
git clone git@github.com:Junya1230/docker_mariadb_php_apache.git
cd docker_mariadb_php_apache
```

### 2. Dockerコンテナの起動

```bash
docker-compose up -d
```

### 3. PHP依存関係のインストール

```bash
docker-compose exec app composer install
```

### 4. 環境変数ファイルの作成

```bash
cp src/.env.example src/.env
```

### 5. Laravelアプリケーションキーの生成

```bash
docker-compose exec app php artisan key:generate
```

### 6. データベースマイグレーションの実行

```bash
docker-compose exec app php artisan migrate
```

## アクセス方法

- **Webアプリケーション**: http://localhost:8080
- **phpMyAdmin**: http://localhost:8081 (root / password)

## コンテナ構成

- **app**: PHP 8.2 + Apache + Laravel
- **db**: MariaDB 10.11
- **phpmyadmin**: phpMyAdmin

## 開発用コマンド

### コンテナ内でコマンド実行
```bash
docker-compose exec app <command>
```

### 例：Laravel Artisanコマンド
```bash
docker-compose exec app php artisan make:controller ExampleController
```

### 例：Composerコマンド
```bash
docker-compose exec app composer require package-name
```

## トラブルシューティング

### ポートが既に使用されている場合
`docker-compose.yml`のポート番号を変更してください。

### データベースに接続できない場合
```bash
docker-compose down
docker-compose up -d
```

### キャッシュのクリア
```bash
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:clear
```

## ファイル構成

```
docker_mariadb_php_apache/
├── config/          # Docker設定ファイル
├── db/             # データベース関連
├── logs/           # ログファイル
├── src/            # Laravelアプリケーション
└── docker-compose.yml
```

## 注意事項

### PHP依存関係について
- `src/vendor/`ディレクトリはGitで管理されていません（`.gitignore`で除外）
- これは**意図的な設計**です：
  - リポジトリサイズを小さく保つため
  - 異なる環境での互換性を確保するため
  - `composer.json`と`composer.lock`で依存関係のバージョンを管理
- **必ず**セットアップ手順の「3. PHP依存関係のインストール」を実行してください
- 新しいパッケージを追加した場合は`docker-compose exec app composer install`を再実行

### データベースとログについて
- データベースのデータは`db/data/`に保存されますが、Gitでは管理されません
- ログファイルは`logs/`に保存されますが、Gitでは管理されません
- 大きなファイル（データベースファイルなど）は`.gitignore`で除外されているため、リポジトリサイズを適切に保っています 