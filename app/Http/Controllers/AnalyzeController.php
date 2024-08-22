<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAnalyze;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Mail\RegisterMail;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class AnalyzeController extends Controller
{
    public function index()
    {
        return view('analyze.home');
    }

    public function mainDashboard()
    {
        return view('analyze.dashboard');
    }

    public function signin()
    {
        if (FacadesAuth::check()) {
            return redirect()->route('dashboard-core');
        }
        return view('auth.analyze-login');
    }

    public function login(Request $request)
    {
        $login = $request->input('email_or_username');
        $password = $request->input('password');

        $user = UserAnalyze::where('email', $login)
            ->orWhere('username', $login)
            ->first();

        if ($user && Hash::check($password, $user->password)) {
            if (!$user->hasVerifiedEmail()) {
                FacadesAuth::login($user);
                return redirect()->route('verification.notice')->withErrors('Please verify your email before accessing the dashboard.');
            }
            FacadesAuth::login($user);
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('dashboard-core');
            }
        }

        return redirect()->back()->with('error', 'Login Failed!\nWrong username / password');
    }

    public function signup()
    {
        if (FacadesAuth::check()) {
            return redirect()->route('dashboard-core');
        }
        return view('auth.analyze-signup');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:user_analyze',
            'email' => 'required|string|email|max:255|unique:user_analyze',
            'password' => 'required|string|min:8|confirmed',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'work' => 'nullable|string|max:255',
        ]);

        $userAnalyze = UserAnalyze::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'phone' => $request->phone,
            'work' => $request->work,
            'role' => $request->input('role', 'user'),
            'user_type' => 'free',
        ]);
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            [
                'id' => $userAnalyze->id,
                'hash' => sha1($userAnalyze->email),
            ]
        );

        Mail::to($userAnalyze->email)->send(new RegisterMail($userAnalyze, $verificationUrl));

        return redirect()->route('signin')->with('status', 'Verification link has been sent to your email.');
    }

    public function resendVerificationEmail(Request $request)
    {
        $user = $request->user();
    
        if ($user->hasVerifiedEmail()) {
            return redirect()->route('dashboard-core')->with('status', 'Your email is already verified.');
        }

        try {
            $verificationUrl = URL::temporarySignedRoute(
                'verification.verify',
                now()->addMinutes(60),
                [
                    'id' => $user->id,
                    'hash' => sha1($user->email),
                ]
            );

            Mail::to($user->email)->send(new RegisterMail($user, $verificationUrl));

            return redirect()->back()->with('success', 'Verification link sent!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to send verification email. Please try again later.');
        }
    }

    public function logout()
    {
        FacadesAuth::logout();
        return redirect()->route('signin');
    }

    public function verifyEmail()
    {
        return view('auth.analyze-verify-email');
    }

    public function verify(Request $request, $id, $hash)
    {
        if (!$request->hasValidSignature()) {
            return redirect()->route('signin')->with('error', 'Invalid or expired verification link. Please request a new verification email.');
        }

        $user = UserAnalyze::find($id);

        if (!$user) {
            return redirect()->route('signin')->with('error', 'User not found.');
        }

        if (!hash_equals($hash, sha1($user->email))) {
            return redirect()->route('signin')->with('error', 'Invalid verification link.');
        }

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('signin')->with('message', 'Email already verified. Please log in.');
        }

        $user->markEmailAsVerified();

        return redirect()->route('signin')->with('message', 'Email successfully verified. Please log in.');
    }

    public function emailVerified(EmailVerificationRequest $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('dashboard-core');
        }
        $request->fulfill();

        return redirect()->route('dashboard-core')->with('status', 'Your email address has been verified.');
    }

    public function forgotPassword()
    {
        return view('auth.analyze-forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function showResetForm($token)
    {
        return view('auth.analyze-reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('signin')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function paymentAndBilling()
    {
        return view('analyze.paymentAndBilling', ['title' => 'Payment and Billing']);
    }

    public function setting()
    {
        return view('analyze.settings', ['title' => 'Settings']);
    }

    public function profileUser()
    {
        $user = FacadesAuth::user();
        return view('analyze.profile', [
            'title' => 'Profile',
            'user' => $user,
        ]);
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:user_analyze,username,' . FacadesAuth::id(),
            'email' => 'required|string|email|max:255|unique:user_analyze,email,' . FacadesAuth::id(),
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'work' => 'nullable|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = FacadesAuth::user();

        if ($request->hasFile('profile_image')) {
            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }

            $path = $request->file('profile_image')->store('profile_images', 'public');

            DB::table('user_analyze')
            ->where('id', FacadesAuth::id())
                ->update(['profile_image' => $path]);
        }

        DB::table('user_analyze')
        ->where('id', FacadesAuth::id())
            ->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'work' => $request->work,
            ]);

        return redirect()->route('profile-user')->with('status', 'Profile updated successfully.');
    }
}