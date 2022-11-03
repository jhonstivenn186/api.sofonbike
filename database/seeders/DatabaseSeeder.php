<?php

namespace Database\Seeders;

use App\Models\Detallesproducto;
use App\Models\Producto;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Posteo;
use App\Models\Categoria;
use App\Models\Bicicleta;
use App\Models\Imagen;
use App\Models\Estado;
use App\Models\Tipo;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
      

        $estado= new Estado();
        $estado->name = "Nuevo";
        $estado->save();

        $estado2= new Estado();
        $estado2->name = "Segunda mano";
        $estado2->save();

        $tipo= new Tipo();
        $tipo->name = "Bicicleta";
        $tipo->save();

        $tipo2= new Tipo();
        $tipo2->name = "Rueda";
        $tipo2->save();


        $categoria= new Categoria();
        $categoria->name = "Consejos";
        $categoria->save();

        $categoria2= new Categoria();
        $categoria2->name = "Rutas";
        $categoria2->save();

        $categoria3= new Categoria();
        $categoria3->name = "Criticas";
        $categoria3->save();

        $categoria3= new Categoria();
        $categoria3->name = "informativo";
        $categoria3->save();

     /*    $user= new User();
        $user->name = "Maicol";
        $user->apellido = "Gomez";
        $user->N_identificacion = "1002952356";
        $user->email = "Maicol123@gmail.com";
        $user->date = "2001-02-22";
        $user->celular = "3103458965";
        $user->username = "Maicol123";
        $user->password = "123456";
        $user->save();
 */
       /*  $posteo= new Posteo();
        $posteo->descripcion = " ➡️Utiliza los espacios seguros de CicloRuta. 📍
        ➡️La bicicleta es amigable con el medio ambiente. 🌱 
        ➡️Mejora tu salud. 💯 ¡Usa la BICI! ✔️";
        $posteo->imagen = "img/Multimedia/post1.jpg";
        $posteo->categoria_id = 2;
        $posteo->user_id = 1;
        $posteo->save();
     
        $posteo2= new Posteo();
        $posteo2->descripcion = " Los ciclistas son actores viales que facilitan la movilidad y contribuyen al cuidado del medioambiente. 🚴🏻👌🏻
        👉🏻Si eres conductor de bicicleta recuerda que, por tu seguridad es fundamental utilizar el equipo de protección.
        👉🏻Si te trasladas en otro tipo de vehículo respeta la distancia para evitar accidentes. 
        👉🏻Todos tenemos el derecho a la vida, no nos arrebatemos la oportunidad de disfrutarla.";
        $posteo2->imagen = "img/Multimedia/post2.jpg";
        $posteo2->categoria_id = 1;
        $posteo2->user_id = 1;
        $posteo2->save();
        
        $posteo3= new Posteo();
        $posteo3->descripcion = " ¡Estamos esperándote en el Parque Caldas! 🚲 💯
        Ven e inscríbete para que puedas usar las bicicletas públicas 🚴‍♂️ 🚴‍♀️ 
        Solo debes traer la fotocopia de tu cédula y la de un recibo de servicio público de tu lugar de residencia 😃
        ¡Anímate! ✌🏼";
        $posteo3->imagen = "img/Multimedia/post3.jpg";
        $posteo3->categoria_id = 4;
        $posteo3->user_id = 1;
        $posteo3->save(); */

