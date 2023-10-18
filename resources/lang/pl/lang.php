<?php

return [
    'enums' => [
        'fuelType' => [
            'Petrol' => 'Benzyna',
            'Diesel' => 'Diesel',
            'LPG' => 'LPG',
            'Electric' => 'Elektryk'
        ],
    ],
    'cars' => [
        'add' => [
            'title' => 'Dodaj nowy samochód'
        ],
        'edit' => [
            'title' => 'Edytuj samochód o identyfikatorze: :id'
        ],
        'show' => [
            'title' => 'Samochód o identyfikatorze: :id'
        ],
        'all' => [
            'title' => 'Samochody',
            'id' => 'ID',
            'name' => 'Marka',
            'model' => 'Model',
            'fuelType' => 'Rodzaj paliwa',
            'yearOfProduction' => 'Rok produkcji',
            'transmission' => 'Skrzynia biegów',
            'driveType' => 'Napęd',
            'addInfo' => 'Informacje',
            'price' => 'Cena',
            'price_min' => 'Minimalna cena',
            'price_max' => 'Maksymalna cena',
            'filter_button' => 'Wyszukaj',
            'image' => 'Obrazek',
            'actions' => 'Akcje',
            'find' => 'Znaleziono'
        ]
    ],

    'users' => [
        'add' => [
            'title' => 'Zarejestruj nowego użytkownika'
        ],
        'edit' => [
            'title' => 'Edytuj użytkownika o identyfikatorze: :id'
        ],
        'all' => [
            'id' => 'ID',
            'title' => 'Użytkownicy',
            'email' => 'E-mail',
            'name' => 'Imię',
            'role' => 'Rola',
            'status' => 'Status',
            'actions' => 'Akcje',
            'online' => 'Online',
            'offline' => 'Offline',
            'password' => 'Hasło',
        ],
        'message' => [
            'register_password_message' => 'Jeśli nie chcesz zmieniać hasła, pozostaw to pole puste',
            'change_role_message' => 'Zmień rolę dla tego użytkownika'
        ]
    ],
    'labels' => [
        'home' => [

            'about' => 'O nas!',
            'contact' => 'Kontakt',
            'findus' => 'Znajdź nas',
            'main' => 'Główna aplikacja',
            'phonenr' => 'Numer telefonu',
            'email' => 'E-mail',
            'our_offer' => 'Nasza oferta!',
            'previous' => 'Poprzedni',
            'next' => 'Następny'
        ],
        'app' => [

        ],
        'all' => [
            'homepage' => 'Strona główna',
            'cars' => 'Samochody',
            'users' => 'Użytkownicy',
            'search' => 'Wyszukiwarka'
        ]
    ],

    'button' => [
        'save' => 'Zapisz',
        'add' => 'Dodaj',
        'display' => 'Pokaż',
        'edit' => 'Edytuj',
        'remove' => 'Usuń',
        'cancel' => 'Anuluj',
        'back' => 'Powrót',
        'send_email' => 'Wyślij e-mail w celu zresetowania hasła'
    ],

    'message' => [
        'error' => 'Niespodziewany błąd. Spróbuj ponownie później lub skontaktuj się z administratorem!',
        'success_edit' => 'Aktualizacja zakończona sukcesem!',
        'success_add' => 'Dodano pomyślnie!',
        'success_delete' => 'Usunięcie zakończone sukcesem!',
        'success_role_change' => 'Zmiana roli zakończona sukcesem!',
        'role_change_title' => 'Czy na pewno chcesz zmienić rolę tego użytkownika?',
        'delete_message_title' => 'Czy na pewno chcesz usunąć: ":name"?',
        'yes' => 'Tak',
        'no' => 'Nie',
        'emailExist' => 'Podany email już istnieje'
    ],
];