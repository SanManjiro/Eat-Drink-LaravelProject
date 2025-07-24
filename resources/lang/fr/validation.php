<?php
return [
    'required' => 'Le champ :attribute est obligatoire.',
    'email' => 'Le champ :attribute doit être une adresse email valide.',
    'min' => [
        'string' => 'Le champ :attribute doit contenir au moins :min caractères.',
        'array' => 'Le champ :attribute doit contenir au moins :min éléments.',
    ],
    'max' => [
        'string' => 'Le champ :attribute ne peut pas dépasser :max caractères.',
        'array' => 'Le champ :attribute ne peut pas dépasser :max éléments.',
    ],
    'unique' => 'La valeur du champ :attribute est déjà utilisée.',
    'exists' => 'Le champ :attribute sélectionné est invalide.',
    'attributes' => [
        'email' => 'adresse email',
        'password' => 'mot de passe',
        'stand_id' => 'stand',
        'produits' => 'produits',
    ],
];
