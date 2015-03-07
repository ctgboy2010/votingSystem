<?php

Route::resource('/voting','VotingSystemController');

Route::get('/candidateEntry','VotingSystemController@createCandidate');







