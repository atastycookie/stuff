#! /bin/sh
BACKUP_DIR="/folder_to_dump"
DB_USER="username"
DB_PASS="password"
DB="batabase1 batabase2 batabase3"

for DB_NAME in $DB; do

 TIME_BACKUP=$(date +"%m-%d-%Y-%T")

 cd $BACKUP_DIR
 mkdir -p $BACKUP_DIR/$DB_NAME/$TIME_BACKUP
 cd $BACKUP_DIR/$DB_NAME/$TIME_BACKUP

 DB_DUMP="$BACKUP_DIR/$DB_NAME/$TIME_BACKUP/$DB_NAME.sql"
 mysqldump -u $DB_USER -p$DB_PASS --skip-extended-insert $DB_NAME > $DB_DUMP

 cd $BACKUP_DIR

 git add $DB_DUMP
 git commit -m "Update database dump $TIME_BACKUP"
 git push

 
done
