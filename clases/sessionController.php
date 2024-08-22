<?php
require_once 'clases/session.php';
require_once 'models/userModel.php';
class sessionController extends Controller{
    protected $defaultSites; // Declarar la propiedad
    private $userSession;
    private $userName;
    private $userId;
    private $session;
    private $sites;
    private $user;

    function __construct(){
        parent::__construct();
        $this->init();
    }

    function init()
    {
        $this->session = new Session();

        $json = $this->getJSONFileConfig();

        $this->sites = $json["sites"];
        $this->defaultSites = $json["default-sites"];

        $this->validateSession();
    }

    private function getJSONFileConfig()
    {
        $string = file_get_contents("config/access.json");
        $json = json_decode($string, true);

        return $json;
    }

    public function validateSession()
    {
        error_log('clases/sessionController:: validateSession()');
        error_log("===================================================");

        if ($this->existsSession()) {
            $role = $this->getUserSessionData()->getId_rol();

            //si la entrada es publica
            if ($this->isPublic()) {
                $this->redirectDefaultSiteByRole($role);
            } else {
                if ($this->isAuthorized($role)) {
                    // lo dejo pasar
                }else{
                    $this->redirectDefaultSiteByRole($role);
                }
            }

        } else {
            //no existe la session
            if($this->isPublic()){
                // no pasa nada, lo deja entrar
            }else{
                header('Location: ' . constant('URL') . '');
            }
        }
    }

    function existsSession()
    {
        if (!$this->session->existsSession()){
            return false;
        }
            
        if ($this->session->getCurrentUser() == NULL){
            return false;
        }
            
        $userId = $this->session->getCurrentUser();

        if ($userId){
            return true;
        }else{
            return false;
        }

    }

    public function getUserSessionData()
    {
        $id = $this->session->getCurrentUser();
        
        $this->user = new UserModel();
        $this->user->get($id);

        error_log('clases/sessionController:: getUserSessionlData -> '. $this->user->getNombre());
        error_log("===================================================");

        return $this->user;
    }

    function isPublic()
    {
        $currentURL = $this->getCurrentPage();
        $currentURL = preg_replace('/\?.*/',  "" , $currentURL);

        for ($i = 0; $i < sizeof($this->sites); $i++) {

            if ($currentURL == $this->sites[$i]["site"] && $this->sites[$i]['access'] == 'public') {
                return true;
            }
        }
        return false;
    }

    function getCurrentPage()
    {
        $actualLink = trim($_SERVER["REQUEST_URI"]);
        $url = explode('/', $actualLink);

        error_log('clases/SessionController::getCurrentPage -> ' . $url[2]);
        error_log("===================================================");
        return $url[2];
    }

    private function redirectDefaultSiteByRole($role)
    {
        $url = '';

        for ($i = 0; $i < sizeof($this->sites); $i++) {
            if ($this->sites[$i]['role'] == $role) {
                error_log('defaulbyrole:: session controller -> role:' . $role);
                error_log("===================================================");
                $url = '/home/' . $this->sites[$i]['site'];
                error_log('defaulbyrole:: session controller -> url:' . $url);
                error_log("===================================================");
                break;
            }
        }
        header('Location:' . constant('URL') . $url);
    }

    private function isAuthorized($role)
    {
        $currentURL = $this->getCurrentPage();
        $currentURL = preg_replace("/\?.*/", "", $currentURL);

        for ($i = 0; $i < sizeof($this->sites); $i++) {

            if ($currentURL == $this->sites[$i]["site"] && $this->sites[$i]['role'] == $role) {
                return true;
            }
        }
        return false;
    }

    function initialize($user){
        error_log("initialize:: sessionController: " . $user->getId());
        error_log("===================================================");
        $this->session->setCurrentUser($user->getId());
        $this->authorizeAccess($user->getId_rol());

    }
    function authorizeAccess($role){
        switch ($role) {
            case 'empleado':
                $this->redirect($this->defaultSites['empleado'], []);
            break;
            case 'admin':
                $this->redirect($this->defaultSites['admin'], []);
            break;
        }
    }

    function logOut(){
        $this->session->closeSession();
    }
}