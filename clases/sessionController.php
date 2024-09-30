<?php
/**
 * Controlador que también maneja las sesiones
 */

require_once 'clases/session.php';
require_once 'models/userModel.php';

class SessionController extends Controller {
    protected $defaultSites;
    private $userSession;
    private $username;
    private $userid;
    protected $session;
    private $sites;
    protected $user;

    function __construct() {
        parent::__construct();
        $this->session = new Session(); // Asegúrate de inicializar la sesión aquí
    }

    public function getUserSession() {
        return $this->userSession;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getUserId() {
        return $this->userid;
    }

    private function init() {
        //se crea nueva sesión
        $this->session = new Session();
        //se carga el archivo json con la configuración de acceso
        $json = $this->getJSONFileConfig();
        // se asignan los sitios
        $this->sites = $json['sites'];
        // se asignan los sitios por default, los que cualquier rol tiene acceso
        $this->defaultSites = $json['default-sites'];
        // inicia el flujo de validación para determinar
        // el tipo de rol y permisos
        $this->validateSession();
    }

    private function getJSONFileConfig() {
        $string = file_get_contents("config/access.json");
        $json = json_decode($string, true);

        return $json;
    }

    function validateSession() {
        error_log('SessionController::validateSession()');
        //Si existe la sesión
        if ($this->existsSession()) {
            $role = $this->getUserSessionData()->getId_rol();

            error_log("sessionController::validateSession(): username:" . $this->user->getUsuario() . " - role: " . $this->user->getId_rol());
            if ($this->isPublic()) {
                $this->redirectDefaultSiteByRole($role);
                error_log("SessionController::validateSession() => sitio público, redirige al main de cada rol");
            } else {
                if ($this->isAuthorized($role)) {
                    error_log("SessionController::validateSession() => autorizado, lo deja pasar");
                } else {
                    error_log("SessionController::validateSession() => no autorizado, redirige al main de cada rol");
                    $this->redirectDefaultSiteByRole($role);
                }
            }
        } else {
            //No existe ninguna sesión
            //se valida si el acceso es público o no
            if ($this->isPublic()) {
                error_log('SessionController::validateSession() public page');
            } else {
                //redirect al login
                error_log('SessionController::validateSession() redirect al login');
                header('location: ' . constant('URL') . '');
            }
        }
    }

    function existsSession() {
        if (!$this->session->existsSession()) return false;
        if ($this->session->getCurrentUser() == NULL) return false;

        $userid = $this->session->getCurrentUser();

        if ($userid) return true;

        return false;
    }

    function getUserSessionData() {
        $userData = $this->session->getCurrentUser();
        
        if (!$userData || !is_array($userData)) {
            return null;
        }
        
        $this->user = new UserModel();
        $this->user->get($userData['id']); // Carga los datos del usuario usando el ID
        error_log("sessionController::getUserSessionData(): usuario-" . $this->user->getUsuario());
        error_log("sessionController::getUserSessionData(): rol-" . $this->user->getId_rol());
        error_log("sessionController::getUserSessionData(): local-" . $this->user->getId_local());
        
        return $this->user;
    }

    public function initialize($user) {
        if ($user) {
            // Guardar el ID del usuario y el ID del local en la sesión
            $userData = [
                'id' => $user->getId(),
                'usuario' => $user->getUsuario(),
                'id_local' => $user->getId_local(),
            ];
            $this->session->setCurrentUser($userData);
            error_log("SessionController::initialize(): user: " . $user->getUsuario());

            // Redirigir según el rol del usuario
            $this->authorizeAccess($user->getId_rol());
        } else {
            error_log("SessionController::initialize(): error - user not initialized");
            $this->redirect('', ['error' => ErrorMessages::ERROR_CAMPOS_VACIOS_LOGIN_EMPLEADOS]);
        }
    }

    private function isPublic() {
        $currentURL = $this->getCurrentPage();
        error_log("sessionController::isPublic(): currentURL => " . $currentURL);
        $currentURL = preg_replace("/\?.*/", "", $currentURL); //omitir get info
        for ($i = 0; $i < sizeof($this->sites); $i++) {
            if ($currentURL === $this->sites[$i]['site'] && $this->sites[$i]['access'] === 'public') {
                return true;
            }
        }
        return false;
    }

    private function redirectDefaultSiteByRole($role) {
        $url = '';
        for ($i = 0; $i < sizeof($this->sites); $i++) {
            if ($this->sites[$i]['role'] === $role) {
                $url = '/Home/' . $this->sites[$i]['site'];
                break;
            }
        }
        header('location: ' . $url);
    }

    private function isAuthorized($role) {
        $currentURL = $this->getCurrentPage();
        $currentURL = preg_replace("/\?.*/", "", $currentURL); //omitir get info
        
        for ($i = 0; $i < sizeof($this->sites); $i++) {
            if ($currentURL === $this->sites[$i]['site'] && $this->sites[$i]['role'] === $role) {
                return true;
            }
        }
        return false;
    }

    private function getCurrentPage() {
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
                $this->redirect('/empleado', []);
                break;
            case '2':
                $this->redirect('/admin', []);
                break;
            default:
                error_log("SessionController::authorizeAccess(): no role match found, redirigiendo a default");
                $this->redirect('', ['error' => ErrorMessages::ERROR_CAMPOS_VACIOS_LOGIN_EMPLEADOS]);
        }
    }
}
