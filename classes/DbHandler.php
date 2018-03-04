<?php

class DbHandler
{
    /**
     * public for now...may go with private depending on usage
     */
    public function getConnection()
    {
        return mysqli_connect('den1.mysql5.gear.host',
            'csc45mysql',
            'Op9m8MZ2-5J_',
            'csc45mysql');
    }
}