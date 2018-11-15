#!/bin/bash
# cron setup
# @daily /var/www/localhost/htdocs/Torrage/cron/daily.sh

cd /var/www/localhost/htdocs/Torrage/sync/

yesterday="$(date -d "yesterday" +%Y%m%d)"

sort -o $yesterday.txt -u $yesterday.txt;

cd /var/www/localhost/htdocs/Torrage/t/
sort -o trackers.txt -u trackers.txt;
