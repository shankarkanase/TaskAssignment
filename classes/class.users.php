<?php

/******************************************
	Class Name - Users
	Developer - Shankar Kanase
	Created Date 10-12-2022
 *******************************************/


class Users extends DbConnect
{

    protected $userName = '';
    protected $password = '';
    /***************************************************************************
		Function Name - userLogin()
		Parameters - 1.userName - username entered by user
					 2.	password - password of the user
					 
		Purpose - To allow user to login into system
		Return - true of false based of successfull or unsucessfull login
		Developer - Shankar Kanase
     ***************************************************************************/

    public function userLogin($email, $password)
    {

        $parameters = array(
            ':email' => $email,
            ':password' => md5($password)
        );

        $query = "select id, name from tb_user where email=:email and password=:password";

        $this->query($query);
        $user = $this->select($parameters);
        if (count($user) > 1) {

            $parameters = array(
                'id' => $user['id'],
                'name' => $user['name']
            );

            return $parameters;
        } else {
            return false;
        }
    }



    /***************************************************************************
		Function Name - addUser()
		Parameters - data - array of user data to be inserted
		Purpose - To add user to the system
		Return - flag to indicate success or failure
		Developer - Shankar Kanase
     ***************************************************************************/
    public function addUser($data)
    {
        $this->table('tb_user');
        $this->parameters($data);
        $id = $this->insert();

        return $id;
    }

    /***************************************************************************
		Function Name - generateToken()
		Parameters - data - array of token data to be inserted
		Purpose - To add token to the system
		Return - flag to indicate success or failure
		Developer - Shankar Kanase
     ***************************************************************************/
    public function generateToken($user_id)
    {
        $token = bin2hex(random_bytes(16));
        $expire = date("Y-m-d H:i:s", strtotime("+1 hour", strtotime(date("Y-m-d H:i:s"))));

        $data = array("user_id" => $user_id, "token" => $token, "expire" => $expire);

        $this->table('tb_token');
        $this->parameters($data);
        $id = $this->insert();

        return $token;
    }
    /***************************************************************************
		Function Name - validateToken()
		Parameters - data - array of token data to be inserted
		Purpose - To add token to the system
		Return - flag to indicate success or failure
		Developer - Shankar Kanase
     ***************************************************************************/
    public function validateToken($token)
    {
        $query = "select count(id) as tok_count from tb_token where token='" . $token . "' and `expire`>='" . date("Y-m-d H:i:s") . "'";

        $this->query($query);
        $token_data = $this->selectAll('');

        if ($token_data[0]['tok_count'] > 0) {
            return true;
        } else {
            return false;
        }
    }
}
