<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'date_of_birth' => 'required|date_format:Y-m-d|before:today',
            'gender' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
             'password' => [
                'required',
                'string',
                'min:8',/*  must be at least 8 characters in length*/
                // 'regex:/[a-z]/', /*  must contain at least one lowercase letter */
                // 'regex:/[A-Z]/', /*  must contain at least one uppercase letter*/
                // 'regex:/[0-9]/', /*  must contain at least one digit*/
                // 'regex:/[@$!%*#?&]/', /* must contain a special character*/
            ],
            'confirm_password' => 'required|same:password',
        ]);

        $incrementId = generateUserId();

        $user = User::create([
            'id' => $incrementId,
            'member_id' => generateMemberId($incrementId),
            'name' => $request->username,
            'email' => $request->email,
            'type' => '',
            'provider_id' => null,
            'gender' => $request->gender,
            'new_date_of_birth' => $request->new_date_of_birth,
            'udid' => 'webuser',
            'active' => 1,
            'app_version' => 0,
            'platform' => 4,
            'user_kind' => null,
            'category_order' => null,
            'encoding' => null,
            'password' => Hash::make($request->password),
            'role_id' => 1,
        ]);

        event(new Registered($user));

        $credentials = array('email' => $request->email, 'password' => $request->password);

        if (Auth::attempt($credentials, true)) {
            return Redirect()->to('/register/first-step');
        } else {
            return back()->with('errors', 'failed');
        }

        // Auth::login($user, $remember = true);

    }

    public function createStepOne(Request $request)
    {

        if ($this->checkUserExistOrNot(Auth::user()->id)) {
            return Redirect()->back()->with('errors', 'failed');
        }

        $list = config('config.user_type');

        $this->forgotRequestSession($request, 'user_type');
        $this->forgotRequestSession($request, 'question_one');
        $this->forgotRequestSession($request, 'question_two');
        $this->forgotRequestSession($request, 'user_three');

        return view('steps.first', compact('list'));
    }

    public function postStepOne(Request $request)
    {

        $request->validate(['user_type' => 'required']);

        $request->session()->put('user_type', $request->user_type);

        return Redirect()->to('/register/second-step');
    }

    public function createStepTwo(Request $request)
    {
        if ($this->checkUserExistOrNot(Auth::user()->id)) {
            return Redirect()->back()->with('errors', 'failed');}

        $user_id = $request->session()->get('user_type');

        if (!$user_id) {
            return Redirect()->to('/register/first-step');
        }

        $RelevantUserType = $this->getRelevantData($user_id, 'first_step');

        return view('steps.second', compact('RelevantUserType'));
    }

    public function postStepTwo(Request $request)
    {
        $key = $this->getKey($request->session()->get('user_type'), 'first_step');
        $request->session()->put('question_one', $key . '-' . $request->$key);
        return Redirect()->to('/register/third-step');

    }

    public function createStepThree(Request $request)
    {
        if ($this->checkUserExistOrNot(Auth::user()->id)) {
            return Redirect()->back()->with('errors', 'failed');
        }

        $user_id = $request->session()->get('user_type');
        $question_one = $request->session()->get('question_one');

        if (!($user_id && $question_one)) {
            return Redirect()->to('/register/first-step');
        }

        $RelevantUserType = $this->getRelevantData($user_id, 'second_step');
        return view('steps.third', compact('RelevantUserType'));
    }

    public function postStepThree(Request $request)
    {
        $key = $this->getKey($request->session()->get('user_type'), 'second_step');
        $request->session()->put('question_two', $key . '-' . $request->$key);

        return Redirect()->to('/register/fourth-step');

    }

    public function createStepFour(Request $request)
    {
        if ($this->checkUserExistOrNot(Auth::user()->id)) {
            return Redirect()->back()->with('errors', 'failed');
        }

        $user_id = $request->session()->get('user_type');
        $question_one = $request->session()->get('question_one');
        $question_two = $request->session()->get('question_two');

        if (!($user_id && $question_one && $question_two)) {
            return Redirect()->to('/register/first-step');
        }

        $RelevantUserType = $this->getRelevantData($user_id, 'third_step');

        return view('steps.fourth', compact('RelevantUserType'));
    }

    public function postStepFour(Request $request)
    {
        $key = $this->getKey($request->session()->get('user_type'), 'third_step');
        $request->session()->put('question_three', $key . '-' . $request->$key);

        DB::beginTransaction();
        try {
            $userId = Auth::user()->id;
            User::where('id', $userId)->update(['user_kind' => $request->session()->get('user_type')]);
            Information::create([
                'question_one' => $request->session()->get('question_one'),
                'question_two' => $request->session()->get('question_two'),
                'question_three' => $request->session()->get('question_three'),
                'user_id' => $userId,
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return Redirect()->to('/register/first-step');
        }

        return Redirect()->to(RouteServiceProvider::HOME);

    }

    protected function checkUserExistOrNot($userId)
    {
        return Information::where('user_id', $userId)->first();
    }

    protected function getRelevantData($userType, $step = 'first_step')
    {
        return config('config.' . $userType)[$step];
    }

    protected function forgotRequestSession($request, $name)
    {
        $request->session()->forget($name);
    }

    protected function getKey($userType, $step)
    {
        $data = $this->getRelevantData($userType, $step);
        return $data['key'];
    }

}
