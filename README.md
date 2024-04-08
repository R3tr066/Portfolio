# Portfólio
Táto aplikácia zobrazuje informácie o aktuálnych cenách akcií vo vašom portfóliu

## Návod na správne spustenie
### Požiadavky na fungovanie
- nainštalovaný Docker a Docker compose

### Rozbehnutie aplikácie
1. stiahnuť použitím `git clone git@github.com:R3tr066/Portfolio.git Portfolio`
2. `cd Portfolio`
3. vytvorenie úložiska pre dáta z databázy `docker volume create postgres-data`
4. rozbehnutie aplikácie `docker compose up -d`
5. vytvorenie schémy v databáze `docker exec -it portfolio-php php db/001.php`
### Zapnutie a vypnutie aplikácie
- vypnutie aplikácie `docker compose stop`
- zapnutie aplikacie `docker compose start`
