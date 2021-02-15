<?php

namespace Source\App\Admin;

use Source\Core\Controller;
use Source\Model\Auth;

/**
 * Class Admin
 * @package Source\App\Admin
 */
class Admin extends Controller
{
    
    protected $user;

    /**
     * Admin constructor.
     */
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../../themes/" . CONF_VIEW_ADMIN . "/");

        $this->user = Auth::user();
        
        if (!$this->user) {
            
            redirect("/admin/login");
            
        }
    }
}