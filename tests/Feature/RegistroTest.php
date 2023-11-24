<?php

it('has registro page', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

// it('Registro normal', function(){
//     $response = $this->post('register', [
//         'name' =
//     ]);

// })
