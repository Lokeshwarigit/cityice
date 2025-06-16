<!-- <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
class CustomerController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'sno' => 'required',
            'customer_number' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'service_history' => 'nullable',
            'status' => 'required|in:active,inactive',
            'document' => 'nullable|file|mimes:pdf,jpg,png,jpeg|max:2048',
        ]);

        $documentPath = null;

        if ($request->hasFile('document')) {
            $documentPath = $request->file('document')->store('documents', 'public');
        }

        \App\Models\Customer::create([
            'sno' => $request->sno,
            'customer_number' => $request->customer_number,
            'email' => $request->email,
            'address' => $request->address,
            'service_history' => $request->service_history,
            'status' => $request->status,
            'document' => $documentPath,
        ]);

        return response()->json(['message' => 'Customer created successfully']);
    }
    public function index(Request $request)
    {
        $customers = Customer::all();

        // Format data for DataTables
        return response()->json([
            'data' => $customers
        ]);
    }
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);

        // Delete document if exists
        if ($customer->document) {
            \Storage::disk('public')->delete($customer->document);
        }

        $customer->delete();

        return response()->json(['message' => 'Customer deleted']);
    }
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return response()->json($customer);
    }


    public function uploadDocument(Request $request)
    {
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Save to public directory
            $file->move(public_path('uploads/documents'), $filename);

            return response()->json([
                'status' => 'success',
                'filename' => $filename,
                'url' => asset('uploads/documents/' . $filename)
            ]);
        }

        return response()->json(['status' => 'error', 'message' => 'No file uploaded'], 400);
    }




}



