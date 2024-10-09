<?php

class QualityControlModel extends Model implements IModel
{
    // GLOBAL
    private $id;
    private $id_local;
    private $id_usuario;
    private $fecha_Creacion;
    private $fecha_Actualizacion;

    // registro facturas
    private $numero_factura;
    private $proveedor;
    private $total_productos;
    private $total_faltantes;
    private $total_devoluciones;

    // consolidado faltantes
    private $cantidad_ingresada;
    private $total_mes;

    // limpieza drogueria
    private $banio;
    private $inyectologia;
    private $techos_paredes;
    private $pisos_dispensacion;
    private $estantes_vitrinas_cajoneras;
    private $canecas;

    // registro temperatura
    private $temperatura;
    private $mañana;
    private $tarde;

    // facturas PDF
    private $archivo_pdf;

    // gestion residuos
    private $mes;
    private $tipo_residuo;
    private $cantidad;
    private $total_mes_residuo;



    public function __construct()
    {
        parent::__construct();
        // global
        $this->id = '';
        $this->id_local = '';
        $this->id_usuario = '';
        $this->fecha_Creacion = '';
        $this->fecha_Actualizacion = '';

        // registro facturas
        $this->numero_factura = '';
        $this->proveedor = '';
        $this->total_productos = '';
        $this->total_faltantes = '';
        $this->total_devoluciones = '';

        // consolidado faltantes
        $this->cantidad_ingresada = '';
        $this->total_mes = '';

        // limpieza drogueria
        $this->banio = '';
        $this->inyectologia = '';
        $this->techos_paredes = '';
        $this->pisos_dispensacion = '';
        $this->estantes_vitrinas_cajoneras = '';
        $this->canecas = '';

        // registro temperatura
        $this->temperatura = '';
        $this->mañana = '';
        $this->tarde = '';

        // facturas PDF
        $this->archivo_pdf = '';

        // gestion residuos
        $this->mes = '';
        $this->tipo_residuo = '';
        $this->cantidad = '';
        $this->total_mes_residuo = '';
    }
    
