#! /bin/sh
BACKUP_DIR="/folder_to_dump"
DB_USER="username"
DB_PASS="password"
DB="batabase1 batabase2 batabase3"

for DB_NAME in $DB; do

 cd $BACKUP_DIR

 DB_DUMP="$BACKUP_DIR/$DB_NAME.sql"
 TIME_BACKUP=$(date +"%m-%d-%Y-%T")
 
 mysqldump -u $DB_USER -p$DB_PASS --skip-extended-insert $DB_NAME > $DB_DUMP

 cd $BACKUP_DIR

 git add $DB_DUMP
 git commit -m "Update database dump $TIME_BACKUP"
 git push
 
done
