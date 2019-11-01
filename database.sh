cd ./databases
for file in *.sql
do
  cat ${file} | docker exec -i server_db_1 mysql -u root --password=password
done