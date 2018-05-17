#!/usr/bin/env python

from time import sleep
import sys

with open("flag.txt") as f:
    flag = f.read()

def compare_flag(input_flag):
    length = len(input_flag)
    if(length == 0):
        return False
    if(length > len(flag)):
        return False
    if input_flag.lower() == "exit":
        exit(1)
    for i in range(length):
        if input_flag[i] != flag[i]:
            return False
        sleep(0.25)
    return True


with open(__file__) as f:
    code = list(f)
    for i in code:
        sys.stdout.write(i)
        sys.stdout.flush()

for i in range(0x10000):
    sys.stdout.write("Give me flag:")
    sys.stdout.flush()
    input_flag = raw_input()
    compare_flag(input_flag)
