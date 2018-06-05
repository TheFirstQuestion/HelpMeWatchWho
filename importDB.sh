#!/bin/bash
echo "Starting..."
mysql -u root -p -e "drop database Who_List" \
&& echo "Database dropped!" \
&& mysql -u root -p -e "create database Who_List" \
&& echo "Database created!" \
&& mysql -u root -p Who_List < /var/www/html/HelpMeWatchWho/Who_List.sql \
&& echo "Database imported!" \
&& echo "Import successful. Done!" \
