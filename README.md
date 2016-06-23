# Documentacion Oficial
### Instalacion
- Clonamos el proyecto del repositorio con el comando:

    ```sh
    git@gitlab.com:viga.23/lae-consumer-api.git
    ```
- instalamos composer en el directorio con el comando

    ```sh
    curl -sS https://getcomposer.org/installer | php
    ```
- Instalamos el proyecto:

    ```sh
    php composer.phar install
    ```
- Generamos el autoload con composer con el comando:

    ```sh
    php composer.phar dump-autoload
    ```
    
### Ejemplo de uso

   ```php
   <?php
	require_once __DIR__.'/vendor/autoload.php';
	
	use ApiConsumer\Consumer;
	// En caso que usemos las colecciones de laravel
	use Illuminate\Support\Collection;
	
	// URL de la API a consumir
	$api = 'http://www.example.com/';
	// Request URI
	$url = 'offices';
	// Token de la api
    $token = 'mi token';
    
    // Instanciamos la clase
    $curl = new Consumer($api, $token);
	// Metodo Get
    $res = $curl->get($url);
    if ($res !== false) {
    	// Devuelve una coleccion de laravel
    	$collection = collect($res);
    	// Devuelve un objeto
    	$data = $res;
    }
    
    // Request URI del punto de entrada
    $urlPost = 'save';
    // Datos a enviar por post
    $dataPost = array('first_name' => 'Alver');
    $resPost = $curl->post($urlPost, $dataPost);
    if ($resPost !== false) {
    	// Devuelve una coleccion laravel
    	$collection = collect($resPost);
    	// Devuelve un objeto
    	$data = $resPost;
    }
	?>