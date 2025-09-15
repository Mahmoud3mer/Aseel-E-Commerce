<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class CustomersController extends Controller
{
    public function index()
    {
        $reviews = Review::with('user')->get();

        return view('customers.index', compact('reviews'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'comment' => 'required|string|max:300',
            'subject' => 'required|string|max:100',
            'phone' => 'required|string|max:15',
        ],
        [
            'comment.required' => 'يرجى إدخال تعليق.',
            'subject.required' => 'يرجى إدخال اسم موضوع.',
            'phone.required' => 'يرجى إدخال رقم الهاتف.',
            'comment.max' => 'التعليق يجب ألا يتجاوز 300 حرف.',
            'subject.max' => 'اسم الموضوع يجب ألا يتجاوز 100 حرف.',
            'phone.max' => 'رقم الهاتف يجب ألا يتجاوز 15 رقم.',
        ]);

        Review::create([
            'comment' => $request->comment,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'user_id' => $user->id,
        ]);

        return redirect()->route('customers.index')->with('success', 'تم إضافة المراجعة بنجاح.');
    }
}
