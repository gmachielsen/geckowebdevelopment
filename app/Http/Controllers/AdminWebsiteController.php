<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Website;

class AdminWebsiteController extends Controller
{
    public function index() 
    {

        $websites = Website::whenSearch(request()->search)->paginate(2);
        return view('admin.websites.index', compact('websites'));
    }    

    public function create() 
    {
        return view('admin.websites.create');
    }

    public function store(Request $request) 
    {
        $this->validate($request,[
            'name'=>'required|min:2',
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);


        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/websites/',$filename);
        
            Website::create([
                'name' => request('name'),
                'url' =>  request('url'),
                'content' => request('content'),
                'image'=> $filename,
            ]);
        }
        session()->flash('success', 'Website saved succesfully');
        return redirect()->route('admin.websites.index'); 
    }

    public function edit($id) 
    {
        $website = Website::findOrFail($id);
        return view('admin.websites.edit', compact('website'));
    }

    public function update(Request $request, $id) 
    {
        $this->validate($request,[
            'name'=>'required|min:3',
        ]);

        $website = Website::find($id);

        $website->name = request('name');
        $website->url = request('url');
        $website->content = request('content');

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/websites/',$filename);
            $website->image = $filename;
        }
        $website->save();
        session()->flash('success', 'Website updated successfully');
        return redirect()->route('admin.websites.index');
    }

    public function delete($id) {
        $website = Website::find($id);
        $website->delete();
        session()->flash('success', 'Website deleted successfully');
        return redirect()->route('admin.websites.index');
    }
}
