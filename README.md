# GraphApi
### 使用 FaceBook 提供的 API 抓取使用者間接平時透漏的資料
可蒐集這些不經意透漏的資訊加以分析，也許能分析出使用者的愛好及習慣


### 1. 可擷取到使用者發布貼文及被標記的貼文
![image](https://i.imgur.com/69MgzNN.png)

### 2. 擷取使用者喜歡的粉絲專頁等資料
![image](https://i.imgur.com/VrkPO4f.png)

- devices = 使用裝置
- about = 唯一號(網址)
- context => mutual_friends(共同朋友) & mutual_likes(共同喜歡)
- cover = 封面
- gender = 性別
- name = 姓名
- last_name = 姓
- first_name = 名
- link = 個資頁面(網址)
- locale = 國家(zh_TW)
- birthday = 生日(MM/DD/YYYY)
- updated_time = 最後更新資料時間(2016-05-17T18:31:39+0000)[TIMESTAMP]
- friends = 取得朋友數
- likes = 按過讚個專頁
- feed = 我的事跡(發文或換頭貼..等)
- events = 參加的活動
- posts = 發過的文
- albums = 相簿(名稱跟id)
- movies = 電影
- tagged = 被標記
- accounts?fields=about = 該使用者經營的粉絲專頁
- tagged_places = 我被標住過的地方(一堆資訊*)
- invitable_friends = 加我好有的人
