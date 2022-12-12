<?php

/******************************************
	Class Name - Session
	Developer - Shankar Kanase
	Created Date 1a-12-2022
 *******************************************/


class Session
{

    /***************************************************************************
		Function Name - setSession()
		Parameters - 1.parameters - array of key and value to set session
		Purpose - To set session
		Return -
		Developer - Shankar Kanase
     ***************************************************************************/
    public function setSession($parameters)
    {
        foreach ($parameters as $name => $values) {
            $_SESSION[$name] = base64_encode($values);
        }
    }

    /***************************************************************************
		Function Name - getSession()
		Parameters - 1.name - name of the session variable
		Purpose - To get session variable value
		Return - value of the session variable
		Developer - Shankar Kanase
     ***************************************************************************/
    public function getSession($name)
    {
        if (isset($_SESSION[$name])) {
            return base64_decode($_SESSION[$name]);
        } else {
            return 0;
        }
    }

    /***************************************************************************
		Function Name - logOut()
		Parameters -
		Purpose - To allow user to logout
		Return -
		Developer - Shankar Kanase
     ***************************************************************************/
    public function logOut()
    {
        session_destroy();
        session_unset();
    }
}
