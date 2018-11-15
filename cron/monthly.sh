#!/bin/bash
# cron setup
# @monthly /var/www/localhost/htdocs/Torrage/cron/monthly.sh

cd /var/www/localhost/htdocs/Torrage/sync/

lastmonth="$(date -d "5 days ago" +%Y%m)"

sort ${lastmonth}.txt ${lastmonth}??.txt | uniq | sort > ${lastmonth}.sort;
rm ${lastmonth}.txt;
mv ${lastmonth}.sort $lastmonth.txt;

rm ${lastmonth}??.txt;
