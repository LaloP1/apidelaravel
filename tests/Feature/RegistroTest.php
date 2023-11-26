<?php

it('has registro page', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

it('Registro normal', function(){
    $response = $this->post('/register', [
          'name' => 'Eduardo',
          'email' => 'eduardoquiroz_1124@gmail.com',
          'password' => '12341234',
          'password_confirmation' => '12341234',
      ]);
     $response->assertRedirect('/home');
  });

it('Registro sin nombre', function(){
    $response = $this->post('/register', [
        'name' => '',
        'email' => 'paloc0@gmail.com',
        'password' => '1234345667',
        'password-confirmation' => '1234345667',
    ]);
    $response->assertInvalid('name');
});

it('Registro sin email', function(){
    $response = $this->post('/register', [
        'name' => 'Eduardo',
        'email' => '',
        'password' => 'elpala1234',
        'password-confirmation' => 'elpala1234',
    ]);
    $response->assertInvalid('email');
});
it('Registro sin password', function(){
    $response = $this->post('/register', [
        'name' => 'Eduardo',
        'email' => 'paloc0@gmail.com',
        'password' => '',
        'password-confirmation' => '12345678',
    ]);
    $response->assertInvalid(['password']);
    //  $response->assertSee('Completa este campo.');
});
it('Registro sin password de confirmacion', function(){
    $response = $this->post('/register', [
        'name' => 'Eduardo',
        'email' => 'paloc0@gmail.com',
        'password' => 'elpala1234',
        'password-confirmation' => '',
    ]);
    $response->assertInvalid('password');
});
it('Registro con un password de menos de 8 caracteres', function(){
    $response = $this->post('/register', [
        'name' => 'Eduardo',
        'email' => 'paloc0@gmail.com',
        'password' => 'elpala',
        'password-confirmation' => 'elpala',
    ]);
    $response->assertInvalid('password');
});

it('Registro con nombre conteniendo caracteres raros', function(){
    $response = $this->post('/register', [
        'name' => '12345$%^&*',
        'email' => 'paloc0@gmail.com',
        'password' => 'elpala1234',
        'password-confirmation' => 'elpala1234',
    ]);
    $response->assertInvalid('name');
});

it('Email con numeros', function(){
    $response = $this->post('/register', [
        'name' => 'Eduardo',
        'email' => '12334',
        'password' => 'elpala1234',
        'password-confirmation' => 'elpala1234',
    ]);
    $response->assertInvalid('email');
});

it('Registro con email repetido', function(){
    $response = $this->post('/register', [
        'name' => 'Ernesto',
        'email' => 'pala@gmail.com',
        'password' => 'elpala1234',
        'password-confirmation' => 'elpala1234',
    ]);
    $response->assertInvalid('email');
});

it('Registro con email incorrecto', function(){
    $response = $this->post('/register', [
        'name' => 'Eduardo',
        'email' => 'hola12354#^$',
        'password' => 'elpala1234',
        'password-confirmation' => 'elpala1234',
    ]);
    $response->assertInvalid('email');
});

it('Password diferentes', function(){
    $response = $this->post('/register', [
        'name' => 'Eduardo',
        'email' => 'elpala123@gmail.com',
        'password' => 'elpala1234',
        'password-confirmation' => 'hola1234',
    ]);
    $response->assertInvalid('password');
});
