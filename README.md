# Passi da fare per poter utilizzare il template di Laravel

0. Creo la repository a partire dal template e mi clono la repository appena creata

1. Copio il file .env.example e lo rinomino in .env

2. Apro il terminale ed eseguo il comando composer install

3. Sempre nel terminale, al termine del comando composer install, eseguo il comando php artisan key:generate

4. Sempre nel terminale, al termine dell'esecuzione di php artisan key:generate, eseguiamo il comando npm install (oppure, npm i)

5. Sempre nel terminale, al termine di npm install, eseguire il comando npm run build
- Al posto di npm run build, potreste eseguire npm run dev e lasciarlo attivo

6. Aprire un altro terminale ed eseguire il comando php artisan serve


--------------------------------------------------------------------------------------------


# Passi per creare un'architettura CRUD completa

1. Inseriamo i parametri corretti nel file .env per connetterci al database di interesse

2. Creiamo la migration relativa alla risorsa. Il nome della migration sarà: create_NOME_RISORSA_IN_INGLESE_IN_SNAKE_CASE_AL_PLURALE_table (ad es., se la risorsa è libro, il nome della migration sarà create_books_table)

Una volta create tutte le migration necessarie (oppure per ogni migration), eseguire il comando php artisan migrate 

3. Creiamo il model relativo alla risorsa. Il nome del model sarà: NomeRisorsaInIngleseInPascalCaseAlSingolare (ad es., se la risorsa è libro, il nome del model sarà Book)

4. Creiamo il seeder relativo alla risorsa. Il nome del seeder sarà:
- NomeDellaTabellaDellaRisorsaInPascalCaseTableSeeder
- Oppure, NomeDelModelSeeder
(quindi, ad es., se la mia risorsa è libro, il nome del seeder sarà o BooksTableSeeder, oppure BookSeeder)

Una volta creati tutti i seeder necessari (oppure per ogni seeder), eseguire il comando php artisan db:seed --class=NomeSeeder per ogni seeder

OPPURE

Inserire in DatabaseSeeder la chiamata alla funzione $this->call(ARRAY), dove ARRAY sarà un array contenente tutti i riferimenti alle classi dei seeder da richiamare ed eseguire il comando php artisan db:seed

5. Creiamo il controller relativo alla risorsa. Il nome del controller sarà: NomeDelModelController (ad es., se la risorsa è libro, il nome del controller sarà BookController). Sarebbe ancora meglio creare il controller aggiungendo al comando il flag --resource, in modo da pre-popolare il controller con la definizione di tutte e 7 le funzioni che ci serviranno per le CRUD (cioè, il comando da eseguire sarà: php artisan make:controller NomeController --resource)

6. Definiamo le rotte relative alle funzioni del controller (quindi, 7 rotte). Sarebbe ancora meglio definirle tramite la chiamata al metodo resource di Route (cioè, se voglio definire le rotte relative alla risorsa libro, scriverò: Route::resource('books', BookController::class))

7. Creiamo le view relative alla risorsa. Nello specifico, dobbiamo creare 4 view:
- Una per l'index
- Una per lo show
- Una per il create
- Una per l'edit

Tutte queste 4 view, saranno messe in una cartella dentro views, nominata come la risorsa al plurale in kebab case (ad es., se la risorsa è mio libro, il nome della cartella sarà my-books). I nomi delle 4 view, solitamente, corrisponderanno al nome della funzione che le restituisce (quindi, index.blade.php per index, show.blade.php per show, create.blade.php per create e edit.blade.php per edit)

# Info utili
- Comando per tornare indietro di un batch di migration: php artisan migrate:rollback
- Comando per tornare indietro di tutti i batch di migration: php artisan migrate:reset
- Comando per eseguire migrate:reset + migrate: php artisan migrate:refresh
- Comando per eseguire migrate + db:seed: php artisan migrate --seed / php artisan migrate:refresh --seed
- Comando per vedere la lista delle rotte definite nell'applicazione: php artisan route:list
- Comando per creare un model, una migration, un seeder e un resource controller tutto insieme: php artisan make:model NomeRisorsa -msr

