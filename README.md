## 項目概述

Ghost是一個輕量社群論壇Web App，也提供了Restful APIs接口。

它是基於 laravel 8+, laravel-admin 1.8+, bootstrap 4, sweet-alert2, Restful API 和 JWT 所創的。
![Front](https://github.com/YuanChin/project_git/blob/master/ghost/front.PNG)![Back](https://github.com/YuanChin/project_git/blob/master/ghost/back.PNG)

## 項目演示

> 前台

![Front](https://github.com/YuanChin/project_git/blob/master/ghost/1.gif)

> 後台

![Back](https://github.com/YuanChin/project_git/blob/master/ghost/2.gif)

## 功能概述

- 使用者認證: 登入、註冊、退出及密碼變更
- 使用者授權: 僅能操作自己發布的內容
- 話題相關: 發布、刪除、修改及收藏
- 回覆相關: 發布、刪除
- 個人中心
- 消息通知
- 文章搜尋
- 後台管理: 管理用戶、內容及站點
- Restful APIs 接口
- 防止XSS攻擊
- 中間件：記錄使用者最後登入時間
- 緩存：推薦資源、文章回覆數量及使用者最後登入時間
- Command Line: 產生使用者權杖、同步使用者最後活躍時間及同步回覆數量

## 開發環境

本項目本地開發環境使用 [Laravel Homestead](https://laravel.com/docs/8.x/homestead)進行配置與安裝。

## 基礎安裝
**1. 克隆源代碼**
```
git clone git@github.com:YuanChin/ghost.git
```
**2. 配置本地的 Homestead 環境**
```
folders:
    - map: ~/your_path       # 與 Homestead 映射的目錄
      to: /home/vagrant/code

sites:
    - map: ghost.test
      to: /home/vagrant/code/ghost/public

databases:
    - ghost
```
**3. 應用修改**
```shell
cd ~/Homestead && vagrant provision && vagrant reload
```
**4. 配置 hosts 文件**
```
192.168.10.10   ghost.test
```
**5. 安裝依賴套件**
- composer 依賴
    ```shell
    composer install
    #or
    composer install --ignore-platform-reqs
    ```
- npm 依賴
   ```shell
   npm install
   ```
**6. 生成配置文件**
```shell
cp .env.example .env
```
**7. 生成秘鑰**
```shell
php artisan key:generate
```
**8. 生成資料表及測試資料**
``` shell
php artisan migrate --seed
```

## 擴展包使用
| 擴展名稱                       | 描述                         | 應用場景                |
| :---:                         | :---:                        |:---:                   |
| encore/laravel-admin          | 快速搭建後台的管理工具         | 後台管理                |
| intervention/image            | 圖片處理庫                    | 圖片裁剪                |
| laravel/horizon               | 隊列管理工具                  | 監控隊列                 |
| laravel/socialite             | 社群登入                      | Facebook 登入           |
| livewire/livewire             | Laravel Full Stack Framework | 元件製作                 |
| mews/purifier                 | HTML 過濾名單                 | 話題內容過濾，防止XSS攻擊 |
| predis/predis                 | 首推的客戶端開發包             | 作為 Laravel 的緩存驅動  |
| realrashid/sweet-alert        | 彈出框                        | 提高用戶體驗             |
| stichoza/google-translate-php | Google 翻譯                   | slug 的翻譯             |
| tymon/jwt-auth                | 跨域認證                      | 建構 Restful API 時所需  |

## 自定義的 Artisan 命令
| Command Line               | 說明                                   | 執行            |
| :---                       | :---:                                  |:---:           |
| ghost:sync-last-actived-at | 將用戶最後活躍時間從 Redis 同步到資料庫中 | 每天凌晨        |
| ghost:sync-reply-count     | 將回覆數量從 Redis 同步到資料庫中        | 每六小時        |
| ghost:generate-token       | 快速生成用戶 token                      | 測試API接口所需 |

## API 接口
| 動詞  | URL                                             | 說明            |
| :---  | :---                                            |:---            |
| POST  | https://{{host}}/api/v1/images                  | 添加圖片        |
| GET   | https://{{host}}/api/v1/user                    | 當前登入用戶資訊 |
| GET   | https://{{host}}/api/v1/users/:id               | 某個用戶詳情    |
| POST  | https://{{host}}/api/v1/authorizations          | 登入            |
| PUT   | https://{{host}}/api/v1/authorizations/current  | 刷新 token      |
| DEL   | https://{{host}}/api/v1/authorizations/current  | 刪除 token      |
| GET   | https://{{host}}/api/v1/categories              | 分類列表        |
| GET   | https://{{host}}/api/v1/topics                  | 話題列表        |
| GET   | https://{{host}}/api/v1/topics/:id              | 話題詳情        |
| POST  | https://{{host}}/api/v1/topics                  | 發布話題        |
| DEL   | https://{{host}}/api/v1/topics/:id              | 話題刪除        |
| PATCH | https://{{host}}/api/v1/topics/:id              | 話題修改        |
| GET   | https://{{host}}/api/v1/topics/:id/replies      | 某話題下的回覆   |
| GET   | https://{{host}}/api/v1/users/:id/replies       | 某用戶發布的話題 |
| POST  | https://{{host}}/api/v1/topics/:id/replies      | 創建回覆        |
| DEL   | https://{{host}}/api/v1/topics/:id/replies/:pid | 刪除回覆       |
| GET   | https://{{host}}/api/v1/topics/:id/replies/:pid | 回覆通知 |
> {{host}}為Postman變數，值為ghost.test



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
