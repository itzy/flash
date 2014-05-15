<?php

namespace itzy\Flash;

/**
 *
 * This CFlash class saves different kind of messages for later output
 */
class CFlash
{

    // Default message type
    public $default = 'info';

    // Array with all valid messages
    public $valid = ['info', 'success', 'warning', 'error'];

    // Array with FontAwesome icons
    public $fa = [
        'info' => 'fa fa-info-circle',
        'success' => 'fa fa-check',
        'warning' => 'fa fa-warning',
        'error' => 'fa fa-times-circle',
    ];

    function __construct()
    {
        // Setting up flash session
        if (!isset($_SESSION['flash']))
        {
            $_SESSION['flash'] = array();
        } else {
            $_SESSION['flash'] = $_SESSION['flash'];
        }
    }


    /**
     * Clear messages
     *
     */
    public function clear()
    {
        $_SESSION['flash'] = null;
    }


    /**
     * Set flash message and message type
     *
     * @param string $type the message type (info, success, warning, error).
     * @param string $msg the message
     *
     */
    public function add($type = 'info', $msg)
    {
        // Check if type is valid, if not set type to default
        if(!in_array($type, $this->valid)) {
            $type = $this->default;
        }

        // Insert flash into $_SESSION
        $_SESSION['flash'][] = [
            'type' => $type,
            'msg' => $msg,
        ];
    }


    /**
     * Get flash message
     *
     * @param string $style add a style to the output, available styles: icon
     *
     * @return string messages in html
     */
    public function get($style = null)
    {
        $messages = null;

        if (isset($_SESSION['flash'])) {

            foreach ($_SESSION['flash'] as $flashes => $flash) {

                $type = $flash['type'];
                $msg = $flash['msg'];

                $messages .= "<div class='flash_{$type}'>\n";
                if ($style == 'icons') {
                    $messages .= "<i class='{$this->fa[$type]}'></i>\n";
                }
                $messages .= $msg . "\n</div>";
            }


        }

        return $messages;
    }


}
