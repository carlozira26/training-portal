<?php
$app->post('/users/login', 'UsersController:UserAuth');
$app->post('/form/submit', 'FormController:SubmitForm');
$app->get('/form/lookup', 'LookupController:Lookup');