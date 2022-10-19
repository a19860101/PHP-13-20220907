# Laravel 指令

## 基本

```bash
php artisan serve
```

## Controller

```bash
php artisan make:controller TestController
```

## Migrate & Migration

```bash

php artisan make:migration create_products_table
# 建立migration

php artisan migrate
# 上傳migration

php artisan migrate:status
# 查詢migration 狀態

php artisan migrate:rollback
# 回復上一組migration

php artisan migrate:reset
# 重置migration

```

## Model

```bash
php artisan make:model Product
# 建立model

php artisan make:model Product -cm
# 建立model並同時建立Controller與Migration
```
