<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ChannelRequest;
use App\Handlers\ImageUploadHandler;
use App\Models\Channel;
use App\Models\RoomMes;
use App\Models\Room_Liu;
use App\Events\Room;
use Auth;

class ChannelController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth',[
			'only'=>['create','show']
		]);
	}
	
    public function create()
    {
        $count=Channel::where('user_id',Auth::id())->count();
        if($count < 1){
            return view('channel.create');
        }else{
            session()->flash('warning','抱歉，您目前只能创建一个房间！');
            return redirect()->route('root');
        }
    }

    public function store(ChannelRequest $request,ImageUploadHandler $uploader)
    {

        if ($request->cover) {
            $result = $uploader->save($request->cover, 'cover',300);
            if ($result) {
                $data['cover'] = $result['path'];
            }
        }

    	$channel=Channel::create([
    		'name'=>$request->name,
    		'class'=>$request->class,
    		'text'=>$request->text,
            'cover'=>$data['cover'],
            'number'=>1,
            'user_id'=>Auth::id(),
    	]);

    	session()->flash('success', '创建成功~');
    	return redirect()->route('root');
    }
    
    public function show(Channel $channel)
    {
        if($this->authorize('update-post',$channel))
        {
            event(new Room($channel->id));
            $title=$channel->name;
            $mes=RoomMes::join('channels','room_mes.channel_id','=','channels.id')->join('users','room_mes.user_id','=','users.id')->where('channels.id',$channel->id)->orderBy('room_mes.created_at','desc')->select('room_mes.*','users.name')->get();
            return view('room.show',compact('channel','title','mes'));
        }

    }

    public function Rstore(Request $request)
    {
        $this->validate($request,[
            'content' => 'required|min:5|max:255'
        ]);

        $room=RoomMes::create([
            'channel_id' => $request->channel_id,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back();
    }
}
