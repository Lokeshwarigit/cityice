namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use DataTables;

class InvoiceController extends Controller
{
    public function index()
    {
        return view('allinvoice');
    }

    public function getInvoices(Request $request)
    {
        if ($request->ajax()) {
            $data = Invoice::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function () {
                    return '
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-primary">View</button>
                            <button class="btn btn-sm btn-success">Edit</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
