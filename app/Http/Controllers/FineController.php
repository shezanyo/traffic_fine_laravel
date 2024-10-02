<?php

namespace App\Http\Controllers;

use App\Models\Fine;
use Illuminate\Http\Request;

class FineController extends Controller
{
    public function payFine($id)
    {
        // Find the fine by ID and delete it
        $fine = Fine::findOrFail($id);
        $fine->delete();

        // Redirect back to the dashboard with a success message
        return redirect()->route('dashboard')->with('success', 'Fine paid successfully.');
    }
}
