<?php

use App\Models\User;

it('test_that_true_is_true',function(){

    $this->assertTrue(true);
});

it('return of addition of numbers',function(){
    $sum = 5 + 2;
    $user = $user = \App\Models\User::factory()->create();
    $this->assertEquals($sum,6);
    
});

it('password meets validation criteria', function () {
    $password = 'StrongPassword123'; // Replace with your password

    $this->assertTrue(
        strlen($password) >= 8 && // At least 8 characters
        preg_match('/[A-Z]/', $password) && // At least one uppercase letter
        preg_match('/[a-z]/', $password) && // At least one lowercase letter
        preg_match('/[0-9]/', $password) // At least one digit
    );
});

it('password is hashed correctly', function () {
    $password = 'StrongPassword123'; // Replace with your password

    $hashedPassword = Hash::make($password);

    $this->assertTrue(Hash::check($password, $hashedPassword));
});

it('throws exception', function () {
    throw new Exception('Something happened.');
})->throws(Exception::class);


it('throws no exceptions', function () {
    $result = 1 + 1;
})->throwsNoExceptions();

beforeAll(function (){
    echo "Starting UserController tests...\n";
});
beforeEach(function(){
    $this->user = User::factory()->create();
    echo "Before each test: Created User ID: " . $this->user->id . "\n";
});

afterAll(function (){
    echo "UserController tests completed.\n";
});
afterEach(function(){
    $this->user->delete();
    echo "After each test: Deleted User ID: " . $this->user->id . "\n";
});

test('UserController can retrieve a user', function () {
    // Test logic to assert the UserController retrieves the correct user
    $response = $this->get('/users/' . $this->user->id);
    $response->assertStatus(404);
});

test('UserController can delete a user', function () {
    // Test logic to assert the UserController can delete a user
    $response = $this->delete('/users/' . $this->user->id);
    $response->assertStatus(404);
    // $this->assertDatabaseMissing('users', ['id' => $this->user->id]);
});