<?php
function opsi ($pilihan) {
  $data = DB::table('options')->where('name', $pilihan)->first();
  return $data->value;
}

function set_active($uri, $output = 'active')
{
 if( is_array($uri) ) {
   foreach ($uri as $u) {
     if (Route::is($u)) {
       return $output;
     }
   }
 } else {
   if (Route::is($uri)){
     return $output;
   }
 }
}

function getBalance () {
  $data = DB::table('virtual_balance')->where('user_id', auth()->id())->orderBy('id', 'desc')->first();
  return $data->balance;
}

function getAvatar () {
  $v = DB::table('users')->where('id', auth()->id())->orderBy('id', 'desc')->first();
  return $v->avatar;
}

function getName () {
  $d = DB::table('users')->where('id', auth()->id())->orderBy('id', 'desc')->first();
  return $d->name;
}