--------------------------------------------------------------------------------------------

<!-- Ciao ragazzi,
creiamo con Laravel il nostro sistema di gestione del nostro Portfolio di progetti.
Oggi iniziamo un nuovo progetto che si arricchirà nel corso delle prossime lezioni: man mano aggiungeremo funzionalità e vedremo la nostra applicazione crescere ed evolvere.
Nel pomeriggio, rifate ciò che abbiamo visto insieme stamattina stilando tutto a vostro piacere utilizzando SASS.

Descrizione:
Ripercorriamo gli steps fatti a lezione ed iniziamo un nuovo progetto usando IL TEMPLATE DI ALESSIO (oppure rifacendo un template simile).
Iniziamo con il definire il layout, modello, migrazione, controller e rotte necessarie per il sistema portfolio:
Autenticazione: si parte con l'autenticazione e la creazione di un layout per back-office
Creazione del modello Project con relativa migrazione, seeder, controller e rotte
Per la parte di back-office creiamo un resource controller Admin\ProjectController per gestire tutte le operazioni CRUD dei progetti

Bonus
Implementiamo la validazione dei dati dei Progetti nelle operazioni CRUD che lo richiedono usando due form requests. -->

--------------------------------------------------------------------------------------------

<!-- Ciao ragazzi,
continuiamo a lavorare sul codice dei giorni scorsi, ma in una nuova repo e aggiungiamo una nuova entità Type. Questa entità rappresenta la tipologia di progetto ed è in relazione one to many con i progetti.

I task da svolgere sono diversi, ma alcuni di essi sono un ripasso di ciò che abbiamo fatto nelle lezioni dei giorni scorsi:
- creare la migration per la tabella types
- creare il model Type
- creare la migration di modifica per la tabella projects per aggiungere la chiave esterna
- aggiungere ai model Type e Project i metodi per definire la relazione one to many
- visualizzare nella pagina di dettaglio di un progetto la tipologia associata, se presente
- permettere all'utente di associare una tipologia nella pagina di creazione e modifica di un progetto
- gestire il salvataggio dell'associazione progetto-tipologia con opportune regole di validazione

Bonus 1:
creare il seeder per il model Type.

Bonus 2:
aggiungere le operazioni CRUD per il model Type, in modo da gestire le tipologie di progetto direttamente dal pannello di amministrazione.
Buon lavoro e buon divertimento! -->

--------------------------------------------------------------------------------------------

<!-- Ciao ragazzi,
continuiamo a lavorare sul codice dei giorni scorsi, ma in una nuova repo e aggiungiamo una nuova entità Technology. Questa entità rappresenta le tecnologie utilizzate ed è in relazione many to many con i progetti.

I task da svolgere sono diversi, ma alcuni di essi sono un ripasso di ciò che abbiamo fatto nelle lezioni dei giorni scorsi:
- creare la migration per la tabella technologies
- creare il model Technology
- creare la migration per la tabella pivot project_technology
- aggiungere ai model Technology e Project i metodi per definire la relazione many to many
- visualizzare nella pagina di dettaglio di un progetto le tecnologie utilizzate, se presenti
- permettere all'utente di associare le tecnologie nella pagina di creazione e modifica di un progetto
- gestire il salvataggio dell'associazione progetto-tecnologie con opportune regole di validazione

Bonus 1:
creare il seeder per il model Technology.

Bonus 2:
aggiungere le operazioni CRUD per il model Technology, in modo da gestire le tecnologie utilizzate nei progetti direttamente dal pannello di amministrazione.
Buon lavoro e buon divertimento! -->

--------------------------------------------------------------------------------------------

Ciao ragazzi,
continuiamo a lavorare nella repo dei giorni scorsi e aggiungiamo un'immagine ai nostri progetti.
Ricordiamoci di creare il symlink con l'apposito comando artisan e di aggiungere l'attributo enctype="multipart/form-data" ai form di creazione e di modifica!
Buon lavoro e buon divertimento!






