<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Helpers\Frontend\Auth\Socialite;
use App\Events\Frontend\Auth\UserRegistered;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Repositories\Frontend\Auth\UserRepository;
use Illuminate\Support\Facades\Storage;

use App\Models\Auth\User;
use App\Models\Auth\Team;
use File;

/**
 * Class RegisterController.
 */
class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * RegisterController constructor.
     *
     * @param UserRepository $userRepository
     */

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    public function redirectPath()
    {
        return route(home_route());
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        abort_unless(config('access.registration'), 404);

        // $code = 'BTN-' . str_pad(User::count(), 3, '0', STR_PAD_LEFT) . '-';

        return view('frontend.auth.register')->withSocialiteLinks((new Socialite)->getSocialLinks());
    }

    /**
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Throwable
     */
    public function register(RegisterRequest $request)
    {
        abort_unless(config('access.registration'), 404);

        $user = $this->userRepository->create($request->only('first_name', 'last_name', 'email', 'password', 'userRole', 'code'));

        if ($request->hasFile('file')) {
            
            $userId = $user->id;
            $storedPath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix() . 'public/documents';
            $folderPath = $storedPath.'/'.$userId;

            $folder = File::makeDirectory($folderPath, 0777, true, true);
            $fileArray = [];

            foreach ($request->file('file') as $file) {
                $filename = $file->getClientOriginalName();
                $file->move($folderPath, $filename);

                $fileArray[] = $filename;
            }

            Team::create(['user_id' => $userId, 'documents' => json_encode($fileArray, JSON_FORCE_OBJECT)]);
        }

        

        // If the user must confirm their email or their account requires approval,
        // create the account but don't log them in.
        if (config('access.users.confirm_email') || config('access.users.requires_approval')) {
            event(new UserRegistered($user));

            return redirect()->route('frontend.auth.login')->withFlashSuccess(
                config('access.users.requires_approval') ?
                    __('exceptions.frontend.auth.confirmation.created_pending') :
                    __('exceptions.frontend.auth.confirmation.created_confirm')
            );
        } else {
            auth()->login($user);

            event(new UserRegistered($user));

            return redirect($this->redirectPath());
        }
    }
}
