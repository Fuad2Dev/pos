<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\InitializeRequest;

class InitializerController extends Controller
{
    public function __invoke(InitializeRequest $request)
    {
        $config = Config::make($request->safe()->only('shop_name'));
        $config->logo = $request->file('logo')->store('logo', 'public');
        $config->save();

        $admin = User::make($request->safe()->only(['email', 'name']));
        $admin->password = Hash::make($request->password);
        $admin->isAdmin = true;
        $admin->save();

        return redirect('/');
    }
}
