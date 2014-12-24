Setup
==========

prepare:
```sh
% composer update

% createdb pomm2_test
% cat app/sql/init.sql | psql pomm2_test
```

edit dsn in app/config/config.yml
```yml
...
pomm:
    configuration:
        db:
            dsn: 'pgsql://user@localhost:port/pomm2_test'
```

run

```sh
%  php app/console server:run
Server running on http://127.0.0.1:8000
```

`http://localhost:8000/app_dev.php/`

