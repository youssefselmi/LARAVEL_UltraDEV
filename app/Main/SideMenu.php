<?php

namespace App\Main;

class SideMenu
{
    /**
     * List of side menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function menu()
    {
        return [
          

            'front' => [
                'icon' => 'inbox',
                'route_name' => 'front',        
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Front Office'
            ],


            'centres' => [
                'icon' => 'inbox',
                'route_name' => 'centres',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Les Centres'
            ],


            'types' => [
                'icon' => 'inbox',
                'route_name' => 'typecentre',        
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Types des centres'
            ],




            'formations' => [
                'icon' => 'inbox',
                'route_name' => 'formations',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Les Formations'
            ],
            'session' => [
                'icon' => 'inbox',
                'route_name' => 'session',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Les Sessions'
            ],



            'reclamation' => [
                'icon' => 'inbox',
                'route_name' => 'reclamation',        
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Reclamations'
            ],




            'appointement' => [
                'icon' => 'inbox',
                'route_name' => 'appointments',        
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Appointement'
            ],


            'appointementgat' => [
                'icon' => 'inbox',
                'route_name' => 'typeappointment',        
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Appointement Category'
            ],






            'devider',
            
        
        ];
    }
}
