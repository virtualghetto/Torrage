#!/bin/bash
# cron setup
# m		h	dom		mon					dow		command
# 0		0	1		JAN,APR,JUL,OCT		*		/var/www/localhost/htdocs/Torrage/cron/quarterly.sh

cd /var/www/localhost/htdocs/Torrage/

lastquarter="$(date -d "5 days ago" +%Y%m)"

find t/ -name "*.torrent" | cut -c 3- | sed -e "s/\///g" -e "s/\.torrent//g" > sync/all${lastquarter}.txt

sort -o sync/all${lastquarter}.txt -u sync/all${lastquarter}.txt;
bzip2 sync/all${lastquarter}.txt;
