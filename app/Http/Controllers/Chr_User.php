<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\news;
use App\Models\Ask;
use App\Models\Content_Forum;
use App\Models\Content_Case;
use App\Mail\VerifyEmailOtp;
use App\Models\Cases;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use App\Models\Message;
use App\Models\Feedback;
use App\Models\Chatbot;
use App\Models\Content_Sector;
use App\Models\Room;
use App\Models\EmailVerification;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class Chr_User extends Controller
{

    function Message_Messages(){
        $user_email = session('user_email');
        $room = Room::where('person_1', $user_email) ->get();
        $roomcount = $room->count();
        return view('main.entrymessage',compact('room'));
    }

    function Reset(){
        return view('loginpage.reset');
    }
    public function Verify(Request $request) {
        // Validate the email to check if it's in the correct format
        $request->validate([
            'email' => 'required|email|exists:users,user_email', // Check if email exists in users table
        ], [
            'email.exists' => 'The email address you entered is not registered.',
            'email.required' => 'Please provide your email address.',
            'email.email' => 'Please enter a valid email address.',
        ]);

        // Continue if email exists
        $email = $request->input('email');
        return view('loginpage.verifyuser')->with('email', $request->get('email'));
    }
    function Verify_Email(){
        return view('loginpage.verify');
    }
    Public function sendOtp(Request $request)
    {
        $request->validate([
            'user_email' => 'required|email'
        ]);
        $otp = random_int(100000, 999999);
        EmailVerification::updateOrCreate(
            ['email' => $request->user_email],
            ['otp' => $otp, 'expires_at' => Carbon::now()->addMinutes(10)]
        );


        $users = $request->user_email;
            if (!empty($users)) {
                Mail::to($users)->send(new VerifyEmailOtp($otp));
            } else {
                // Log or handle the case where the user does not have an email address
                return back()->with("User with ID {$users} does not have a valid email address.");
            }

        return redirect()->route('Verify.email', ['email' => $request->user_email])
        ->with('message', 'OTP has been sent to your email.');
         }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|numeric'
        ]);
        $verification = EmailVerification::where('email', $request->email)
                                         ->where('otp', $request->otp)
                                         ->first();
        if ($verification) {

            return redirect()->route('Change', ['email' => $request->email])->with('message', 'Email verified!');
        } else {
            return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
        }
    }

    function Change(){
        return view('loginpage.change');
    }
    public function changePassword(Request $request) {
        // Validate the password and repeat password fields
        $request->validate([
            'password' => 'required|min:6',
            'repeatpassword' => 'required|same:password',
        ]);

        // Find user by email
        $user = User::where('user_email', $request->email)->first();
        // \Log::info('User found: ' . ($user ? 'Yes' : 'No')); // Log user existence
        // \Log::info('User found: ' . $user); // Log user details

        if ($user) {
            // Hash and save the new password
            $user->password = Hash::make($request->password);
            $user->save();

            // Clear the OTP session or related flags
            session()->forget('otp_verified'); // Clear OTP verification flag

            // Optionally, you may update the email verification status if needed
            if ($user->email_status !== 'verified') {
                $user->email_status = 'verified';
                $user->save();
            }

            // Redirect to the login page with a success message
            return redirect(route('Login'))->with('success', 'Password changed successfully!');
        }

        // If user not found, return back with an error
        return redirect()->back()->withErrors(['email' => 'User not found.']);
    }


    function Login(){
        if(Auth::check()){
            return redirect(route('Homepage'));
        }
        return view('loginpage.login');
    }
    function Register(){
        return view('loginpage.register');
    }

    public function Homepage(Request $request)
    {
        $chat = Chatbot::all();
        return view('main.homepage', ['chat' => $chat]);
    }


    function Verifyauth(){
        return view('loginpage.verifyaccount');
    }
    Public function sendOtpauth(Request $request)
    {
        $request->validate([
            'user_email' => 'required|email'
        ]);
        $otp = random_int(100000, 999999);
        EmailVerification::updateOrCreate(
            ['email' => $request->user_email],
            ['otp' => $otp, 'expires_at' => Carbon::now()->addMinutes(10)]
        );
        $users = User::all();
        // Loop through each user and send the email if user_email is not empty
        foreach ($users as $user) {
            if (!empty($user->user_email)) {
                Mail::to($user->user_email)->send(new VerifyEmailOtp($otp));
            } else {
                // Log or handle the case where the user does not have an email address
                return back()->with("User with ID {$user->id} does not have a valid email address.");
            }
        }

        return redirect()->route('Verify.email', ['email' => $request->user_email])
        ->with('message', 'OTP has been sent to your email.');
         }

         function Verify_Emailauth(){
            return view('loginpage.verifyauth');
        }

        public function verifyOtpauth(Request $request)
        {
            $request->validate([
                'email' => 'required|email',
                'otp' => 'required|numeric'
            ]);
            $verification = EmailVerification::where('email', $request->email)
                                             ->where('otp', $request->otp)
                                             ->first();
            if ($verification) {
                Auth::logout();
                Session::flush();
                $user = User::where('user_email', $request->input('email'))->first();
                if ($user) {

                    $user->email_status = 'verified';
                    $user->save(); }

                return redirect()->route('Homepage', ['email' => $request->email])->with('message', 'Email verified!');
            } else {
                return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
            }
        }

    function user_login_post(Request $request){
        $request->validate([
            'user_email' => 'required',
            'password' => 'required',
        ], [
            'password.required' => 'Required password.',
        ]);

        $user = User::where('user_email', $request->input('user_email'))->first();

        if ($user && Hash::check($request->input('password'), $user->password)) {
            Auth::login($user);
            $request->session()->put('user_id', $user->id);
            $request->session()->put('firstname', $user->firstname);
            $request->session()->put('lastname', $user->lastname);
            $request->session()->put('user_email', $user->user_email);
            $request->session()->regenerate();
            return redirect()->intended(route('Homepage'));
        }

        return redirect(route('Login'))->with("error", "Invalid login credentials");
    }

    public function updateProfile(Request $request, $user_id)
{
    // Validation
    $validatedData = $request->validate([
        'firstname' => 'required|max:255',
        'middlename' => 'nullable|max:255',
        'lastname' => 'required|max:255',
        'user_email' => 'required|email|max:255',
        'birthdate' => 'nullable|date',
        'age' => 'nullable|integer|min:0|max:150',
        'address' => 'required|max:500',
        'gender' => 'required|in:Male,Female,Other',
        'contact' => 'nullable|regex:/^\d{10,15}$/',
        'motto' => 'nullable|max:255',
    ]);

    // Update the profile
    $profile = User::findOrFail($user_id);
    $profile->update($validatedData);

    return redirect()->route('profile.show', $user_id)->with('success', 'Profile updated successfully.');
}


    public function user_register_post(Request $request)
    {
        $request->validate([
            'firstname'=>'required',
            'middlename'=>'nullable',
            'lastname'=>'required',
            'suffix'=>'nullable',
            'user_email'=>'required|email|unique:users',
            'password'=>'required|min:8',
            'confirmpassword' => 'required|same:password',
            'contact'=>'required',
        ]);
        $data['firstname'] = $request->firstname;
        $data['middlename'] = $request->middlename;
        $data['lastname'] = $request->lastname;
        $data['username'] = $request->user_email;
        $data['contact'] = $request->contact;
        $data['user_email'] = $request->user_email;
        $data['password'] = Hash::make($request->password);
        $data['email_status'] = "Not Verified";
        $user = User::create($data);
        if(!$user){
            return redirect()->back()->with("error", "Registration Failed");
        }
        // return redirect(route('verify.auth'))->with("success", "Registration Success");
           return redirect(route('Login'))->with("success", "Registration Success");
    }

    function logout() {
        Auth::logout();
        Session::flush();
        Session::flash('message', 'You have been logged out successfully.');
        return redirect()->route('Login');
    }

    function Complain(){
        $userId = session('user_id');
        $caseExists = Cases::where('user_id', $userId)
                           ->whereIn('status', ['Processing' , 'Interview'])
                           ->latest('created_at')
                           ->exists();

        if ($caseExists) {
            return redirect()->route('List');
        } else {
            return view('main.complain');
        }
    }
    function AboutUs(){
        return view('main.aboutus');
    }

    function Complain_Form(){
        if(!Auth::check()){
            return redirect(route('Login'));
        }
        $userId = session('user_id');

        $pendingCases = Cases::where('user_id', $userId)
                                  ->where(function($query) {
                                      $query->where('status', 'pending')
                                            ->orWhere('status', 'message');
                                  })
                                  ->exists();

        if ($pendingCases) {
            return redirect(route('List'));
        }

        $contentsector = Content_Sector::all();
        $contentcase = Content_Case::all();

        return view('main.complainform',compact('contentsector','contentcase'));

    }

    function List() {
        $userId = session('user_id');
      
        $case = Cases::where('user_id', $userId)
                     ->orderBy('created_at', 'desc')
                     ->first();
         $caseApproved = Cases::where('user_id', $userId)
                     ->where('status', 'Interview')
                     ->exists();

        return view('main.waitinglist', ['case' => $case, 'caseApproved'=> $caseApproved]);
    }



