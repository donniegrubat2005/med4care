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
        $items = [];
        $user = auth()->user();
        
        // $accesses = $this->getUserAccess($user);

        // foreach ( $accesses as  $access ) {

        //     $exp = explode(' ', $access->name);

        //     $items[] = [
        //         'name' => $access->name,
        //         'route' => url($access->name)
        //     ];
        // }


        $view->with([
            'logged_in_user' => $user
        ]);
    }

    public function getUserAccess($user)
    {

        $permissions = DB::table('model_has_permissions')->join('permissions', 'model_has_permissions.permission_id', '=', 'permissions.id');
       
        if(!$user->isAdmin()){
            $permissions = $permissions->where('model_id',  $user->id);
        }
        return $permissions->get();

    }

}
