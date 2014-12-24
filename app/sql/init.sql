BEGIN;

CREATE TABLE users
(
    id serial NOT NULL,
    auth_name varchar(100) NOT NULL,
    auth_key varchar(60) NOT NULL,
    PRIMARY KEY ("id");
);

INSERT INTO public.users (id, auth_name, auth_key) VALUES (1, 'foo', 'secret');
INSERT INTO public.users (id, auth_name, auth_key) VALUES (2, 'bar', 'another secret');


COMMIT;