// In your controller, e.g., Chr_User.php
public function checkCaseStatus() {
    $userId = session('user_id');

    // Fetch the latest case for the user
    $case = Cases::where('user_id', $userId)
                 ->orderBy('created_at', 'desc')
                 ->first();

    // Check if the case is approved
    $caseApproved = $case && $case->status === 'Interview';

    // Return a JSON response
    return response()->json([
        'caseApproved' => $caseApproved,
        'referenceNumber' => $case ? $case->reference_number : null,
    ]);
}


public function chat_form(Request $request)
{
    $request->validate([
        'user_id'=>'nullable',
        'reference_number'=> 'nullable'
    ]);

    $case = Cases::where('user_id', $request->user_id)
                ->where('reference_number', $request->reference_number)
                ->first();

    if ($case) {
        $case->status = 'Completed';
        $case->save();
    }

    return redirect()->route('Message');
}


    function Forum(){

        $forum = Content_Forum::all();
   
        return view('main.forum', compact('forum'));
    }
    function Ask(){
        $email = session('user_email') ;
        $ask = Ask::where('email', $email)->get();
        return view('main.ask', compact('ask'));
    }


    public function Askquestions(Request $request)
{
    // Validate inputs
    $request->validate([
        'title' => 'required|string|max:255',
        'question' => 'required|string',
        'email' => 'required|email',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $fileName = null;

    // Handle file upload if present
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $fileName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('bot_image'), $fileName);
        $fileName = 'bot_image/' . $fileName; // Relative path
    }

    // Save to database (ensure Ask model exists and table is set up correctly)
    Ask::create([
        'text' => $request->input('title'),
        'question' => $request->input('question'),
        'email' => $request->input('email'),
        'image' => $fileName, // Optional
    ]);

    return redirect()->back()->with("success", "Your question has been submitted successfully!");
}

    
    function forum_post(Request $request){
        $request->validate([
            'case' => 'required',
            'title' => 'required',
            'story' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
        ]);
   
        Content_Forum::create([
            'case' => $request->input('case'),
            'title' => $request->input('title'),
            'story' => $request->input('story'),
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'email' => $request->input('email'),
        ]);
        
        return redirect()->back()->with("success", "Post created Successfully");
    }

    function Law(){
        return view('main.lawbook');
    }

    public function user_form_post(Request $request)
    {

        $request->validate([
            'user_id' => 'required',
            'identity' => 'required',

            'first_name_guardian' => 'nullable',
            'middle_name_guardian' => 'nullable',
            'last_name_guardian' => 'nullable',

            'city' => 'nullable',

            'barangay' => 'nullable',

            'province' => 'nullable',
            'street' => 'nullable',

            'firstname' => 'required|string|max:50',
            'middlename' => 'nullable|string|max:1',
            'lastname' => 'required|string|max:50',

            'relation' => 'nullable',
            'gender' => 'required',
            'birthdate' => 'required|date',
            'sector' => 'required',
            'contact' => 'required',
            'report' => 'required',
            'case' => 'required|string|max:500',
            'email' => 'required|email|max:100',
        ]);

        // Generate a unique reference number
        $today = Carbon::now();
        $lastFiveDigits = 1;
        $lastEntry = Cases::latest()->first();
        if ($lastEntry) {
            $lastReferenceNumber = $lastEntry->reference_number;
            $lastFiveDigits = (int) substr($lastReferenceNumber, -5) + 1;
        }

        $referenceNumber = $today->year . $today->dayOfYear .
                           str_pad($today->day, 2, '0', STR_PAD_LEFT) .
                           str_pad($today->month, 2, '0', STR_PAD_LEFT) .
                           str_pad($lastFiveDigits, 5, '0', STR_PAD_LEFT);

        // Compute age
        $birthdate = new \DateTime($request->birthdate);
        $today = new \DateTime();
        $age = $today->diff($birthdate)->y;
        $names = [];

        // Add names to the array only if they are not null
        if (!is_null($request->first_name_guardian)) {
            $names[] = $request->first_name_guardian;
        }

        if (!is_null($request->middle_name_guardian)) {
            $names[] = $request->middle_name_guardian;
        }

        if (!is_null($request->last_name_guardian)) {
            $names[] = $request->last_name_guardian;
        }

        // Join the names with a single space
        $guardian_name = implode(' ', $names);
        // Prepare data for saving
        $data = [
            'user_id' => $request->user_id,
            'identity' => $request->identity,
            'victim_name' => $request->firstname . ' ' . $request->middlen . ' ' . $request->lastname,
            'guardian_name' => $guardian_name,
            'relation' => $request->relation,
            'address' => $request->street . ', ' . $request->city . ', ' . $request->province . ', ' . $request->barangay,
            'gender' => $request->gender,
            'age' => $age,
            'contact' => $request->contact,
            'case' => $request->case,
            'email' => $request->email,
            'birthdate' => $request->birthdate,
            'sector' => $request->sector,
            'reference_number' => $referenceNumber,
            'report' => $request->report,
            'status' => 'Processing'
        ];

        // Create the case
        $case = Cases::create($data);

        // Check if the case was created successfully
        if (!$case) {
            return redirect()->back()->with("error", "Registration Failed");
        }

        return redirect(route('List'))->with("success", "Registration Success");
    }

    function Newsfeed(){
        $news = news::all();

        return view('main.newsfeed', compact('news'));
    }
    public function show($id)
    {

        $newsfeed = news::findOrFail($id);

        return view('main.news', compact('newsfeed'));
    }

    public function showprofile($user_id)
    {
        $user = User::findOrFail($user_id);
        return view('main.profile', compact('user'));
    }
    



    // function Message(){
    //     $user_email = session()->get('user_email');
    //     $messages = Message::where('sender_id', $user_email)
    //                     ->where('receiver_id', 'user')
    //                     ->where('room', '123')
    //                     ->orderBy('created_at', 'desc')->get();
    //     $messages2 = Message::where('sender_id', $user_email)
    //                 ->where('receiver_id', 'officer')
    //                 ->where('room', '123')
    //                 ->orderBy('created_at', 'desc')->get();


    //     return view('main.message', ['user_email' => $user_email,'messages' => $messages,'messages2' => $messages2]);
    // }
    function Message(){
        $user_email = session()->get('user_email');
        $messages = Message::where('receiver_id', 'officer')
        ->where('room', '123')
        ->orderBy('created_at', 'desc')->get();
        $messages2 = Message::where('receiver_id', 'user')
            ->where('room', '123')
            ->orderBy('created_at', 'desc')->get();

        return view('main.message', ['user_email' => $user_email,'messages' => $messages,'messages2' => $messages2]);
    }
    function Officer_Message(){
        $admin_username = session('admin_username');

        $messages = Message::where('receiver_id', 'officer')
                        ->where('room', '123')
                        ->orderBy('created_at', 'desc')->get();
        $messages2 = Message::where('receiver_id', 'user')
                    ->where('room', '123')
                    ->orderBy('created_at', 'desc')->get();

        $admin_email = session()->get('admin_email');
        return view('officer.message', compact('admin_username','admin_email' ,'messages','messages2' ));
    }

    public function sendMessage(Request $request)
    {
        $message = new Message();
        $message->sender_id = $request->session()->get('user_email');
        $message->receiver_id = $request->receiver_id;
        $message->message = $request->message;
        $message->room = $request->room;
        $message->save();
        return redirect()->back();
    }

    public function fetchMessages()
{
    $user_email = session()->get('user_email');

    // Fetch messages for the specific room
    $messages = Message::where('sender_id', $user_email)
                    ->where('receiver_id', 'user')
                    ->where('room', '123')
                    ->orderBy('created_at', 'desc')->get();

    $messages2 = Message::where('sender_id', $user_email)
                ->where('receiver_id', 'officer')
                ->where('room', '123')
                ->orderBy('created_at', 'desc')->get();

    // Combine and sort messages
    $combinedMessages = collect();
    foreach ($messages2 as $message2) {
        $combinedMessages->push((object)[
            'type' => 'message2',
            'message' => $message2->message,
            'created_at' => $message2->created_at,
        ]);
    }
    foreach ($messages as $message) {
        $combinedMessages->push((object)[
            'type' => 'message',
            'message' => $message->message,
            'created_at' => $message->created_at,
        ]);
    }
    $sortedMessages = $combinedMessages->sortBy('created_at');

    return response()->json($sortedMessages);
}
public function store(Request $request)
{

    $request->validate([
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'nullable|string|max:255',
    ]);

    Feedback::create([
        'rating' => $request->input('rating'),
        'details' => $request->input('comment'),
    ]);

    return redirect()->back()->with('success', 'Feedback submitted successfully!');
}
public function downloadReferencePdf(Request $request) {
    // Ensure the user is authenticated
    $user = Auth::user();

    // Check if the user is logged in
    if (!$user) {
        return redirect()->route('login')->withErrors(['error' => 'You must be logged in to download the reference.']);
    }

    // Get the reference number from the request
    $referenceNumber = $request->input('reference_number');

    // Check if reference number is provided
    if (!$referenceNumber) {
        return redirect()->back()->withErrors(['error' => 'No reference number provided.']);
    }

    // Retrieve the case details using the reference number (assuming you have a `Case` model or similar)
    $case = Cases::where('reference_number', $referenceNumber)->first();

    if (!$case) {
        return redirect()->back()->withErrors(['error' => 'Case not found for the provided reference number.']);
    }

    // Prepare the data for the PDF
    $data = [
        'referenceNumber' => $referenceNumber,
        'userName' => $user->firstname . ' ' . $user->lastname, // Use logged-in user's name
        'caseStatus' => $case->status,  // Assuming the `status` field exists in your case model
        'dateProcessed' => $case->processed_at ? $case->processed_at->format('F j, Y') : 'Not processed yet', // Assuming a `processed_at` field exists in your case model
    ];

    // Generate the PDF
    $pdf = PDF::loadView('pdf.reference_number', $data);

    // Return the PDF file as a download
    return $pdf->stream("reference_number_{$referenceNumber}.pdf");
    }

}
