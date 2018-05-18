#### Goals
 * Get the flag

#### Solution
```python
#!/usr/bin/env python

import requests
import base64
import time

session = requests.Session()
url = "http://web.sniperoj.cn:10003/"
response = session.get(url)
get_flag = base64.b64decode(response.headers["Get-flag"])
data = {
    "SniperOJ": get_flag,
}
print session.post(url, data=data).text
```

#### Writeups
 * [Offical Writeup]()
 * [Other Writeup]()

