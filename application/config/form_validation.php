<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2018-07-04
 * Time: 3:30 PM
 */
$config = [
    'admin_login' => [
        [
            'field' => 'username',
            'label' =>'Username required',
            'rules' =>'required|trim'
        ],
        [
            'field' => 'password',
            'label' =>'Password',
            'rules'=> 'required|trim'
        ]
    ]
];