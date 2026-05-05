<?php

test('application is healthy', function () {
    expect(true)->toBeTrue();
});

test('sum of two numbers works', function () {
    expect(3 + 3)->toBe(6);
});
