<?php
$u = \App\Models\User::first();
if ($u) {
    $u->email = 'admin@gmail.com';
    $u->password = \Illuminate\Support\Facades\Hash::make('adminlpk1');
    $u->save();
}
