FROM mysql:8
RUN echo "default-authentication-plugin=mysql_native_password" >> /etc/mysql/my.cnf && \
    echo 'sql_mode = "STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION"' >> /etc/mysql/my.cnf
COPY permissions_and_database.sql permissions_and_database.sql
