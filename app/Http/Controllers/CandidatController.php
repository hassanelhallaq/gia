<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Program;
use BaconQrCode\Encoder\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Rap2hpoutre\FastExcel\Facades\FastExcel;

class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator($data, [
            'name' => 'required|string',
            'phone_number' => 'required',
            // 'work_place' => 'required',
            // 'id_number' => 'required',
            // 'job' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }

        $attendance = Candidat::create($data);

        if ($request->course_id) {

            $qrImage = 'images' .  $attendance->id . '.svg';
            $url =  'https://giaelites.com/dashboard/admin/' . $attendance->id . '/' . $request->course_id . '/login';
            QrCode::format('svg');
            QrCode::generate($url, $qrImage);
            $attendance->qr = $qrImage;
            $attendance->update();
        }
        return response()->json(['icon' => 'success', 'title' => 'تم الاضافه بنجاح'], $attendance ? 201 : 400);
    }
    public function candidatXlsx(Request $request, $id)
    {

        $courses = Program::with('candidats')->find($id);

        foreach ($courses->attendances as $course) {

            $data[] = [
                'الاسم' => $course->name,
                'رقم الهاتف' => $course->phone_number,
            ];
        }
        if (empty($data))
            return back();
        $list = collect($data);
        return (new \Rap2hpoutre\FastExcel\FastExcel($list))->download('file.xlsx');
    }
    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {

        $candidat = Candidat::where('program_id', $id)->when($request->name, function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->name . '%');
        })->paginate(10);



        return view("dashboard.candidat.index", compact("candidat", 'id'));
    }
    public function upload(Request $request, $id)
    {
        $file = $request->file('excel_file');
        $rows = (new FastExcel)->sheet()->import($file);
        foreach ($rows as $row) {
            $name = $row['name'];
            $phone = $row['phone_number'];
            $attendance =  Candidat::create(['name' => $name, 'phone_number' => $phone]);
        }
        return redirect()->back();
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidat $candidat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidat $candidat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $candidat = Candidat::destroy($id);
        return response()->json(['icon' => 'success', 'title' => 'تم الحذف  بنجاح'], $candidat ? 200 : 400);
    }


    public function sendSms(Request $request)
    {

        $course = Program::with('candidats')->find($request->program_id);
        $attendances = $course->attendances->where('status', 'active');
        foreach ($attendances as $attendance) {
            $phone = $attendance->phone_number;
            $massege = $request->massege;

            // Retrieve POST parameters from the request
            $sender = urlencode(request()->input('sender'));
            $apikey = request()->input('api_key');
            $username = request()->input('username');
            $numbers = request()->input('numbers');
            $response = request()->input('response');

            // Process message for Unicode characters
            if (request()->input('unicode') == 1) {
                $mssg = request()->input('message');
                $msg = str_replace("061B", "Ø", $mssg);
                // ... (continue with your Unicode character replacements)
            } else {
                $msg = request()->input('massege');
            }

            $lmsg = urlencode($msg);

            // Make the HTTP request using Laravel HTTP client
            $response = Http::post('https://www.mora-sa.com/api/v1/sendsms', [
                'api_key' => "7d937a772bb388922581c724028e3e0146ba57454d",
                'username' => "gialearning",
                'message' => $massege . "\n" . route('invitation.index', [$attendance->id, 'course_id' => $request->course_id]),
                'sender' => "GiaLearning",
                'numbers' => '966'.$phone,
                'response' => $response,
            ]);
            // Get the server response
              $server_output = $response->body();
             // Further processing...
            // if ($server_output == "OK") { echo "1"; } else { echo "0"; }
        }
    }
    public function sendSmsSelected(Request $request)
    {
        $ids = $request->ids;
        $attendances = Candidat::whereIn('id', explode(",", $ids))->where('status', 'active')->get();
        foreach ($attendances as $attendance) {
            $phone = $attendance->phone_number;
            $massege = $request->massege_select;

            // Retrieve POST parameters from the request
            $sender = urlencode(request()->input('sender'));
            $apikey = request()->input('api_key');
            $username = request()->input('username');
            $numbers = request()->input('numbers');
            $response = request()->input('response');

            // Process message for Unicode characters
            if (request()->input('unicode') == 1) {
                $mssg = request()->input('message');
                $msg = str_replace("061B", "Ø", $mssg);
                // ... (continue with your Unicode character replacements)
            } else {
                $msg = request()->input('message');
            }

            $lmsg = urlencode($msg);

            // Make the HTTP request using Laravel HTTP client
            $response = Http::post('https://www.mora-sa.com/api/v1/sendsms', [
                'api_key' => "7d937a772bb3882925821c72408e3e0146ba57454d",
                'username' => "gialearning",
                'message' => $massege . "\n" . route('invitation.index', [$attendance->id, 'course_id' => $request->course_id]),
                'sender' => "GiaLearning",
                'numbers' => '966'.$phone,
                'response' => $response,
            ]);
            // Get the server response
               $server_output = $response->body();

            // Further processing...
            // if ($server_output == "OK") { echo "1"; } else { echo "0"; }
        }
        return response()->json(['icon' => 'success', 'title' => 'تم الاضافه بنجاح'],200 );
    }
}
