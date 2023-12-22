<?php

it('does not use dd() or dump() in project files except vendor folder', function () {
    $grepCommand = "grep -rEl --exclude-dir=vendor --include='*.php' 'dd\(|dump\(' " . base_path();

    exec($grepCommand, $output, $exitCode);

    if ($exitCode === 0) {
        $matchingFiles = array_map('trim', $output);
        dump("Files containing dd() or dump():", $matchingFiles);
        
    } else {
        dump("Grep command failed with exit code: " . $exitCode);
    }

    expect($exitCode)->toBe(0);
    // expect($matchingFiles ?? [])->toBeEmpty('The project contains usage of dd() or dump().');
});


test('globals')->expect(['dd','dump'])->not->tobeUsed();

test('abstract')
    ->expect('App\Http\Controllers')->not
    ->toBeAbstract();

test('classes')->expect('App\Models')->toBeClasses();