/* 
        $bicicleta = new Bicicleta();
        $bicicleta->tamaño= "S";
        $bicicleta->descripcionhurto= "El ladrón se entra al conjunto residencial y arranca la bicicleta que la tenía montada al soporte del carro, corta la guaya y las correas de seguridad";
        $bicicleta->fechahurto= "23/06/2022";
        $bicicleta->ubicacionhurto= "Cl. 3 #7-35, Popayán, Cauca";
        $bicicleta->n_serial= "G7FA27780";
        $bicicleta->user_id = 1;
        $bicicleta->save();
    
        $detallesproducto = new Detallesproducto();
        $detallesproducto->name = "GIANT-G7FA27780";
        $detallesproducto->descripcion= "Bicicleta Giant Stance One 29 modelo 2021. Negra con morada, rin 29, llantas tubeless, sillin con espiga remota, grupo Sram SX con tensor NX";
        $detallesproducto->color= "Negra con morada";
        $detallesproducto->material= "fibra de carbono y titanio";
        $detallesproducto->marca= "GIANT";
        $detallesproducto->modelo= "Mtb";
        $bicicleta->detallesproducto()->save($detallesproducto);   

        $imagen = new Imagen();
        $imagen->url = "img/Multimedia/bici1.jpg";
        $bicicleta->imagen()->save($imagen);   

        $bicicleta2 = new Bicicleta();
        $bicicleta2->tamaño= "R29";
        $bicicleta2->descripcionhurto= "EN UN PARQUEDERO SIN VIGILANCIA Y ROMPIENDO LA GUALLA UBICADO EN LA CALLE 27 norte FUE HURTADA";
        $bicicleta2->fechahurto= "03/05/2022";
        $bicicleta2->ubicacionhurto= "Cl. 27 Nte. #4b-87 a 4b-1";
        $bicicleta2->n_serial= "13977190441";
        $bicicleta2->user_id = 1;
        $bicicleta2->save();
    
        $detallesproducto2 = new Detallesproducto();
        $detallesproducto2->name = "GIANT-G7FA27780";
        $detallesproducto2->descripcion= "GW HIENA CON CAMBIOS SHIMANU TUNDER TOURNEY, PATOS DELANTEROS EN EL TENEDOR, SILLA CON RESORTES ANCHO, EL MARCO RAYADO EN LA PARTE SUPERIOR CERCA A LA TENEDOR, LLANTAS RIN 29 SIN MARCAS, MANURIO EN ALUMINIO CON MANILLARES DE CAUCHO CON BORDES AZULES.";
        $detallesproducto2->color= "Negro y azul";
        $detallesproducto2->material= "ALUMINIO";
        $detallesproducto2->marca= "GW";
        $detallesproducto2->modelo= "Lynx";
        $bicicleta2->detallesproducto()->save($detallesproducto2);   

        $imagen2 = new Imagen();
        $imagen2->url = "img/Multimedia/bici2.jpg";
        $bicicleta2->imagen()->save($imagen2);   

        $bicicleta3 = new Bicicleta();
        $bicicleta3->tamaño= "M";
        $bicicleta3->descripcionhurto= "La bicicleta se deja amarrada con dos candados justo enfrente de la biblioteca, rompieron los candados.";
        $bicicleta3->fechahurto= "01/02/2022";
        $bicicleta3->ubicacionhurto= "Cl. 7, Popayán, Cauca";
        $bicicleta3->n_serial= "1N4B19023C";
        $bicicleta3->user_id = 1;
        $bicicleta3->save();
    
        $detallesproducto3 = new Detallesproducto();
        $detallesproducto3->name = "ROSSETTI-DIABLESSE";
        $detallesproducto3->descripcion= "Bicicleta de Ruta con MArco Rossetti Diablese Talla M color Negro von visos verdes, con grupo shimano 105, pedales shimano.";
        $detallesproducto3->color= "Negro y amarillo";
        $detallesproducto3->material= "Acero";
        $detallesproducto3->marca= "ROSSETTI";
        $detallesproducto3->modelo= "Lynx";
        $bicicleta3->detallesproducto()->save($detallesproducto3);   

        $imagen3 = new Imagen();
        $imagen3->url = "img/Multimedia/bici3.jpg";
        $bicicleta3->imagen()->save($imagen3);   
 */

