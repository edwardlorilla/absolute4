<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = User::searchPaginateAndOrder();
        $columns = User::$columns;
        return response()
            ->json([
                'model' => $model,
                'columns' => $columns
            ]);
    }

    public function create()
    {
        $roles = \App\Role::with('permissions')->get();

        return response()->json(['roles' => $roles], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $input = $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $request->id,
            'password' => 'string|min:6',
            'address' => '',
            'phone' => '',
            'confirm_password' => 'same:password',
            'roles' => 'required',
            'division.name' => 'sometimes|required',
            'division.station' => 'sometimes|required'
        ]);

        if (trim($request->password) == '') {
            $input = $request->except('password');
        } else {
            $input['password'] = bcrypt($request->password);
        }

        $model = User::updateOrCreate(
            ['id' => $request->id],
            $input);
        if ($request->division['name'] && $request->division['station'] && $model) {
            \App\Division::updateOrCreate(
                ['id' => in_array('id', $request->division) ? $request->division['id'] : ''],
                ['user_id' =>  in_array('user_id', $request->division) ? $request->division['user_id'] : $model->id, 'name' => $request->division['name'], 'station' => $request->division['station']
                ]);
        }
        if ($request->roles) {
            $model->syncRoles($input['roles']);
        }
        /*if ($request->permissions) {
            $model->syncPermissions($request->permissions);
        }*/
        return response()->json($model, 201);
    }

    public function sign(Request $request)
    {
        $request->validate([
            'file' => 'file',
            'photo' => ''
        ]);
        $input = $request->all();
        if ($file = $request->file('file')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('storage/images', $name);
            $input['file'] = $name;
        }

        $user = auth()->user();
        $user->file = $input['file'];
        $user->save();
        if (!(empty($request->photo))) {
            if (file_exists(public_path() . '/storage/images/' . $request->photo)) {
                unlink(public_path() . '/storage/images/' . $request->photo);
            }
        }
        return response()->json($user, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $roles = \App\Role::all();
        $permissions = \App\Permission::all();
        return response()->json(['user' => User::where('id', $user->id)->with('division', 'roles', 'permissions')->first(), 'roles' => $roles, 'permissions' => $permissions], 200);
    }

    public function edit(User $user)
    {
        return response()->json($user, 200);
    }

    public function notification(User $user)
    {
        $transaction = new \App\Transaction;
        $currentDate = date('Y-m-d');
        $expired = $transaction->whereNotNull('expiry_date')->whereIsExpired(false)->whereDate('expiry_date', '<=', $currentDate);
        $expiredThreeMonth = $transaction->whereNotNull('expiry_date')->whereIsExpired(false)->whereIsExpiredWithin(false);
        if($expiredThreeMonth->exists() || $expired->exists()){
            $users = \App\User::whereHas('roles', function ($q) {
                $q->where('name', 'superadministrator');
            })->get();
        }
        if($expiredThreeMonth->exists()){

            foreach ($expiredThreeMonth->get() as $expire) {
                if($expire->whereDate('expiry_date', '<=', date('Y-m-d',strtotime("+3 months")))){
                    $product = \App\Product::whereId($expire->product_id)->with('medicine')->first();
                    foreach ($users as $user) {
                        $user->notify(new \App\Notifications\Expiry(auth()->user(), $product, $product->medicine->name, $product->expiry_date));
                    }
                    $expire->update(['is_expired_within' => true]);
                }

            }

        }
        if ($expired->exists()) {
            foreach ($expired->get() as $expire) {
                $product = \App\Product::whereId($expire->product_id)->with('medicine')->first();
                foreach ($users as $user) {
                    $user->notify(new \App\Notifications\Expiry(auth()->user(), $product, $product->medicine->name, $product->expiry_date));
                }
                $product->notify(new \App\Notifications\Expiry(auth()->user(), $product, $product->medicine->name, $product->expiry_date));
            }
            $expired->update(['is_expired' => true]);
        }
        return response()->json($user->notifications()->paginate());
    }

    public function markAsRead()
    {

        return response()->json(User::whereId(user()->id())->notifications()->paginate());
    }

    public function notificationMarkAsRead($id)
    {
        return response()->json(auth()->user()->notifications()->whereId($id)->update(['read_at' => now()]));
    }

    public function notification_show($id)
    {
        return response()->json(auth()->user()->notifications()->whereId($id)->first());
    }
    public function notificationDelete($id)
    {
        return response()->json(auth()->user()->notifications()->whereId($id)->delete());
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);
        $data = $request->all();
        if (!Hash::check($data['old_password'], $user->password)) {
            return response()->json('The specified password does not match the database password', 500);
        } else {
            return response()->json($user->update(['password' => bcrypt($request->new_password)]), 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }
}
