<?php

namespace App\Http\Controllers\Admin\PrivacyPolicy;

use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PrivacyPolicy\PrivacyPolicyRequest;

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        return view('admin.privacy-policy.index');
    }

    public function edit($id)
    {
        $privacy_policy = PrivacyPolicy::findorfail($id);
        return response()->json($privacy_policy);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $privacy_policy = PrivacyPolicy::find($id);
            $privacy_policy->privacyPolicy = $request->privacyPolicy;
            $privacy_policy->update();

            DB::commit();
            return response()->json([
                'message' => 'Privacy Policy updated successfully!',
                'privacyPolicy' => $privacy_policy,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }
}
