<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rakuhai; //データベースから取ってくる
use App\Http\Requests\StoreContactRequest; //バリデーション
use Illuminate\Support\Facades\Mail;

class RakuhaiController extends Controller
{
  public function index()
  {
    //ログインしたらメインへ飛ぶ
    
    $rakuhai = Rakuhai::all(); //データベースから取ってくる

    return view('index', compact('rakuhai'));
  }
  public function contact()
  {
    $rakuhai = Rakuhai::all(); //データベースから取ってくる

    return view('contact', compact('rakuhai'));
  }

  public function contactPost()
  {
    return view('contact');
  }

  public function confirm(Request $request)
  {

    $inputs = $request->all(); //$requestは前のとこから持ってきた

    // バリ
    $request->validate([
      'name_tmp' => ['required', 'max:10'],
      'kana_tmp' => ['required', 'max:10'],
      'tel_tmp' => ['nullable', 'regex:/^[0-9]+$/'],
      'email_tmp' => ['required', 'email'],
      'message_tmp' => 'required'
    ]);


    $request->session()->put('inputs', $inputs);

    return view('confirm', ['inputs' => $inputs]);
  }

  public function sendForm(Request $request)
  {
    // 値をDBに保存
    $contact = $request->all(); //Requestの内容を$contactに入れる
    // dd($contact);
    Rakuhai::create($contact);
    return redirect('/complete');
  }

  public function thanks()
  {
    return view('complete');
  }

  public function edit(Request $request)
  {
    $rakuhai = Rakuhai::find($request->id);

    return view('edit', ['rakuhai' => $rakuhai]);
  }

  public function update(Request $request)
  {
    // バリ
    $request->validate([
      'name_tmp' => ['required', 'max:10'],
      'kana_tmp' => ['required', 'max:10'],
      'tel_tmp' => ['nullable', 'regex:/^[0-9]+$/'],
      'email_tmp' => ['required', 'email'],
      'message_tmp' => 'required'
    ]);

    $contact = Rakuhai::find($request->id);
    $contact->update($request->all());
    return redirect('/contact');
  }

  public function delete(Request $request){
    $contact = Rakuhai::find($request->id);
    $contact->delete();
    return redirect('contact');
  }

}
