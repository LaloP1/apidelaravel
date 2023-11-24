<?php

it('Inicio de login', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});

it('Email y password correctos', function(){

    $user = App\Models\User::where('email', 'pala@gmail.com')->first();

    $response = $this->post('/login',
    [
        'email' => 'pala@gmail.com',
        'password' => '123123123',
    ]);

    $response->assertRedirect('/home');

    $this->assertAuthenticatedAs($user);
});


it('falil login', function(){

    $response = $this->post('/login', [
        'email' => 'test@test.com',
        'password' => '1234567890',
    ]);

    $this->assertGuest();
});

it('email con numeros', function(){
    $response = $this->post('/login', [
        'email' => '1',
        'password' => '123123123',
    ]);

    $response->assertInvalid('email');
    // $response->assertSee('Incluye un signo @ en la dirección de correo electrónico. La dirección &quot;1&quot; no incluye el signo &quot;@&quot;." ');
    $this->assertGuest();
});

it('password incorrecto', function(){
    $response = $this->post('/login',[
        'email' => 'pala@gmail.com',
        'password' => '1234',
    ]);
    $response->assertSessionHasErrors('email');
    // $response->assertSee('These credentials do not match our records.');
    $this->assertGuest();
});
it('datos vacios', function(){
    $response = $this->post('/login',[
        'email' => '',
        'password' => '',
    ]);

    $response->assertSessionHasErrors(['email', 'password']);

});

it('Campo password vacio', function(){
    $response = $this->post('/login', [
        'email' => 'pala@gmail.com',
        'password' => '',
    ]);

    $response->assertInvalid('password');
});
it('Campo email vacio', function(){
    $response = $this->post('/login', [
        'email' => '',
        'password' => '123123123',
    ]);
    $response->assertInvalid('email');
});

it('Inyeccion SQL', function(){
    $response = $this->post('/login', [
        'email' => "'OR '1' = '1",
        'password' => "'OR '1' = '1",
    ]);
    $this->assertGuest();
});

it('Email invalido', function(){
    $response = $this->post('/login', [
        'email' => 'palaassds',
        'password' => '123123123',
    ]);
    $response->assertInvalid('email');
});
