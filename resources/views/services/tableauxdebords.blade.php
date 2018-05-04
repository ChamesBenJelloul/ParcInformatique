@extends('layouts.app')

@section('content')

    <h3>TABLEAUX DE BORDS</h3>
<?php
    //$ip =   "192.168.1.20";
    //exec("ping -n 3 $ip", $output, $status);

//echo exec("ping 192.168.1.20");
$host="192.168.1.20";

exec("ping -n 4 " . $host, $output, $result);

print_r($output);

if ($result == 0)

    echo "Ping successful!";

else

    echo "Ping unsuccessful!";
?>
@endsection