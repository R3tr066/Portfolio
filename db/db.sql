DROP TABLE IF EXISTS stock_transaction;
DROP TABLE IF EXISTS price;
DROP TABLE IF EXISTS broker;
DROP TABLE IF EXISTS currency;
DROP TABLE IF EXISTS stock;
DROP TABLE IF EXISTS stock_transaction_type;

CREATE TABLE broker
(
    id   SERIAL
        CONSTRAINT broker_pk
            PRIMARY KEY,
    code VARCHAR(10)  NOT NULL
        CONSTRAINT broker_uq_code
            UNIQUE,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE currency
(
    id     SERIAL
        CONSTRAINT currency_pk
            PRIMARY KEY,
    code   VARCHAR(10) NOT NULL
        CONSTRAINT currency_uq_code
            UNIQUE,
    symbol VARCHAR(10) NOT NULL
);

CREATE TABLE stock
(
    id     SERIAL
        CONSTRAINT stock_pk
            PRIMARY KEY,
    symbol VARCHAR(10)  NOT NULL
        CONSTRAINT stock_uq_code
            UNIQUE,
    name   VARCHAR(100) NOT NULL
);

CREATE TABLE price
(
    id           SERIAL
        CONSTRAINT price_pk
            PRIMARY KEY,
    price        NUMERIC(10, 4) NOT NULL,
    stock_id     INTEGER        NOT NULL
        CONSTRAINT stock_fk
            REFERENCES stock,
    price_date   DATE           NOT NULL,
    created_date TIMESTAMP DEFAULT NOW(),
    currency_id  INTEGER        NOT NULL
        CONSTRAINT currency_fk
            REFERENCES currency
);


CREATE TABLE stock_transaction_type
(
    id   SERIAL
        CONSTRAINT stock_transaction_type_pk
            PRIMARY KEY,
    code VARCHAR(10)  NOT NULL
        CONSTRAINT stock_transaction_type_uq_code
            UNIQUE,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE stock_transaction
(
    id               SERIAL
        CONSTRAINT stock_transaction_pk
            PRIMARY KEY,
    type_id          INTEGER                 NOT NULL
        CONSTRAINT stock_transaction_type_fk
            REFERENCES stock_transaction_type,
    stock_id         INTEGER                 NOT NULL
        CONSTRAINT stock_fk
            REFERENCES stock,
    volume           NUMERIC(14, 8)          NOT NULL,
    price            NUMERIC(10, 4)          NOT NULL,
    currency_id      INTEGER                 NOT NULL
        CONSTRAINT currency_fk
            REFERENCES currency,
    transaction_date DATE                    NOT NULL,
    created_date     TIMESTAMP DEFAULT NOW() NOT NULL
);

INSERT INTO public.broker (code, name)
VALUES ('XTB', 'XTB');
INSERT INTO public.broker (code, name)
VALUES ('T212', 'Trading 212');

INSERT INTO public.currency (code, symbol)
VALUES ('EUR', '&euro;');
INSERT INTO public.currency (code, symbol)
VALUES ('USD', '&dollar;');

INSERT INTO public.stock (symbol, name)
VALUES ('SXR8.DE', 'iShares Core S&P 500 UCITS ETF USD (Acc)');
INSERT INTO public.stock (symbol, name)
VALUES ('2B7K.DE', 'iShares MSCI World SRI UCITS ETF');
INSERT INTO public.stock (symbol, name)
VALUES ('EUNL.DE', 'iShares Core MSCI World UCITS ETF USD (Acc)');
INSERT INTO public.stock (symbol, name)
VALUES ('BRYN.DE', 'Berkshire Hathaway Inc.');
INSERT INTO public.stock (symbol, name)
VALUES ('P911.DE', 'Dr. Ing. h.c. F. Porsche AG');
INSERT INTO public.stock (symbol, name)
VALUES ('UST.FR', 'Lyxor Nasdaq-100 UCITS (Acc EUR)');
INSERT INTO public.stock (symbol, name)
VALUES ('IDVY.NL', 'iShares Euro Dividend UCITS (Dist EUR)');
INSERT INTO public.stock (symbol, name)
VALUES ('QDV5.DE', 'iShares MSCI India UCITS ETF USD Acc');
INSERT INTO public.stock (symbol, name)
VALUES ('ASML.AS', 'ASML Holding N.V.');

INSERT INTO public.stock_transaction_type (code, name)
VALUES ('BUY', ' Kúpa');
INSERT INTO public.stock_transaction_type (code, name)
VALUES ('SELL', 'Predaj');