/* 
        $producto4= new  Producto();
        $producto4->talla= "M";     
        $producto4->comprobante = "pdf/archivos/Comprobante.pdf";
        $producto4->cantidad=1;
        $producto4->precio="520.000";
        $producto4->user_id = 1;
        $producto4->tipo_id = 1;
        $producto4->estado_id = 1;
        $producto4->save();

        $detallesproducto4 = new Detallesproducto();
        $detallesproducto4->name ="Mountain bike GW Hyena R29 S 27v frenos de disco hidráulico";
        $detallesproducto4->descripcion="Esta bicicleta de montaña tiene un diseño resistente y ergonómico. Su manubrio de aluminio y cuadro de aluminio es ideal para realizar paseos en cualquier tipo de camino. Sus componentes crean una interfaz más eficaz entre bicicleta y ciclista que requiere menos energía.
        A través de un sistema de cambio de bajo esfuerzo y sistemas de frenado de respuesta lineal, te ofrece una excelente potencia y modulación, para que puedas centrarte solamente en disfrutar de tu bicicleta.";
        $detallesproducto4->color="Rojo bizarre mate/ Negro perlado";
        $detallesproducto4->material="Aluminio";
        $detallesproducto4->marca="GW";
        $detallesproducto4->modelo="Hyena";
        $producto4->detallesproducto()->save($detallesproducto4);   

        $imagen4 = new Imagen();
        $imagen4->url = "img/Multimedia/comprar1.png";
        $producto4->imagen()->save($imagen4);   

        $producto5= new  Producto();
        $producto5->talla= "S";     
        $producto5->comprobante = "pdf/archivos/Comprobante.pdf";
        $producto5->cantidad=1;
        $producto5->precio="699.000";
        $producto5->user_id = 1;
        $producto5->tipo_id = 2;
        $producto5->estado_id = 2;
        $producto5->save();

        $detallesproducto5 = new Detallesproducto();
        $detallesproducto5->name ="Bicicleta Roadmaster Storm 29 F.disco Bloq Suspension 21v";
        $detallesproducto5->descripcion=" Esta fantástica Bicicleta cuenta con 21 Velocidades, incluyendo Shimano Tourney de 7 Velocidades para disfrutar de una experiencia mas placentera al momento de pedalear, incluimos como medida de seguridad frenos delanteros y traseros de Disco Mecanico , que permite una frenada y segura; Tambien encontraras uno de los marcos mas ligeros, y resistentes en el mercado, el marco RoadMaster STORM Ultra Liviano, que permite no sentir el peso de esta increíble Bicicleta.";
        $detallesproducto5->color="Negro con Verde";
        $detallesproducto5->material="Aluminio";
        $detallesproducto5->marca="Roadmaster";
        $detallesproducto5->modelo="Storm";
        $producto5->detallesproducto()->save($detallesproducto5);   
        
        $imagen5 = new Imagen();
        $imagen5->url = "img/Multimedia/comprar2.jpg";
        $producto5->imagen()->save($imagen5);   

        $producto6= new  Producto();
        $producto6->talla= "s";     
        $producto6->comprobante = "pdf/archivos/Comprobante.pdf";
        $producto6->cantidad=1;
        $producto6->precio="419.990";
        $producto6->user_id = 1;
        $producto6->tipo_id = 1;
        $producto6->estado_id = 2;
        $producto6->save();

        $detallesproducto6 = new Detallesproducto();
        $detallesproducto6->name ="Bicicleta Todo Terreno Rin 24 En Acero, 18 Vel. Aro D/p";
        $detallesproducto6->descripcion="Marco barra caída (especial para género femenino)
        18 velocidades
        Cambios tipo moto o de palanca dependiendo de disponibilidad
        Marco en acero 1.9 nacional
        Freno v-brake
        Aro en aluminio doble pared";
        $detallesproducto6->color="Verde";
        $detallesproducto6->material="Aluminio";
        $detallesproducto6->marca="Fusion - Nissi - Atila
        ";
        $detallesproducto6->modelo="Atila";
        $producto6->detallesproducto()->save($detallesproducto6);   
        
        $imagen6 = new Imagen();
        $imagen6->url = "img/Multimedia/comprar3.jpg";
        $producto6->imagen()->save($imagen6);    */

/*          $arrays = range(0,10);
        foreach ($arrays as $valor) {
          DB::table('productos')->insert([	            
              'talla' => Str::random(10),
              'cantidad' =>  rand(1, 99),
              'precio' => rand(1, 99),
              'comprobante' => rand(1, 99),
              'user_id' => 1,
              'estado_id' => 1,
              'tipo_id' => 2,
          ]);
        }  */

        /* $arrays = range(0,10);
        foreach ($arrays as $valor) {
          DB::table('bicicletas')->insert([	            
              'tamaño' => Str::random(10),
              'n_serial' =>  rand(1, 99),
              'descripcionhurto' => Str::random(10),
              'fechahurto' => rand(1, 99),
              'user_id' => 1,
              'ubicacionhurto' => rand(1, 10),
          ]);
        }


        $arrays = range(0,10);
        foreach ($arrays as $valor) {
          DB::table('detallesproductos')->insert([	            
              'name' => Str::random(10),
              'descripcion' =>  rand(1, 99),
              'color' => Str::random(10),
              'material' => rand(1, 99),
              'marca' => 1,
              'modelo' => rand(1, 10),
              'imageable_id' => rand(2, 12),
              'imageable_type' => 'App\Models\Bicicleta',
          ]);
        }


        $arrays = range(0,10);
        foreach ($arrays as $valor) {
          DB::table('imagens')->insert([	            
              'url' => Str::random(10),
              'imageable_id' => rand(2, 12),
              'imageable_type' => 'App\Models\Bicicleta',
          ]);
        }

 */

$arrays = range(0,10);
foreach ($arrays as $valor) {
  DB::table('posteos')->insert([	            
        'descripcion' => Str::random(10),
        'categoria_id' => 1,
      'user_id' => 1,
  ]);
} 

    }
}