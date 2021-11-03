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