<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Str;
use File;

class BlogController extends Controller
{
    public function showAllPost(){
        $items = Blog::paginate(10);
        // dd($items);
        return view('blog.showAllPost')->with('items', $items);
    }

    public function addPost(){
        return view("blog.addPost");
    }

    public function addPostPost(Request $request){
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
        $blogMaxId = Blog::max('id');
        $item = new Blog;
        if ($request->hasFile('image')) {
            // dd('sdcds');
            $imageName = Str::random(16).'_'.($blogMaxId+1).'.'.$request->image->getClientOriginalExtension();
            // dd($imageName);
            $request->image->move(public_path('contents/images/blog'), $imageName);
            $item->image = $imageName;
        }

        $item->title = $request->title;
        $item->description = $request->description;
        $item->save();
        $request->session()->flash('successMessage', 'Post added to Blog Successfully!!!');
        return redirect()->action('BlogController@showAllPost');
    }

    public function editPost($id)
    {
        $item = Blog::find($id);
        return view('blog.editPost')->with('item', $item);
    }

    public function editPostPost(Request $request){
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
        $item = Blog::find($request->id);

        if ($request->hasFile('image')) {
            //delete previous image
            $image_path = "contents/images/blog/".$item->image;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
                // dd($image_path);
                File::delete($image_path);
            }
            $imageName = Str::random(16).'_'.($item->id).'.'.$request->image->getClientOriginalExtension();
            // dd($imageName);
            $request->image->move(public_path('/contents/images/blog'), $imageName);
            $item->image = $imageName;
        }

        $item->title = $request->title;
        $item->description = $request->description;
        $item->save();
        $request->session()->flash('successMessage', 'Post Updated Successfully');
        return redirect()->action('BlogController@showAllPost');
    }

    public function deletePost(Request $request){
        // dd($request->id);
        $item = Blog::find($request->id);
        $item->delete();
        // return($internationalPackageDetails);

        //delete image
        $image_path = "contents/images/blog/".$item->image;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            // dd($image_path);
            File::delete($image_path);
        }
        
        $items = Blog::paginate(1);
        return view('ajax.UpdatedBlogPost')->with('items', $items);
        // return redirect()->action('PackageController@manageInternationalPackages');
    }

    public function blog()
    {
        $items = Blog::paginate(10);
        return view('blog.blog')->with('items', $items);
    }

    public function blogPostDetails($id)
    {
        $item = Blog::find($id);
        $nextItem = Blog::where([['id', '>', $id]])->first();
        $previousItem = Blog::where([['id', '<', $id]])->orderBy('id', 'desc')->first();
        // dd($nextItem);
        return view('blog.blogPostDetails')
            ->with('item', $item)
            ->with('nextItem', $nextItem)
            ->with('previousItem', $previousItem);
    }
}
