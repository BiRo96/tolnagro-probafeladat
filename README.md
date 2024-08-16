# Tolnagro próbafeladat
~ Bihary Roland ~

  
### Első futtatás

Nekem a docker valamilyen jogosultsági hibákkal küzködik, szóval abban az esetben, ha azt a választ kapjuk valamire, hogy ***"Docker is not running"*** nekem megoldotta az, ha egy ```su``` paranccsal admin terminálból futtattam le a következő parancsokat.

Klónozzuk le a repo-t:

```bash
git clone https://github.com/BiRo96/tolnagro-probafeladat.git
cd tolnagro-probafeladat
```

Amikor a projektet letöltöttük, akkor a következő parancsokat kell futtatnunk:

```bash
cp .env.example .env
composer install
npm install
sudo chmod 0777 ./ -R

./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan db:seed --class=EmailSeeder
./vendor/bin/sail npm run dev
```

Majd ezt követően a .env fájlban meg kell adni a mailtrap.io smtp felhasználó nevünket és jelszavunkat.  
*(Mailtrap-et használtam annak érdekébe, hogy véletlenül se küldjek ki élesbe sehova semmilyen e-mail-t.)*  

Ezeket a változókat keressük:
- MAIL_USERNAME
- MAIL_PASSWORD
  
[Végül egy új terminálba elindítjuk az ütemezett feladatokat](#e-mail-ek-ütemezett-kiküldése)


### Az alkalmazás futtatása

A projekt dockerizált környezetben fut, Vite használatával együtt, aminek  elindításához a következő parancsot kell futtatni:

```bash
./vendor/bin/sail up -d
./vendor/bin/sail npm run dev
``` 

### E-mail-ek ütemezett kiküldése

```bash
./vendor/bin/sail artisan schedule:work
``` 
