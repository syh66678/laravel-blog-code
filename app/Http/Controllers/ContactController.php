<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactMeRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Jobs\ProcessPodcast;
use App\Events\OrderShipped;

class ContactController extends Controller
{
    public function showForm()
    {
        //分发事件
        event(new OrderShipped('我是一个事件哦'));
        //分发任务到队列
        dispatch(new ProcessPodcast());
        return view('blog.contact');
    }


    public function sendContactInfo(ContactMeRequest $request)
    {


        $data = $request->only('name', 'email', 'phone');
        $data['messageLines'] = explode("\n", $request->get('message'));

        //将邮件发送这个任务放到队列中
        Mail::to($data['email'])->queue(new ContactMail($data));

        return back()
            ->with("success", "消息已发送，感谢您的反馈");
    }
}
