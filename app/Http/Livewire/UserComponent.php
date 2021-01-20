<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\WithPagination;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\team_user;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
class UserComponent extends Component
{
    ///Listado con paginacion
    use WithPagination;
    protected $queryString=['searchUsuario' => ['except'=>''] ];
    public $searchUsuario='';public $porpagUsuario='10';protected $paginationTheme = 'bootstrap';

    /////Guardar
    use WithFileUploads;
    public $ViewUser='crearuser';
    public $nombre,$fotoPerfil,$correo,$contra,$idUsuario,$idu,$msg,$imgUsuario,$rol=' ',$decrypted=' ';

    public $modalUserVisible=false; public $modalUserEliminar=false;
    public function render()
    {
        //$searchTerm = '%'.$this->search.'%';
        return view('livewire.Admin.Usuario.user-component',[
            'users'=> User::where('name','LIKE',"%{$this->searchUsuario}%")
            ->orWhere('email','LIKE',"%{$this->searchUsuario}%")
            ->orWhere('created_at','LIKE',"%{$this->searchUsuario}%")
            ->orderBy('id','desc')
            ->paginate($this->porpagUsuario),
        ]);
    }
    public function clear(){
        $this->searchUsuario='';
        $this->porpagUsuario=10;
        $this->pageUsuario=1;
    }

    /////////////Guardar
    public function createUserModal(){
        $this->modalUserVisible=true;
        $this->cleanVars();
        $this->msg='Guardar';
    }
    public function storeU(){
        //$prod=$this->generarURL($data['product']);
        if($this->imgUsuario!=null)
        $q=$this->imgUsuario->store('storage/profile-photos','subirArchivos');
        $img = Str::of($q)->substr(8);
        if($this->msg=='Guardar')
        {
            $this->validate([
                'nombre'=>   'required',
                'correo'=>      'required|unique:users,email',
                'contra'=>   'required',
            ],
            [
                'nombre.required' => 'El nombre del usuario es requerido',
                'correo.required' => 'El correo del usuario es requerido',
                'contra.required' => 'Contraseña es requerida',
            ]);
            User::Insert([
                'name'=>      $this->nombre,
                'email'=>      $this->correo,
                'password'=>      Hash::make($this->contra),
                'profile_photo_path'=> $img,
                'created_at'=>      now(),
                'updated_at'=>      now(),
            ]);
            $user_id = User::where('email',$this->correo )->value('id');
            team_user::Insert([
                'role'    =>     $this->rol,
                'user_id' =>     $user_id,
                'team_id' =>     1
            ]);
            session()->flash('message', 'Usuario guardado correctamente.');
        }else if($this->msg=='Actualizar'){
            $this->validate([
                'nombre'=>   'required',
                'correo'=>      'required',
            ],
            [
                'nombre.required' => 'El nombre del usuario es requerido',
                'correo.required' => 'El correo del usuario es requerido',
            ]);

            if($this->contra!=null & $this->imgUsuario != null & $this->rol != null)
            {
                User::updateOrInsert(['id'=>$this->idUsuario],[
                    'name'=>      $this->nombre,
                    'email'=>      $this->correo,
                    'password'=>      Hash::make($this->contra),
                    'profile_photo_path'=> $img,
                    'updated_at'=>      now(),
                ]);
                team_user::updateOrInsert(['user_id'=>$this->idUsuario],[
                    'role'=>     $this->rol,
                ]);
            }else if($this->contra!=null)
            {
                User::updateOrInsert(['id'=>$this->idUsuario],[
                    'name'=>      $this->nombre,
                    'email'=>      $this->correo,
                    'password'=>      Hash::make($this->contra),
                    'updated_at'=>      now(),
                ]);
                if($this->rol!=null){
                    team_user::updateOrInsert(['user_id'=>$this->idUsuario],[
                        'role'=>     $this->rol,
                    ]);
                }
            }else if($this->imgUsuario != null)
            {
                User::updateOrInsert(['id'=>$this->idUsuario],[
                    'name'=>      $this->nombre,
                    'email'=>      $this->correo,
                    'profile_photo_path'=> $img,
                    'updated_at'=>      now(),
                ]);
                if($this->rol!=null){
                    team_user::updateOrInsert(['user_id'=>$this->idUsuario],[
                        'role'=>     $this->rol,
                    ]);
                }
            }else{
                User::updateOrInsert(['id'=>$this->idUsuario],[
                    'name'=>      $this->nombre,
                    'email'=>      $this->correo,
                    'updated_at'=>      now(),
                ]);
                if($this->rol!=null){
                    team_user::updateOrInsert(['user_id'=>$this->idUsuario],[
                        'role'=>     $this->rol,
                    ]);
                }
            }
            session()->flash('message', 'Usuario modificado correctamente.');
        }
        $this-> cleanVars();
        $this->cerrarUserModal();
    }

    public function cerrarUserModal()
    {
        $this->modalUserVisible=false;
        $this->cleanVars();
    }
    private function cleanVars()
    {
        $this->nombre = null;
        $this->correo = null;
        $this->contra = null;
        $this->imgUsuario=null;

    }
    private function generarURL($valor)
    {
        $buscar=str_replace(' ','_',$valor);
        $remplazar=strtolower($buscar);
        return $remplazar;
    }

    /////Editar


    public function mostrarupdusuario($id){
        $this->modalUserVisible=true;
        $usuario = User::where('id', $id)->first();
        $rol = team_user::where('user_id', $id)->value('role');
         $this->idUsuario=$id;
         $this->nombre=  $usuario->name;
         $this->correo=  $usuario->email;
         $this->rol= $rol;
        $this->msg='Actualizar';
    }

    //////Eliminar
    public function mostrarUserEliminar($id){
        $this->modalUserEliminar=true;
        $this->idu=$id;
        $usuario = User::where('id', $id)->first();
        $this->nombre= $usuario->name;
    }
    public function eliminarUser(){
        $usuario=User::where('id',$this->idu);
        ///Storage::delete($usuario->profile_photo_path);
        $usuario->delete();
        $this->modalUserEliminar=false;
        session()->flash('message', 'Usuario eliminado correctamente.');
    }

}
