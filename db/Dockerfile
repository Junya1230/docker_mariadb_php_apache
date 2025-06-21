# FROM mariadb:latest
FROM mariadb:12.0.1-ubi9-rc

ADD my.cnf /etc/mysql/conf.d/my.cnf
ADD sql.sql /docker-entrypoint-initdb.d
