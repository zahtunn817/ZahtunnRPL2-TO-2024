<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Exception;
use PDOException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data['user'] = User::orderBy('created_at', 'DESC')->get();
            return view('User.index', [
                'page' => 'user',
                'section' => 'Kelola data'
            ])->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getCode());
        }
    }

    public function show(User $user)
    {
        try {
            $data['petugas'] = DB::table('users')
                ->select('users.*')
                ->where('id', '=', $user->id)->get();
            return view('user.detail', [
                'page' => 'petugas',
                'section' => 'Data pengguna'
            ])->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getCode());
        }
    }

    public function store(UserRequest $request)
    {
        try {
            
            DB::beginTransaction();
            User::create($request->all());
            DB::commit();
            return redirect('user')->with('success', 'User berhasil ditambahkan!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function update(UserRequest $request, User $user)
    {
        try {
            DB::beginTransaction();
            $user->update($request->all());
            DB::commit();
            return redirect('user')->with('success', 'User berhasil diupdate!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function destroy(User $user)
    {
        try {
            DB::beginTransaction();
            $user->delete();
            DB::commit();
            return redirect('user')->with('success', 'User berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            return "Terjadi kesalahan :(" . $error->getMessage();
        }
    }
}
