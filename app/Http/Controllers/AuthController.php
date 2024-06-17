<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
  
class AuthController extends Controller
{
    public function register()
    {
        $countries = Country::all();
        return view('auth/register', compact('countries'));
    }
  
    public function registerSave(Request $request)
     {

              $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:8|confirmed',
                    'type' => 'required|integer',
               ]);
            if ($request['type'] == 2) {
                User::create([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
                    'type' => $request['type'],
                    'address' => $request['address'],
                    'phone' => $request['phone'],
                    'country_id' => $request['country_id'],
                ]);
          } else {
                    User::create([
                        'name' => $request['name'],
                        'email' => $request['email'],
                        'password' => Hash::make($request['password']),
                        'address' => $request['address'],
                        'phone' => $request['phone'],
                        'country_id' => $request['country_id'],
                    ]);
         }

             return redirect()->route('login'); // Redirect to the login page
    }

//     public function registerSave(Request $request)
// {
//     // Validate the request data
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'email' => 'required|string|email|max:255|unique:users',
//         'password' => 'required|string|min:8|confirmed',
//         'type' => 'required|integer',
//     ]);

//     // Create the user
//     $user = User::create([
//         'name' => $request['name'],
//         'email' => $request['email'],
//         'password' => Hash::make($request['password']),
//         'type' => $request['type'] == 2 ? $request['type'] : null, // Only set type if it is 2
//     ]);

//     // Log the user in
//     Auth::login($user);

//     // Redirect the user based on their type
//     return $this->redirectTo();
// }

// protected function redirectTo()
// {
//     if (auth()->user()->type == 2) {
//         return redirect('home');
//     }
// }

  
    public function login()
    {
        return view('auth/login');
    }
  
    public function loginAction(Request $request)
{
    // Validate the incoming request data
    $validatedData = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required'
    ])->validate();

    if (auth()->attempt(['email' => $request->email, 'password' => $request->password], true)) {

        $user = auth()->user();
        if ($user->type === 1) {
            
            $request->session()->regenerate();
          
            return redirect()->route('dashboard');
        } elseif($user->type === 2){
            $request->session()->regenerate();
          
            return redirect()->route('home');
        }
    }
    return redirect()->back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}

  
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
  
        $request->session()->invalidate();
  
        return redirect()->route('home');
    }

    public function profile(string $id)
    {
        $user = User::findOrFail($id);
        $selectedCountryId = $user->country_id; 
    
        $countries = Country::all();
  
        return view('profile', compact('user','selectedCountryId','countries'));
    }

    public function updateProfile(Request $request, string $id)
    {
        User::find($id)->update($request->all());
  
        return redirect()->route('profile', ['id' => $id])->with('success', 'Profile updated successfully');
    }
}