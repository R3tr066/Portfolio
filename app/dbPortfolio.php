<?php

require_once __DIR__ . '/../app/connection.php';

function displayStockReport(PDO $connection):array
{

    // SQL query to retrieve data
    $sql = "WITH price AS (
                  SELECT
                      s.id AS stock_id
                 , p.price
                 , p.price_date
                 , c.mark
                  FROM
                      stock s
                      INNER JOIN price p
                                 ON s.id = p.stock_id
                      INNER JOIN currency c
                                 ON s.currency_id = c.id
                  WHERE
                      p.price_date = (
                                         SELECT
                                             MAX(price_date)
                                         FROM
                                             price
                                         WHERE
                                             stock_id = s.id
                                         )
                  )
       , stock AS (
                  SELECT
                      s.id AS stock_id
                 , s.name AS Name
                 , SUM(st.volume) AS Volume
                 , CAST(SUM(st.volume * st.price) / SUM(st.volume) AS NUMERIC(10, 4)) AS price
                  FROM
                      stock_transaction st
                      INNER JOIN stock s
                                 ON st.stock_id = s.id
                  GROUP BY
                      s.id
                  )

    SELECT
        s.Name
   , s.Volume
   , s.price
   , p.mark
   , p.price AS latest_price
   , to_char(p.price_date, 'DD.MM.YYYY') AS price_date
   , s.Volume * s.price AS value
   , s.Volume * p.price AS value_2
   , (s.Volume * p.price) - (s.Volume * s.price) AS profit
   , CAST(ROUND(((s.Volume * p.price) - (s.Volume * s.price)) / (s.Volume * s.price) * 100, 2) AS NUMERIC(6,2)) AS percent

    FROM
        stock s
        INNER JOIN price p
                   ON s.stock_id = p.stock_id";

    // prepare and execute query
    $stmt = $connection->prepare($sql);
    $stmt->execute();

    // fetch data
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;

}

?>