<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $roles = Role::orderBy('weight')->get();

        return view('dashboard', compact('roles'))->withSubView('roles');
    }

    public function store(RoleRequest $request)
    {
        $weight = Role::all()->max('weight');

        if ( $weight )
        {
            $request['weight'] = $weight + 1;
        }

        $role = Role::create($request->all());

        if ( $role->exists )
        {
            flash("Le rôle <strong>{$request->name}</strong> a été ajouté avec succès", 'success')->important();
        }
        else
        {
            flash("Une erreur s'est produite pendant la création du rôle <strong>{$request->name}</strong> !", 'error')->important();
        }

        return back();
    }

    public function update(RoleRequest $request, Role $role)
    {
        $result = $role->update($request->all());

        if ( $result )
        {
            flash("Le rôle <strong>{$role->name}</strong> a été modifié avec succès", 'success')->important();
        }
        else
        {
            flash("Une erreur s'est produite pendant la modification du rôle <strong>{$request->name}</strong> !", 'error')->important();
        }

        return back();
    }

    public function destroy(Role $role)
    {
        $result = $role->delete();

        if ( $result )
        {
            flash("Le rôle <strong>{$role->name}</strong> a été supprimé avec succès", 'success')->important();
        }
        else
        {
            flash("Une erreur s'est produite pendant la suppression du rôle <strong>{$request->name}</strong> !", 'error')->important();
        }

        return back();
    }

    public function order(Request $request)
    {
        if ( $request->has('id') )
        {
            foreach($request->id as $position => $id)
            {
                $role = Role::findOrFail($id);

                if ( $role )
                {
                    $role->weight = $position;
                    $role->save();
                }
            }

            flash("Le changement de position des rôles a été modifié avec succès", 'success')->important();
        }

        return back();
    }
}
