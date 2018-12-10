<?php 

/**
* 
*/
class ConexionBD
{
  // Única instancia de la clase
  private static $db = null;
  // Instancia de PDO
  private static $pdo;


  function __construct()
  {
         try {
             // Crear nueva conexión PDO
             self::conectBD();
         } catch (PDOException $e) {
             // Manejo de excepciones
         }
  }


   /**
    * Crear una nuevas conexiones PDO basada
    * en las constantes de conexión
    * @return PDO Objeto PDO
    */
   public function conectBD()
   {

       try{        

           if (self::$pdo == null) {

                // Conexion MySql
                    self::$pdo = new PDO('mysql:dbname=' . DATA_BASE .';host=' . HOST . ';',USER_DB,PASS_DB,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
                    );
                    // Conexion Postgresql
                    /*self::$pdo = new PDO(
                        'pgsql:host='.NOMBRE_HOST.';port='.PUERTO.';dbname=' . BASE_DE_DATOS .'', USUARIO,   CONTRASENA
                    );
                    */
                    // Conexion Oracle
                    /*self::$pdo = new PDO(
                        "oci:dbname=".TNS-ORACLE,USUARIO,CONTRASENA
                    );
                    */
                    // Conexion SQL Server
                    /*self::$pdo = new PDO(
                        "sqlsrv:Server=".NOMBRE_HOST.",".PUERTO.";Database=".BASE_DE_DATOS."",USUARIO,CONTRASEN  A
                    );
                    */
                    // Habilitar excepciones
                   self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               }

           return self::$pdo;

       }catch(PDOException $e){
           echo ($e->getMessage());
       }
   }

   /**
    * Evita la clonación del objeto
    */
   final protected function __clone()
   {
   }

   function _destructor()
   {
       self::$pdo = null;
   }
}

 ?>