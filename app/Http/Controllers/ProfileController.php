<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
  public function home(){
    return view('pages.manage.profile.home');
  }

  public function pengaturan(){
    return view('pages.manage.profile.pengaturan');
  }

  public function pengaturanUpdate(Request $request){
    $request->validate([
      'name' => 'required',
      'email' => 'nullable|unique:users,email,' . Auth::user()->id,
      'password' => 'nullable',
    ]);

    !filled($request->password)
            ? Auth::user()->update($request->except('password'))
            : Auth::user()->update($request->all());

    return back()->withSuccess('Profil berhasil diperbarui!');
  }

  public function editFoto(){
    return view('pages.manage.profile.editfoto');
  }

  public function updateFoto(Request $request) {

      $request->validate([
        'avatar' => ['image', 'required'],
      ]);

      $avatar = $request->file('avatar');
      if ($request->hasFile('avatar')) {
        $filenameWithExtension      = $request->file('avatar')->getClientOriginalExtension();
        $filename                   = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
        $extension                  = $avatar->getClientOriginalExtension();
        $filenamesimpan             = 'img' . time() . '.' . $extension;
        $avatar->move('img/profile/', $filenamesimpan);

        $editdata = [
          'foto' => $filenamesimpan,
        ];

        Auth::user()->update($editdata);
      }

      if ($request->old_foto != 'profile.jpg'){
        $filegambar = public_path('/img/profile/' . $request->old_foto);
        File::delete($filegambar);
      }
      return back()->with([
        'success' => 'Foto profil berhasil diperbarui!',
        'foto' => 'active',
      ]);
  }

  public function deleteFoto() {
    if (Auth::user()->foto != 'profile.jpg'){
      $filegambar = public_path('/img/profile/' . Auth::user()->foto);
      File::delete($filegambar);
    }
    Auth::user()->update(['foto' => 'profile.jpg']);
    return back()->withSuccess('Foto profil berhasil dihapus!');
  }
}
