<?php

namespace App\Http\Controllers\Admin\TermsConditions;

use Illuminate\Http\Request;
use App\Models\TermsCondition;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TermsConditionsController extends Controller
{
    public function index()
    {
        return view('admin.terms-conditions.index');
    }

    public function edit($id)
    {
        $termsCondition = TermsCondition::findorfail($id);
        return response()->json($termsCondition);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $termsCondition = TermsCondition::find($id);
            $termsCondition->termsCondition = $request->termsCondition;
            $termsCondition->update();

            DB::commit();
            return response()->json([
                'message' => 'Terms & Condition updated successfully!',
                'termsCondition' => $termsCondition,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }
}
