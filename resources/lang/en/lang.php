<?php

return [
    'enums' => [
        'fuelType' => [
            'Petrol' => 'Petrol',
            'Diesel' => 'Diesel',
            'LPG' => 'LPG',
            'Electric' => 'Electric'
        ],
    ],
    'cars' => [
        'add' => [
            'title' => 'Add new car'
        ],
        'edit' => [
            'title' => 'Edit car with id: :id'
        ],
        'show' => [
            'title' => 'Car with id: :id'
        ],
        'all' => [
            'title' => 'Cars table',
            'id' => 'ID',
            'name' => 'Make',
            'model' => 'Model',
            'fuelType' => 'Fuel Type',
            'yearOfProduction' => 'Year Of Production',
            'transmission' => 'Transmission',
            'driveType' => 'Drive Type',
            'addInfo' => 'Info',
            'price' => 'Price',
            'price_min' => 'Minimum price',
            'price_max' => 'Maximum price',
            'filter_button' => 'Search',
            'image' => 'Image',
            'actions' => 'Actions',
            'find' => 'Find'
        ]
    ],

    'users' => [
        'add' => [
            'title' => 'Register new user'
        ],
        'edit' => [
            'title' => 'Edit user with id: :id'
        ],
        'all' => [
            'id' => 'ID',
            'title' => 'Users table',
            'email' => 'E-mail',
            'name' => 'Name',
            'role' => 'Role',
            'status' => 'Status',
            'actions' => 'Actions',
            'online' => 'Online',
            'offline' => 'Offline',
            'password' => 'Password',
        ],
        'message' => [
            'register_password_message' => 'Leave this label blank if you do not want to change password',
            'change_role_message' => 'Change role for this user'
        ]
    ],
    'labels' => [
        'home' => [

            'about' => 'About Us!',
            'contact' => 'Contacts',
            'findus' => 'Find Us',
            'main' => 'Main app',
            'phonenr' => 'Phone number',
            'email' => 'E-mail',
            'our_offer' => 'Our offer!',
            'previous' => 'Previous',
            'next' => 'Next'
        ],
        'app' => [

        ],
        'all' => [
            'homepage' => 'Home page',
            'cars' => 'Cars list',
            'users' => 'Users list',
            'search' => 'Search page'
        ]
    ],

    'button' => [
        'save' => 'Save',
        'add' => 'Add',
        'display' => 'Show',
        'edit' => 'Edit',
        'remove' => 'Remove',
        'cancel' => 'Cancel',
        'back' => 'Go Back',
        'send_email' => 'Send email to reset password'
    ],

    'message' => [
        'error' => 'Unexpected error. Try later or contact with administrator!',
        'success_edit' => 'Successful update!',
        'success_add' => 'Added successfully!',
        'success_delete' => 'Successful delete!',
        'success_role_change' => 'Successful role change!',
        'role_change_title' => "Are you sure you want to change this user's role?",
        'delete_message_title' => "Are you sure to delete this ':name'",
        'yes' => 'Yes',
        'no' => 'No',
        'emailExist' => 'E-mail already exist'
    ],
];