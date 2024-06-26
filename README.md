# Instalace projektu
### 1. Dáme projekt do složky htdocs do svojí podsložky

### 2. Upravíme .env soubor 
>DB_CONNECTION=mysql
>DB_HOST=127.0.0.1            - hostname v tomto případě localhost
>DB_PORT=3306                 - port na kterém nám běží phpmyadmin
>DB_DATABASE=achilles         - název databáze kterou chceme použít pro projekt
>DB_USERNAME=root
>DB_PASSWORD=

### 3. Otevřeme si terminál v hlavní složce projektu a zadáme příkazy
>php artisan serve
>npm run build
>npm run dev 

>Pokud se vám zobrazí error "'vite' is not recognized as an internal or external command, operable program or batch file." použijte "npm install vite --save-dev" a použijte příkazy znovu

### 4. Použijeme migrace v projektu pro vytvoření tabulek v databázi (v případě že nepoužíváme už vytvořené tabulky importované přes sql soubor)
>php artisan migrate

### 5. Použijeme "seeding" pro vyplnění náhodných dat do tabulek před tímto krokem se musí vložit aspoň jeden řádek do tabulky "country"
>php artisan db:seed

### 6. Provedeme registraci zde (pokud je projekt nainstalovaný lokálně):
>http://127.0.0.1:8000/

### 7. Pro získání úplných práv 
>pro admin uživatele je potřeba jít do databáze do tabulky "users" a tam najít svůj účet a změnit sloupec "role" z default na admin

### 8. Momentální routy v projektu jsou 
>"/car" "/country" "/login" pokud jsme přihlášení "/dashboard" pouze pro uživatele co mají roli admin : "/account/manager"
### Uživatelé bez účtu se mohou dostat jen na routy /car a routy určené pro login register zapomenuté heslo
### Uživatelé s účtem s defaultní rolí se můžou dostat do /dashboard ale nemají právo editovat přídávat nebo mazat
### Uživatelé s účtem s rolí admin mají plné pravomoce a na routě /test můžou přidávat, editovat a mazat taky mají přístup k routě /account/manager kde vidí všechny registrované uživatele a můžou je mazat nebo jim změnit role/email/jméno




## Dokumentace
[Dokumentace webového projektu](https://github.com/user-attachments/files/15613937/Dokumentace.pro.webovy.projekt.1.docx)