    // registro facturas
    public function save()
    {
        $this->fecha_Creacion = date("Y-m-d H:i:s");
        $this->fecha_Actualizacion = date("Y-m-d H:i:s");

        try {


            // Insertar en la tabla productos
            $queryControl = $this->prepare('INSERT INTO registro_facturas (numero_factura, proveedor, total_producto, total_faltantes, total_devolucion, fecha_Creacion, fecha_Actualizacion, id_local, id_usuario) 
                                              VALUES(:numero_factura, :proveedor, :total_producto, :total_faltantes, :total_devolucion, :fecha_Creacion, :fecha_Actualizacion, :id_local, :id_usuario)');

            $queryControl->execute([
                'numero_factura' => $this->numero_factura,
                'proveedor' => $this->proveedor,
                'total_producto' => $this->total_productos,
                'total_faltantes' => $this->total_faltantes,
                'total_devolucion' => $this->total_devoluciones,
                'fecha_Creacion' => $this->fecha_Creacion,
                'fecha_Actualizacion' => $this->fecha_Actualizacion,
                'id_local' => $this->id_local,  // Local se asigna desde el usuario logueado
                'id_usuario' => $this->id_usuario // Aquí se añade el id del usuario

            ]);




            return true;

        } catch (PDOException $e) {
            // Revertir la transacción en caso de error
            $this->db->rollBack();
            error_log($e->getMessage());
            return false;
        }
    }
    // consolidado faltantes
    public function saveConsolidado_faltantes()
    {
        $this->fecha_Creacion = date("Y-m-d H:i:s");
        $this->fecha_Actualizacion = date("Y-m-d H:i:s");

        try {


            // Insertar en la tabla productos
            $queryControl = $this->prepare('INSERT INTO consolidado_faltantes (cantidad_ingresada, total_mes, fecha_Creacion, fecha_Actualizacion, id_local, id_usuario) 
                                              VALUES(:cantidad_ingresada, :total_mes, :fecha_Creacion, :fecha_Actualizacion, :id_local, :id_usuario)');

            $queryControl->execute([
                'cantidad_ingresada' => $this->cantidad_ingresada,
                'total_mes' => $this->total_mes,
                'fecha_Creacion' => $this->fecha_Creacion,
                'fecha_Actualizacion' => $this->fecha_Actualizacion,
                'id_local' => $this->id_local,  // Local se asigna desde el usuario logueado
                'id_usuario' => $this->id_usuario // Aquí se añade el id del usuario

            ]);




            return true;

        } catch (PDOException $e) {
            // Revertir la transacción en caso de error
            $this->db->rollBack();
            error_log($e->getMessage());
            return false;
        }
    }
    // limpieza drogueria
    public function saveLimpieza_drogueria()
    {
        $this->fecha_Creacion = date("Y-m-d H:i:s");
        $this->fecha_Actualizacion = date("Y-m-d H:i:s");

        try {


            // Insertar en la tabla productos
            $queryControl = $this->prepare('INSERT INTO limpieza_drogueria (banio, inyectologia, techos_paredes, pisos_dispensacion, estantes_vitrinas_cajoneras, canecas, fecha_Creacion, fecha_Actualizacion, id_local, id_usuario) 
                                              VALUES(:banio, :inyectologia, :techos_paredes, :pisos_dispensacion, :estantes_vitrinas_cajoneras, :canecas, :fecha_Creacion, :fecha_Actualizacion, :id_local, :id_usuario)');

            $queryControl->execute([
                'banio' => $this->banio,
                'inyectologia' => $this->inyectologia,
                'techos_paredes' => $this->techos_paredes,
                'pisos_dispensacion' => $this->pisos_dispensacion,
                'estantes_vitrinas_cajoneras' => $this->estantes_vitrinas_cajoneras,
                'canecas' => $this->canecas,
                'fecha_Actualizacion' => $this->fecha_Actualizacion,
                'id_local' => $this->id_local,  // Local se asigna desde el usuario logueado
                'id_usuario' => $this->id_usuario // Aquí se añade el id del usuario

            ]);




            return true;

        } catch (PDOException $e) {
            // Revertir la transacción en caso de error
            $this->db->rollBack();
            error_log($e->getMessage());
            return false;
        }
    }
    // registro temperatura
    public function saveRegistro_temperatura()
    {
        $this->fecha_Creacion = date("Y-m-d H:i:s");
        $this->fecha_Actualizacion = date("Y-m-d H:i:s");

        try {


            // Insertar en la tabla productos
            $queryControl = $this->prepare('INSERT INTO registro_temperatura (temperatura, mañana, tarde, fecha_Creacion, fecha_Actualizacion, id_local, id_usuario) 
                                              VALUES(:temperatura, :mañana, :tarde, :fecha_Creacion, :fecha_Actualizacion, :id_local, :id_usuario)');

            $queryControl->execute([
                'temperatura' => $this->temperatura,
                'mañana' => $this->mañana,
                'tarde' => $this->tarde,
                'fecha_Creacion' => $this->fecha_Creacion,
                'fecha_Actualizacion' => $this->fecha_Actualizacion,
                'id_local' => $this->id_local,  // Local se asigna desde el usuario logueado
                'id_usuario' => $this->id_usuario // Aquí se añade el id del usuario

            ]);




            return true;

        } catch (PDOException $e) {
            // Revertir la transacción en caso de error
            $this->db->rollBack();
            error_log($e->getMessage());
            return false;
        }
    }
    // facturas PDF
    public function saveFacturas_pdf()
    {
        $this->fecha_Creacion = date("Y-m-d H:i:s");
        $this->fecha_Actualizacion = date("Y-m-d H:i:s");

        try {


            // Insertar en la tabla productos
            $queryControl = $this->prepare('INSERT INTO facturas_pdf (archivo_pdf,fecha_Creacion, fecha_Actualizacion, id_local, id_usuario) 
                                              VALUES(:archivo_pdf, :fecha_Creacion, :fecha_Actualizacion, :id_local, :id_usuario)');

            $queryControl->execute([
                'archivo_pdf' => $this->archivo_pdf,
                'fecha_Creacion' => $this->fecha_Creacion,
                'fecha_Actualizacion' => $this->fecha_Actualizacion,
                'id_local' => $this->id_local,  // Local se asigna desde el usuario logueado
                'id_usuario' => $this->id_usuario // Aquí se añade el id del usuario

            ]);




            return true;

        } catch (PDOException $e) {
            // Revertir la transacción en caso de error
            $this->db->rollBack();
            error_log($e->getMessage());
            return false;
        }
    }
    // gestion residuos
    public function saveGestion_residuos()
    {
        $this->fecha_Creacion = date("Y-m-d H:i:s");
        $this->fecha_Actualizacion = date("Y-m-d H:i:s");

        try {


            // Insertar en la tabla productos
            $queryControl = $this->prepare('INSERT INTO gestion_residuos (mes, tipo_residuo, cantidad, total_mes, fecha_Creacion, fecha_Actualizacion, id_local, id_usuario) 
                                              VALUES(:mes, :tipo_residuo, :cantidad, :total_mes, :fecha_Creacion, :fecha_Actualizacion, :id_local, :id_usuario)');

            $queryControl->execute([
                'mes' => $this->mes,
                'tipo_residuo' => $this->tipo_residuo,
                'cantidad' => $this->cantidad,
                'total_mes' => $this->total_mes_residuo,
                'fecha_Creacion' => $this->fecha_Creacion,
                'fecha_Actualizacion' => $this->fecha_Actualizacion,
                'id_local' => $this->id_local,  // Local se asigna desde el usuario logueado
                'id_usuario' => $this->id_usuario // Aquí se añade el id del usuario

            ]);




            return true;

        } catch (PDOException $e) {
            // Revertir la transacción en caso de error
            $this->db->rollBack();
            error_log($e->getMessage());
            return false;
        }
    }
    
    // registro facturas
    public function getAll()
    {
        $items = [];

        try {
            $query = $this->query("SELECT * FROM registro_facturas");

            while ($pointer = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = new QualityControlModel();
                $item->from($pointer);

                array_push($items, $item);
            }
            return $items;

        } catch (PDOException $e) {
            error_log("models/controlCalidadModel:: getAll -> PDOException " . $e);
            return NULL;
        }
    }
    // consolidado faltantes
    public function getAllConsolidado_faltantes()
    {
        $items = [];

        try {
            $query = $this->query("SELECT * FROM consolidado_faltantes");

            while ($pointer = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = new QualityControlModel();
                $item->from($pointer);

                array_push($items, $item);
            }
            return $items;

        } catch (PDOException $e) {
            error_log("models/controlCalidadModel:: getAll -> PDOException " . $e);
            return NULL;
        }
    }
    // limpieza drogueria
    public function getAllLimpieza_drogueria()
    {
        $items = [];

        try {
            $query = $this->query("SELECT * FROM limpieza_drogueria");

            while ($pointer = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = new QualityControlModel();
                $item->from($pointer);

                array_push($items, $item);
            }
            return $items;

        } catch (PDOException $e) {
            error_log("models/controlCalidadModel:: getAll -> PDOException " . $e);
            return NULL;
        }
    }
    // registro temperaturas
    public function getAllRegistro_temperaturas()
    {
        $items = [];

        try {
            $query = $this->query("SELECT * FROM registro_temperaturas");

            while ($pointer = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = new QualityControlModel();
                $item->from($pointer);

                array_push($items, $item);
            }
            return $items;

        } catch (PDOException $e) {
            error_log("models/controlCalidadModel:: getAll -> PDOException " . $e);
            return NULL;
        }
    }
    // facturas pdf
    public function getAllFacturas_pdf()
    {
        $items = [];

        try {
            $query = $this->query("SELECT * FROM facturas_pdf");

            while ($pointer = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = new QualityControlModel();
                $item->from($pointer);

                array_push($items, $item);
            }
            return $items;

        } catch (PDOException $e) {
            error_log("models/controlCalidadModel:: getAll -> PDOException " . $e);
            return NULL;
        }
    }
    // gestion residuos
    public function getAllGestion_residuos()
    {
        $items = [];

        try {
            $query = $this->query("SELECT * FROM gestion_residuos");

            while ($pointer = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = new QualityControlModel();
                $item->from($pointer);

                array_push($items, $item);
            }
            return $items;

        } catch (PDOException $e) {
            error_log("models/controlCalidadModel:: getAll -> PDOException " . $e);
            return NULL;
        }
    }
    public function from($array)
    {
        // global
        $this->id = $array['id'];
        $this->fecha_Actualizacion = $array['fecha_Actualizacion'];
        $this->fecha_Creacion = $array['fecha_Creacion'];
        $this->id_local = $array['id_local'];

        // registro facturas
        $this->numero_factura = $array['numero_factura'];
        $this->proveedor = $array['proveedor'];
        $this->total_productos = $array['total_producto'];
        $this->total_faltantes = $array['total_faltantes'];
        $this->total_devoluciones = $array['total_devolucion'];

        // consolidado faltantes
        $this->cantidad_ingresada = $array['cantidad_ingresada'];
        $this->total_mes = $array['total_mes'];

        // limpieza drogueria
        $this->banio = $array['banio'];
        $this->inyectologia = $array['inyectologia'];
        $this->techos_paredes = $array['techos_paredes'];
        $this->pisos_dispensacion = $array['pisos_dispensacion'];
        $this->estantes_vitrinas_cajoneras = $array['estantes_vitrinas_cajoneras'];
        $this->canecas = $array['canecas'];

        $this->techos_paredes = $array['techos_paredes'];
        $this->pisos_dispensacion = $array['pisos_dispensacion'];
        $this->estantes_vitrinas_cajoneras = $array['estantes_vitrinas_cajoneras'];
        $this->canecas = 'canecas';

        // registro temperatura
        $this->temperatura = $array['temperatura'];
        $this->mañana = $array['mañana'];
        $this->tarde = $array['tarde'];

        // facturas PDF
        $this->archivo_pdf = $array['archivo_pdf'];

        // gestion residuos
        $this->tipo_residuo = $array['tipo_residuo'];
        $this->cantidad = $array['cantidad'];
        $this->total_mes_residuo = $array['total_mes_residuo'];
    }
    public function getFormNamesByControlCalidad($idLocal)
    {
        try {
            $query = $this->prepare("
                SELECT 'Registro facturas' AS nombre_formulario
                UNION
                SELECT 'Consolidado faltantes'
                UNION
                SELECT 'Limpieza drogueria'
                UNION
                SELECT 'Registro temperatura'
                UNION
                SELECT 'Facturas pdf'
                UNION
                SELECT 'Gestion residuos'
            ");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('QualityControlModel::getFormNamesByControlCalidad -> PDOException ' . $e);
            return false;
        }
    }
    public function get($id)
    {
    }
    public function delete($id)
    {
    }
    public function update()
    {
    }
    public function getProductInfoById($productId)
    {
    }
    public function getProductById($productId)
    {
    }


    // Getters
    // global
    public function getId()
    {
        return $this->id;
    }

    public function getfecha_Creacion()
    {
        return $this->fecha_Creacion;
    }
    public function getfecha_Actualizacion()
    {
        return $this->fecha_Actualizacion;
    }
    public function getId_local()
    {
        return $this->id_local;
    }
    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    // registro facturas
    public function getNumero_factura()
    {
        return $this->numero_factura;
    }
    public function getProveedor()
    {
        return $this->proveedor;
    }
    public function getTotal_productos()
    {
        return $this->total_productos;
    }
    public function getTotal_faltantes()
    {
        return $this->total_faltantes;
    }
    public function getTotal_devoluciones()
    {
        return $this->total_devoluciones;
    }
    // consolidado faltantes
    public function getCantidad_ingresada()
    {
        return $this->cantidad_ingresada;
    }
    public function getTotal_mes()
    {
        return $this->total_mes;
    }

    // limpieza drogueria
    public function getBanio()
    {
        return $this->banio;
    }
    public function getInyectologia()
    {
        return $this->inyectologia;
    }
    public function getTechos_paredes()
    {
        return $this->techos_paredes;
    }
    public function getPisos_dispensacion()
    {
        return $this->pisos_dispensacion;
    }
    public function getEstantes_vitrinas_cajoneras()
    {
        return $this->estantes_vitrinas_cajoneras;
    }
    public function getCanecas()
    {
        return $this->canecas;
    }

    // registro temperatura
    public function getTemperatura()
    {
        return $this->temperatura;
    }
    public function getMañana()
    {
        return $this->mañana;
    }
    public function getTarde()
    {
        return $this->tarde;
    }

    // facturas PDF
    public function getArchivo_pdf()
    {
        return $this->archivo_pdf;
    }

    // gestion residuos
    public function getTipo_residuo()
    {
        return $this->tipo_residuo;
    }
    public function getCantidad()
    {
        return $this->cantidad;
    }
    public function getTotal_mes_residuo()
    {
        return $this->total_mes_residuo;
    }


    // Setters
    // global
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setFecha_Creacion($fecha_Creacion)
    {
        $this->$fecha_Creacion = $fecha_Creacion;
    }
    public function setfecha_Actualizacion($fecha_Actualizacion)
    {
        $this->fecha_Actualizacion = $fecha_Actualizacion;
    }
    public function setId_local($id_local)
    {
        $this->id_local = $id_local;
    }
    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    // registro facturas
    public function setNumero_factura($numero_factura)
    {
        $this->numero_factura = $numero_factura;
    }
    public function setProveedor($proveedor)
    {
        $this->proveedor = $proveedor;
    }
    public function setTotal_productos($total_productos)
    {
        $this->total_productos = $total_productos;
    }
    public function setTotal_faltantes($total_faltantes)
    {
        $this->total_faltantes = $total_faltantes;
    }
    public function setTotal_devoluciones($total_devoluciones)
    {
        $this->total_devoluciones = $total_devoluciones;
    }

    // consolidado faltantes
    public function setCantidad_ingresada($cantidad_ingresada)
    {
        $this->cantidad_ingresada = $cantidad_ingresada;
    }
    public function setTotal_mes($total_mes)
    {
        $this->total_mes = $total_mes;
    }

    // limpieza drogueria
    public function setBanio($banio)
    {
        $this->banio = $banio;
    }
    public function setInyectologia($inyectologia)
    {
        $this->inyectologia = $inyectologia;
    }
    public function setTechos_paredes($techos_paredes)
    {
        $this->techos_paredes = $techos_paredes;
    }
    public function setPisos_dispensacion($pisos_dispensacion)
    {
        $this->pisos_dispensacion = $pisos_dispensacion;
    }
    public function setEstantes_vitrinas_cajoneras($estantes_vitrinas_cajoneras)
    {
        $this->estantes_vitrinas_cajoneras = $estantes_vitrinas_cajoneras;
    }
    public function setCanecas($canecas)
    {
        $this->canecas = $canecas;
    }

    // registro temperatura
    public function setTemperatura($temperatura)
    {
        $this->temperatura = $temperatura;
    }
    public function setMañana($mañana)
    {
        $this->mañana = $mañana;
    }
    public function setTarde($tarde)
    {
        $this->tarde = $tarde;
    }

    // facturas PDF
    public function setArchivo_pdf($archivo_pdf)
    {
        $this->archivo_pdf = $archivo_pdf;
    }

    // gestion residuos
    public function setTipo_residuo($tipo_residuo)
    {
        $this->tipo_residuo = $tipo_residuo;
    }
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }
    public function setTotal_mes_residuo($total_mes_residuo)
    {
        $this->total_mes_residuo = $total_mes_residuo;
    }



}
