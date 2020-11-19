<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AddAdminUser extends Migration
{

    public function up()
    {
        $data = config('admin');
        $data['password'] = Hash::make($data['password']);
        /** @var User $user */
        $user = User::query()
            ->create($data);

        $user->markEmailAsVerified();
    }

    public function down()
    {
        $email = config('admin.email');
        User::query()
            ->where('email', $email)
            ->delete();
    }
}
