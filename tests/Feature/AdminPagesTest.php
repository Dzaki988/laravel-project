<?php

test('admin about page uses the shared admin layout', function () {
    $response = $this->get('/admin/about');

    $response->assertOk();
    $response->assertSee('Hobi');
    $response->assertSee('Dashboard');
});

test('admin student page uses the shared admin layout', function () {
    $response = $this->get('/admin/student');

    $response->assertOk();
    $response->assertSee('Student');
    $response->assertSee('Search');
});
