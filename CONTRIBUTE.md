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
* name your challenge and create a folder under `web/` directory, this directory will the your challenge root, eg: `easy-injection`
```
cd web
mkdir easy-injection
cd easy-injection
```
* copy all file from the challenge template folder `example/web/db`, eg:
```
cp -r example/web/db/* ./
```
* Edit `Dockerfile` and `docker-compose.yml` to config your vulnerability environment.
* Copy your source code to folder `source`
* Copy your database init script as `database.sql`
* Run `docker-compose build` to make sure your `Dockerfile` and `docker-compose.yml` have no errors.
* Run `docker-compose up -d` to start the vulnerability environment.
* Test whether your challenge is set successfully, it depends on the logic of your challenge.
#### 2. PHP Challenge
* name your challenge and create a folder under `web/` directory, this directory will the your challenge root, eg: `easy-injection`
```
cd web
mkdir easy-injection
cd easy-injection
```
* copy all file from the challenge template folder `example/web/db`, eg:
```
cp -r example/web/db/* ./
```
* Edit `Dockerfile` and `docker-compose.yml` to config your vulnerability environment.
* Copy your source code to folder `source`
* Run `docker-compose build` to make sure your `Dockerfile` and `docker-compose.yml` have no errors.
* Run `docker-compose up -d` to start the vulnerability environment.
* Test whether your challenge is set successfully, it depends on the logic of your challenge.
#### 3. PWN Challenge on x64 architure
#### 4. PWN Challenge on x86 architure
#### 5. Other Challenge
