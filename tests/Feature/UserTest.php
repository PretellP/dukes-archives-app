<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_register_user()
    {
        $this->withoutExceptionHandling();

        $user = User::where('nickname', 'adminduque')->first();
        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $request = (User::factory()->make())->toArray();
        $request['password'] = '123456';

        $response = $this->actingAs($user)->post(route('admin.users.store'), $request);

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function test_update_user()
    {
        $this->withoutExceptionHandling();
        $user = User::where('nickname', 'adminduque')->first();

        $request = $user->toArray();
        $request['name'] = 'adminduque';
        $request['gender'] = 2;
        $request['password'] = null;

        $response = $this->actingAs($user)->post(route('admin.users.update', $user), $request);

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function test_delete_user()
    {
        $this->withoutExceptionHandling();
        $user = User::where('nickname', 'adminduque')->first();

        $userStored = User::factory()->create();

        $response = $this->actingAs($user)->delete(route('admin.users.destroy', $userStored));

        $this->assertEquals(200, $response->getStatusCode());
    }
}
