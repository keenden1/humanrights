<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Cases;
use App\Models\Feedback;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Message;
use App\Models\Content_Book;
use App\Models\Content_Case;
use App\Models\Content_Forum;
use App\Models\Content_Sector;
use App\Models\news;
use App\Models\Room;
use TCPDF;
use Dompdf\Dompdf;
use Dompdf\Options;
class Chr_Admin extends Controller
{
    

    public function generateReport(Request $request)
    {
        $setdata = $request->input('setdata');
        $setdate = $request->input('setdate');
        $month = $request->input('month');
        $week = $request->input('week');
        $year = $request->input('year');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
    
        // Initialize query
        $query = DB::table('case');
    
        // Filter by date range if 'daily' is selected
        if ($setdate === 'daily' && $startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }
    
        // Filter by year and month if 'monthly' is selected
        if ($setdate === 'monthly' && $year && $month) {
            $query->whereYear('created_at', $year)
                  ->whereMonth('created_at', date('m', strtotime($month)));
        }
    
        // Filter by week if 'weekly' is selected
        if ($setdate === 'weekly' && $year && $month && $week) {
            $weekRanges = [
                'week1' => [1, 7],
                'week2' => [8, 14],
                'week3' => [15, 21],
                'week4' => [22, 31],
            ];
    
            if (isset($weekRanges[$week])) {
                $start = "$year-" . date('m', strtotime($month)) . "-" . $weekRanges[$week][0];
                $end = "$year-" . date('m', strtotime($month)) . "-" . $weekRanges[$week][1];
                $query->whereBetween('created_at', [$start, $end]);
            }
        }
    
        $data = [];
        if ($setdata === 'gender') {
            $data = $query->selectRaw('gender, COUNT(*) as count')
                          ->groupBy('gender')
                          ->get(); // Use get() instead of pluck
            $data = $data->mapWithKeys(function ($item) {
                return [$item->gender => $item->count]; // Format the data as key-value pairs
            });
        } elseif ($setdata === 'age') {
            $data = $query->selectRaw("CASE 
                                        WHEN age < 18 THEN 'Minor' 
                                        WHEN age >= 18 THEN 'Legal' 
                                        ELSE 'Unknown' 
                                      END as age_group, gender, COUNT(*) as count")
                          ->groupBy('age_group', 'gender')
                          ->get();
            $data = $data->mapWithKeys(function ($item) {
                return [$item->age_group . ' - ' . $item->gender => $item->count]; 
            });
        }
        return response()->json($data);
    }
    
    

    
    function Officer_Reports(){
        $feedback = Feedback::all()->sortByDesc('id');
        return view('officer.report',compact('feedback'));
}
    function Admin(){
              return view('admin.login');
    }


    // officer
    function Officer_Dashboard(){
        $admin_username = session('admin_username');
        $id = session('id'); 

        $users = User::all();
        $userCount = $users->count();
        $complains = Cases::all();
        $complain = $complains->count();
        $messages = Message::all();
        $message = $messages->count();
        $role = session('role');
        $forums = Content_Forum::count();

                     
        $maleLegalCount = $complains->where('gender', 'Male')->filter(function($case) {
            return \Carbon\Carbon::parse($case->birthdate)->age >= 18;
        })->count();
        
        $maleMinorCount = $complains->where('gender', 'Male')->filter(function($case) {
            return \Carbon\Carbon::parse($case->birthdate)->age < 18;
        })->count();
        
        $femaleLegalCount = $complains->where('gender', 'Female')->filter(function($case) {
            return \Carbon\Carbon::parse($case->birthdate)->age >= 18;
        })->count();
        
        $femaleMinorCount = $complains->where('gender', 'Female')->filter(function($case) {
            return \Carbon\Carbon::parse($case->birthdate)->age < 18;
        })->count();
        


        if (!session('admin_username') || !session('id') || session('role') !== 'officer') {
            return redirect()->route('Admin')->with('error', 'Please log in to access the dashboard.');
        }

        return view('officer.dashboard', compact('admin_username','userCount','complain',
    'message', 'forums', 'maleLegalCount', 'maleMinorCount', 'femaleLegalCount', 'femaleMinorCount'));
   }
   function Officer_Form_9(){
        $admin_username = session('admin_username');
        $cases = Cases::where('age', '>', 17)
        ->where(function ($query) {
            $query->where('status', 'Processing')
                  ->orWhere('status', 'Interview');
        })
        ->get();
        return view('officer.form-9', compact('admin_username', 'cases'));
    }
    function Officer_Form_10(){
        $admin_username = session('admin_username');
        $cases = Cases::where('age', '<', 18)
        ->where(function ($query) {
            $query->where('status', 'Processing')
                  ->orWhere('status', 'Interview');
        })
        ->get();
        return view('officer.form-10', compact('admin_username', 'cases'));
    }
    function Officer_User_Account(){
        $admin_username = session('admin_username');
        $user = User::all()->sortByDesc('id');
        return view('officer.user-account', compact('admin_username','user'));
    }
    function Officer_Endorse(){
        $admin_username = session('admin_username');
        $cases = Cases::all()->sortByDesc('created_at');
    
        return view('officer.endorse', compact('admin_username', 'cases'));
    }




    function Officer_Messages(){
        $admin_email = session('admin_email');
        $room = Room::where('person_2', $admin_email) ->get();
        $roomcount = $room->count();
        return view('officer.entrymessage',compact('room'));
    }



    function Officer_Message(){
        $admin_username = session('admin_username');

        $messages = Message::where('receiver_id', 'officer')
                        ->where('room', '123')
                        ->orderBy('created_at', 'desc')
                        ->with('sender')
                        ->get();
        $messages2 = Message::where('receiver_id', 'user')
                    ->where('room', '123')
                    ->orderBy('created_at', 'desc')
                    ->with('sender')
                    ->get();

        $admin_email = session()->get('admin_email');
        return view('officer.message', compact('admin_username','admin_email' ,'messages','messages2' ));
    }
    
    public function sendMessage(Request $request)
    {
        $message = new Message();
        $message->sender_id = "admin@gmail.com";
        $message->receiver_id = $request->receiver_id;
        $message->message = $request->message;
        $message->room = $request->room; 
        $message->save();
        return redirect()->back();
    }

    
    function Officer_Content(){
        $admin_username = session('admin_username');
        $book = Content_Book::all()->sortByDesc('id');
        $case = Content_Case::all()->sortByDesc('id');
        $forum = Content_Forum::all()->sortByDesc('id');
        $sector = Content_Sector::all()->sortByDesc('id');
        $news = news::all()->sortByDesc('id');
        $bookcount = $book->count();
        $casecount = $case->count();
        $forumcount = $forum->count();
        $sectorcount = $sector->count();
        $newscount = $news->count();

        return view('officer.content', compact('admin_username',
     'book',
                'case',
                'forum',
                'sector',
                'news',
                'bookcount',
                'casecount',
                'forumcount',
                'sectorcount',
                'newscount',));
    }

    public function contentcase(Request $request)
    {
        $validatedData = $request->validate([
            'case' => 'required|max:255',
            'created_by' => 'required',
        ]);
        Content_Case::create($validatedData);
        return redirect()->back()->with('success', 'Case added successfully!');
    }

    public function content_case_destroy($id)
    {
        $case = Content_Case::findOrFail($id);
        $case->delete();
        return redirect()->back()->with('success', 'Case deleted successfully!');
    }

    
    public function contentbook(Request $request)
    {
        $validatedData = $request->validate([
            'book' => 'required|max:255',
            'created_by' => 'required',
        ]);
        Content_Case::create($validatedData);
        return redirect()->back()->with('success', 'Case added successfully!');
    }

    public function content_book_destroy($id)
    {
        $case = Content_Book::findOrFail($id);
        $case->delete();
        return redirect()->back()->with('success', 'Case deleted successfully!');
    }

    public function contentnews(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'story' => 'required|string',
            'image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $news = new News();
        $news->title = $request->title;
        $news->date = $request->date;
        $news->story = $request->story;

        // Handle image uploads
        if ($request->hasFile('image_1')) {
            $news->image_1 = $request->file('image_1')->store('news_images', 'public');
        }
        if ($request->hasFile('image_2')) {
            $news->image_2 = $request->file('image_2')->store('news_images', 'public');
        }
        if ($request->hasFile('image_3')) {
            $news->image_3 = $request->file('image_3')->store('news_images', 'public');
        }

        $news->save();
        return redirect()->back()->with('success', 'Case added successfully!');
    }

    public function content_news_destroy($id)
    {
        $case = news::findOrFail($id);
        $case->delete();
        return redirect()->back()->with('success', 'Case deleted successfully!');
    }

 
    public function contentsector(Request $request)
    {
        $validatedData = $request->validate([
            'sector' => 'required|max:255',
            'created_by' => 'required',
        ]);
        Content_Sector::create($validatedData);
        return redirect()->back()->with('success', 'Case added successfully!');
    }

    public function content_sector_destroy($id)
    {
        $case = Content_Sector::findOrFail($id);
        $case->delete();
        return redirect()->back()->with('success', 'Case deleted successfully!');
    }

    public function contentforum(Request $request)
    {
        $validatedData = $request->validate([
            'forum' => 'required|max:255',
            'created_by' => 'required',
        ]);
        Content_Forum::create($validatedData);
        return redirect()->back()->with('success', 'Case added successfully!');
    }

    public function content_forum_destroy($id)
    {
        $case = Content_Forum::findOrFail($id);
        $case->delete();
        return redirect()->back()->with('success', 'Case deleted successfully!');
    }  
    function Officer_Forum(){
        $admin_username = session('admin_username');
        return view('officer.forum', compact('admin_username'));
    }
    function Officer_Setting(){
        $admin_username = session('admin_username');
        $admin_id = session('id');
        $admin = Admin::findOrFail($admin_id); 
        return view('officer.setting', compact('admin_username','admin'));
    }
    public function update(Request $request)
    {
        $admin_id = session('id');
        $admin = Admin::findOrFail($admin_id);
        $request->validate([
            'firstname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255',
            'motto' => 'nullable|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
        $admin->fname = $request->input('firstname');
        $admin->mname = $request->input('middlename');
        $admin->lname = $request->input('lastname');
        $admin->motto = $request->input('motto');
    
        if ($request->hasFile('profile_image')) {
            if ($admin->profile_image && Storage::exists($admin->profile_image)) {
                Storage::delete($admin->profile_image);
            }
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');
            $admin->profile_image = $imagePath;
        }
        $admin->save();
        return redirect()->route('officer.setting')->with('success', 'Profile updated successfully.');
    }
    
    
    public function showprofile($user_id)
    {
        return view('main.profile', compact('user'));
    }
    function Officer_Summary(Request $request){
        $request->validate([
            'reference_number' => 'required|string',
            'report' => 'required|string',
            'admin_username' => 'required|string',
        ]);
    
        // Find the case by reference number and update the summary field
        $case = Cases::where('reference_number', $request->input('reference_number'))->first();
    
        if ($case) {
            $case->summary = $request->input('report'); // Update the summary with the report value
            $case->in_charge = $request->input('admin_username');
            $case->status = 'Endorse';
            $case->save(); // Save changes to the database
    
            return redirect()->back()->with('success', 'Case summary updated successfully.');
        }
    
        return redirect()->back()->with('error', 'Case not found.');


    }


    
   // officer
 



    // Legal Head
   
   function Legal_Head_Dashboard(){
    $admin_username = session('admin_username');
    $id = session('id'); 
    $complains = Cases::all();
    $complain = $complains->count();
    $role = session('role');
    $forums = Content_Forum::count();

                     
    $maleLegalCount = $complains->where('gender', 'Male')->filter(function($case) {
        return \Carbon\Carbon::parse($case->birthdate)->age >= 18;
    })->count();
    
    $maleMinorCount = $complains->where('gender', 'Male')->filter(function($case) {
        return \Carbon\Carbon::parse($case->birthdate)->age < 18;
    })->count();
    
    $femaleLegalCount = $complains->where('gender', 'Female')->filter(function($case) {
        return \Carbon\Carbon::parse($case->birthdate)->age >= 18;
    })->count();
    
    $femaleMinorCount = $complains->where('gender', 'Female')->filter(function($case) {
        return \Carbon\Carbon::parse($case->birthdate)->age < 18;
    })->count();
    if (!session('admin_username') || !session('id') || session('role') !== 'legal') {
        return redirect()->route('Admin')->with('error', 'Please log in to access the dashboard.');
    }
    return view('legalhead.dashboard', compact('admin_username','complain','forums', 'maleLegalCount', 
    'maleMinorCount', 'femaleLegalCount', 'femaleMinorCount'));
}
function Legal_Head_Case(){
    $admin_username = session('admin_username');
    $cases = Cases::all()->sortByDesc('created_at');

    return view('legalhead.case', compact('admin_username', 'cases'));
}

function Legal_Head_Form(){
    $admin_username = session('admin_username');
    $cases = Cases::where(function ($query) {
        $query->where('status', 'On Going Endorse');
    })
    ->get();
    return view('legalhead.form', compact('admin_username', 'cases'));
}

function Legal_Head_Report(){
    $admin_username = session('admin_username');
    return view('legalhead.report', compact('admin_username'));
}


function Legal_Head_Setting(){
    $admin_username = session('admin_username');
    return view('legalhead.setting', compact('admin_username'));
}





public function adminapproveCase(Request $request)
{
    $assign = $request->input('assign_to');
    $referenceNumber = $request->input('reference_number');
    $case = Cases::where('reference_number', $referenceNumber)->first();
    
    if ($case) {
        $case->status = 'Endorse to Lawyer';
        $case->assign = $assign;
        $case->save();
        return redirect()->back()->with('success', 'Case Endorse successfully!');
    }

    return redirect()->back()->with('error', 'Case not found.');
}


    // Legal Head

    public function approveCase(Request $request)
    {
        $referenceNumber = $request->input('reference_number');
        $user_id = $request->input('user_id');
        $user = User::find($user_id);
        $email = $user->user_email;
        $case = Cases::where('reference_number', $referenceNumber)->first();
        $admin_email = session('admin_email');
        if ($case) {
            $case->status = 'Interview';
            $case->save();


            $lastRoom = DB::table('room')->orderBy('id', 'desc')->first();
            $nextRoomNumber = $lastRoom ? intval(substr($lastRoom->room_name, 4)) + 1 : 1; // Start from Room1

            $roomName = "Room" . $nextRoomNumber;

            DB::table('room')->insert([
                'room' => $referenceNumber,
                'room_name' => $roomName,
                'person_1' => $email,
                'person_2' => $admin_email,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->back()->with('success', 'Case approved successfully!');
        }
    
        return redirect()->back()->with('error', 'Case not found.');
    }
    

    public function endorseCase(Request $request)
    {
        $referenceNumber = $request->input('reference_number');
    
        $case = Cases::where('reference_number', $referenceNumber)->first();
        
        if ($case) {
            $case->status = 'On Going Endorse';
            $case->save();
            return redirect()->back()->with('success', 'Case Endorse successfully!');
        }
    
        return redirect()->back()->with('error', 'Case not found.');
    }
    public function approveendorseCase(Request $request)
    {
        $referenceNumber = $request->input('reference_number');
    
        $case = Cases::where('reference_number', $referenceNumber)->first();
        
        if ($case) {
            $case->status = 'Approved Endorse';
            $case->save();
            return redirect()->back()->with('success', 'Case Approved successfully!');
        }
    
        return redirect()->back()->with('error', 'Case not found.');
    }

    public function calculateRatings() {
        $sumRating = Feedback::sum('rating');
        $averageRating = Feedback::avg('rating'); 
        $percentage = ($averageRating / $sumRating) * 100;
        $totalFeedBack = Feedback::count();

        //complains
        $totalCases = Cases::all(); 
       
        
       // Get all cases

        $maleLegalCount = $totalCases->where('gender', 'Male')->filter(function($case) {
            return \Carbon\Carbon::parse($case->birthdate)->age >= 18;
        })->count();

        $maleMinorCount = $totalCases->where('gender', 'Male')->filter(function($case) {
            return \Carbon\Carbon::parse($case->birthdate)->age < 18;
        })->count();

        $femaleLegalCount = $totalCases->where('gender', 'Female')->filter(function($case) {
            return \Carbon\Carbon::parse($case->birthdate)->age >= 18;
        })->count();

        $femaleMinorCount = $totalCases->where('gender', 'Female')->filter(function($case) {
            return \Carbon\Carbon::parse($case->birthdate)->age < 18;
        })->count();

        //users
        $totalUsers = User::count();
        return [
            'averageRating' => $averageRating,
            'percentage' => $percentage,
            'sumRating' => $sumRating,
            'totalCases' => $totalCases->count(),
            'totalFeedBack' => $totalFeedBack,
            'totalUsers' => $totalUsers,
            'maleLegalCount' => $maleLegalCount,
            'maleMinorCount' => $maleMinorCount,
            'femaleLegalCount' => $femaleLegalCount,
            'femaleMinorCount' => $femaleMinorCount
        ];
        
    }

   // Admin
   public function Admin_Dashboard()
{
    $admin_username = session('admin_username');
    $id = session('id'); 
    $role = session('role');
    $calculations = $this->calculateRatings();
    [
            'averageRating' => $averageRating,
            'percentage' => $percentage,
            'sumRating' => $sumRating,
            'totalCases' => $totalCases,
            'totalFeedBack' => $totalFeedBack,
            'totalUsers' => $totalUsers,
            'maleLegalCount' => $maleLegalCount,
            'maleMinorCount' => $maleMinorCount,
            'femaleLegalCount' => $femaleLegalCount,
            'femaleMinorCount' => $femaleMinorCount
        ]= $calculations;

    if (!session('admin_username') || !session('id') || session('role') !== 'admin') {
        return redirect()->route('Admin')->with('error', 'Please log in to access the dashboard.');
    }
    return view('admin.admindashboard', compact('admin_username', 'averageRating', 'percentage', 'sumRating',
     'totalCases', 'totalFeedBack', 'totalUsers', 'maleLegalCount', 'maleMinorCount', 'femaleLegalCount', 'femaleMinorCount'));
}

            function Admin_Endorse(){
                $admin_username = session('admin_username');
                $cases = Cases::where(function ($query) {
                    $query->where('status', 'Approved Endorse');
                })
                ->get();
                $staffMembers = Admin::where('role', 'lawyer')->pluck('admin_username');
                return view('admin.endorse', compact('admin_username', 'cases','staffMembers'));
            }

            function Admin_Case(){
                $admin_username = session('admin_username');
                $cases = Cases::all()->sortByDesc('created_at');
            
                return view('admin.case', compact('admin_username', 'cases'));
            }
            function Admin_Reports(){
                $admin_username = session('admin_username');
                return view('admin.report', compact('admin_username'));
            }
            function Admin_Setting(){
                $admin_username = session('admin_username');
                return view('admin.setting', compact('admin_username'));
            }


            
    function Admin_Employee(){
        $admin_username = session('admin_username');

        $user = Admin::where(function ($query) {
            $query->where('role', 'lawyer')
                  ->orWhere('role', 'officer')
                  ->orWhere('role', 'legal');
             })->get()->sortByDesc('id');

        return view('admin.employee', compact('admin_username','user'));
    }
      // Admin


         // lawyer
        function Lawyer_Dashboard(){
            $admin_username = session('admin_username');
            $id = session('id'); 
            $role = session('role');
            $messages = Message::all();
            $message = $messages->count();
            $complains = Cases::all();
            $complain = $complains->count();

            $maleLegalCount = $complains->where('gender', 'Male')->filter(function($case) {
                return \Carbon\Carbon::parse($case->birthdate)->age >= 18;
            })->count();
            
            $maleMinorCount = $complains->where('gender', 'Male')->filter(function($case) {
                return \Carbon\Carbon::parse($case->birthdate)->age < 18;
            })->count();
            
            $femaleLegalCount = $complains->where('gender', 'Female')->filter(function($case) {
                return \Carbon\Carbon::parse($case->birthdate)->age >= 18;
            })->count();
            
            $femaleMinorCount = $complains->where('gender', 'Female')->filter(function($case) {
                return \Carbon\Carbon::parse($case->birthdate)->age < 18;
            })->count();

            if (!session('admin_username') || !session('id') || session('role') !== 'lawyer') {
                return redirect()->route('Admin')->with('error', 'Please log in to access the dashboard.');
            }
            return view('lawyer.lawyer_dashboard', compact('admin_username','complain',
            'message', 'maleLegalCount', 'maleMinorCount', 'femaleLegalCount', 'femaleMinorCount'));
        }
      


        function Lawyer_Complain(){
            $admin_username = session('admin_username');
            $cases = Cases::where('age', '>', 17)
            ->where(function ($query) {
                $query->where('status', 'Endorse');
            })
            ->get();
            return view('lawyer.complain', compact('admin_username', 'cases'));
        }

        function Lawyer_Cases(){
            $admin_username = session('admin_username');
            $cases = Cases::where(function ($query) {
                $query->where('status', 'Endorse')
                      ->orWhere('status', 'On Going Endorse')
                      ->orWhere('status', 'Approved Endorse')
                      ->orWhere('status', 'Case Closed');
            })
            ->get();

             return view('lawyer.cases', compact('admin_username', 'cases'));
        }


        function Lawyer_Message(){
            $admin_username = session('admin_username');
            return view('lawyer.message', compact('admin_username'));
        }
        function Lawyer_Reports(){
            $admin_username = session('admin_username');
            return view('lawyer.report', compact('admin_username'));
        }
        function Lawyer_Setting(){
            $admin_username = session('admin_username');
            return view('lawyer.setting', compact('admin_username'));
        }



    // lawyer


    // Login
   public function admin_login_post(Request $request)
   {
       $request->validate([
           'admin_username' => 'required',
           'admin_password' => 'required',
       ], [
           'admin_password.required' => 'Required admin password.',
       ]);
   
       $admin = Admin::where('admin_username', $request->input('admin_username'))->first();
   
       if ($admin && Hash::check($request->input('admin_password'), $admin->admin_password)) {
           Auth::login($admin);
           $request->session()->put('admin_username', $admin->admin_username);
           $request->session()->put('admin_email', $admin->admin_email);
           $request->session()->put('id', $admin->id);
           $request->session()->put('role', $admin->role);
           $request->session()->regenerate();
   
      
           switch ($admin->role) {
               case 'admin':
                   return redirect()->intended(route('Admin-Dashboard'));
               case 'officer':
                   return redirect()->intended(route('Officer-Dashboard'));
               case 'lawyer':
                   return redirect()->intended(route('Lawyer-Dashboard'));
                   case 'legal':
                    return redirect()->intended(route('Legal-Head-Dashboard'));
               default:
                   return redirect()->intended(route('Admin'));
           }
       }
   
       return redirect(route('Admin'))->with("error", "Invalid login credentials");
   }
   
    public function admin_logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('Admin'); 
    }
    

    public function printpdf($reference_number)
    {
        $timezone = 'Asia/Manila';
        $currentDateTime = now()->timezone($timezone);
        $formattedDateTime = $currentDateTime->format('F j, Y g:i A');
        
        // Fetch the data from the case table based on the reference number
        $case = DB::table('case')->where('reference_number', $reference_number)->first();
        
        if (!$case) {
            // Handle case when no data is found
            return redirect()->back()->with('error', 'Case not found.');
        }
    
        // Pass the case data to the view
        $html = view('layout.print', ['case' => $case])->render();
        
        // Create a new TCPDF instance
        $pdf = new TCPDF();
    
        // Set document information
        $pdf->SetCreator('Your Application Name');
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Case Report');
        $pdf->SetSubject('Generated Case Report');
    
        // Add a page
        $pdf->AddPage();
    
        // Set the font
        $pdf->SetFont('helvetica', '', 12);
    
        // Write HTML content to the PDF
        $pdf->writeHTML($html, true, false, true, false, '');
    
        // Set the file name and download the PDF
        $filename = "Report_generation_{$formattedDateTime}.pdf";
        return $pdf->Output($filename, 'D'); // 'D' for download, 'I' for inline display
    }


    // public function printpdf($reference_number)
    // {
    //     $timezone = 'Asia/Manila';
    //     $currentDateTime = now()->timezone($timezone);
    //     $formattedDateTime = $currentDateTime->format('F j, Y g:i A');
    
    //     // Fetch the data from the case table based on the reference number
    //     $case = DB::table('case')->where('reference_number', $reference_number)->first();
    
    //     if (!$case) {
    //         // Handle case when no data is found
    //         return redirect()->back()->with('error', 'Case not found.');
    //     }
    
    //     // Pass the case data to the view
    //     $html = view('layout.print', ['case' => $case])->render();
    
    //     // Generate and download the PDF
    //     $pdf = PDF::loadHTML($html);
    //     return $pdf->download("Report_generation_{$formattedDateTime}.pdf");
    // }
    
    // public function fetchMessages(Request $request)
    // {
    //     $messages = Message::where(function ($query) use ($request) {
    //         $query->where('sender_id', auth()->id()) // Admin ID
    //               ->where('receiver_id', $request->user_id); // User ID
    //     })->orWhere(function ($query) use ($request) {
    //         $query->where('sender_id', $request->user_id)
    //               ->where('receiver_id', auth()->id()); // Admin ID
    //     })->orderBy('created_at', 'ASC')->get();

    //     return response()->json($messages);
    // }

    // // Send a message from the admin to the user
    // public function sendMessage(Request $request)
    // {
    //     $message = Message::create([
    //         'sender_id' => auth()->id(), // Admin ID
    //         'receiver_id' => $request->user_id, // User ID
    //         'message' => $request->message,
    //     ]);

    //     return response()->json($message);
    // }

 

}
