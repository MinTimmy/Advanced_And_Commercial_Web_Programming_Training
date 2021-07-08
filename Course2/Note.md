# 高階與商業網站程式設計培訓_筆記#1


課程資訊：
 - 日期：2021 / 07 / 03
 - 講師：張世澤
 - 內容：功課檢討 / Cookie & Session / 驗證機制


# 功課檢討 （FantasticBook Ver1）

整理講師給予學員繳交作業的回饋，詳細內容可以再自行去查閱文件。
   
- **提高可讀性**
    遵守 PSR (PHP Standards Recommendations)
    ：https://events.storm.mg/codingstyle/coding_style/php.html
    ：https://github.com/memochou1993/PSR/blob/master/PSR-12.md

    變數名稱
    ：明確
    ：不縮寫
    ：保持一致
    ```PHP
    $cont = $_POST["content"]; // X
    $content = $_POST["content"]; // O
    ```
    
    註解之必要
    ：非必要，有則須寫得有意義
    
- **避免義大利麵條程式碼**
    同一個檔案裡**避免**混有多種語言（HTML+CSS+JS+PHP...），造成維護惡夢
    ：善用 [include](https://www.php.net/manual/en/function.include.php) 
    
- **單一職責原則**
    ：整合 / 分開功能
 
 - **效能問題**
    限制輸出資料筆數上限
    ：query [ODER BY LIMIT](https://codingdailyblog.wordpress.com/2017/06/18/phpmysql-order-by-%E8%88%87-limit-%E7%94%A8%E6%B3%95/) 
    
    N+1 問題（效能殺手）
    ：使用 `JOIN` 建立關聯搜尋 （之後的課程會提）
    
- **標註回傳值型態（type hint）**
    ：在定義函式時標註回傳值型態，PHP 會檢查回傳值的型態是否符合，以提升程式碼品質
    ```PHP
    function 函數名稱(參數,參數): 回傳值型態
    {
        //內容
        return 回傳值;
    }
    ```
    
- **其他**
    **好用函式**
     [PDO::lastInsertId](php.net/manual/en/pdo.lastinsertid.php)：返回最後插入行的 ID 或序列值

### 資安問題

- **限制輸入內容字數上限**
    ：`maxlength="..."`
    
- **XSS 攻擊**
    攻擊者把惡意指令注入網頁裡，以盜取 Cookie 、執行惡意操作
    例如：在網頁中的 textarea 以 html 語法輸入 JavaScript 程式碼 
    
    如何防範？
    ：善用 [htmlspecialchars()](https://www.php.net/manual/en/function.htmlspecialchars.php) 

- **SQL injection** 
    攻擊者把惡意 SQL 指令注入網頁裡，被資料庫伺服器誤認為是正常的SQL指令而執行，因此遭到破壞或是入侵。
    
    如何防範？
    1. [PDO Prepared statements](https://www.php.net/manual/en/pdo.prepared-statements.php)
    在引數中使用站位符號 `:` ... ，執行時將實際的值以原封不動的字串替換入站位符處，避免惡意 SQL 指令被成功執行

    

# Cookie & Session !

基於 HTTP 是一個無狀態協議（Stateless Protocol），意即每一次的請求都被作為獨立的，與之前都無關，伺服器端不知道客戶端上次做了什麼。而為了保持互動狀態，透過使用 Cookie 和 Session 儲存識別資訊，解決問題。

### Cookie

**什麼是 Cookie ?** 
- 一種 Key-Value Pair 的小型文字檔案（容量上限 4 kb），由伺服器端（Server）設定，客戶端（Client）瀏覽器進行儲存（記憶體或硬碟），設有過期時間
- 每一個網站的 Port 會有自己儲存 Cookie 的 Domain 和路徑，不互相衝突，且 A 網站不能使用 B 網站的 Cookie 
-  客戶端（Client）瀏覽器在傳送資料時，會檢查傳送對象的網址名（Domain Name）和 Port ，不包含路徑，以及 HTTP 和 HTTPS 兩個協定——當傳送對象是 A 網站時， B 網站的 Cookie 就不會被附上 
-  由於每一次對網站做出請求時都會被附上，因此 Cookie 不建議太大，以免消耗網路頻寬

**運作例子** 

**- 登入**
Y 伺服器端（Server）｜ ←(1)– ｜A 客戶端（Client）｜(1)：傳送正確的帳號密碼以登入
Y 伺服器端（Server）｜ –(2)→ ｜A 客戶端（Client）｜(2)：在 header `Set-cookie: ...` 後回傳 OK 

(3)：收到 Y 伺服器端的回應後， A 客戶端的瀏覽器就會將收到的 Cookie 值存入 Cookie 
(4)： A 客戶端再次向 Y 伺服器端傳送請求時，都會附上先前紀錄的 Cookie ，即可通過驗證保持登入狀態，而不需再輸入帳號密碼
※ 伺服器端根據 Cookie 進行使用者身份、狀態等較驗
※ Key-Value Pair： `Set-cookie:  key = value` 

**- 登出**
Y 伺服器端（Server）｜ ←(5)– ｜A 客戶端（Client）｜(5)：傳送登出請求
Y 伺服器端（Server）｜ –(6)→ ｜A 客戶端（Client）｜(6)：在 header `Set-cookie` 為空後回傳 OK 

(5)：收到 Y 伺服器端的回應後，A 客戶端的瀏覽器就會將先前設定的 Cookie 刪除
※ 伺服器端可以修改 Cookie 的時機？：回應客戶端的時候（`Set-cookie`）

**- 安全性隱憂**
(7) B 客戶端將自己的 Cookie 值設為 A 客戶端的 Cookie 值

Y 伺服器端（Server）｜ ←(8)– ｜B 客戶端（Client）｜(8)：傳送請求

(9)： Y 伺服器端將收到的 Cookie 值進行解密後，解密失敗，回應錯誤回 B 客戶端
※ 使用者有機會從瀏覽器竄改 Cookie 
※ 由於其透明與儲存識別資訊的特性，確保 Cookie 的安全性這件事十分重要，敏感資訊盡量避免透過 Cookie 存於客戶端，或者進行加密


### Session

為避免使用者有機會從瀏覽器竄改 Cookie 的風險，於是有了 Session ，被儲存於伺服器端（Server），從而提升安全性，也解決 Cookie 容量有限的問題。

**什麼是 Session ?** 
- 我們使用 Session 將使用者相關的識別資訊存放在伺服器端，並產生一個對應的 Session ID ，內容完全是亂的隨機字串，無法被解密，降低被破解的機率
-  Session 儲存資料於伺服器端； Cookie 儲存對應的 Session ID 於客戶端
- 伺服器端憑客戶端 Cookie 儲存的 Session ID ，找到對應的 Session 資料
- 反過來說，若伺服器端沒有對應的 Session 資料，試圖更改 Cookie 碰撞 Session ID 也徒勞無功

**運作例子** 

**- 有使用 Session 的登入**
Y 伺服器端（Server）｜ ←(1)– ｜A 客戶端（Client）｜(1)：傳送正確的帳號密碼以登入
Y 伺服器端（Server）｜ –(2)→ ｜A 客戶端（Client）｜(2)： `Set-cookie: session=...` 後回傳 OK 

(3)： Y 伺服器端會紀錄 Session ID = `...` 的資料
(4)：收到 Y 伺服器端的回應後， A 客戶端的瀏覽器就會將收到的 Cookie 值 `session=...` 存入 Cookie 
(5)： A 客戶端再次向 Y 伺服器端傳送請求時，都會附上先前紀錄 `session=...` 的 Cookie ， Y 伺服器尋找此 Session ID 對應的 Session 資料後，即可通過驗證保持登入狀態，而不需再輸入帳號密碼


# 驗證機制

### 註冊

- **註冊**
    - **紀錄帳號、密碼（Hash）**
        出於安全性的考量，非常不建議直接將密碼存於資料庫，至少要經過 Hash 處理
        **Hash 函式：**
        可以稱為一種無法逆向演算回原本的數值的單向函數，可有效的保護密碼，有許多不同的演算法
        ：善用 PHP 內建的 [password_hash](https://www.php.net/manual/en/function.password-hash.php)、 [password_verify](https://www.php.net/manual/en/function.password-verify.php)
        
    - **安全風險：弱 Hash、彩虹表**
        **弱 Hash：**
        1. MD5（已被破解）
        2. SHA-1（已被發現結果可能碰撞）
        
        **彩虹表攻擊**
        預先將原本的數值與經過 Hash 處理後的結果建成表，暴力破解加密過的密碼雜湊
      
        如何防範？
        ：避免使用常見的密碼
        ：增加 Hash 處理的次數
        ：增長密碼長度
        例：加鹽處理（雜湊前在密碼中插入隨機的字串。）
    
### 登入

- 檢查帳密
    檢查輸入的帳號密碼是否在資料庫中有相對應的資料
- 將登入資訊儲存到 Session 裡
    ：善用 [PHP Session](https://www.php.net/manual/zh/ref.session.php)，也可以自己刻
- 設立時限
    例如：兩小時後自動登出

### 驗證

- 檢查 Session 裡的登入資訊
    例如：在 Session 中紀錄 `isLoggedIn=true` ，表示為已登入。若要確認是否已登入，則檢查 `isLoggedIn` 是否為真 

### 登出

- 移除 Session 或 Cookie
    建議刪除 Session ，因為 Cookie 可能儲存其他資料
