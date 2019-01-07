<!-- Para fazer isso funcionar é necessaário baixar o composer e depois ir no projeto pelo cmd e instalar a dependencia. Consultar no github -->
<!-- Para manipular data e hora -->
<!-- <?php
	include("vendor/autoload.php");
	use Carbon\Carbon;

	$hoje = Carbon::now();
	echo "Hoje: ".$hoje;
	echo '<br>';

	$amanha = Carbon::now()->addDay();
	echo "Amanha: ".$amanha;
?> -->

<?php 
// Encontrar endereço pelo CEP consultando diretamente o WebService dos Correios.
// use FlyingLuscas\Correios\Client;

// require 'vendor/autoload.php';

// $correios = new Client;

// print_r($correios->zipcode()
// ->find('37520-000'));


// Calcular preços e prazos de serviços de entrega (Sedex, PAC e etc), com suporte a multiplos objetos na mesma consulta.

use FlyingLuscas\Correios\Client;
use FlyingLuscas\Correios\Service;

require 'vendor/autoload.php';

$correios = new Client;

print_r($correios->freight()
    ->origin('37520-000')
    ->destination('87047-230')
    ->services(Service::SEDEX, Service::PAC)
    ->item(16, 16, 16, .3, 1) // largura, altura, comprimento, peso e quantidade
    ->calculate());

 ?>
