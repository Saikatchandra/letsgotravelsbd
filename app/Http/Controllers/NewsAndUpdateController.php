<?php

namespace App\Http\Controllers;

use App\NewsAndUpdate;
use Str;
use File;
use Illuminate\Http\Request;

class NewsAndUpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $items = NewsAndUpdate::paginate(10);
        // dd($items);
        return view('newsAndUpdate.index')->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view("newsAndUpdate.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'max:190|required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240|required',

        ],
        [
            'image.image' => 'Must be an Image',
            'image.mimes' => 'Must be an Image with extention jpeg,png,jpg,gif,svg only',
            'image.max' => 'Must be an Image with max sixe 10240KB',
        ]
    
        );
        // dd($request);
        $postMaxId = NewsAndUpdate::max('id');
        $item = new NewsAndUpdate;
        if ($request->hasFile('image')) {
            // dd('sdcds');
            $imageName = Str::random(16).'_'.($postMaxId+1).'.'.$request->image->getClientOriginalExtension();
            // dd($imageName);
            $request->image->move(public_path('contents/images/newsAndUpdate'), $imageName);
            $item->image = $imageName;
        }

        $item->title = $request->title;
        $item->description = $request->description;
        $item->save();
        $request->session()->flash('successMessage', 'Post added to NewsAndUpdate Successfully!!!');
        return redirect()->action('NewsAndUpdateController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $item = NewsAndUpdate::find($id);
        return view('newsAndUpdate.editPost')->with('item', $item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate([
            'title' => 'required|max:190',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'description' => 'required',

        ],
        [
            'image.image' => 'Must be an Image',
            'image.mimes' => 'Must be an Image with extention jpeg,png,jpg,gif,svg only',
            'image.max' => 'Must be an Image with max sixe 10240KB',
        ]);
        // dd($request->all());
        $item = NewsAndUpdate::find($request->id);

        if ($request->hasFile('image')) {
            //delete previous image
            $image_path = "contents/images/newsAndUpdate/".$item->image;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
                // dd($image_path);
                File::delete($image_path);
            }
            $imageName = Str::random(16).'_'.($item->id).'.'.$request->image->getClientOriginalExtension();
            // dd($imageName);
            $request->image->move(public_path('/contents/images/newsAndUpdate'), $imageName);
            $item->image = $imageName;
        }

        $item->title = $request->title;
        $item->description = $request->description;
        $item->save();
        $request->session()->flash('successMessage', 'Post Updated Successfully');
        return redirect()->action('NewsAndUpdateController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $item = NewsAndUpdate::find($id);
        $item->delete();
        // return($internationalPackageDetails);

        //delete image
        $image_path = "contents/images/newsAndUpdate/".$item->image;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            // dd($image_path);
            File::delete($image_path);
        }
        
        // $items = NewsAndUpdate::paginate(1);
        // return view('ajax.UpdatedNewsPost')->with('items', $items);
       // $request->session()->flash('successMessage', 'Post Updated Successfully');
        return redirect()->action('NewsAndUpdateController@index');
    }

    public function newsUpdatePostDetails($id)
    {
        $item = NewsAndUpdate::find($id);
        $nextItem = NewsAndUpdate::where([['id', '>', $id]])->first();
        $previousItem = NewsAndUpdate::where([['id', '<', $id]])->orderBy('id', 'desc')->first();
        // dd($nextItem);
        return view('newsAndUpdate.newsUpdatePostDetails')
            ->with('item', $item)
            ->with('nextItem', $nextItem)
            ->with('previousItem', $previousItem);
    }
}
