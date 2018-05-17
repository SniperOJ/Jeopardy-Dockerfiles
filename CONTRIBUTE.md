## How to contribute?

Firstly, please take the following quick survey which can help you start efficiently.
Quick Survey:
```python
switch challenge_type:
  case 'web':
    if languge == 'PHP':
      if need_db_support:
        jump step 1
      else:
        jump step 2
    else:
      jump step 5
  case 'pwn':
    if arch == 'x86-64':
      jump step 3
    elif arch == 'x86':
      jump step 4
  default:
    jump step 5
```

#### 1. PHP Challenge With DB support
#### 2. PHP Challenge
#### 3. PWN Challenge on x64 architure
#### 4. PWN Challenge on x86 architure
#### 5. Other Challenge
