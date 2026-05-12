<?php
$u = \App\Models\User::first();
if ($u) {
    $u->email = 'hisnuldqm@gmail.com';
    $u->password = \Illuminate\Support\Facades\Hash::make('hisnulekonomi');
    $u->save();
    echo "User updated successfully.";
} else {
    echo "User not found.";
}
