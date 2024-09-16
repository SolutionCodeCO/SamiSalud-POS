<?php
/**
 * Controlador que también maneja las sesiones
 */

 require_once 'clases/session.php';
 require_once 'models/userModel.php';
class SessionController extends Controller{
    protected $defaultSites;
    private $userSession;
    private $username;
    private $userid;

    private $session;
    private $sites;

    private $user;
 
    function __construct(){
        parent::__construct();
        $this->session = new Session(); // Asegúrate de inicializar la sesión aquí
    }

    public function getUserSession(){
        return $this->userSession;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getUserId(){
        return $this->userid;
    }

    /**
     * Inicializa el parser para leer el .json
     */

    private function init(){
        //se crea nueva sesión
        $this->session = new Session();
        //se carga el archivo json con la configuración de acceso
        $json = $this->getJSONFileConfig();
        // se asignan los sitios
        $this->sites = $json['sites'];
        // se asignan los sitios por default, los que cualquier rol tiene acceso
        $this->defaultSites = $json['default-sites'];
        // inicia el flujo de validación para determinar
        // el tipo de rol y permismos
        $this->validateSession();
    }
    /**
     * Abre el archivo JSON y regresa el resultado decodificado
     */
    private function getJSONFileConfig(){
        $string = file_get_contents("config/access.json");
        $json = json_decode($string, true);

        return $json;
    }

    /**
     * Implementa el flujo de autorización
     * para entrar a las páginas
     */
    function validateSession(){
        error_log('SessionController::validateSession()');
        //Si existe la sesión
        if($this->existsSession()){
            $role = $this->getUserSessionData()->getId_rol();

            error_log("sessionController::validateSession(): username:" . $this->user->getUsuario() . " - role: " . $this->user->getId_rol());
            if($this->isPublic()){
                $this->redirectDefaultSiteByRole($role);
                error_log( "SessionController::validateSession() => sitio público, redirige al main de cada rol" );
            }else{
                if($this->isAuthorized($role)){
                    error_log( "SessionController::validateSession() => autorizado, lo deja pasar" );
                    //si el usuario está en una página de acuerdo
                    // a sus permisos termina el flujo
                }else{
                    error_log( "SessionController::validateSession() => no autorizado, redirige al main de cada rol" );
                    // si el usuario no tiene permiso para estar en
                    // esa página lo redirije a la página de inicio
                    $this->redirectDefaultSiteByRole($role);
                }
            }
        }else{
            //No existe ninguna sesión
            //se valida si el acceso es público o no
            if($this->isPublic()){
                error_log('SessionController::validateSession() public page');
                //la pagina es publica
                //no pasa nada
            }else{
                //la página no es pública
                //redirect al login
                error_log('SessionController::validateSession() redirect al login');
                header('location: '. constant('URL') . '');
            }
        }
    }
    /**
     * Valida si existe sesión, 
     * si es verdadero regresa el usuario actual
     */
    function existsSession(){
        if(!$this->session->existsSession()) return false;
        if($this->session->getCurrentUser() == NULL) return false;

        $userid = $this->session->getCurrentUser();

        if($userid) return true;

        return false;
    }

    function getUserSessionData(){
        $id = $this->session->getCurrentUser();
        if (!$id) return null;
    
        $this->user = new UserModel();
        $this->user->get($id); // Carga los datos del usuario
        error_log("sessionController::getUserSessionData(): " . $this->user->getUsuario());
        return $this->user;
    }

    public function initialize($user) {
        if ($user) {
            // Guardar el ID del usuario en la sesión
            $this->session->setCurrentUser($user->getId());
            error_log("SessionController::initialize(): user: " . $user->getUsuario());
    
            // Redirigir según el rol del usuario
            $this->authorizeAccess($user->getId_rol());
        } else {
            error_log("SessionController::initialize(): error - user not initialized");
            // Redirigir a la página de error o login
            $this->redirect('', ['error' => ErrorMessages::ERROR_LOGIN_PROCESAR_SOLICITUD]);
        }
    }

    private function isPublic(){
        $currentURL = $this->getCurrentPage();
        error_log("sessionController::isPublic(): currentURL => " . $currentURL);
        $currentURL = preg_replace( "/\?.*/", "", $currentURL); //omitir get info
        for($i = 0; $i < sizeof($this->sites); $i++){
            if($currentURL === $this->sites[$i]['site'] && $this->sites[$i]['access'] === 'public'){
                return true;
            }
        }
        return false;
    }

    private function redirectDefaultSiteByRole($role){
        $url = '';
        for($i = 0; $i < sizeof($this->sites); $i++){
            if($this->sites[$i]['role'] === $role){
                $url = '/Home/'.$this->sites[$i]['site'];
            break;
            }
        }
        header('location: '.$url);
        
    }

    private function isAuthorized($role){
        $currentURL = $this->getCurrentPage();
        $currentURL = preg_replace( "/\?.*/", "", $currentURL); //omitir get info
        
        for($i = 0; $i < sizeof($this->sites); $i++){
            if($currentURL === $this->sites[$i]['site'] && $this->sites[$i]['role'] === $role){
                return true;
            }
        }
        return false;
    }

    private function getCurrentPage(){
        $actual_link = trim("$_SERVER[REQUEST_URI]");
        $url = explode('/', $actual_link);
        
        // Asegúrate de que `url[2]` exista y no esté vacío
        $currentPage = isset($url[2]) && !empty($url[2]) ? $url[2] : '';
        
        error_log("sessionController::getCurrentPage(): actualLink =>" . $actual_link . ", url => " . $currentPage);
        return $currentPage;
    }

    function authorizeAccess($role) {
        error_log("SessionController::authorizeAccess(): role: $role");
        switch ($role) {
            case '1':  // Rol de empleado
                $this->redirect('/empleado',[]);
                break;
            case '2':
                $this->redirect('/admin',[]);
                break;
                default:
                error_log("SessionController::authorizeAccess(): no role match found, redirigiendo a default");
                $this->redirect('', ['error' => ErrorMessages::ERROR_LOGIN_PROCESAR_SOLICITUD]);
        }
    }

}

