<?php
$app->post('/users/login', 'UsersController:UserAuth');
$app->post('/form/submit', 'FormController:SubmitForm');
$app->get('/form/lookup', 'LookupController:Lookup');
$app->get('/trainees/fetch', 'FormController:FetchTrainee');
$app->post('/lookup/submit', 'LookupController:submit');