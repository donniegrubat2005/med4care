<?php

namespace App\Http\Composers;

use Illuminate\View\View;


use Illuminate\Support\Facades\DB;

/**
 * Class GlobalComposer.
 */
class GlobalComposer
{
    /**
     * Bind data to the view.
     *
     * @param View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $user = auth()->user();
        $items = [];

        if(!is_null($user)){
            
            $items = $this->userPermissions($user->permissions);
            // dd($accesses);
            // foreach ( $accesses as  $access ) {
              
            //     $exp = explode(' ', $access->name);

            //     $items[] = [
            //         'name' => $access->name,
            //         'route' => url($access->name)
            //     ];
        
            // }
        }

        // dd($user->permissions);
        
        $view->with([
            'logged_in_user' => $user,
            'permissions_user' => $items
        ]);
    }

    public function userPermissions($permissions)
    {
        $icons = ['cui-cog', 'cui-people' ,'cui-pie-chart' ,'nav-icon icon-wallet'];
        $items = [];
        foreach ($permissions as $k =>  $permission) {
          
            $explode = explode(" ", $permission->name);
           
            $value = '';
            $i = 1;
            foreach ($explode as $exp ) {
			 	$value .= $exp;
			 	if ($i < count($explode)) {
			 		$value .= '-';
			 		$i++;
			 	}
			}

            $items[] = [
                'name' => ucwords($permission->name),
                'route' => url(strtolower($value)),
                'icon' =>  $icons[$k]
            ];
        }


        return $items;

    }

}
