#### Goals
 * Try to find the flag

#### Server Address
 * http://web.sniperoj.com:10007/

#### Solution
```python
#!/usr/bin/env python

import requests
import base64
import time
import sys

if len(sys.argv) != 3:
	print "Usage: "
	print "\tpython %s [HOST] [PORT]" % (sys.argv[0])
	exit(1)

host = sys.argv[1]
port = int(sys.argv[2])

url = "http://%s:%d/" % (host, port)

session = requests.Session()
response = session.get(url)
get_flag = base64.b64decode(response.headers["Get-flag"])
data = {
    "SniperOJ": get_flag,
}
print session.post(url, data=data).text
```

#### Writeups
 * TODO

